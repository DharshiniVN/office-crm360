<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'pi',
        'transport_mode',
        'invoice_date',
        'vehicle_number',
        'reverse_charge',
        'state',
        'state_code',
        'place_of_supply',

        'bill_to_name',
        'bill_to_address',
        'bill_to_gstin',
        'bill_to_state',
        'bill_to_code',

        'ship_to_name',
        'ship_to_address',
        'ship_to_gstin',
        'ship_to_state',
        'ship_to_code',

        'beneficiary_name',
        'bank_account',
        'bank_ifsc',
        'pan_number',

        'total_before_tax',
        'igst_percent',
        'total_tax_amount',
        'round_off',
        'total_after_tax',
        'gst_reverse_charge',

        'invoice_status',
    ];
}
