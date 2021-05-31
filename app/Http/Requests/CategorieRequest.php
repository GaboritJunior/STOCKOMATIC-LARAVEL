<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategorieRequest extends FormRequest
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
            'referenceCategorie' => 'bail|required|min:1|max:25|string',
            'libelleCategorie' => 'bail|required|min:1|max:100|string',
            'typeVente' => 'bail|required|min:1|max:100|string',
            'typeCond' => 'bail|required|min:1|max:100|string',
        ];
    }
}
