<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDemandeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return \Gate::allows('demande_create');

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
            'id_stagaire' => [
                'required',
            ],
            'id_stage' => [
                'required',
            ],
            'type_dem' => [
                'required',
            ],
            'objet_dem' => [
                'required',
            ],
        ];
    }
}
