<?php

namespace App\Http\Requests;

use App\IncomeSource;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateIncomeSourceRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('income_source_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
        ];
    }
}
