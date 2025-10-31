@extends('layouts.app')

@section('title', 'Add Output GST')

@section('content')
<div class="container" style="max-width: 1200px; margin: auto;">

  <div class="topbar" style="margin-bottom: 20px;">
    <div class="hamburger-menu">☰</div>
    <div class="h1">GST Management</div>
    <div class="actions">
      <a href="{{ url('/account-billing/gst-report') }}">Back</a>

    </div>
  </div>

  <div class="panel" style="background:var(--accent-4); margin-bottom: 20px; padding: 15px;">
    <div style="display:flex;align-items:center;gap:16px">
      <div style="font-size:42px">🏛️</div>
      <div>
        <div style="font-weight:800;font-size:24px">GST Compliance</div>
        <div class="muted">GST filing and tax compliance management</div>
      </div>
    </div>
  </div>
<div class="container" style="max-width: 800px; margin:auto; padding:20px;">
  <h2 style="font-weight:600;">Output GST Management</h2>

  <div style="background:#fff; margin-top:20px; padding:30px; border-radius:15px; box-shadow:0 4px 10px rgba(0,0,0,0.1);">
    <h4 style="margin-bottom:25px; font-weight:600;">Add Output GST</h4>

    <form method="POST" action="{{ route('output-gst.store') }}">
      @csrf
      <div style="display:grid; grid-template-columns: repeat(3, 1fr); gap:20px;">
        
        <div>
          <label>Sl No:</label>
          <input type="number" name="sl_no" class="form-control" style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc;">
        </div>

        <div>
          <label>Invoice No:</label>
          <input type="text" name="invoice_no" class="form-control" required style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc;">
        </div>

        <div>
          <label>Invoice Date:</label>
          <input type="date" name="invoice_date" class="form-control" required style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc;">
        </div>

        <div>
          <label>Invoice Month:</label>
          <input type="text" name="invoice_month" class="form-control" style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc;">
        </div>

        <div>
          <label>Customer Name:</label>
          <input type="text" name="cust_name" class="form-control" style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc;">
        </div>

        <div>
          <label>Company:</label>
          <input type="text" name="company" class="form-control" style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc;">
        </div>

        <div>
          <label>Comp:</label>
          <input type="text" name="comp" class="form-control" style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc;">
        </div>

        <div>
          <label>Invoice Amount:</label>
          <input type="number" step="0.01" name="invoice_amount" class="form-control" required style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc;">
        </div>

        <div>
          <label>GST Amount:</label>
          <input type="number" step="0.01" name="gst_amount" class="form-control" required style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc;">
        </div>

        <div>
          <label>TDS Deduction:</label><br>
          <label><input type="radio" name="tds_deduction" value="yes"> Yes</label>
          <label style="margin-left:10px;"><input type="radio" name="tds_deduction" value="no" checked> No</label>
        </div>

        <div>
          <label>Payment Status:</label><br>
          <label><input type="radio" name="payment_status" value="Paid"> Paid</label>
          <label style="margin-left:10px;"><input type="radio" name="payment_status" value="Pending" checked> Pending</label>
        </div>

        <div>
          <label>GST No:</label>
          <input type="text" name="gst_no" class="form-control" style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc;">
        </div>
      </div>

      <div style="margin-top:25px; display:flex; gap:10px;">
        <button type="submit" 
                style="background:#007bff; color:#fff; padding:8px 20px; border:none; border-radius:8px; cursor:pointer;">
          Save
        </button>
        <a href="{{ route('output-gst.index') }}" 
           style="background:#f1f1f1; color:#333; padding:8px 20px; border-radius:8px; text-decoration:none;">
          Cancel
        </a>
      </div>
    </form>
  </div>
</div>
@endsection
