<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CodeImport;
use App\Models\Code;




class CodeController extends Controller
{


    public function search(Request $request){
        $q = $request->q;
        return Code::where('code', 'like', "%$q%")->orWhere('short_code', 'like', "%$q%")->orWhere('name', 'like', "%$q%")->orWhere('types', 'like', "%$q%")->get();
    }
    public function index(Request $request){
        $q = $request->q;
        $codes = Code::orderBy('code');
        if($request->q) $codes->where('code', 'like', "%$q%")->orWhere('short_code', 'like', "%$q%")->orWhere('name', 'like', "%$q%")->orWhere('types', 'like', "%$q%");
        $codes = $codes->paginate(50);
        return view('admin.codes.index', compact('codes', 'q'));
    }
    public function clientIndex(){
        $codes = Code::paginate(25);
        return view('codes.index', compact('codes'));
    }
    public function show($code){
        $code = Code::where("short_code", $code)->firstOrFail();
        return view('codes.show', compact('code'));
    }
    public function store(Request $request){
        $request->validate([
            'code' => 'required|string|max:255|unique:codes'
        ]);
        $data = $request->only([
            'code',
            'name',
            'types'
        ]);
        $data['short_code'] = str_replace(' ', '', $data['code']);
        Code::create($data);
        session()->flash('success', 'Новый код успешно добавлен');
        return back();
    }
    public function destroy(Code $code){
        $code->delete();
        session()->flash('success', 'Код успешно удален');
        return back();
    }
    public function edit(Code $code){
        return view('admin.codes.edit', compact('code'));
    }
    public function import(Request $request){
        $request->validate([
            'file' => 'required|mimes:xlsx'
        ]);
        Excel::import(new CodeImport, $request->file('file'));
        session()->flash('success', 'Коды успешно загужены');
        return back();
    }
}
