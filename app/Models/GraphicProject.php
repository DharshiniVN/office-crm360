<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GraphicProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'sr_no',
        'project',
        'campaign',
        'project_name',
        'domain_name',
        'client_name',
        'client_number',
        'bdm',
        'assigned_person',
        'tl',
        'project_month',
        'project_starting_date',
        'project_closing_date',
        'remark',
        'client_charges',
        'initial_payment',
        'second_payment',
        'remaining_payment',
        'project_status',
        'client_no',
        'mail_id',
        'amc'
    ];
}
