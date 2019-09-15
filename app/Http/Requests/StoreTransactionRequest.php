<?php

namespace App\Http\Requests;

use App\Transaction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreTransactionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('transaction_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'project_id'          => [
                'required',
                'integer',
            ],
            'transaction_type_id' => [
                'required',
                'integer',
            ],
            'income_source_id'    => [
                'required',
                'integer',
            ],
            'amount'              => [
                'required',
            ],
            'currency_id'         => [
                'required',
                'integer',
            ],
            'transaction_date'    => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
