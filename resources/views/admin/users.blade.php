@extends('layouts.app')
@section('title', '- User management')
@section('content')
<div class="container">

    <table class="table table-light table-bordered">
        <thead class="thead-dark" style="border-color: #dee2e6;!important">
            <tr>
                <th scope="col">Naam</th>
                <th scope="col">E-mail</th>
                <th scope="col">Type</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td scope="row">{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->type }}</td>
                    <td><a href="{{ route('deleteUser', [ "user" => $user->name]) }}"><i class="fas fa-trash-alt"></i></a></td>
            @endforeach
            </tr>

        </tbody>
    </table>
</div>
@endsection