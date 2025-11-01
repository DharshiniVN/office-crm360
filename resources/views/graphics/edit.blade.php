@extends('layouts.app')

@section('title', 'Edit Graphics Project')

@section('content')
<div class="form-container">
    <!-- Back button -->
    <a href="{{ url('graphics') }}" 
       style="position: absolute; top: 40px; right: 40px; background: #f2ecedff; color: black; padding: 8px 18px; border-radius: 8px; text-decoration: none;">
       Back
    </a>

    <h2 class="mb-4">Edit Graphics Project</h2>

    <form action="{{ route('graphics.update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-grid">
            <!-- Row 1 -->
            <div class="form-group">
                <label for="category">Graphics Category</label>
                <select name="category" id="category" class="form-control">
                    <option value="">Select...</option>
                    <option value="logo" {{ $project->category == 'logo' ? 'selected' : '' }}>Logo</option>
                    <option value="other" {{ $project->category == 'other' ? 'selected' : '' }}>Other Graphics</option>
                    <option value="catalog" {{ $project->category == 'catalog' ? 'selected' : '' }}>Company Profile / Catalog</option>
                </select>
            </div>

            <div class="form-group">
                <label for="sr_no">Sr. No.</label>
                <input type="text" name="sr_no" id="sr_no" value="{{ $project->sr_no }}">
            </div>

            <div class="form-group">
                <label for="project">Project</label>
                <input type="text" name="project" id="project" value="{{ $project->project }}">
            </div>

            <!-- Row 2 -->
            <div class="form-group">
                <label for="campaign">Campaign</label>
                <input type="text" name="campaign" id="campaign" value="{{ $project->campaign }}">
            </div>

            <div class="form-group">
                <label for="project_name">Project Name</label>
                <input type="text" name="project_name" id="project_name" value="{{ $project->project_name }}">
            </div>

            <div class="form-group">
                <label for="domain_name">Domain Name</label>
                <input type="text" name="domain_name" id="domain_name" value="{{ $project->domain_name }}">
            </div>

            <!-- Row 3 -->
            <div class="form-group">
                <label for="client_name">Client Name</label>
                <input type="text" name="client_name" id="client_name" value="{{ $project->client_name }}">
            </div>

            <div class="form-group">
                <label for="client_number">Client Number</label>
                <input type="text" name="client_number" id="client_number" value="{{ $project->client_number }}">
            </div>

            <div class="form-group">
                <label for="bdm">BDM</label>
                <input type="text" name="bdm" id="bdm" value="{{ $project->bdm }}">
            </div>

            <!-- Row 4 -->
            <div class="form-group">
                <label for="assigned_person">Assigned Person</label>
                <input type="text" name="assigned_person" id="assigned_person" value="{{ $project->assigned_person }}">
            </div>

            <div class="form-group">
                <label for="tl">TL</label>
                <input type="text" name="tl" id="tl" value="{{ $project->tl }}">
            </div>

            <div class="form-group">
                <label for="project_month">Project Month</label>
                <input type="month" name="project_month" id="project_month" value="{{ $project->project_month }}">
            </div>

            <!-- Row 5 -->
            <div class="form-group">
                <label for="project_starting_date">Project Starting Date</label>
                <input type="date" name="project_starting_date" id="project_starting_date" value="{{ $project->project_starting_date }}">
            </div>

            <div class="form-group">
                <label for="project_closing_date">Project Closing Date</label>
                <input type="date" name="project_closing_date" id="project_closing_date" value="{{ $project->project_closing_date }}">
            </div>

            <div class="form-group">
                <label for="remark">Remark</label>
                <textarea name="remark" id="remark" rows="1">{{ $project->remark }}</textarea>
            </div>

            <!-- Row 6 -->
            <div class="form-group">
                <label for="client_charges">Client Charges</label>
                <input type="text" name="client_charges" id="client_charges" value="{{ $project->client_charges }}">
            </div>

            <div class="form-group">
                <label for="initial_payment">Initial Payment</label>
                <input type="text" name="initial_payment" id="initial_payment" value="{{ $project->initial_payment }}">
            </div>

            <div class="form-group">
                <label for="second_payment">2nd Payment</label>
                <input type="text" name="second_payment" id="second_payment" value="{{ $project->second_payment }}">
            </div>

            <!-- Row 7 -->
            <div class="form-group">
                <label for="remaining_payment">Remaining Payment</label>
                <input type="text" name="remaining_payment" id="remaining_payment" value="{{ $project->remaining_payment }}">
            </div>

            <div class="form-group">
                <label for="project_status">Project Status</label>
                <select name="project_status" id="project_status">
                    <option value="open" {{ $project->project_status=='open' ? 'selected' : '' }}>Open</option>
                    <option value="in-progress" {{ $project->project_status=='in-progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="completed" {{ $project->project_status=='completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>

            <div class="form-group">
                <label for="client_no">Client No</label>
                <input type="text" name="client_no" id="client_no" value="{{ $project->client_no }}">
            </div>

            <!-- Row 8 -->
            <div class="form-group">
                <label for="mail_id">Mail ID</label>
                <input type="email" name="mail_id" id="mail_id" value="{{ $project->mail_id }}">
            </div>

            <div class="form-group">
                <label for="amc">AMC</label>
                <input type="number" name="amc" id="amc" value="{{ $project->amc }}" min="0" step="1" />
            </div>

            <div></div> <!-- empty column to keep grid -->
        </div>

        <div style="margin-top: 25px; text-align: left; display: flex; gap: 15px;">
            <a href="{{ url('graphics') }}" class="btn btn-secondary" style="padding: 10px 25px; border-radius: 8px; background: #6c757d; color: white; text-decoration: none;">Back</a>
            <button type="submit" class="save-btn">Update</button>
        </div>

    </form>
</div>
@endsection
