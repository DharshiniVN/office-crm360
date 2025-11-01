@extends('layouts.app')

@section('content')
<div style="background-color: #ffffff; min-height: 100vh; padding: 40px;">

    <div style="max-width: 900px; margin-left: auto; background: #f9fbfd; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); padding: 25px;">
        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px;">
            <div>
                <h2 style="margin: 0;">🧾 Invoice System</h2>
                <p style="color: gray; margin: 5px 0 0;">Create and manage client invoices</p>
            </div>
            <a href="{{ url()->previous() }}" style="text-decoration: none; color: #007bff; font-weight: bold;">← Back</a>
        </div>

        <form action="{{ route('invoice.store') }}" method="POST">
            @csrf

            <!-- New Invoice Details -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 30px;">
                <div>
                    <label>PI</label>
                    <input type="text" name="pi" placeholder="Enter PI Number" class="form-control">
                </div>
                <div>
                    <label>Transport Mode</label>
                    <input type="text" name="transport_mode" placeholder="e.g., Road, Rail" class="form-control">
                </div>
                <div>
                    <label>Invoice Date</label>
                    <input type="date" name="invoice_date" class="form-control">
                </div>
                <div>
                    <label>Vehicle Number</label>
                    <input type="text" name="vehicle_number" placeholder="e.g., MH12AB1234" class="form-control">
                </div>
                <div>
                    <label>Reverse Charge (Y/N)</label>
                    <select name="reverse_charge" class="form-control">
                        <option value="N">No</option>
                        <option value="Y">Yes</option>
                    </select>
                </div>
                <div>
                    <label>State</label>
                    <input type="text" name="state" placeholder="Enter State" class="form-control">
                </div>
                <div>
                    <label>Code</label>
                    <input type="text" name="code" placeholder="Enter Code" class="form-control">
                </div>
                <div>
                    <label>Place of Supply</label>
                    <input type="text" name="place_of_supply" placeholder="Enter Place of Supply" class="form-control">
                </div>
            </div>

            <!-- Bill To Party -->
            <h4>Bill to Party</h4>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 30px;">
                <div>
                    <label>Name</label>
                    <input type="text" name="bill_name" placeholder="Enter Name" class="form-control">
                </div>
                <div>
                    <label>Address</label>
                    <input type="text" name="bill_address" placeholder="Enter Address" class="form-control">
                </div>
                <div>
                    <label>GSTIN</label>
                    <input type="text" name="bill_gstin" placeholder="Enter GSTIN" class="form-control">
                </div>
                <div>
                    <label>State</label>
                    <input type="text" name="bill_state" placeholder="Enter State" class="form-control">
                </div>
                <div>
                    <label>Code</label>
                    <input type="text" name="bill_code" placeholder="Enter Code" class="form-control">
                </div>
            </div>

            <!-- Ship To Party -->
            <h4>Ship to Party</h4>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 30px;">
                <div>
                    <label>Name</label>
                    <input type="text" name="ship_name" placeholder="Enter Name" class="form-control">
                </div>
                <div>
                    <label>Address</label>
                    <input type="text" name="ship_address" placeholder="Enter Address" class="form-control">
                </div>
                <div>
                    <label>GSTIN</label>
                    <input type="text" name="ship_gstin" placeholder="Enter GSTIN" class="form-control">
                </div>
                <div>
                    <label>State</label>
                    <input type="text" name="ship_state" placeholder="Enter State" class="form-control">
                </div>
                <div>
                    <label>Code</label>
                    <input type="text" name="ship_code" placeholder="Enter Code" class="form-control">
                </div>
            </div>

            <!-- Bank Details -->
            <h4>Bank Details</h4>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 30px;">
                <div>
                    <label>Beneficiary Name</label>
                    <input type="text" name="bank_beneficiary" placeholder="Enter Beneficiary Name" class="form-control">
                </div>
                <div>
                    <label>Bank Current A/C</label>
                    <input type="text" name="bank_account" placeholder="Enter Account Number" class="form-control">
                </div>
                <div>
                    <label>Bank IFSC</label>
                    <input type="text" name="bank_ifsc" placeholder="Enter IFSC Code" class="form-control">
                </div>
                <div>
                    <label>PAN Card Number</label>
                    <input type="text" name="pan_number" placeholder="Enter PAN Number" class="form-control">
                </div>
            </div>

            <!-- Tax Details -->
            <h4>Tax Details</h4>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 30px;">
                <div>
                    <label>Total Amount before Tax</label>
                    <input type="number" name="total_before_tax" placeholder="Enter Amount" class="form-control">
                </div>
                <div>
                    <label>Add: IGST (%)</label>
                    <input type="number" name="igst" placeholder="Enter IGST Percentage" class="form-control">
                </div>
                <div>
                    <label>Total Tax Amount</label>
                    <input type="number" name="total_tax" placeholder="Enter Total Tax Amount" class="form-control">
                </div>
                <div>
                    <label>Round Off</label>
                    <input type="number" name="round_off" placeholder="Enter Round Off Value" class="form-control">
                </div>
                <div>
                    <label>Total Amount after Tax</label>
                    <input type="number" name="total_after_tax" placeholder="Enter Amount" class="form-control">
                </div>
                <div>
                    <label>GST on Reverse Charge</label>
                    <input type="number" name="reverse_gst" placeholder="Enter GST Amount" class="form-control">
                </div>
            </div>

            <!-- Additional Info -->
            <h4>Additional Info</h4>
            <div style="margin-bottom: 30px;">
                <label>Invoice Status</label>
                <select name="status" class="form-control">
                    <option value="Draft">Draft</option>
                    <option value="Final">Final</option>
                </select>
            </div>

            <div style="text-align: right;">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Cancel</button>
            </div>
        </form>
    </div>
</div>
@endsection
