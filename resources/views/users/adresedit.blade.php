@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edytuj usera "{{$user->email}}"</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('adresupdate.update', $user->id) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="miasto" class="col-md-4 col-form-label text-md-right">Miasto</label>

                            <div class="col-md-6">
                                <input id="miasto" type="text" maxlength="255" class="form-control @error('miasto') is-invalid @enderror" name="adres[miasto]" value="@if($user->hasAddress()){{ $user->adres->miasto }}@endif" required autocomplete="miasto" autofocus>

                                @error('miasto')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kod_pocztowy" class="col-md-4 col-form-label text-md-right">Kod pocztowy</label>

                            <div class="col-md-6">
                                <input id="kod_pocztowy" type="text" maxlength="6" class="form-control @error('kod_pocztowy') is-invalid @enderror" name="adres[kod_pocztowy]" value="@if($user->hasAddress()){{ $user->adres->kod_pocztowy }}@endif" required autocomplete="kod_pocztowy" autofocus>

                                @error('kod_pocztowy')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ulica" class="col-md-4 col-form-label text-md-right">Ulica</label>

                            <div class="col-md-6">
                                <input id="ulica" type="text" maxlength="255" class="form-control @error('ulica') is-invalid @enderror" name="adres[ulica]" value="@if($user->hasAddress()){{ $user->adres->ulica }}@endif" required autocomplete="ulica" autofocus>

                                @error('ulica')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="numer_ulicy" class="col-md-4 col-form-label text-md-right">Numer ulicy</label>

                            <div class="col-md-6">
                                <input id="numer_ulicy" type="text" maxlength="5" class="form-control @error('numer_ulicy') is-invalid @enderror" name="adres[numer_ulicy]" value="@if($user->hasAddress()){{ $user->adres->numer_ulicy }}@endif" required autocomplete="numer_ulicy" autofocus>

                                @error('numer_ulicy')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="numer_domu" class="col-md-4 col-form-label text-md-right">Numer domu</label>

                            <div class="col-md-6">
                                <input id="numer_domu" type="text" maxlength="5" class="form-control @error('numer_domu') is-invalid @enderror" name="adres[numer_domu]" value="@if($user->hasAddress()){{ $user->adres->numer_domu }}@endif" required autocomplete="numer_domu" autofocus>

                                @error('numer_domu')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0 float-right">
                            <div class="col-md-6">
                                <button class="btn btn-secondary">Edytuj adres uzytkownika</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
