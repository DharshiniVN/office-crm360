@extends('layouts.app')

@section('title', 'Output GST Management')

@section('content')
<!-- Top header bar -->
<div class="topbar" style="display:flex;justify-content:space-between;align-items:center;margin-bottom:25px;">
    <h1 style="font-size:24px;font-weight:800;margin:0 auto;text-align:center;">GST Management</h1>
    <a href="{{ url()->previous() }}" 
       style="background:#007bff;color:#fff;padding:8px 16px;border-radius:6px;text-decoration:none;font-weight:500;">
        ← Back
    </a>
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

<div class="panel" style="background:#f0f4ff;padding:20px;border-radius:10px;">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:15px;">
        <h2 style="margin:0;">Output GST Management</h2>
        <a href="{{ route('output-gst.create') }}" class="btn" 
           style="background:#007bff;color:#fff;padding:8px 16px;border-radius:5px;text-decoration:none;">
            + Add Output GST
        </a>
    </div>

    <div style="overflow-x:auto;">
        <table width="100%" style="border-collapse:separate;border-spacing:0 10px;text-align:left;">
            <thead>
                <tr style="background:#ffffff;color:#333;">
                    <th style="padding:12px 10px;border-radius:6px 0 0 6px;">Sl. No</th>
                    <th style="padding:12px 10px;">Invoice No</th>
                    <th style="padding:12px 10px;">Invoice Date</th>
                    <th style="padding:12px 10px;">Invoice Month</th>
                    <th style="padding:12px 10px;">Cust Name</th>
                    <th style="padding:12px 10px;">Company</th>
                    <th style="padding:12px 10px;">Comp</th>
                    <th style="padding:12px 10px;">Invoice Amount</th>
                    <th style="padding:12px 10px;">GST Amount</th>
                    <th style="padding:12px 10px;">TDS Deduction</th>
                    <th style="padding:12px 10px;">Payment Status</th>
                    <th style="padding:12px 10px;">GST No</th>
                    <th style="padding:12px 10px;border-radius:0 6px 6px 0;">Actions</th>
                </tr>
            </thead>
            
        </table>
</div>
@endsection
