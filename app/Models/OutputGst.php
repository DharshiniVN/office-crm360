<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutputGst extends Model
{
    use HasFactory;

    protected $fillable = [
        'sl_no',
        'invoice_no',
        'invoice_date',
        'invoice_month',
        'cust_name',
        'company',
        'comp',
        'invoice_amount',
        'gst_amount',
        'tds_deduction',
        'payment_status',
        'gst_no',
    ];
}
