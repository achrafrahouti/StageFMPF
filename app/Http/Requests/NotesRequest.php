<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Gate::allows('add_note');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'notes'=>'bail|array',
            'notes.*'=>'bail|required|numeric|min:0|max:20',
            'presences'=>'bail|array',
            'presences.*'=>'bail|required|numeric|min:0|max:3',
            'motivations'=>'bail|array',
            'motivations.*'=>'bail|required|numeric|min:0|max:3',
            'Assiduites'=>'bail|array',
            'Assiduites.*'=>'bail|required|numeric|min:0|max:3',
            'integrations'=>'bail|array',
            'integrations.*'=>'bail|required|numeric|min:0|max:3',
            'connaissances'=>'bail|array',
            'connaissances.*'=>'bail|required|numeric|min:0|max:8',
        ];
    }
}
