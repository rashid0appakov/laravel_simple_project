<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Storage;
class CompanyController extends Controller
{
    public function search(Request $request){
        $q = $request->q;
        return Company::where('name', 'like', "%$q%")->get();
    }
    public function index(){
        $companies = Company::paginate(25);
        return view('admin.companies.index', compact('companies'));
    }
    public function create(){
        return view('admin.companies.create');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255'
        ]);
        $data = $request->except('logo');
        if($request->hasFile('logo')) $data['logo'] = $request->file('logo')->store('logos');
        Company::create($data);
        session()->flash('success', 'Новая компания успешно добавлена');
        return redirect()->route('admin.companies.index');
    }
    public function edit(Company $company){
        return view('admin.companies.edit', compact('company'));
    }
    public function update(Request $request, Company $company){
        $request->validate([
            'name' => 'required|string|max:255'
        ]);
        $data = $request->except('logo');
        if($request->hasFile('logo')){
            if($company->logo) Storage::delete($company->logo);
            $data['logo'] = $request->file('logo')->store('logos');
        }
        $company->update($data);
        session()->flash('success', 'Компания успешно обновлена');
        return redirect()->route('admin.companies.index');
    }
    public function destroy(Company $company){
        if($company->logo) Storage::delete($company->logo);
        $company->delete();
        session()->flash('success', 'Компания успешно удалена');
        return redirect()->route('admin.companies.index');
    }
}
