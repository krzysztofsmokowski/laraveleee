@extends('layouts.app')

@section('content')
    <div class="container">

    <table class="table">

        <a class="float-right" href="{{ route('users.create') }}">
            <button type="button" class="btn btn-secondary">Dodaj</button>
        </a>
        <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">email</th>
            <th scope="col">imie</th>
            <th scope="col">akcje</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
            <th scope="row">{{  $user->id }}</th>
            <td>{{  $user->email }}</td>
            <td>{{  $user->name }}</td>
            <td><button class="btn btn-danger btn-sm remove" data-user-id="{{ $user->id }}">X</button>
                <a href="{{ route('users.edit', $user->id) }}">
                    <button class="btn btn-secondary">Edytuj uzytkownika</button>
                </a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </div>
    </table>
@endsection
@section('javascript')
$(function(){
    $('.remove').click(function(e) {
    $.ajax({
        method: "DELETE",
        url: `/users/${e.target.getAttribute('data-user-id')}`,
        })
        .done(function ( response ) {
            alert("Usunięto");
            })
        .fail(function ( response ) {
            alert("ERROR");
            });
        });
    });
@endsection
