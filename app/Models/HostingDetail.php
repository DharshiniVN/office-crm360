<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HostingDetail extends Model
{
    protected $fillable = [
        'product_category', 'closer_year', 'closer_date', 'client_name', 'client_mobile',
        'client_gmail', 'project_name', 'domain_name', 'domain_booking_year',
        'professional_email', 'email_count', 'alt_email', 'server', 'client_location',
        'state', 'country', 'client_dob', 'campaign', 'bdm', 'frontend_dev', 'backend_dev',
        'project_start_date', 'project_deadline', 'demo_date', 'project_closer_date',
        'final_status', 'project_cost', 'with_gst', 'server_cost', 'email_cost',
        'initial_payment', 'second_payment', 'remaining_payment', 'pending_payment',
        'remark', 'project_status', 'renewal_month', 'renewal_date', 'renewal_items',
        'renewal_amount', 'renewal_remark'
    ];
}