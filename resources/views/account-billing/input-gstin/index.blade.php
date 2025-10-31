@extends('layouts.app')

@section('title', 'Input GST Management')

@section('content')
<!-- Top header bar -->
<div class="topbar" style="display:flex;justify-content:space-between;align-items:center;margin-bottom:25px;">
    <h1 style="font-size:24px;font-weight:800;margin:0 auto;text-align:center;">GST Management</h1>
    <a href="{{ url()->previous() }}" 
       style="background:#007bff;color:#fff;padding:8px 16px;border-radius:6px;text-decoration:none;font-weight:500;">
        ← Back
    </a>
</div>
<!-- GST Compliance Card -->
 
<div class="panel" style="background:var(--accent-4); margin-bottom: 20px; padding: 15px;">
    <div style="display:flex;align-items:center;gap:16px">
        <div style="font-size:42px">🏛️</div>
        <div>
            <div style="font-weight:800;font-size:24px">GST Compliance</div>
            <div class="muted">GST filing and tax compliance management</div>
        </div>
    </div>
</div>

<!-- Input GST Table -->
<div class="panel" style="background:#f0f4ff;padding:20px;border-radius:10px;">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:15px;">
        <h2 style="margin:0;">Input GST Management</h2>
        <a href="{{ route('input-gst.create') }}" class="btn" 
           style="background:#007bff;color:#fff;padding:8px 16px;border-radius:5px;text-decoration:none;">
            + Add Input GST
        </a>
    </div>

    <table border="1" cellpadding="10" cellspacing="0" width="100%" 
           style="margin-top:15px;border-collapse:collapse;text-align:left;">
        <thead style="background:#ffffff;">
            <tr>
                <th>Sr No</th>
                <th>Invoice No</th>
                <th>Invoice Date</th>
                <th>Invoice Month</th>
                <th>Company</th>
                <th>GST No</th>
                <th>Invoice Amount</th>
                <th>GST Amount</th>
                <th>CGST</th>
                <th>SGST</th>
                <th>Remark</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            {{-- dynamic rows will come here --}}
            @foreach($inputGstins as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->invoice_no }}</td>
                <td>{{ $item->invoice_date }}</td>
                <td>{{ $item->invoice_month }}</td>
                <td>{{ $item->company }}</td>
                <td>{{ $item->gst_no }}</td>
                <td>{{ $item->invoice_amount }}</td>
                <td>{{ $item->gst_amount }}</td>
                <td>{{ $item->cgst }}</td>
                <td>{{ $item->sgst }}</td>
                <td>{{ $item->remark }}</td>
                <td>
                    <a href="{{ route('input-gst.edit', $item->id) }}" 
                       style="color:#007bff; text-decoration:none; font-weight:600;">Edit</a>
                    |
                    <form action="{{ route('input-gst.destroy', $item->id) }}" method="POST" 
                          style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                style="color:red; border:none; background:none; cursor:pointer; font-weight:600;">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
