@extends('layout.app')

@section('content')
    <div class="container py-4">
        <h4>Liste des admins</h4>
        <div class="card ">
            <div class="card-header text-right">
                <a href="{{ route('admin.create') }}" class="btn btn-primary">
                    Ajouter
                </a>
            </div>
            <div class="card-body">
                @if ($admins->isNotEmpty())
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $admin)
                                    <tr>
                                        <td>{{ $admin->id }}</td>
                                        <td>{{ $admin->nom }}</td>
                                        <td>{{ $admin->prenom }}</td>
                                        <td>{{ $admin->email }}</td>
                                        <td>
                                            @if ($admin->getRoleNames()->isNotEmpty())
                                                {{ $admin->getRoleNames()->first() }}
                                            @endif
                                        </td>
                                        <td class="d-flex">
                                            <form action="{{ route('admin.destroy', $admin->id) }}" method="POST">
                                                @csrf
                                                <button class="btn btn-danger">supprimer</button>
                                            </form>
                                            <a class="btn btn-warning ms-2" href="{{ route('admin.edit', $admin->id) }}">Modifier</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <h4 class="text-center">Aucun admin trouvé</h4>
                @endif
            </div>
        </div>

    </div>
@endsection