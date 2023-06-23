<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('auth.profile');
    }

    public function updateInfos(Request $request)
    {
        $request->validate([
            'nom' => 'nullable',
            'prenom' => 'nullable',
            'email' => 'nullable|email|unique:users,email',
        ]);

        $user = Auth::user();

        if ($request->has('nom') && $request->nom) {
            $user->nom = $request->nom;
        }

        if ($request->has('prenom') && $request->prenom) {
            $user->prenom = $request->prenom;
        }

        if ($request->has('email') && $request->email) {
            $user->email = $request->email;
        }

        $user->save();

        return back()->with('success', 'your infos has been updated');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:6',
            'old_password' => 'required',
        ]);

        if (Hash::check($request->old_password, Auth::user()->password)) {
            $user = Auth::user();

            $user->password = Hash::make($request->password);

            $user->save();

            return back()->with('success', 'your password has been updated');
        }

        return back()->with('error', 'old password doesnt match');

    }
}
