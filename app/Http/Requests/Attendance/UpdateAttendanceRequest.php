<?php

namespace App\Http\Requests\Attendance;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAttendanceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'status'     => ['sometimes', 'required', Rule::in(['present', 'absent', 'excused'])],
            'arrived_at' => ['sometimes', 'nullable', 'date'],
            'left_at'    => ['sometimes', 'nullable', 'date', 'after_or_equal:arrived_at'],
        ];
    }

    public function attributes(): array
    {
        return [
            'status'     => __('validation.attributes.status'),
            'arrived_at' => __('validation.attributes.arrived_at'),
            'left_at'    => __('validation.attributes.left_at'),
        ];
    }
}