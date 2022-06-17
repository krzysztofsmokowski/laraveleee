@extends('layouts.app')
<link href="{{ asset('css/cart.css') }}" rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@section('content')
    <div class="container">
        <div class="card">
            <form action="{{ route('zamowienia.store') }}"method="POST" id="zamowienia-form">
                @csrf
            <div class="row">
                <div class="col-md-8 cart">
                    <div class="title">
                        <div class="row">
                            <div class="col"><h4><b>Koszyk</b></h4></div>
                            <div class="col align-self-center text-right text-muted"></div>

                        </div>
                    </div>
                    @foreach($cart->getItems() as $item)
                    <div class="row border-top border-bottom">
                        <div class="row main align-items-center">
                            <div class="col-2"><img class="img-fluid" src="https://i.pinimg.com/474x/c8/49/a9/c849a9928605b70a7ad15e71f309b1a4.jpg"></div>
                            <div class="col-md-2">
                                <div class="cart_item_title">Ilość</div>
                                <div class="cart_item_text">{{ $item->getAmount() }}</div>
                            </div>
                            <div class="col-md-3">
                                <div class="cart_item_title">Nazwa</div>
                                <div class="cart_item_text">{{ $item->getName() }}</div>
                            </div>
                            <div class="col-md-2">
                                <div class="cart_item_title">Cena [PLN]</div>
                                <div class="cart_item_text">{{ $item->getPrice() }}</div>
                            </div>
                            <div class="col-md-2">
                                <div class="cart_item_title">Suma [PLN]</div>
                                <div class="cart_item_text">{{ $item->getSum() }}</div>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-danger btn-sm remove" data-id="{{ $item->getProduktID() }}">
                            </div>
                            <div class="col">PLN {{ $item->getPrice() }} <span class="close">x{{$item->getAmount()}}</span></div>
                        </div>
                    </div>
                    <div class="row">

                    </div>
                    <div class="row border-top border-bottom">

                    </div>
                    @endforeach
                    <div class="back-to-shop"><a href="{{ route('produkts.index') }}">Wróć do sklepu</a></div>
                </div>
                <div class="col-md-4 summary">
                    <div><h5><b>Podsumowanie</b></h5></div>
                    <hr>
                    <div class="row">
                        <div class="col" style="padding-left:0;"></div>
                        <div class="col text-right">PLN {{ $cart->getSum() }}</div>
                    </div>
                    <form>
                        <p>DOSTAWA</p>
                        <select><option class="text-muted">Dostawa Standardowa - PLN 5.00</option><option class="text-muted">Paczkomaty InPost - PLN 7.00</option></select>

                    </form>
                    <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                        <div class="col">SUMA</div>
                        <div class="col text-right">PLN {{ $cart->getSum() }}</div>
                    </div>
                    <button type="submit">Przejdź do zamówienia</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        @endsection
        @section('javascript')
            const Produkt_data = {
            do_koszyka: '{{ url('cart') }}'
            }
            $(function(){
            $('.remove').click(function(e) {
            $.ajax({
            method: "DELETE",
            url: `/cart/${e.target.getAttribute('data-id')}`,
            })
            .done(function ( response ) {
            alert("Usunięto");
            })
            .fail(function ( response ) {
            alert("ERROR");
            });
            });
            });
            $(function() {
            $('button.do-kosza').click(function(event) {
            event.preventDefault();
            $.ajax({
            method: "POST",
            url: Produkt_data.do_koszyka + '/' + $(this).data('id')
            })
            .done(function () {
            Swal.fire({
            title: 'Sukces!!!',
            text: 'Produkt jest w twoim koszyku',
            icon: 'success',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-cart-plus"></i> Przejdź do koszyka',
            cancelButtonText: '<i class="fas fa-shopping-bag"></i> Kontynuuj zakupy'
            }).then((result) => {
            if (result.isConfirmed) {
            alert('udalo sie');
            }
            })
            })
            .fail(function () {
            Swal.fire('Rip', 'błąd', 'error');
            });
            });})
        @endsection
        @section('js')
            <script src="{{ asset("js/kosz.js") }}"></script>
@endsection
