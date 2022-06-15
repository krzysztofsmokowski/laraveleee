@extends('layouts.app')
<link href="{{ asset('css/cart.css') }}" rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@section('content')
    <div class="container">
        <div class="card">
            <div class="row">
                <div class="col-md-8 cart">
                    <div class="title">
                        <div class="row">
                            <div class="col"><h4><b>Shopping Cart</b></h4></div>
                            <div class="col align-self-center text-right text-muted"></div>
                        </div>
                    </div>
                    @foreach($cart->getItems() as $item)
                    <div class="row border-top border-bottom">
                        <div class="row main align-items-center">
                            <div class="col-2"><img class="img-fluid" src="https://i.imgur.com/1GrakTl.jpg"></div>
                            <div class="col">
                                <div class="row text-muted">{{ $item->getName() }}</div>
                                <div class="row">{{ $item->getName() }}</div>
                            </div>
                            <div class="col">
                                <a href="#">-</a><a href="#" class="border">1</a><a href="#">+</a>
                            </div>
                            <div class="col">&euro; 44.00 <span class="close">&#10005;</span></div>
                        </div>
                    </div>
                    <div class="row">

                    </div>
                    <div class="row border-top border-bottom">

                    </div>
                    @endforeach
                    <div class="back-to-shop"><a href="{{ route('produkts.index') }}">&leftarrow;</a><span class="text-muted">Back to shop</span></div>
                </div>
                <div class="col-md-4 summary">
                    <div><h5><b>Summary</b></h5></div>
                    <hr>
                    <div class="row">
                        <div class="col" style="padding-left:0;">ITEMS 3</div>
                        <div class="col text-right">&euro; 132.00</div>
                    </div>
                    <form>
                        <p>SHIPPING</p>
                        <select><option class="text-muted">Standard-Delivery- &euro;5.00</option></select>
                        <p>GIVE CODE</p>
                        <input id="code" placeholder="Enter your code">
                    </form>
                    <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                        <div class="col">TOTAL PRICE</div>
                        <div class="col text-right">&euro; {{ $cart->getTotalSum() }}</div>
                    </div>
                    <button class="btn">CHECKOUT</button>
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