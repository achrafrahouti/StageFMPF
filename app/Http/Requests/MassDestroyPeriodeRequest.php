<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MassDestroyPeriodeRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(\Gate::denies('periode_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:periodes,id',
        ];
    }
}
