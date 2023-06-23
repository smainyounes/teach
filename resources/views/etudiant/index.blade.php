@extends('layout.app')

@section('content')
    <div class="container py-4">
        <h4>Liste des étudiants</h4>
        <div class="card ">
            <div class="card-body">
                @if ($etudiants->isNotEmpty())
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Matricule</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($etudiants as $etudiant)
                                    <tr>
                                        <td>{{ $etudiant->id }}</td>
                                        <td>{{ $etudiant->nom }}</td>
                                        <td>{{ $etudiant->prenom }}</td>
                                        <td>{{ $etudiant->matricule }}</td>
                                        <td class="d-flex">
                                            <form action="/etudiant/delete/{{ $etudiant->id }}" method="POST">
                                                @csrf
                                                <button class="btn btn-danger">supprimer</button>
                                            </form>
                                            <a class="btn btn-warning ms-2" href="/etudiant/edit/{{ $etudiant->id }}">Modifier</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <h4 class="text-center">Aucun etudiant trouvé</h4>
                @endif
            </div>
        </div>

    </div>
@endsection