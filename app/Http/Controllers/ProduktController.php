<?php

namespace App\Http\Controllers;

use App\Models\Produkt;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ProduktController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('produkts.index',[
            'produkts' => Produkt::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('produkts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $produkt = new Produkt($request->all());
        $produkt->save();
        return redirect(route('produkts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Produkt  $produkt
     * @return View
     */
    public function show(Produkt $produkt): View
    {
        return view('produkts')
    ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Produkt  $produkt
     * @return View
     */
    public function edit(Produkt $produkt):View
    {
        return view('produkts.edit',[
            'produkt' => $produkt
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produkt  $produkt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produkt $produkt)
    {
        $produkt->fill($request->all());
        $produkt->save();
        return redirect(route('produkts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produkt  $produkt
     * @return Response
     */
    public function destroy(Produkt $produkt)
    {
        try {
            $produkt->delete();
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
