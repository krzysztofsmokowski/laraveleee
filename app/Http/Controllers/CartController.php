<?php

namespace App\Http\Controllers;

use App\Models\Produkt;
use Illuminate\Http\JsonResponse;
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
        Session::put('cart', []);
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
        return view('home');
    }
}
