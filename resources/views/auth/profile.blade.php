@extends('layout.app')

@section('content')
    <div class="container py-5">
        @include('includes.errorAlert')
        @include('includes.successAlert')

        @if(count($errors)>0)
            @foreach($errors->all() as $error)
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{$error}}
                </div>
            @endforeach
        @endif
        
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Modifier mot de passe</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('profile.update.password') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label>Ancient mot de passe</label>
                                    <input class="form-control" type="password" name="old_password">
                                </div>

                                <div class="col-md-12 form-group">
                                    <label>Nouveau mot de passe</label>
                                    <input class="form-control" type="password" name="password">
                                </div>

                                <div class="col-md-12 form-group">
                                    <label>Confirmer mot de passe</label>
                                    <input class="form-control" type="password" name="password_confirmation">
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-primary">Modifier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Modifier informations</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('profile.update.infos') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Nom</label>
                                    <input class="form-control" type="text" name="nom" placeholder="{{ Auth::user()->nom }}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>prenom</label>
                                    <input class="form-control" type="text" name="prenom" placeholder="{{ Auth::user()->prenom }}">
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>email</label>
                                    <input class="form-control" type="email" name="email" placeholder="{{ Auth::user()->email }}">
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-primary">Modifier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection