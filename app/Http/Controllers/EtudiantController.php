<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{

    public function index()
    {
        $etudiants = Etudiant::get();

        // dd($etudiants);

        return view('etudiant.index', [
            'etudiants' => $etudiants,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'matricule' => 'required|unique:etudiants,matricule',
        ]);

        $etudiant = Etudiant::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'matricule' => $request->matricule,
        ]);

        if ($etudiant) {
            return 'inserted';
        }else{
            return 'not inserted';
        }
    }

    public function delete($id)
    {
        // dd($id);
        $etudiant = Etudiant::findOrFail($id);

        $etudiant->delete();
        return back();
    }

    public function edit($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        
        return view('etudiant.edit', [
            'etudiant' => $etudiant,
        ]);
    }

    public function update(Request $request, $id)
    {
        $etudiant = Etudiant::findOrFail($id);

        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->matricule = $request->matricule;

        $etudiant->save();

        return redirect('/etudiant');
    }
    
}
