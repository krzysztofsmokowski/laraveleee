<?php

namespace App\Http\Controllers;

use App\Models\Produkt;
use App\ValueObjects\Cart;
use App\ValueObjects\CartItem;
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

        $cart = Session::get('cart',new Cart());
        Session::put('cart', $cart->addItem($produkt));
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
        //dd(Session::get('cart', new Cart()));
        return view
            ('cart.index',[
            'cart'=>Session::get('cart', new Cart())
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produkt  $produkt
     * @return JsonResponse
     */
    public function destroy(Produkt $produkt): JsonResponse
    {
        try {
            $cart = Session::get('cart',new Cart());
            Session::put('cart', $cart->removeItem($produkt));
            return  response()->json([
                'status' => 'success'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status'=>'error',
                'message'=>'ERROR POPSUTE ERROR POPSUTE'
            ])->setStatusCode(500);
        }
    }
}
