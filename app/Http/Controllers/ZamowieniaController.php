<?php

namespace App\Http\Controllers;

use App\Models\zamowienia;
use Illuminate\Http\Request;
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

}
