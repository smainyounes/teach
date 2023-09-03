@extends('layout.app')

@section('content')
    <div class="container py-4">
        <h4>modifier un admin</h4>
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
                <form action="{{ route('admin.update', $admin->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label>Nom</label>
                            <input class="form-control" type="text" name="nom" value="{{ $admin->nom }}" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Prenom</label>
                            <input class="form-control" type="text" name="prenom" value="{{ $admin->prenom }}" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>email</label>
                            <input class="form-control" type="email" name="email" value="{{ $admin->email }}" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>role</label>
                            <select class="form-control" name="role">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}" {{ $admin->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <button class="btn btn-primary">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection