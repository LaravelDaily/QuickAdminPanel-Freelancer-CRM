<?php

namespace App\Http\Requests;

use App\Note;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateNoteRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('note_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'project_id' => [
                'required',
                'integer',
            ],
            'note_text'  => [
                'required',
            ],
        ];
    }
}
