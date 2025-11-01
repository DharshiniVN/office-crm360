@extends('layouts.app')

@section('content')
<div style="background-color: #ffffff; min-height: 100vh; padding: 40px;">

    <div style="max-width: 900px; margin-left: auto; background: #f9fbfd; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); padding: 25px;">
        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px;">
            <div>
                <h2 style="margin: 0;">🧾 Edit Invoice</h2>
                <p style="color: gray; margin: 5px 0 0;">Update and manage client invoice details</p>
            </div>
            <a href="{{ route('invoice.index') }}" style="text-decoration: none; color: #007bff; font-weight: bold;">← Back</a>
        </div>

        <form action="{{ route('invoice.update', $invoice->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- New Invoice Details -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 30px;">
                <div>
                    <label>PI</label>
                    <input type="text" name="pi" value="{{ $invoice->pi }}" class="form-control">
                </div>
                <div>
                    <label>Transport Mode</label>
                    <input type="text" name="transport_mode" value="{{ $invoice->transport_mode }}" class="form-control">
                </div>
                <div>
                    <label>Invoice Date</label>
                    <input type="date" name="invoice_date" value="{{ $invoice->invoice_date }}" class="form-control">
                </div>
                <div>
                    <label>Vehicle Number</label>
                    <input type="text" name="vehicle_number" value="{{ $invoice->vehicle_number }}" class="form-control">
                </div>
                <div>
                    <label>Reverse Charge (Y/N)</label>
                    <select name="reverse_charge" class="form-control">
                        <option value="N" {{ $invoice->reverse_charge == 'N' ? 'selected' : '' }}>No</option>
                        <option value="Y" {{ $invoice->reverse_charge == 'Y' ? 'selected' : '' }}>Yes</option>
                    </select>
                </div>
                <div>
                    <label>State</label>
                    <input type="text" name="state" value="{{ $invoice->state }}" class="form-control">
                </div>
                <div>
                    <label>Code</label>
                    <input type="text" name="code" value="{{ $invoice->code }}" class="form-control">
                </div>
                <div>
                    <label>Place of Supply</label>
                    <input type="text" name="place_of_supply" value="{{ $invoice->place_of_supply }}" class="form-control">
                </div>
            </div>

            <!-- Bill To Party -->
            <h4>Bill to Party</h4>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 30px;">
                <div>
                    <label>Name</label>
                    <input type="text" name="bill_name" value="{{ $invoice->bill_name }}" class="form-control">
                </div>
                <div>
                    <label>Address</label>
                    <input type="text" name="bill_address" value="{{ $invoice->bill_address }}" class="form-control">
                </div>
                <div>
                    <label>GSTIN</label>
                    <input type="text" name="bill_gstin" value="{{ $invoice->bill_gstin }}" class="form-control">
                </div>
                <div>
                    <label>State</label>
                    <input type="text" name="bill_state" value="{{ $invoice->bill_state }}" class="form-control">
                </div>
                <div>
                    <label>Code</label>
                    <input type="text" name="bill_code" value="{{ $invoice->bill_code }}" class="form-control">
                </div>
            </div>

            <!-- Ship To Party -->
            <h4>Ship to Party</h4>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 30px;">
                <div>
                    <label>Name</label>
                    <input type="text" name="ship_name" value="{{ $invoice->ship_name }}" class="form-control">
                </div>
                <div>
                    <label>Address</label>
                    <input type="text" name="ship_address" value="{{ $invoice->ship_address }}" class="form-control">
                </div>
                <div>
                    <label>GSTIN</label>
                    <input type="text" name="ship_gstin" value="{{ $invoice->ship_gstin }}" class="form-control">
                </div>
                <div>
                    <label>State</label>
                    <input type="text" name="ship_state" value="{{ $invoice->ship_state }}" class="form-control">
                </div>
                <div>
                    <label>Code</label>
                    <input type="text" name="ship_code" value="{{ $invoice->ship_code }}" class="form-control">
                </div>
            </div>

            <!-- Bank Details -->
            <h4>Bank Details</h4>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 30px;">
                <div>
                    <label>Beneficiary Name</label>
                    <input type="text" name="bank_beneficiary" value="{{ $invoice->bank_beneficiary }}" class="form-control">
                </div>
                <div>
                    <label>Bank Current A/C</label>
                    <input type="text" name="bank_account" value="{{ $invoice->bank_account }}" class="form-control">
                </div>
                <div>
                    <label>Bank IFSC</label>
                    <input type="text" name="bank_ifsc" value="{{ $invoice->bank_ifsc }}" class="form-control">
                </div>
                <div>
                    <label>PAN Card Number</label>
                    <input type="text" name="pan_number" value="{{ $invoice->pan_number }}" class="form-control">
                </div>
            </div>

            <!-- Tax Details -->
            <h4>Tax Details</h4>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 30px;">
                <div>
                    <label>Total Amount before Tax</label>
                    <input type="number" name="total_before_tax" value="{{ $invoice->total_before_tax }}" class="form-control">
                </div>
                <div>
                    <label>Add: IGST (%)</label>
                    <input type="number" name="igst" value="{{ $invoice->igst }}" class="form-control">
                </div>
                <div>
                    <label>Total Tax Amount</label>
                    <input type="number" name="total_tax" value="{{ $invoice->total_tax }}" class="form-control">
                </div>
                <div>
                    <label>Round Off</label>
                    <input type="number" name="round_off" value="{{ $invoice->round_off }}" class="form-control">
                </div>
                <div>
                    <label>Total Amount after Tax</label>
                    <input type="number" name="total_after_tax" value="{{ $invoice->total_after_tax }}" class="form-control">
                </div>
                <div>
                    <label>GST on Reverse Charge</label>
                    <input type="number" name="reverse_gst" value="{{ $invoice->reverse_gst }}" class="form-control">
                </div>
            </div>

            <!-- Additional Info -->
            <h4>Additional Info</h4>
            <div style="margin-bottom: 30px;">
                <label>Invoice Status</label>
                <select name="status" class="form-control">
                    <option value="Draft" {{ $invoice->status == 'Draft' ? 'selected' : '' }}>Draft</option>
                    <option value="Final" {{ $invoice->status == 'Final' ? 'selected' : '' }}>Final</option>
                </select>
            </div>

            <div style="text-align: right;">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('invoice.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
