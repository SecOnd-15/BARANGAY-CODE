<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_no',
        'customer_name',
        'contact_number',
        'event_date',
        'event_time',
        'event_type',
        'venue',
        'guest_count',
        'status',
        'special_requests'
    ];

    protected $casts = [
        'event_date' => 'date',
    ];
}