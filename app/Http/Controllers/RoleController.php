<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
class RoleController extends Controller
{
    public function index(){
        $this->authorize('view-role', Role::class);
        $roles = Role::paginate(50);
        return view('admin.roles.index', compact('roles'));
    }
    public function create(){
        $this->authorize('create-role', Role::class);
        $permissions = Permission::all();
        return view('admin.roles.create', compact('permissions'));
    }
    public function edit(Role $role){
        $this->authorize('view-role', Role::class);
        if($role->id == 1) abort(403);
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }
    public function store(Request $request){
        $this->authorize('create-role', Role::class);
        $request->validate([
            'name' => 'required|string|max:255'
        ]);
        $permissions = $request->permissions ? array_keys($request->permissions) : [];
        $role = Role::create($request->only('name'));
        $role->permissions()->sync($permissions);
        auth()->user()->log('Добавлена роль '. $role->name);
        session()->flash('success', 'Новая роль успешно добавлена');
        return redirect()->route('admin.roles.index');
    }
    public function update(Request $request, Role $role){
        $this->authorize('update-role', Role::class);
        if($role->id == 1) abort(403);
        $request->validate([
            'name' => 'required|string|max:255'
        ]);
        $permissions = $request->permissions ? array_keys($request->permissions) : [];
        $role->update($request->only('name'));
        $role->permissions()->sync($permissions);
        auth()->user()->log('Обновлена роль '. $role->name);
        session()->flash('success', 'Роль успешно изменена');
        return back();
    }
    public function destroy(Role $role){
        $this->authorize('delete-role', Role::class);
        if($role->id == 1) abort(403);
        $role->delete();
        session()->flash('success', 'Роль успешно удалена');
        auth()->user()->log('Удалена роль '. $role->name);
        return redirect()->route('admin.roles.index');
    }
}
