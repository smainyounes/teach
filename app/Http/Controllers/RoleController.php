<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::where('name', '!=', 'super admin')->orderBy('name')->get();

        return view('role.index', [
            'roles' => $roles,
        ]);
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('role.create', [
            'permissions' => $permissions,
        ]);
    }

    public function store(Request $request)
    {
        if (Role::where('name', $request->role)->exists()) {
            return back()->with('error', 'role exist deja');
        }

        $role = Role::create([
            'name' => $request->role,
        ]);

        $role->syncPermissions($request->permissions);

        return redirect()->route('role.index');
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();

        return view('role.edit', [
            'role' => $role,
            'permissions' => $permissions,
        ]);
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        
        $role->name = $request->role;

        $role->save();

        $role->syncPermissions($request->permissions);

        return redirect()->route('role.index');

    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        
        $role->delete();

        return back();
    }
}
