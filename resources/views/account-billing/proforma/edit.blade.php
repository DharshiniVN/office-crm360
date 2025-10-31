@extends('layouts.app')

@section('title', 'Edit Proforma Invoice')

@section('content')
<div class="panel" style="background:var(--accent-4); margin-bottom: 20px; padding: 15px;">
    <div style="display:flex;align-items:center;gap:16px">
        <div style="font-size:42px">📝</div>
        <div>
            <div style="font-weight:800;font-size:24px;">Proforma Invoice System</div>
            <div class="muted">Update and manage client proforma invoices (quotations)</div>
        </div>
    </div>
</div>

<div class="panel" style="background:#f0f4ff;padding:20px;border-radius:10px;">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:15px;">
        <h2 style="margin:0;">Edit Proforma Invoice</h2>
        <a href="{{ route('proforma.index') }}" 
           style="background:#007bff;color:#fff;padding:8px 16px;border-radius:5px;text-decoration:none;">
            ← Back
        </a>
    </div>

    <form action="{{ route('proforma.update', $proforma->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:16px;">
            <div>
                <label>PI No:</label>
                <input type="text" name="pi_number" class="form-control" value="{{ $proforma->pi_number }}" required>
            </div>
            <div>
                <label>Transport Mode:</label>
                <input type="text" name="transport_mode" class="form-control" value="{{ $proforma->transport_mode }}">
            </div>
            <div>
                <label>Invoice Date:</label>
                <input type="date" name="invoice_date" class="form-control" value="{{ $proforma->invoice_date }}">
            </div>
            <div>
                <label>Vehicle Number:</label>
                <input type="text" name="vehicle_number" class="form-control" value="{{ $proforma->vehicle_number }}">
            </div>
            <div>
                <label>Reverse Charge (Y/N):</label>
                <input type="text" name="reverse_charge" class="form-control" value="{{ $proforma->reverse_charge }}">
            </div>
            <div>
                <label>State:</label>
                <input type="text" name="state" class="form-control" value="{{ $proforma->state }}">
            </div>
            <div>
                <label>State Code:</label>
                <input type="text" name="state_code" class="form-control" value="{{ $proforma->state_code }}">
            </div>
            <div>
                <label>Place of Supply:</label>
                <input type="text" name="place_of_supply" class="form-control" value="{{ $proforma->place_of_supply }}">
            </div>
        </div>

        <hr>
        <h3>Bill to Party</h3>
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:16px;">
            <input type="text" name="bill_name" placeholder="Name" value="{{ $proforma->bill_name }}" class="form-control">
            <input type="text" name="bill_address" placeholder="Address" value="{{ $proforma->bill_address }}" class="form-control">
            <input type="text" name="bill_gstin" placeholder="GSTIN" value="{{ $proforma->bill_gstin }}" class="form-control">
            <input type="text" name="bill_state" placeholder="State" value="{{ $proforma->bill_state }}" class="form-control">
            <input type="text" name="bill_code" placeholder="Code" value="{{ $proforma->bill_code }}" class="form-control">
        </div>

        <hr>
        <h3>Ship to Party</h3>
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:16px;">
            <input type="text" name="ship_name" placeholder="Name" value="{{ $proforma->ship_name }}" class="form-control">
            <input type="text" name="ship_address" placeholder="Address" value="{{ $proforma->ship_address }}" class="form-control">
            <input type="text" name="ship_gstin" placeholder="GSTIN" value="{{ $proforma->ship_gstin }}" class="form-control">
            <input type="text" name="ship_state" placeholder="State" value="{{ $proforma->ship_state }}" class="form-control">
            <input type="text" name="ship_code" placeholder="Code" value="{{ $proforma->ship_code }}" class="form-control">
        </div>

        <hr>
        <h3>Bank Details</h3>
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:16px;">
            <input type="text" name="beneficiary_name" placeholder="Beneficiary Name" value="{{ $proforma->beneficiary_name }}" class="form-control">
            <input type="text" name="bank_account" placeholder="Bank Account" value="{{ $proforma->bank_account }}" class="form-control">
            <input type="text" name="ifsc" placeholder="IFSC" value="{{ $proforma->ifsc }}" class="form-control">
            <input type="text" name="pan" placeholder="PAN" value="{{ $proforma->pan }}" class="form-control">
        </div>

        <hr>
        <h3>Tax Details</h3>
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:16px;">
            <input type="number" step="0.01" name="total_before_tax" placeholder="Total Before Tax" value="{{ $proforma->total_before_tax }}" class="form-control">
            <input type="number" step="0.01" name="igst_percent" placeholder="IGST (%)" value="{{ $proforma->igst_percent }}" class="form-control">
            <input type="number" step="0.01" name="total_tax_amount" placeholder="Total Tax Amount" value="{{ $proforma->total_tax_amount }}" class="form-control">
            <input type="number" step="0.01" name="round_off" placeholder="Round Off" value="{{ $proforma->round_off }}" class="form-control">
            <input type="number" step="0.01" name="total_after_tax" placeholder="Total After Tax" value="{{ $proforma->total_after_tax }}" class="form-control">
            <input type="number" step="0.01" name="gst_reverse_charge" placeholder="GST on Reverse Charge" value="{{ $proforma->gst_reverse_charge }}" class="form-control">
        </div>

        <hr>
        <div>
            <label>Proforma Status:</label>
            <select name="proforma_status" class="form-control">
                <option value="Pending" {{ $proforma->proforma_status == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Approved" {{ $proforma->proforma_status == 'Approved' ? 'selected' : '' }}>Approved</option>
                <option value="Cancelled" {{ $proforma->proforma_status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>

        <div style="margin-top:20px;">
            <button type="submit" class="btn btn-primary" style="background:#007bff;color:#fff;padding:10px 20px;border:none;border-radius:6px;">
                💾 Save Changes
            </button>
            <a href="{{ route('proforma.index') }}" 
               style="margin-left:10px;padding:10px 20px;background:#ccc;border-radius:6px;text-decoration:none;color:#000;">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
