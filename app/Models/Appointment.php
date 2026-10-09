<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_name',
        'patient_phone',
        'appointment_date',
        'reason',
        'status',
    ];

    protected $casts = [
        'appointment_date' => 'datetime',
    ];
}