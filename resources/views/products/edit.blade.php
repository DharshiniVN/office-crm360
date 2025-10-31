@extends('layouts.app')

@section('title', 'Edit Product Details')

@section('content')
<div class="topbar">
    <div class="h1">Edit Product Details</div>
</div>

<form class="form panel" action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="category">Product Category</label>
        <input type="text" class="form-control" name="category" value="{{ $product->category }}">
    </div>

    <div class="form-group">
        <label for="closer_year">Closer Year</label>
        <input type="number" class="form-control" name="closer_year" value="{{ $product->closer_year }}">
    </div>

    <div class="form-group">
        <label for="closer_date">Closer Date</label>
        <input type="date" class="form-control" name="closer_date" value="{{ $product->closer_date }}">
    </div>

    <div class="form-group">
        <label for="client_name">Client Name</label>
        <input type="text" class="form-control" name="client_name" value="{{ $product->client_name }}">
    </div>

    <div class="form-group">
        <label for="client_mobile">Client Mobile</label>
        <input type="text" class="form-control" name="client_mobile" value="{{ $product->client_mobile }}">
    </div>

    <div class="form-group">
        <label for="client_email">Client Gmail ID</label>
        <input type="email" class="form-control" name="client_email" value="{{ $product->client_email }}">
    </div>

    <div class="form-group">
        <label for="project_name">Project Name</label>
        <input type="text" class="form-control" name="project_name" value="{{ $product->project_name }}">
    </div>

    <div class="form-group">
        <label for="domain_name">Domain Name</label>
        <input type="text" class="form-control" name="domain_name" value="{{ $product->domain_name }}">
    </div>

    <div class="form-group">
        <label for="domain_booking_place">Domain Booking Place</label>
        <input type="text" class="form-control" name="domain_booking_place" value="{{ $product->domain_booking_place }}">
    </div>

    <div class="form-group">
        <label for="domain_booking_date">Domain Booking Date</label>
        <input type="date" class="form-control" name="domain_booking_date" value="{{ $product->domain_booking_date }}">
    </div>

    <div class="form-group">
        <label for="domain_booking_year">Domain Booking Year</label>
        <input type="number" class="form-control" name="domain_booking_year" value="{{ $product->domain_booking_year }}">
    </div>

    <div class="form-group">
        <label for="professional_email">Professional/Gsuite Email ID</label>
        <input type="email" class="form-control" name="professional_email" value="{{ $product->professional_email }}">
    </div>

    <div class="form-group">
        <label for="no_of_email">No. of Email ID</label>
        <input type="number" class="form-control" name="no_of_email_id" value="{{ $product->no_of_email_id }}">
    </div>

    <div class="form-group">
        <label for="alt_email">Alt. Email ID</label>
        <input type="email" class="form-control" name="alt_email" value="{{ $product->alt_email }}">
    </div>

    <div class="form-group">
        <label for="server">Server</label>
        <input type="text" class="form-control" name="server" value="{{ $product->server }}">
    </div>

    <div class="form-group">
        <label for="client_location">Client Location</label>
        <input type="text" class="form-control" name="client_location" value="{{ $product->client_location }}">
    </div>

    <div class="form-group">
        <label for="state">State</label>
        <input type="text" class="form-control" name="state" value="{{ $product->state }}">
    </div>

    <div class="form-group">
        <label for="country">Country</label>
        <input type="text" class="form-control" name="country" value="{{ $product->country }}">
    </div>

    <div class="form-group">
        <label for="client_dob">Client DOB</label>
        <input type="date" class="form-control" name="client_dob" value="{{ $product->client_dob }}">
    </div>

    <div class="form-group">
        <label for="campaign">Campaign</label>
        <input type="text" class="form-control" name="campaign" value="{{ $product->campaign }}">
    </div>

    <div class="form-group">
        <label for="bdm">BDM</label>
        <input type="text" class="form-control" name="bdm" value="{{ $product->bdm }}">
    </div>

    <div class="form-group">
        <label for="frontend_dev">Frontend Developer</label>
        <input type="text" class="form-control" name="frontend_dev" value="{{ $product->frontend_dev }}">
    </div>

    <div class="form-group">
        <label for="backend_dev">Backend Developer</label>
        <input type="text" class="form-control" name="backend_dev" value="{{ $product->backend_dev }}">
    </div>

    <div class="form-group">
        <label for="project_start_date">Project Start Date</label>
        <input type="date" class="form-control" name="project_start_date" value="{{ $product->project_start_date }}">
    </div>

    <div class="form-group">
        <label for="project_deadline">Project Deadline</label>
        <input type="date" class="form-control" name="project_deadline" value="{{ $product->project_deadline }}">
    </div>

    <div class="form-group">
        <label for="demo_date">Demo Date</label>
        <input type="date" class="form-control" name="demo_date" value="{{ $product->demo_date }}">
    </div>

    <div class="form-group">
        <label for="project_closer_date">Project Closer Date</label>
        <input type="date" class="form-control" name="project_closer_date" value="{{ $product->project_closer_date }}">
    </div>

    <div class="form-group">
        <label for="final_status">Final Status</label>
        <input type="text" class="form-control" name="final_status" value="{{ $product->final_status }}">
    </div>

    <div class="form-group">
        <label for="project_cost">Project Cost</label>
        <input type="number" class="form-control" name="project_cost" value="{{ $product->project_cost }}">
    </div>

    <div class="form-group">
        <label for="with_gst">With GST</label>
        <input type="number" class="form-control" name="with_gst" value="{{ $product->with_gst }}">
    </div>

    <div class="form-group">
        <label for="server_cost">Server Cost</label>
        <input type="number" class="form-control" name="server_cost" value="{{ $product->server_cost }}">
    </div>

    <div class="form-group">
        <label for="email_cost">Email Cost</label>
        <input type="number" class="form-control" name="email_cost" value="{{ $product->email_cost }}">
    </div>

    <div class="form-group">
        <label for="initial_payment">Initial Payment</label>
        <input type="number" class="form-control" name="initial_payment" value="{{ $product->initial_payment }}">
    </div>

    <div class="form-group">
        <label for="second_payment">2nd Payment</label>
        <input type="number" class="form-control" name="second_payment" value="{{ $product->second_payment }}">
    </div>

    <div class="form-group">
        <label for="remaining_payment">Rem. Payment</label>
        <input type="number" class="form-control" name="remaining_payment" value="{{ $product->remaining_payment }}">
    </div>

    <div class="form-group">
        <label for="pending_payment">Pending Payment</label>
        <input type="number" class="form-control" name="pending_payment" value="{{ $product->pending_payment }}">
    </div>

    <div class="form-group">
        <label for="remark">Remark</label>
        <textarea class="form-control" name="remark">{{ $product->remark }}</textarea>
    </div>

    <div class="form-group">
        <label for="project_status">Project Status</label>
        <input type="text" class="form-control" name="project_status" value="{{ $product->project_status }}">
    </div>

    <div class="form-group">
        <label for="amc">AMC</label>
        <input type="text" class="form-control" name="amc" value="{{ $product->amc }}">
    </div>

    <div class="form-group">
        <label for="renewal_status">Renewal Status</label>
        <input type="text" class="form-control" name="renewal_status" value="{{ $product->renewal_status }}">
    </div>

    <div class="form-group">
        <label for="renewal_month">Renewal Month</label>
        <input type="text" class="form-control" name="renewal_month" value="{{ $product->renewal_month }}">
    </div>

    <div class="form-group">
        <label for="renewal_date">Renewal Date</label>
        <input type="date" class="form-control" name="renewal_date" value="{{ $product->renewal_date }}">
    </div>

    <div class="form-group">
        <label for="renewal_items">Renewal Items</label>
        <input type="text" class="form-control" name="renewal_items" value="{{ $product->renewal_items }}">
    </div>

    <div class="form-group">
        <label for="renewal_amount">Renewal Amount</label>
        <input type="number" class="form-control" name="renewal_amount" value="{{ $product->renewal_amount }}">
    </div>

    <div class="form-group">
        <label for="renewal_remark">Renewal Remark</label>
        <textarea class="form-control" name="renewal_remark">{{ $product->renewal_remark }}</textarea>
    </div>

    <div class="actions d-flex gap-2" style="margin-top: 20px; justify-content: flex-start;">
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>

</form>
@endsection
