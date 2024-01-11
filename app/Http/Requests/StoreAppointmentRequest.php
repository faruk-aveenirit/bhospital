<?php

namespace App\Http\Requests;

use App\Models\Appointment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAppointmentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
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
                'unique:appointments',
            ],
            'email' => [
                'string',
                'required',
                'unique:appointments',
            ],
        ];
    }
}
