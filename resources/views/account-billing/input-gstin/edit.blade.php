@extends('layouts.app')

@section('title', 'Edit Input GSTIN')

@section('content')
<div class="container" style="max-width:1200px; margin:auto;">

  <!-- Top Header -->
  <div class="topbar" style="margin-bottom: 20px;">
    <div class="hamburger-menu">☰</div>
    <div class="h1">GST Management</div>
    <div class="actions">
      <a href="{{ route('input-gst.index') }}" 
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
    <h3 style="font-weight:600; margin-bottom:25px;">Edit Input GSTIN</h3>

    <form method="POST" action="{{ route('input-gst.update', $inputGstin->id) }}" 
          style="display:grid; grid-template-columns: repeat(3, 1fr); gap:20px;">
      @csrf
      @method('PUT')

      <div>
        <label>Sr No:</label>
        <input type="text" name="sr_no" value="{{ $inputGstin->sr_no }}" 
               class="form-control" style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc;">
      </div>

      <div>
        <label>Invoice No:</label>
        <input type="text" name="invoice_no" value="{{ $inputGstin->invoice_no }}" 
               class="form-control" style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc;">
      </div>

      <div>
        <label>Invoice Date:</label>
        <input type="date" name="invoice_date" value="{{ $inputGstin->invoice_date }}" 
               class="form-control" style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc;">
      </div>

      <div>
        <label>Invoice Month:</label>
        <input type="text" name="invoice_month" value="{{ $inputGstin->invoice_month }}" 
               class="form-control" style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc;">
      </div>

      <div>
        <label>Company:</label>
        <input type="text" name="company" value="{{ $inputGstin->company }}" 
               class="form-control" style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc;">
      </div>

      <div>
        <label>GST No:</label>
        <input type="text" name="gst_no" value="{{ $inputGstin->gst_no }}" 
               class="form-control" style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc;">
      </div>

      <div>
        <label>Invoice Amount:</label>
        <input type="number" name="invoice_amount" value="{{ $inputGstin->invoice_amount }}" 
               class="form-control" style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc;">
      </div>

      <div>
        <label>GST Amount:</label>
        <input type="number" name="gst_amount" value="{{ $inputGstin->gst_amount }}" 
               class="form-control" style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc;">
      </div>

      <div>
        <label>CGST:</label>
        <input type="number" name="cgst" value="{{ $inputGstin->cgst }}" 
               class="form-control" style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc;">
      </div>

      <div>
        <label>SGST:</label>
        <input type="number" name="sgst" value="{{ $inputGstin->sgst }}" 
               class="form-control" style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc;">
      </div>

      <div style="grid-column: span 3;">
        <label>Remark:</label>
        <textarea name="remark" rows="2" 
                  class="form-control" style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc;">{{ $inputGstin->remark }}</textarea>
      </div>

      <div style="grid-column: span 3; display:flex; gap:10px; justify-content:flex-end; margin-top:20px;">
        <button type="submit" 
                style="background:#007bff; color:#fff; padding:8px 20px; border:none; border-radius:8px; cursor:pointer;">
          Update
        </button>
        <a href="{{ route('input-gst.index') }}" 
           style="background:#e0e0e0; padding:8px 20px; border-radius:8px; text-decoration:none; color:#333;">
          Cancel
        </a>
      </div>
    </form>
  </div>
</div>
@endsection
