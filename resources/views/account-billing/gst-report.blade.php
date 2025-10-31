@extends('layouts.app')

@section('title', 'GST Report')

@section('content')
<div class="container" style="max-width: 1000px; margin: auto; padding: 20px;">

  <!-- Header -->
  <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
    <h1 style="text-align:center; flex:1; font-weight:700; margin:0;">GST Management</h1>
    <a href="{{ url('/account-billing') }}" 
       style="background:#6c757d; color:#fff; padding:8px 16px; border-radius:5px; text-decoration:none;">
       Back
    </a>
  </div>

  <!-- GST Compliance Info Card -->
  <div style="background:#ffe9cc; padding:25px; border-radius:15px; box-shadow:0 3px 10px rgba(0, 0, 0, 0.08); margin-bottom:25px;">
    <div style="display:flex; align-items:center; gap:16px;">
      <div style="font-size:42px;">🏛️</div>
      <div>
        <div style="font-weight:800; font-size:24px;">GST Compliance</div>
        <div class="muted" style="color:#555;">GST filing and tax compliance management</div>
      </div>
    </div>
  </div>

  <!-- GST Options Cards -->
  <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:20px;">
    
    <!-- Output GST -->
    <div style="background:#afb7e4ff; padding:18px; border-radius:12px; box-shadow:0 2px 10px rgba(0,0,0,0.05); position:relative; cursor:pointer;"
         onclick="window.location='{{ route('output-gst.index') }}'">
      <a href="{{ route('output-gst.index') }}" 
         style="position:absolute; top:10px; right:10px; background:#fff; color:#007bff; border:1px solid #e1e2e3ff; padding:5px 12px; border-radius:5px; text-decoration:none; font-weight:600;">
         Open
      </a>
      <h3 style="margin:0; font-size:20px; color:#333;">Output GST</h3>
      <p style="color:#555; margin-top:8px;">Outgoing GST invoices and compliance.</p>
    </div>

    <!-- Input GSTIN -->
    <div style="background:#b8e7c1ff; padding:18px; border-radius:12px; box-shadow:0 2px 10px rgba(0,0,0,0.05); position:relative; cursor:pointer;"
         onclick="window.location='{{ route('input-gst.index') }}'">
      <a href="{{ route('input-gst.index') }}" 
         style="position:absolute; top:10px; right:10px; background:#fff; color:#007bff; border:1px solid #aeaeaeff; padding:5px 12px; border-radius:5px; text-decoration:none; font-weight:600;">
         Open
      </a>
      <h3 style="margin:0; font-size:20px; color:#333;">Input GSTIN</h3>
      <p style="color:#555; margin-top:8px;">Incoming GST invoices and tracking.</p>
    </div>

  </div>
</div>
@endsection
