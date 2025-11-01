@extends('layouts.app')

@section('title', 'Add Product Details')

@section('content')
<div class="topbar">
    <div class="h1">Add Product Details</div>
    <div class="actions">
        <a class="btn" href="{{ route('products.index') }}">Cancel</a>
    </div>
</div>

<form action="{{ route('products.store') }}" method="POST" class="form panel">
    @csrf

    <div class="form-group">
        <label for="category">Product Category</label>
        <select name="category" id="category" required>
            <option value="">Select...</option>
            <option value="school-management-software">School Management Software</option>
            <option value="billing-software">Billing Software</option>
            <option value="whatsapp-meta-api">WhatsApp Meta API</option>
            <option value="digital-visiting-card">Digital Visiting Card</option>
            <option value="brand-bizz">Brand Bizz</option>
            <option value="cloud-india-hub">Cloud India Hub</option>
        </select>
    </div>

    <div class="form-group">
        <label for="closer_year">Closer Year</label>
        <input type="number" name="closer_year" id="closer_year" placeholder="YYYY" />
    </div>

    <div class="form-group">
        <label for="closer_date">Closer Date</label>
        <input type="date" name="closer_date" id="closer_date" />
    </div>

    <div class="form-group">
        <label for="client_name">Client Name</label>
        <input type="text" name="client_name" id="client_name" required />
    </div>

    <div class="form-group">
        <label for="client_mobile">Client Mobile</label>
        <input type="text" name="client_mobile" id="client_mobile" />
    </div>

    <div class="form-group">
    <label for="client_gmail">Client Gmail ID</label>
    <input type="email" name="client_gmail" id="client_gmail" class="form-control" placeholder="Enter Gmail ID" required>
