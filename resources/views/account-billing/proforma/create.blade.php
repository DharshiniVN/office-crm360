@extends('layouts.app')

@section('title', 'Create Proforma Invoice')

@section('content')
{{-- Top Header Card --}}
<div style="background:#fff; border-radius:10px; padding:20px 25px; box-shadow:0 0 8px rgba(0,0,0,0.1); margin-bottom:25px;">
    <div style="display:flex; justify-content:space-between; align-items:center;">
        <div style="display:flex; align-items:center; gap:15px;">
            <div style="font-size:36px;">📝</div>
            <div>
                <h2 style="margin:0; font-weight:700;">Proforma Invoice System</h2>
                <div style="color:#666;">Create and manage client proforma invoices (quotations)</div>
            </div>
        </div>
        <a href="{{ route('proforma.index') }}" 
           style="background:#6c757d; color:#fff; padding:8px 16px; border-radius:5px; text-decoration:none; font-size:14px;">
            ← Back
        </a>
    </div>
</div>

{{-- Main Form Card --}}
<div style="background:#fff; padding:30px; border-radius:10px; box-shadow:0 0 8px rgba(0,0,0,0.1);">
    <h3 style="margin-top:0;">Create New Proforma Invoice</h3>

    <form action="{{ route('proforma.store') }}" method="POST">
        @csrf

        {{-- Basic Info --}}
        <h4>Basic Information</h4>
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(250px,1fr)); gap:15px;">
            <input type="text" name="pi_no" placeholder="Proforma No" class="form-control" required>
            <input type="text" name="transport_mode" placeholder="Transport Mode" class="form-control">
            <input type="date" name="invoice_date" class="form-control" required>
            <input type="text" name="vehicle_no" placeholder="Vehicle No" class="form-control">
            <select name="reverse_charge" class="form-control">
                <option value="N">Reverse Charge: No</option>
                <option value="Y">Reverse Charge: Yes</option>
            </select>
            <input type="text" name="state" placeholder="State" class="form-control">
            <input type="text" name="state_code" placeholder="State Code" class="form-control">
            <input type="text" name="place_of_supply" placeholder="Place of Supply" class="form-control">
        </div>

        <hr>

        {{-- Bill To Party --}}
        <h4>Bill To Party</h4>
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(250px,1fr)); gap:15px;">
            <input type="text" name="bill_name" placeholder="Name" class="form-control">
            <input type="text" name="bill_address" placeholder="Address" class="form-control">
            <input type="text" name="bill_gstin" placeholder="GSTIN" class="form-control">
            <input type="text" name="bill_state" placeholder="State" class="form-control">
            <input type="text" name="bill_code" placeholder="Code" class="form-control">
        </div>

        <hr>

        {{-- Ship To Party --}}
        <h4>Ship To Party</h4>
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(250px,1fr)); gap:15px;">
            <input type="text" name="ship_name" placeholder="Name" class="form-control">
            <input type="text" name="ship_address" placeholder="Address" class="form-control">
            <input type="text" name="ship_gstin" placeholder="GSTIN" class="form-control">
            <input type="text" name="ship_state" placeholder="State" class="form-control">
            <input type="text" name="ship_code" placeholder="Code" class="form-control">
        </div>

        <hr>

        {{-- Product Details --}}
        <h4>Product Details</h4>
        <table border="1" cellpadding="8" cellspacing="0" width="100%" style="border-collapse:collapse; background:#fff;">
            <thead style="background:#f9f9f9;">
                <tr>
                    <th>Sr.</th>
                    <th>Description</th>
                    <th>SAC Code</th>
                    <th>Amount</th>
                    <th>Taxable Value</th>
                    <th>Tax Rate</th>
                    <th>Tax Amount</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody id="product-rows">
                <tr>
                    <td>1</td>
                    <td><input type="text" name="products[0][description]" class="form-control"></td>
                    <td><input type="text" name="products[0][sac_code]" class="form-control"></td>
                    <td><input type="number" name="products[0][amount]" class="form-control"></td>
                    <td><input type="number" name="products[0][taxable_value]" class="form-control"></td>
                    <td><input type="text" name="products[0][tax_rate]" class="form-control"></td>
                    <td><input type="number" name="products[0][tax_amount]" class="form-control"></td>
                    <td><input type="number" name="products[0][total]" class="form-control"></td>
                </tr>
            </tbody>
        </table>

        <button type="button" id="addProduct"
                style="margin-top:10px; background:#007bff; color:#fff; padding:6px 12px; border:none; border-radius:5px;">
            + Add Product
        </button>

        <hr>

        {{-- Bank Details --}}
        <h4>Bank Details</h4>
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(250px,1fr)); gap:15px;">
            <input type="text" name="beneficiary_name" placeholder="Beneficiary Name" class="form-control">
            <input type="text" name="bank_account" placeholder="Bank Account" class="form-control">
            <input type="text" name="bank_ifsc" placeholder="Bank IFSC" class="form-control">
            <input type="text" name="pan_number" placeholder="PAN Number" class="form-control">
        </div>

        <hr>

        {{-- Tax Details --}}
        <h4>Tax Details</h4>
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(250px,1fr)); gap:15px;">
            <input type="number" name="total_before_tax" placeholder="Total Before Tax" class="form-control">
            <input type="text" name="igst_percent" placeholder="IGST (%)" class="form-control">
            <input type="number" name="total_tax_amount" placeholder="Total Tax Amount" class="form-control">
            <input type="number" name="round_off" placeholder="Round Off" class="form-control">
            <input type="number" name="total_after_tax" placeholder="Total After Tax" class="form-control">
            <input type="number" name="gst_on_reverse_charge" placeholder="GST on Reverse Charge" class="form-control">
        </div>

        <hr>

        {{-- Status --}}
        <div style="max-width:300px;">
            <label>Status:</label>
            <select name="status" class="form-control">
                <option value="Pending">Pending</option>
                <option value="Completed">Completed</option>
            </select>
        </div>

        <div style="margin-top:25px; display:flex; gap:10px;">
            <button type="submit"
                    style="background:#007bff; color:#fff; padding:10px 20px; border:none; border-radius:5px;">
                Save
            </button>
            <a href="{{ route('proforma.index') }}"
               style="background:#dc3545; color:#fff; padding:10px 20px; border-radius:5px; text-decoration:none;">
                Cancel
            </a>
        </div>
    </form>
</div>

<script>
document.getElementById('addProduct').addEventListener('click', function() {
    let tbody = document.getElementById('product-rows');
    let rowCount = tbody.rows.length;
    let newRow = tbody.insertRow();
    newRow.innerHTML = `
        <td>${rowCount + 1}</td>
        <td><input type="text" name="products[${rowCount}][description]" class="form-control"></td>
        <td><input type="text" name="products[${rowCount}][sac_code]" class="form-control"></td>
        <td><input type="number" name="products[${rowCount}][amount]" class="form-control"></td>
        <td><input type="number" name="products[${rowCount}][taxable_value]" class="form-control"></td>
        <td><input type="text" name="products[${rowCount}][tax_rate]" class="form-control"></td>
        <td><input type="number" name="products[${rowCount}][tax_amount]" class="form-control"></td>
        <td><input type="number" name="products[${rowCount}][total]" class="form-control"></td>
    `;
});
</script>
@endsection
