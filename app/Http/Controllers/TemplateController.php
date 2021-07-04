<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;
use Storage;
class TemplateController extends Controller
{
    public function index(){
        $templates = Template::paginate(50);
        return view('admin.templates.index', compact('templates'));
    }
    public function create(){
        return view('admin.templates.create');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255'
        ]);
        $data = $request->only(['name', 'html']);
        Template::create($data);
        session()->flash('success', 'Новый шаблон успешно добавлен');
        return redirect()->route('admin.templates.index');
    }
    public function edit(Template $template){
        return view('admin.templates.edit', compact('template'));
    }
    public function update(Request $request, Template $template){
        $request->validate([
            'name' => 'required|string|max:255'
        ]);
        $data = $request->only(['name', 'html']);
        $template->update($data);
        session()->flash('success', 'Шаблон успешно обновлен');
        return redirect()->route('admin.templates.index');
    }
    public function destroy(Template $template){
        $template->delete();
        session()->flash('success', 'Шаблон успешно удален');
        return redirect()->route('admin.templates.index');
    }
}
