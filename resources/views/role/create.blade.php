@extends('layout.app')

@section('content')
    <div class="container py-4">
        <div class="card">
            <div class="card-header">
                <h1>ajouter un role</h1>

            </div>
            <div class="card-body">
                <form action="{{ route('role.store') }}" method="POST">
                    @csrf
        
                    <div class="row justify-content-center">
                        <div class="col-md-6 form-group">
                            <label>Nom du role</label>
                            <input class="form-control" type="text" name="role" required>
                        </div>
                    </div>
        
                    <div class="row">
                        @foreach ($permissions as $permission)
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input class="form-check-input" name="permissions[]" value="{{ $permission->name }}" type="checkbox" id="checkbox{{ $permission->id }}">
                                    <label class="form-check-label" for="checkbox{{ $permission->id }}">{{ $permission->name }}</label>
                                </div>
                            </div>
                        @endforeach
                    </div>
        
                    <div class="text-right mt-4">
                        <button class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection