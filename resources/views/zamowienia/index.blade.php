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
                <tr>
                    <th scope="col">ID</th>
                    @can('Administrator')
                        <th scope="col">Akcje</th>
                    @endcan
                </tr>
                </thead>
                <tbody>
                @foreach($zamowienia as $zamowienie)
                    <tr>
                        @can('Administrator')
                            <th scope="row">{{  $zamowienie->id }}</th>
                        @endcan
                        <td>{{  $zamowienie->id }}</td>

                    </tr>
                @endforeach
                </tbody>
            </div>
        </table>
@endsection
