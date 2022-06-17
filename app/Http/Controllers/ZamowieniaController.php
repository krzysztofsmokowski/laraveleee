<?php

namespace App\Http\Controllers;

use App\Models\zamowienia;
use App\ValueObjects\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class ZamowieniaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index():View
    {
        return view('zamowienia.index',[
            'zamowienia'=> zamowienia::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return View
     */
    public function store(): View
    {
        $cart=Session::get('cart',new Cart());
        $zamowienie = new zamowienia();
        $zamowienie->amount = $cart->getAmount();
        $zamowienie->price = $cart->getSum();
        $zamowienie->user_id = Auth::id();
        $zamowienie->save();
        Session::put('cart', new Cart());
        $produktIDs = $cart->getItems()->map(function ($item){
            return ['produkt_id' => $item->getProduktID()];
        });
        $zamowienie->produkts()->attach($produktIDs);
        return view('zamowienia.index',[
            'zamowienia'=> zamowienia::all()
        ]);
    }

}
