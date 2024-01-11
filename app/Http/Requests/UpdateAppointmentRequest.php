<?php

namespace App\Http\Requests;

use App\Models\Appointment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAppointmentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('appointment_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'passport_number' => [
                'string',
                'nullable',
            ],
            'doctor' => [
                'required',
            ],
            'phone' => [
                'string',
                'required',
                'unique:appointments,phone,' . request()->route('appointment')->id,
            ],
            'email' => [
                'string',
                'required',
                'unique:appointments,email,' . request()->route('appointment')->id,
            ],
        ];
    }
}
