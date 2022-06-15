<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProduktRequest;
use App\Models\Produkt;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;


class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('welcome', [
            'produkts' => Produkt::all()
        ]);
    }
}

