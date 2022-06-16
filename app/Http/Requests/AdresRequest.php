<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdresRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'adres.miasto' => 'required|max:500',
            'adres.ulica' =>'required|max:500',
            'adres.numer_ulicy'=>'required|max:5',
            'adres.numer_domu'=>'required|max:5',
            'adres.kod_pocztowy'=>'max:6',
        ];
    }
}
