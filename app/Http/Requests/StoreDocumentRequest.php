<?php

namespace App\Http\Requests;

use App\Document;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreDocumentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('document_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'project_id'    => [
                'required',
                'integer',
            ],
            'document_file' => [
                'required',
            ],
        ];
    }
}
