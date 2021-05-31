<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Magasin_produitRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'produit_id'=>'required',
            'magasin_id'=>'required',
            'limiteStockAlerte' => 'bail|required|numeric',
            'quantiteStock' => 'bail|required|numeric'
        ];
    }
}
