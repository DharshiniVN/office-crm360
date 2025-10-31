@extends('layouts.app')

@section('title', 'Edit Output GST')

@section('content')
<div class="container" style="max-width:1200px; margin:auto;">

  <!-- Top Header -->
  <div class="topbar" style="margin-bottom: 20px;">
    <div class="hamburger-menu">☰</div>
    <div class="h1">GST Management</div>
    <div class="actions">
      <a href="{{ route('output-gst.index') }}" 
         style="background:#4a6cf7; color:white; padding:8px 16px; border-radius:6px; text-decoration:none;">
         Back
      </a>
    </div>
  </div>

  <!-- GST Compliance Card -->
  <div class="panel" style="background:var(--accent-4); margin-bottom: 20px; padding: 15px;">
    <div style="display:flex;align-items:center;gap:16px;">
      <div style="font-size:42px;">🏛️</div>
      <div>
        <div style="font-weight:800;font-size:24px;">GST Compliance</div>
        <div class="muted">GST filing and tax compliance management</div>
      </div>
    </div>
  </div>

  <!-- Edit Form -->
  <div style="background:#fff; padding:30px; border-radius:15px; box-shadow:0 4px 10px rgba(0,0,0,0.1);">
    <h3 style="font-weight:600; margin-bottom:25px;">Edit Output GST</h3>

    <form method="POST" action="{{ route('output-gst.update', $outputGst->id) }}" 
          style="display:grid; grid-template-columns: repeat(3, 1fr); gap:20px;">
      @csrf
      @method('PUT')

      <div>
        <label>Sl No:</label>
        <input type="text" name="sl_no" value="{{ $outputGst->sl_no }}" 
               class="form-control" style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc;">
      </div>

      <div>
        <label>Invoice No:</label>
        <input type="text" name="invoice_no" value="{{ $outputGst->invoice_no }}" 
               class="form-control" style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc;">
      </div>

      <div>
        <label>Invoice Date:</label>
        <input type="date" name="invoice_date" value="{{ $outputGst->invoice_date }}" 
               class="form-control" style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc;">
      </div>

      <div>
        <label>Invoice Month:</label>
        <input type="text" name="invoice_month" value="{{ $outputGst->invoice_month }}" 
               class="form-control" style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc;">
      </div>

      <div>
        <label>Customer Name:</label>
        <input type="text" name="cust_name" value="{{ $outputGst->cust_name }}" 
               class="form-control" style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc;">
      </div>

      <div>
        <label>Company:</label>
        <input type="text" name="company" value="{{ $outputGst->company }}" 
               class="form-control" style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc;">
      </div>

      <div>
        <label>Comp:</label>
        <input type="text" name="comp" value="{{ $outputGst->comp }}" 
               class="form-control" style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc;">
      </div>

      <div>
        <label>Invoice Amount:</label>
        <input type="number" name="invoice_amount" value="{{ $outputGst->invoice_amount }}" 
               class="form-control" style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc;">
      </div>

      <div>
        <label>GST Amount:</label>
        <input type="number" name="gst_amount" value="{{ $outputGst->gst_amount }}" 
               class="form-control" style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc;">
      </div>

      <div>
        <label>TDS Deduction:</label>
        <select name="tds_deduction" style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc;">
          <option value="yes" {{ $outputGst->tds_deduction == 'yes' ? 'selected' : '' }}>Yes</option>
          <option value="no" {{ $outputGst->tds_deduction == 'no' ? 'selected' : '' }}>No</option>
        </select>
      </div>

      <div>
        <label>Payment Status:</label>
        <select name="payment_status" style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc;">
          <option value="Paid" {{ $outputGst->payment_status == 'Paid' ? 'selected' : '' }}>Paid</option>
          <option value="Pending" {{ $outputGst->payment_status == 'Pending' ? 'selected' : '' }}>Pending</option>
        </select>
      </div>

      <div>
        <label>GST No:</label>
        <input type="text" name="gst_no" value="{{ $outputGst->gst_no }}" 
               class="form-control" style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc;">
      </div>

      <div style="grid-column: span 3; display:flex; gap:10px; justify-content:flex-end; margin-top:20px;">
        <button type="submit" 
                style="background:#007bff; color:#fff; padding:8px 20px; border:none; border-radius:8px; cursor:pointer;">
          Update
        </button>
        <a href="{{ route('output-gst.index') }}" 
           style="background:#e0e0e0; padding:8px 20px; border-radius:8px; text-decoration:none; color:#333;">
          Cancel
        </a>
      </div>
    </form>
  </div>
</div>
@endsection
