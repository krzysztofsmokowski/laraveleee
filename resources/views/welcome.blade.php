@extends('layouts.app')

@section('content')

                            <div class="btn-group float-md-right ml-3">
                                <button type="button" class="btn btn-lg btn-light"> <span class="fa fa-arrow-left"></span> </button>
                                <button type="button" class="btn btn-lg btn-light"> <span class="fa fa-arrow-right"></span> </button>
                            </div>
                            <div class="dropdown float-right">
                                <label class="mr-2">View:</label>
                                <a class="btn btn-lg btn-light dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">9 <span class="caret"></span></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" x-placement="bottom-end" style="will-change: transform; position: absolute; transform: translate3d(120px, 48px, 0px); top: 0px; left: 0px;">
                                    <a class="dropdown-item" href="#">12</a>
                                    <a class="dropdown-item" href="#">24</a>
                                    <a class="dropdown-item" href="#">48</a>
                                    <a class="dropdown-item" href="#">96</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($produkts as $produkt)
                            <div class="col-6 col-md-6 col-lg-4 mb-3">
                                <div class="card h-100 border-0">
                                    <div class="card-img-top">
                                        @if(!is_null($produkt->image_path))
                                            <img src="{{asset('/storage' . $produkt->image_path)}}" class="img-fluid mx-auto d-block" alt="Product image">
                                        @else
                                            <img src="https://via.placeholder.com/240x240/5fa9f8/efefef" class="img-fluid mx-auto d-block" alt="Product image">
                                        @endif
                                    </div>
                                    <div class="card-body text-center">
                                        <h4 class="card-title">
                                            <a href="product.html" class=" font-weight-bold text-dark text-uppercase small">{{$produkt->name}}</a>
                                        </h4>
                                        <h5 class="card-price small">
                                            <i>PLN {{$produkt->price}}</i>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                <a href="#" class="btn btn-lg btn-block btn-primary mt-5">Update Results</a>
            </div>

        </div>
    </div>
@endsection
