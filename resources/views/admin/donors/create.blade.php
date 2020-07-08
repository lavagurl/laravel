@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liste des donneurs</div>
                <div class="card-body">
                    <form action="{{ route('admin.donors.create', $_POST) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="InputEyesColor">Couleur des yeux</label>
                            <select class="form-control" id="InputEyesColor" name="eyes_color">
                                @foreach($eyes_color as $color)
                                    <option  value="{{ $color }}">{{ $color }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="InputBloodType">Groupe sanguin</label>
                            <select class="form-control" id="InputBloodType" name="blood_type">
                               @foreach($blood_type as $type)
                                <option  value="{{ $type }}">{{ $type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="InputCategory">Catégorie</label>
                            <select class="form-control" id="InputCategory" name="category">
                                @foreach($categories as $category)
                                    <option  value="{{ $category }}">{{ $category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </form>
                    </br>
                    <a class="btn btn-primary" href="{{ route('admin.donors.index') }}"> {{ __('Retour à la liste') }} </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
