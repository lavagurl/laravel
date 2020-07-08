@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Vous discutez avec {{ $user->name }}</div>
                    <div class="card-body">
                        @foreach($messages as $message)
                            @if($message->from_id == $user->id || $message->to_id == $infos->id )
                                <div class="alert alert-info">
                                    <b>{{ $user->name }} :</b></br>
                                    {{ $message->content }}
                                </div>
                            @else
                            <div class="alert alert-secondary text-right">
                                <b>{{ $infos->name }} :</b></br>
                                {{ $message->content }}
                            </div>
                            @endif
                        @endforeach
                    <form action="{{ route('messages.create', $user->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <textarea type="text" class="form-control" placeholder="Entrez votre message ici" id="InputContent" name="content"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </form>
                    </br>
                    <a class="btn btn-primary" href="{{ route('messages.index') }}"> {{ __('Retour aux discussions') }} </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
