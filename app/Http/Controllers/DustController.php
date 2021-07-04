<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dust;
use App\Models\DustCategory;
use Illuminate\Support\Str;
class DustController extends Controller
{
    public function index(){
        $dusts = Dust::paginate(50);
        $categories = DustCategory::all();
        return view('admin.dusts.index', compact('dusts', 'categories'));
    }
    public function show($category_slug, $slug){
        $category = DustCategory::whereSlug($category_slug)->firstOrFail();
        $dust = Dust::whereSlug($slug)->where('dust_category_id', $category->id)->firstOrFail();
        return view('dusts.show', compact('dust', 'category'));
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255|unique:dusts',
        ]);
        $data = $request->only(['name', 'dust_category_id', 'text']);
        $data['slug'] = Str::slug($data['name']);
        Dust::create($data);
        session()->flash('success', 'Новый тип отходов успешно добавлен');
        return redirect()->route('admin.dusts.index');
    }
    public function edit(Dust $dust){
        $dust->load('category');
        return view('admin.dusts.edit', compact('dust'));
    }
    public function update(Request $request, Dust $dust){
        $request->validate([
            'name' => 'required|string|max:255|unique:dusts,id,.'.$dust->id
        ]);
        $data = $request->only(['name', 'dust_category_id', 'text']);
        $data['slug'] = Str::slug($data['name']);
        $dust->update($data);
        session()->flash('success', 'Тип отхода успешно обновлен');
        return redirect()->route('admin.dusts.index');
    }
    public function destroy(Dust $dust){
        $dust->delete();
        session()->flash('success', 'Тип отхода успешно удален');
        return redirect()->route('admin.dusts.index');
    }
}