</div>


    <div class="form-group">
        <label for="project_name">Project Name</label>
        <input type="text" name="project_name" id="project_name" />
    </div>

    <div class="form-group">
        <label for="domain_name">Domain Name</label>
        <input type="text" name="domain_name" id="domain_name" />
    </div>

    <div class="form-group">
        <label for="domain_booking_place">Domain Booking Place</label>
        <select name="domain_booking_place" id="domain_booking_place">
            <option value="">Select...</option>
            <option value="GoDaddy">GoDaddy</option>
            <option value="Namecheap">Namecheap</option>
            <option value="Other">Other</option>
        </select>
    </div>

    <div class="form-group">
        <label for="domain_booking_date">Domain Booking Date</label>
        <input type="date" name="domain_booking_date" id="domain_booking_date" />
    </div>

    <div class="form-group">
        <label for="domain_booking_year">Domain Booking Year</label>
        <input type="number" name="domain_booking_year" id="domain_booking_year" />
    </div>

    <div class="form-group">
        <label for="professional_email">Professional/Gsuite Email ID</label>
        <input type="email" name="professional_email" id="professional_email" />
    </div>

    <div class="form-group">
        <label for="no_of_email">No. of Email ID</label>
        <input type="number" name="no_of_email" id="no_of_email_id" />
    </div>

    <div class="form-group">
        <label for="alt_email">Alt. Email ID</label>
        <input type="email" name="alt_email" id="alt_email" />
    </div>

    <div class="form-group">
        <label for="server">Server</label>
        <select name="server" id="server">
            <option value="">Select...</option>
            <option value="AWS">AWS</option>
            <option value="GoDaddy">GoDaddy</option>
            <option value="Other">Other</option>
        </select>
    </div>

    <div class="form-group">
        <label for="client_location">Client Location</label>
        <input type="text" name="client_location" id="client_location" />
    </div>

    <div class="form-group">
        <label for="state">State</label>
        <input type="text" name="state" id="state" />
    </div>

    <div class="form-group">
        <label for="country">Country</label>
        <input type="text" name="country" id="country" />
    </div>

    <div class="form-group">
        <label for="client_dob">Client DOB</label>
        <input type="date" name="client_dob" id="client_dob" />
    </div>

    <div class="form-group">
        <label for="campaign">Campaign</label>
        <input type="text" name="campaign" id="campaign" />
    </div>

    <div class="form-group">
        <label for="bdm">BDM</label>
        <input type="text" name="bdm" id="bdm" />
    </div>

    <div class="form-group">
        <label for="frontend_developer">Frontend Developer</label>
        <input type="text" name="frontend_developer" id="frontend_developer" />
    </div>

    <div class="form-group">
        <label for="backend_developer">Backend Developer</label>
        <input type="text" name="backend_developer" id="backend_developer" />
    </div>

    <div class="form-group">
        <label for="project_start_date">Project Start Date</label>
        <input type="date" name="project_start_date" id="project_start_date" />
    </div>

    <div class="form-group">
        <label for="project_deadline">Project Deadline</label>
        <input type="date" name="project_deadline" id="project_deadline" />
    </div>

    <div class="form-group">
        <label for="demo_date">Demo Date</label>
        <input type="date" name="demo_date" id="demo_date" />
    </div>

    <div class="form-group">
        <label for="project_closer_date">Project Closer Date</label>
        <input type="date" name="project_closer_date" id="project_closer_date" />
    </div>

    <div class="form-group">
        <label for="final_status">Final Status</label>
        <select name="final_status" id="final_status">
            <option value="">Select...</option>
            <option value="Completed">Completed</option>
            <option value="Ongoing">Ongoing</option>
            <option value="Cancelled">Cancelled</option>
        </select>
    </div>

    <div class="form-group">
        <label for="project_cost">Project Cost</label>
        <input type="number" name="project_cost" id="project_cost" />
    </div>

    <div class="form-group">
        <label for="with_gst">With GST</label>
        <input type="number" name="with_gst" id="with_gst" />
    </div>

    <div class="form-group">
        <label for="server_cost">Server Cost</label>
        <input type="number" name="server_cost" id="server_cost" />
    </div>

    <div class="form-group">
        <label for="email_cost">Email Cost</label>
        <input type="number" name="email_cost" id="email_cost" />
    </div>

    <div class="form-group">
        <label for="initial_payment">Initial Payment</label>
        <input type="number" name="initial_payment" id="initial_payment" />
    </div>

    <div class="form-group">
        <label for="second_payment">2nd Payment</label>
        <input type="number" name="second_payment" id="second_payment" />
    </div>

    <div class="form-group">
        <label for="remaining_payment">Rem. Payment</label>
        <input type="number" name="remaining_payment" id="remaining_payment" />
    </div>

    <div class="form-group">
        <label for="pending_payment">Pending Payment</label>
        <input type="number" name="pending_payment" id="pending_payment" />
    </div>

    <div class="form-group">
        <label for="remark">Remark</label>
        <textarea name="remark" id="remark"></textarea>
    </div>

    <div class="form-group">
        <label for="project_status">Project Status</label>
        <select name="project_status" id="project_status">
            <option value="">Select...</option>
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
        </select>
    </div>

    <div class="form-group">
        <label for="amc">AMC</label>
        <select name="amc" id="amc">
            <option value="">Select...</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>
    </div>

    <div class="form-group">
        <label for="renewal_status">Renewal Status</label>
        <select name="renewal_status" id="renewal_status">
            <option value="">Select...</option>
            <option value="Pending">Pending</option>
            <option value="Completed">Completed</option>
        </select>
    </div>

    <div class="form-group">
        <label for="renewal_month">Renewal Month</label>
        <input type="text" name="renewal_month" id="renewal_month" />
    </div>

    <div class="form-group">
        <label for="renewal_date">Renewal Date</label>
        <input type="date" name="renewal_date" id="renewal_date" />
    </div>

    <div class="form-group">
        <label for="renewal_items">Renewal Items</label>
        <input type="text" name="renewal_items" id="renewal_items" />
    </div>

    <div class="form-group">
        <label for="renewal_amount">Renewal Amount</label>
        <input type="number" name="renewal_amount" id="renewal_amount" />
    </div>

    <div class="form-group">
        <label for="renewal_remark">Renewal Remark</label>
        <textarea name="renewal_remark" id="renewal_remark"></textarea>
    </div>

    <div class="actions" style="margin-top:20px;">
        <a href="{{ route('products.index') }}" class="btn link">◀ Back</a>
        <button type="submit" class="btn primary">Submit</button>
    </div>
</form>
@endsection
