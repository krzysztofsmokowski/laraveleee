<?php

namespace App\Http\Controllers;

use App\DTOs\Cart\CartDTO;
use App\DTOs\Cart\CartItemDTO;
use App\Models\Produkt;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class CartController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  Produkt  $produkt
     * @return JsonResponse
     */
    public function store(Produkt $produkt): JsonResponse
    {

        $cart = Session::get('cart',new CartDTO());
        $items = $cart->getItems();
        if (Arr::exists($items, $produkt->id)){
            $items[$produkt->id]->IncrementAmount();
        } else{
            $CartItemDTO = new CartItemDTO();
            $CartItemDTO->setProduktID($produkt->id);
            $CartItemDTO->setName($produkt->name);
            $CartItemDTO->setPrice($produkt->price);
            $CartItemDTO->setAmount(1);
            $CartItemDTO->setImagePath($produkt->image_path);
            $items[$produkt->id] = $CartItemDTO;
        }
        $cart->setItems($items);
        $cart->IncrementTotalAmount();
        $cart->IncrementTotalSum($produkt->price);
        Session::put('cart', $cart);
        return response()->json([
            'status' =>'success']);
    }
    /**
     * Show the application dashboard.
     *
     * @return View
     */
    public function index(): View
    {
        #dd(Session::get('cart', new CartDTO()));
        return view
            ('cart.index',[
            'cart'=>Session::get('cart', new CartDTO())
        ]);
    }
}
