@extends('layouts.app')

@section('title', 'View Graphics Project')

@section('content')
<div class="form-container">
    <!-- Back button top-right -->
    <a href="{{ url('graphics') }}" 
       style="position: absolute; top: 40px; right: 40px; background: #f2ecedff; color: black; padding: 8px 18px; border-radius: 8px; text-decoration: none;">
       Back
    </a>

    <h2 class="mb-4">View Graphics Project</h2>

    <div class="form-grid">
        <div class="form-group">
            <label>Graphics Category</label>
            <input type="text" value="{{ $project->category }}" readonly>
        </div>

        <div class="form-group">
            <label>Sr. No.</label>
            <input type="text" value="{{ $project->sr_no }}" readonly>
        </div>

        <div class="form-group">
            <label>Project</label>
            <input type="text" value="{{ $project->project }}" readonly>
        </div>

        <div class="form-group">
            <label>Campaign</label>
            <input type="text" value="{{ $project->campaign }}" readonly>
        </div>

        <div class="form-group">
            <label>Project Name</label>
            <input type="text" value="{{ $project->project_name }}" readonly>
        </div>

        <div class="form-group">
            <label>Domain Name</label>
            <input type="text" value="{{ $project->domain_name }}" readonly>
        </div>

        <div class="form-group">
            <label>Client Name</label>
            <input type="text" value="{{ $project->client_name }}" readonly>
        </div>

        <div class="form-group">
            <label>Client Number</label>
            <input type="text" value="{{ $project->client_number }}" readonly>
        </div>

        <div class="form-group">
            <label>BDM</label>
            <input type="text" value="{{ $project->bdm }}" readonly>
        </div>

        <div class="form-group">
            <label>Assigned Person</label>
            <input type="text" value="{{ $project->assigned_person }}" readonly>
        </div>

        <div class="form-group">
            <label>TL</label>
            <input type="text" value="{{ $project->tl }}" readonly>
        </div>

        <div class="form-group">
            <label>Project Month</label>
            <input type="text" value="{{ $project->project_month }}" readonly>
        </div>

        <div class="form-group">
            <label>Project Starting Date</label>
            <input type="date" value="{{ $project->project_starting_date }}" readonly>
        </div>

        <div class="form-group">
            <label>Project Closing Date</label>
            <input type="date" value="{{ $project->project_closing_date }}" readonly>
        </div>

        <div class="form-group">
            <label>Remark</label>
            <textarea rows="1" readonly>{{ $project->remark }}</textarea>
        </div>

        <div class="form-group">
            <label>Client Charges</label>
            <input type="text" value="{{ $project->client_charges }}" readonly>
        </div>

        <div class="form-group">
            <label>Initial Payment</label>
            <input type="text" value="{{ $project->initial_payment }}" readonly>
        </div>

        <div class="form-group">
            <label>2nd Payment</label>
            <input type="text" value="{{ $project->second_payment }}" readonly>
        </div>

        <div class="form-group">
            <label>Remaining Payment</label>
            <input type="text" value="{{ $project->remaining_payment }}" readonly>
        </div>

        <div class="form-group">
            <label>Project Status</label>
            <input type="text" value="{{ $project->project_status }}" readonly>
        </div>

        <div class="form-group">
            <label>Client No</label>
            <input type="text" value="{{ $project->client_no }}" readonly>
        </div>

        <div class="form-group">
            <label>Mail ID</label>
            <input type="email" value="{{ $project->mail_id }}" readonly>
        </div>

        <div class="form-group">
            <label>AMC</label>
            <input type="number" value="{{ $project->amc }}" readonly>
        </div>

        <div class="form-group">
            <label>Renewal Date</label>
            <input type="date" value="{{ $project->renewal_date }}" readonly>
        </div>

        <div></div> <!-- empty column to keep grid structure -->
    </div>

    <!-- Edit & Delete buttons -->
    <div style="margin-top: 25px; display: flex; gap: 15px;">
        <a href="{{ route('graphics.edit', $project->id) }}" 
           class="btn btn-primary" 
           style="padding: 10px 25px; border-radius: 8px; background: #f7f9fbfb; color: black; text-decoration: none;">
           Edit
        </a>

        <form action="{{ route('graphics.destroy', $project->id) }}" method="POST" 
              onsubmit="return confirm('Are you sure you want to delete this project?');">
            @csrf
            @method('DELETE')
            <button type="submit" 
                    class="btn btn-danger" 
                    style="padding: 10px 25px; border-radius: 8px; background: #f9eaebff; color: black; border: none;">
                Delete
            </button>
        </form>
    </div>
</div>
@endsection
