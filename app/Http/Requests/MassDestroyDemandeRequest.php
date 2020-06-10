<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MassDestroyDemandeRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(\Gate::denies('demande_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:demandes,id',
        ];
    }
}
