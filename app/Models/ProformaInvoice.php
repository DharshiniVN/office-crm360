<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProformaInvoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'pi_number', 'transport_mode', 'invoice_date', 'vehicle_number', 'reverse_charge',
        'state', 'state_code', 'place_of_supply',
        'bill_name', 'bill_address', 'bill_gstin', 'bill_state', 'bill_code',
        'ship_name', 'ship_address', 'ship_gstin', 'ship_state', 'ship_code',
        'beneficiary_name', 'bank_account', 'ifsc', 'pan',
        'total_before_tax', 'igst_percent', 'total_tax_amount', 'round_off',
        'total_after_tax', 'gst_reverse_charge', 'proforma_status'
    ];
}
