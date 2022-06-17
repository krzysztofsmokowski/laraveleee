@extends('layouts.app')
<link href="{{ asset('css/cart.css') }}" rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@section('content')
    <div class="container">
        <table class="table">
            <div class="row">
                <div class="col-6">
                    <h1>Zamowienia</h1>
                </div>
                <div class="col-6">
                </div>
            </div>
            <div class="row">
                <thead class="thead-dark">
                <th scope="row">ID</th>
                <th scope="row">Ilość</th>
                <th scope="row">Suma</th>
                <th scope="row">Nazwa produktów</th>
                </thead>
                <tbody>
                @foreach($zamowienia as $zamowienie)
                    <tr>
                        <th scope="row">{{  $zamowienie->id }}</th>
                        <th scope="row">{{  $zamowienie->amount }}</th>
                        <th scope="row">{{  $zamowienie->price }}</th>
                        <th scope="row">
                        @foreach($zamowienie->produkts as $produkt)

                            <ul>
                                <li>{{$produkt->name}} {{ $produkt->description }}</li>
                            </ul>

                        @endforeach
                        </th>
                    </tr>
                @endforeach
                </tbody>
            </div>
        </table>
@endsection
