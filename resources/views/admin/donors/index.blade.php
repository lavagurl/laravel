@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liste des donneurs</div>
                <div class="card-body">
                    <a href="{{ route('admin.donors.showForm') }}" class="btn btn-primary">Ajouter un donneur</a></br>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Couleur des yeux</th>
                            <th scope="col">Groupe sanguin</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($donors as $donor)
                            <tr>
                                <td>{{ $donor->id }}</td>
                                <td>{{ $donor->eyes_color }}</td>
                                <td>{{ $donor->blood_type }}</td>
                                <td><a href="{{ route('admin.donors.destroy', $donor->id) }}"> {{ __('Supprimer') }} </a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
