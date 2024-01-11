<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'appointments';

    public const STATUS_SELECT = [
        '1' => 'Active',
        '2' => 'Inactive',
    ];

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'passport_number',
        'doctor',
        'phone',
        'email',
        'status',
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const DOCTOR_SELECT = [
        '1' => 'Dr. Phonthakorn Panichkul ( Dept. of Orthopedic Surgery )',
        '2' => 'Dr. Yossavee Ukkayagorn ( Dept of Internal Medicine, Cardiology )',
        '3' => 'Dr. Satit Srimontayamas  ( Dept of Surgical Oncology )',
        '4' => 'Dr. Yingchi Wang ( Dept of Obstetrics and Gynecology )',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
