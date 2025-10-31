@extends('layouts.app')

@section('title', 'View Product Details')

@section('content')
<div class="topbar">
    <div class="h1">View Product Details</div>
    <div class="actions">
        <a class="btn" href="{{ route('products.index') }}">Back</a>
    </div>
</div>

<form class="form panel">
    @csrf

    <div class="form-group">
        <label for="category">Product Category</label>
        <input type="text" class="form-control" value="{{ $product->category }}" readonly>
    </div>

    <div class="form-group">
        <label for="closer_year">Closer Year</label>
        <input type="number" class="form-control" value="{{ $product->closer_year }}" readonly>
    </div>

    <div class="form-group">
        <label for="closer_date">Closer Date</label>
        <input type="date" class="form-control" value="{{ $product->closer_date }}" readonly>
    </div>

    <div class="form-group">
        <label for="client_name">Client Name</label>
        <input type="text" class="form-control" value="{{ $product->client_name }}" readonly>
    </div>

    <div class="form-group">
        <label for="client_mobile">Client Mobile</label>
        <input type="text" class="form-control" value="{{ $product->client_mobile }}" readonly>
    </div>

    <div class="form-group">
        <label for="client_email">Client Gmail ID</label>
        <input type="email" class="form-control" value="{{ $product->client_gmail }}" readonly>
    </div>

    <div class="form-group">
        <label for="project_name">Project Name</label>
        <input type="text" class="form-control" value="{{ $product->project_name }}" readonly>
    </div>

    <div class="form-group">
        <label for="domain_name">Domain Name</label>
        <input type="text" class="form-control" value="{{ $product->domain_name }}" readonly>
    </div>

    <div class="form-group">
        <label for="domain_booking_place">Domain Booking Place</label>
        <input type="text" class="form-control" value="{{ $product->domain_booking_place }}" readonly>
    </div>

    <div class="form-group">
        <label for="domain_booking_date">Domain Booking Date</label>
        <input type="date" class="form-control" value="{{ $product->domain_booking_date }}" readonly>
    </div>

    <div class="form-group">
        <label for="domain_booking_year">Domain Booking Year</label>
        <input type="number" class="form-control" value="{{ $product->domain_booking_year }}" readonly>
    </div>

    <div class="form-group">
        <label for="professional_email">Professional/Gsuite Email ID</label>
        <input type="email" class="form-control" value="{{ $product->professional_email }}" readonly>
    </div>

    <div class="form-group">
        <label for="no_of_email">No. of Email ID</label>
        <input type="number" class="form-control" value="{{ $product->no_of_email_id }}" readonly>
    </div>

    <div class="form-group">
        <label for="alt_email">Alt. Email ID</label>
        <input type="email" class="form-control" value="{{ $product->alt_email }}" readonly>
    </div>

    <div class="form-group">
        <label for="server">Server</label>
        <input type="text" class="form-control" value="{{ $product->server }}" readonly>
    </div>

    <div class="form-group">
        <label for="client_location">Client Location</label>
        <input type="text" class="form-control" value="{{ $product->client_location }}" readonly>
    </div>

    <div class="form-group">
        <label for="state">State</label>
        <input type="text" class="form-control" value="{{ $product->state }}" readonly>
    </div>

    <div class="form-group">
        <label for="country">Country</label>
        <input type="text" class="form-control" value="{{ $product->country }}" readonly>
    </div>

    <div class="form-group">
        <label for="client_dob">Client DOB</label>
        <input type="date" class="form-control" value="{{ $product->client_dob }}" readonly>
    </div>

    <div class="form-group">
        <label for="campaign">Campaign</label>
        <input type="text" class="form-control" value="{{ $product->campaign }}" readonly>
    </div>

    <div class="form-group">
        <label for="bdm">BDM</label>
        <input type="text" class="form-control" value="{{ $product->bdm }}" readonly>
    </div>

    <div class="form-group">
        <label for="frontend_developer">Frontend Developer</label>
        <input type="text" class="form-control" value="{{ $product->frontend_dev }}" readonly>
    </div>

    <div class="form-group">
        <label for="backend_developer">Backend Developer</label>
        <input type="text" class="form-control" value="{{ $product->backend_dev }}" readonly>
    </div>

    <div class="form-group">
        <label for="project_start_date">Project Start Date</label>
        <input type="date" class="form-control" value="{{ $product->project_start_date }}" readonly>
    </div>

    <div class="form-group">
        <label for="project_deadline">Project Deadline</label>
        <input type="date" class="form-control" value="{{ $product->project_deadline }}" readonly>
    </div>

    <div class="form-group">
        <label for="demo_date">Demo Date</label>
        <input type="date" class="form-control" value="{{ $product->demo_date }}" readonly>
    </div>

    <div class="form-group">
        <label for="project_closer_date">Project Closer Date</label>
        <input type="date" class="form-control" value="{{ $product->project_closer_date }}" readonly>
    </div>

    <div class="form-group">
        <label for="final_status">Final Status</label>
        <input type="text" class="form-control" value="{{ $product->final_status }}" readonly>
    </div>

    <div class="form-group">
        <label for="project_cost">Project Cost</label>
        <input type="number" class="form-control" value="{{ $product->project_cost }}" readonly>
    </div>

    <div class="form-group">
        <label for="with_gst">With GST</label>
        <input type="number" class="form-control" value="{{ $product->with_gst }}" readonly>
    </div>

    <div class="form-group">
        <label for="server_cost">Server Cost</label>
        <input type="number" class="form-control" value="{{ $product->server_cost }}" readonly>
    </div>

    <div class="form-group">
        <label for="email_cost">Email Cost</label>
        <input type="number" class="form-control" value="{{ $product->email_cost }}" readonly>
    </div>

    <div class="form-group">
        <label for="initial_payment">Initial Payment</label>
        <input type="number" class="form-control" value="{{ $product->initial_payment }}" readonly>
    </div>

    <div class="form-group">
        <label for="second_payment">2nd Payment</label>
        <input type="number" class="form-control" value="{{ $product->second_payment }}" readonly>
    </div>

    <div class="form-group">
        <label for="remaining_payment">Rem. Payment</label>
        <input type="number" class="form-control" value="{{ $product->remaining_payment }}" readonly>
    </div>

    <div class="form-group">
        <label for="pending_payment">Pending Payment</label>
        <input type="number" class="form-control" value="{{ $product->pending_payment }}" readonly>
    </div>

    <div class="form-group">
        <label for="remark">Remark</label>
        <textarea class="form-control" readonly>{{ $product->remark }}</textarea>
    </div>

    <div class="form-group">
        <label for="project_status">Project Status</label>
        <input type="text" class="form-control" value="{{ $product->project_status }}" readonly>
    </div>

    <div class="form-group">
        <label for="amc">AMC</label>
        <input type="text" class="form-control" value="{{ $product->amc }}" readonly>
    </div>

    <div class="form-group">
        <label for="renewal_status">Renewal Status</label>
        <input type="text" class="form-control" value="{{ $product->renewal_status }}" readonly>
    </div>

    <div class="form-group">
        <label for="renewal_month">Renewal Month</label>
        <input type="text" class="form-control" value="{{ $product->renewal_month }}" readonly>
    </div>

    <div class="form-group">
        <label for="renewal_date">Renewal Date</label>
        <input type="date" class="form-control" value="{{ $product->renewal_date }}" readonly>
    </div>

    <div class="form-group">
        <label for="renewal_items">Renewal Items</label>
        <input type="text" class="form-control" value="{{ $product->renewal_items }}" readonly>
    </div>

    <div class="form-group">
        <label for="renewal_amount">Renewal Amount</label>
        <input type="number" class="form-control" value="{{ $product->renewal_amount }}" readonly>
    </div>

    <div class="form-group">
        <label for="renewal_remark">Renewal Remark</label>
        <textarea class="form-control" readonly>{{ $product->renewal_remark }}</textarea>
    </div>

</form>
<div class="actions d-flex gap-2" style="margin-top: 20px; justify-content: flex-start;">
    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>

    <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</div>

@endsection
