<?php

namespace App\Http\Controllers;
use App\Http\Requests\AdresRequest;
use App\Http\Requests\UsersRequest;
use App\Models\adres;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;



class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('users.index',[
            'users' => User::all()
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UsersRequest  $request
     * @return RedirectResponse
     */
    public function store(UsersRequest $request): RedirectResponse
    {
        $user = new User($request->validated());
        $user->save();
        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  User  $user
     * @return View
     */
    public function show($id): View
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @param  Request  $request
     * @return View
     */
    public function edit(User $user):View
    {
        return view('users.edit',[
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UsersRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UsersRequest $request, User $user)
    {
        $user->fill($request->validated());
        $user->save();
        return redirect(route('users.index'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @param  Request  $request
     * @return View
     */
    public function adresedit(User $user):View
    {
        return view('users.adresedit',[
            'user' => $user
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  AdresRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function adresupdate(AdresRequest $request, User $user)
    {
        $adresValidated = $request->validated()['adres'];
        if ($user->hasAddress()) {
            $adres = $user->adres;
            $adres->fill($adresValidated);
        } else {
            $adres = new adres($adresValidated);
        }
        $user->adres()->save($adres);
        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   $flight = User::find($id);
        $flight->delete();
        return response()->json([
            'status' => 'success'
        ]);
    }
}
