<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renewal extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_name',
        'service_name',
        'start_date',
        'expiry_date',
        'amount',
        'status',
    ];
}
