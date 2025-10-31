@extends('layouts.app')

@section('title', 'Add Graphics Project')

@section('content')
<div class="form-container">
   <!-- Cancel button top-right -->
    <a href="{{ url('graphics') }}" 
       style="position: absolute; top: 40px; right: 40px; background: #f2ecedff; color: black; padding: 8px 18px; border-radius: 8px; text-decoration: none;">
       Cancel
    </a>
    <h2 class="mb-4">Add Graphics Project</h2>
    <form action="{{ route('graphics.store') }}" method="POST">
        @csrf
        <div class="form-grid">
            <!-- Row 1 -->
            <div class="form-group">
                <label for="category">Graphics Category</label>
                <select name="category" id="category" class="form-control">
                    <option value="">Select...</option>
                    <option value="logo">Logo</option>
                    <option value="other">Other Graphics</option>
                    <option value="catalog">Company Profile / Catalog</option>
                </select>
            </div>

            <div class="form-group">
                <label for="sr_no">Sr. No.</label>
                <input type="text" name="sr_no" id="sr_no" placeholder="Enter Sr. No">
            </div>

            <div class="form-group">
                <label for="project">Project</label>
                <input type="text" name="project" id="project" placeholder="Enter Project">
            </div>

            <!-- Row 2 -->
            <div class="form-group">
                <label for="campaign">Campaign</label>
                <input type="text" name="campaign" id="campaign" placeholder="Enter Campaign">
            </div>

            <div class="form-group">
                <label for="project_name">Project Name</label>
                <input type="text" name="project_name" id="project_name" placeholder="Enter Project Name">
            </div>

            <div class="form-group">
                <label for="domain_name">Domain Name</label>
                <input type="text" name="domain_name" id="domain_name" placeholder="Enter Domain Name">
            </div>

            <!-- Row 3 -->
            <div class="form-group">
                <label for="client_name">Client Name</label>
                <input type="text" name="client_name" id="client_name" placeholder="Enter Client Name">
            </div>

            <div class="form-group">
                <label for="client_number">Client Number</label>
                <input type="text" name="client_number" id="client_number" placeholder="Enter Client Number">
            </div>

            <div class="form-group">
                <label for="bdm">BDM</label>
                <input type="text" name="bdm" id="bdm" placeholder="Enter BDM Name">
            </div>

            <!-- Row 4 -->
            <div class="form-group">
                <label for="assigned_person">Assigned Person</label>
                <input type="text" name="assigned_person" id="assigned_person" placeholder="Enter Name">
            </div>

            <div class="form-group">
                <label for="tl">TL</label>
                <input type="text" name="tl" id="tl" placeholder="Enter Team Lead Name">
            </div>

            <div class="form-group">
                <label for="project_month">Project Month</label>
                <input type="month" name="project_month" id="project_month">
            </div>

            <!-- Row 5 -->
            <div class="form-group">
    <label for="project_starting_date">Project Starting Date</label>
    <input type="date" name="project_starting_date" id="project_starting_date">
</div>

<div class="form-group">
    <label for="project_closing_date">Project Closing Date</label>
    <input type="date" name="project_closing_date" id="project_closing_date">
</div>


            <div class="form-group">
                <label for="remark">Remark</label>
                <textarea name="remark" id="remark" rows="1" placeholder="Add Remark"></textarea>
            </div>

            <!-- Row 6 -->
            <div class="form-group">
                <label for="client_charges">Client Charges</label>
                <input type="text" name="client_charges" id="client_charges" placeholder="Enter Amount">
            </div>

            <div class="form-group">
                <label for="initial_payment">Initial Payment</label>
                <input type="text" name="initial_payment" id="initial_payment" placeholder="Enter Amount">
            </div>

            <div class="form-group">
                <label for="second_payment">2nd Payment</label>
                <input type="text" name="second_payment" id="second_payment" placeholder="Enter Amount">
            </div>

            <!-- Row 7 -->
            <div class="form-group">
                <label for="remaining_payment">Remaining Payment</label>
                <input type="text" name="remaining_payment" id="remaining_payment" placeholder="Enter Amount">
            </div>

            <div class="form-group">
             <label for="project_status">Project Status</label>
              <select name="project_status" id="project_status" class="form-control">
               <option value="">Select...</option>
               <option value="active">Active</option>
               <option value="completed">Completed</option>
               <option value="on-hold">On Hold</option>
               <option value="cancelled">Cancelled</option>
              </select>
            </div>


            <div class="form-group">
                <label for="client_no">Client No</label>
                <input type="text" name="client_no" id="client_no" placeholder="Enter Client No">
            </div>

            <!-- Row 8 -->
            <div class="form-group">
                <label for="mail_id">Mail ID</label>
                <input type="email" name="mail_id" id="mail_id" placeholder="Enter Email">
            </div>

           <div class="form-group">
    <label for="amc">AMC</label>
    <input type="number" name="amc" id="amc" min="0" step="1" />
</div>


            <div></div> <!-- empty column to keep grid structure -->
        </div>

        <form action="{{ route('graphics.store') }}" method="POST">
    @csrf
    <!-- all your fields -->
    <button type="back" class="save-btn">Back</button>
    <button type="submit" class="save-btn">Submit</button>
</form>


    </form>
</div>
@endsection
