<?php

namespace App\Http\Requests\Session;

use Illuminate\Foundation\Http\FormRequest;

class StoreSessionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'session_date' => ['required', 'date'],
        ];
    }

    public function attributes(): array
    {
        return [
            'session_date' => __('validation.attributes.session_date'),
        ];
    }
}