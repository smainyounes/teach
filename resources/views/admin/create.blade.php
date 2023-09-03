@extends('layout.app')

@section('content')
    <div class="container py-4">
        <h4>ajouter un admin</h4>
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
                <form action="{{ route('admin.store') }}" method="POST">
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
                            <label>email</label>
                            <input class="form-control" type="email" name="email" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>role</label>
                            <select class="form-control" name="role">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <label >password</label>
                            <input class="form-control" type="password" name="password" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label >confirm password</label>
                            <input class="form-control" type="password" name="password_confirmation" required>
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