@extends('layout.app')

@section('content')
    <div class="container py-4">
        <h4>ajouter un étudiant</h4>
        <div class="card">
            <div class="card-body">
                @if(count($errors)>0)
                    @foreach($errors->all() as $error)
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{$error}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endforeach
                @endif
                <form action="{{ route('etudiant.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label>Nom</label>
                            <input class="form-control" type="text" name="nom" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Prenom</label>
                            <input class="form-control" type="text" name="prenom" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Matricule</label>
                            <input class="form-control" type="text" name="matricule" required>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <button class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection