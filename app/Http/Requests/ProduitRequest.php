<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProduitRequest extends FormRequest
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
            'reference' => 'bail|required|min:1|max:25|string',
            'libelleProduit' => 'bail|required|min:1|max:100|string',
            'prix' => 'bail|required|numeric',
            'description' => 'bail|required|min:1|max:300|string',
            'categorie_id'=>'required'
        ];
    }
}
