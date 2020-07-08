@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Mon profil</div>
                    <div class="card-body">
                        <form action="{{ route('users.edit', Auth::id()) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="InputName">Name</label>
                                <input type="text" class="form-control" id="InputName" name="name" value="{{ $user->name }}" />
                            </div>
                            <div class="form-group">
                                <label for="InputEmail">Email address</label>
                                <input type="email" class="form-control" id="InputEmail" name="email" value="{{ $user->email }}" />
                            </div>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </form>
                    </br>
                        <a class="btn btn-primary" href="{{ route('users.show', Auth::id()) }}"> {{ __('Retour au profil') }} </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
