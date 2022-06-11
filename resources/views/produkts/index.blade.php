@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <div class="row">
                <div class="col-6">
                    <h1>Produkty</h1>
                </div>
                <div class="col-6">


                </div>
            </div>
            <div class="row">
            <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nazwa</th>
                <th scope="col">Opis</th>
                <th scope="col">Ilość</th>
                <th scope="col">Cena</th>
                @can('Administrator')
                <th scope="col">Akcje</th>
                @endcan
            </tr>
            </thead>
            <tbody>
            @foreach($produkts as $produkt)
                <tr>
                    <th scope="row">{{  $produkt->id }}</th>
                    <td>{{  $produkt->name }}</td>
                    <td>{{  $produkt->description }}</td>
                    <td>{{  $produkt->amount }}</td>
                    <td>{{  $produkt->price }}</td>

                    <td>
                        @can('Administrator')
                    <a href="{{ route('produkts.edit', $produkt->id) }}">
                        <button class="btn btn-secondary">Edytuj</button>
                    </a>
                        <button class="btn btn-danger btn-sm remove" data-id="{{ $produkt->id }}">X</button>
                    </td>
                    <a class="float-right" href="{{ route('produkts.create') }}">
                        <button type="button" class="btn btn-secondary">Dodaj</button>
                    </a>
                    @endcan
                </tr>
            @endforeach
            </tbody>
    </div>

        </div>
    </table>
@endsection
@section('javascript')
    $(function(){
    $('.remove').click(function(e) {
    $.ajax({
    method: "DELETE",
    url: `/produkts/${e.target.getAttribute('data-id')}`,
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
