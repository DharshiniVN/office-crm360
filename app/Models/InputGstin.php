<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InputGstin extends Model
{
    use HasFactory;

    protected $fillable = [
        'sr_no',
        'invoice_no',
        'invoice_date',
        'invoice_month',
        'company',
        'gst_no',
        'invoice_amount',
        'gst_amount',
        'cgst',
        'sgst',
        'remark',
    ];
}
