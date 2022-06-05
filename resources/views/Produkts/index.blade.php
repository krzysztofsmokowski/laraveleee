@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nazwa</th>
                <th scope="col">Opis</th>
                <th scope="col">Ilość</th>
                <th scope="col">Cena</th>
                <th scope="col">Akcje</th>
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
                    <td><button class="btn btn-danger btn-sm remove" data-user-id="{{ $product->id }}">X</button></td>
                </tr>
            @endforeach
            </tbody>
    </div>
    </table>
@endsection
