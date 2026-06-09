<?php

namespace App\Http\Requests\Attendance;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAttendanceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'records'                => ['required', 'array', 'min:1'],
            'records.*.student_id'   => ['required', 'uuid', 'exists:users,id'],
            'records.*.status'       => ['required', Rule::in(['present', 'absent', 'excused'])],
            'records.*.arrived_at'   => ['nullable', 'date'],
            'records.*.left_at'      => ['nullable', 'date', 'after_or_equal:records.*.arrived_at'],
        ];
    }

    public function attributes(): array
    {
        return [
            'records'              => __('validation.attributes.records'),
            'records.*.student_id' => __('validation.attributes.student_id'),
            'records.*.status'     => __('validation.attributes.status'),
            'records.*.arrived_at' => __('validation.attributes.arrived_at'),
            'records.*.left_at'    => __('validation.attributes.left_at'),
        ];
    }
}