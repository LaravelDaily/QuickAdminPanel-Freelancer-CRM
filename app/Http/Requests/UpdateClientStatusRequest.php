<?php

namespace App\Http\Requests;

use App\ClientStatus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateClientStatusRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('client_status_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
