<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerView()
    {
        $roles = Role::where('name', '!=', 'super admin')->orderBy('name')->get();
        
        return view('auth.register', [
            'roles' => $roles,
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        if ($request->role == 'super admin') {
            return back()->with('error', 'pas de super admin');
        }

        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($user) {
            $user->assignRole($request->role);
            return redirect()->route('login.view');
        }else{
            return back()->with('error', 'please try again');
        }
    }

    public function loginView()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home');
        }else{
            return back()->with('error', 'wrong email or password');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
