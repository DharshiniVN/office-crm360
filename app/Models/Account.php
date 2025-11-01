<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
   protected $fillable = [
    'client_name',
    'contact',
    'gmail',
    //'gmail1',
    'gmail2',
    'category',
    'renewal_amount',
    'renewal_date',
    'company_id',
    'created_by',
    'updated_by',
    'websiteUrl',
    'appUrl',
    'domainname',
    'domainBookingDate',
    'domainPlace',
    'server',
    'mailId',
    'gsuite',
    'location',
    'gpage',
    'projectCost',
    'finalCost',
    'advPayment',
    'advDate',
    'pay2Date',
    'txn2',
    'txn3',
    'extra',
    'birthday',
    'anniversary'
];


}
