@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Utilisateurs</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                            <form action="{{ route('users.edit', $user->id) }}" method="post">
                             @csrf
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                    @if($user->role_id == 1)
                                <td>Admin</td>
                                <td hidden="hidden"><input type="number" value="2" name="role_id" /></td>
                                <td><input type="submit" class="btn btn-primary" value="User" /></td>
                                    @else
                                <td>User</td>
                                <td hidden="hidden"><input type="number" value="1" name="role_id" /></td>
                                <td><input type="submit" class="btn btn-primary" value="Admin" /></td>
                                @endif
                            </form>
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
