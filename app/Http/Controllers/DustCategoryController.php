<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DustCategory;
use Illuminate\Support\Str;
class DustCategoryController extends Controller
{
    public function index(){
        $categories = DustCategory::paginate(50);
        return view('admin.dust_categories.index', compact('categories'));
    }
    public function getIndex(){
        $categories = DustCategory::paginate(50);
        return view('dust_categories.index', compact('categories'));
    }
    public function show($slug){
        $category = DustCategory::whereSlug($slug)->firstOrFail();
        $category->load('dusts');
        return view('dust_categories.show', compact('category'));
    }
    public function create(){
        return view('admin.dust_categories.create');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255|unique:dust_categories',
        ]);
        $data = $request->only(['name']);
        $data['slug'] = Str::slug($data['name']);
        DustCategory::create($data);
        session()->flash('success', 'Новая категория успешно добавлена');
        return redirect()->route('admin.dust_categories.index');
    }
    public function edit(DustCategory $dust_category){
        return view('admin.dust_categories.edit', compact('dust_category'));
    }
    public function update(Request $request, DustCategory $dust_category){
        $request->validate([
            'name' => 'required|string|max:255|unique:dust_categories,id,.'.$dust_category->id
        ]);
        $data = $request->only(['name']);
        $data['slug'] = Str::slug($data['name']);
        $dust_category->update($data);
        session()->flash('success', 'Категория успешно обновлена');
        return redirect()->route('admin.dust_categories.index');
    }
    public function destroy(DustCategory $dust_category){
        $dust_category->delete();
        session()->flash('success', 'Категория успешно удалена');
        return redirect()->route('admin.dust_categories.index');
    }
}
