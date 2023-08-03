@extends('layout.app')

@section('content')
    <div class="container py-4">
        <h1>list des roles</h1>
    
        <div class="card">
            <div class="card-header">
                <a class="btn btn-primary" href="{{ route('role.create') }}">Ajouter un role</a>
            </div>
            <div class="card-body">
                @if ($roles->isNotEmpty())
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>permissions</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            @if ($role->permissions->isNotEmpty())
                                                @foreach ($role->permissions as $permission)
                                                    {{ $permission->name }},
                                                @endforeach
                                            @endif
                                        </td>
                                        <td class="d-flex">
                                            <a class="btn btn-info mr-2" href="{{ route('role.edit', $role->id) }}">Modifier</a>
                                            <form action="{{ route('role.destroy', $role->id) }}" method="POST">
                                                @csrf
                                                <button class="btn btn-danger mr-2">supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <h4 class="text-center h3 my-5">aucun role trouvé</h4>
                @endif
            </div>
        </div>

    </div>
@endsection