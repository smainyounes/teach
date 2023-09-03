<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::latest()->get();

        return view('admin.index', [
            'admins' => $admins,
        ]);
    }

    public function create()
    {
        $roles = Role::orderBy('name')->get();

        return view('admin.create', [
            'roles' => $roles
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // if ($request->role == 'super admin') {
        //     return back()->with('error', 'pas de super admin');
        // }

        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($user) {
            $user->assignRole($request->role);
            // return redirect()->route('login.view');
            return redirect()->route('admin.index');
        }else{
            return back()->with('error', 'please try again');
        }
    }

    public function edit($id)
    {
        $admin = User::findOrFail($id);

        $roles = Role::orderBy('name')->get();

        return view('admin.edit', [
            'admin' => $admin,
            'roles' => $roles,
        ]);
    }

    public function update(Request $request, $id)
    {
        $admin = User::findOrFail($id);
        if ($request->has('nom') && $request->nom) {
            $admin->nom = $request->nom;
        }

        if ($request->has('prenom') && $request->prenom) {
            $admin->prenom = $request->prenom;
        }

        if ($request->has('email') && $request->email) {
            $admin->email = $request->email;
        }

        $admin->syncRoles([$request->role]);

        $admin->save();

        return redirect()->route('admin.index');
    }

    public function destroy($id)
    {
        $admin = User::findOrFail($id);

        $admin->delete();

        return back();
    }
}
