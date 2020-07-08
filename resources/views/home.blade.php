@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                @if(Auth::user()->role_id == 1)
                    <div class="row card-body">
                        <div class="col-md-6">
                            Utilisateur : {{ $users }}
                        </div>
                        <div class="col-md-6">
                            Donneurs : {{ $donors }}
                        </div>
                    </div>
                @endif
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
