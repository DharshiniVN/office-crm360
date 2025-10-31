@extends('layouts.app')

@section('title', 'Proforma Invoice Management')

@section('content')

<!-- Header Card -->
<div class="panel" style="background:var(--accent-4); margin-bottom:20px; padding:15px;">
    <div style="display:flex;align-items:center;gap:16px;">
        <div style="font-size:42px;">📝</div>
        <div>
            <div style="font-weight:800;font-size:24px;">Proforma Invoice System</div>
            <div class="muted">Create and manage client proforma invoices (quotations)</div>
        </div>
    </div>
</div>

<!-- Main Panel -->
<div class="panel" style="background:#f0f4ff;padding:20px;border-radius:10px;">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:15px;">
        <div style="display:flex;align-items:center;gap:10px;">
            <a href="{{ route('account-billing.gst-report') }}" 
               style="background:#6c757d;color:#fff;padding:8px 16px;border-radius:5px;text-decoration:none;">
                ← Back
            </a>
            <h2 style="margin:0;">Proforma Invoice Management</h2>
        </div>

        <a href="{{ route('proforma.create') }}" 
           style="background:#007bff;color:#fff;padding:8px 16px;border-radius:5px;text-decoration:none;">
            + New Proforma Invoice
        </a>
    </div>

    <table border="1" cellpadding="10" cellspacing="0" width="100%" 
           style="margin-top:15px;border-collapse:collapse;text-align:left;">
        <thead style="background:#e0e7ff;">
            <tr>
                <th>PI No</th>
                <th>Invoice Date</th>
                <th>Bill To</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            {{-- Dynamic rows will be displayed here --}}
            @foreach($proformas as $item)
            <tr>
                <td>{{ $item->pi_number }}</td>
                <td>{{ $item->invoice_date }}</td>
                <td>{{ $item->bill_to }}</td>
                <td>
                    <span style="color:{{ $item->status == 'Approved' ? 'green' : '#ff9800' }};">
                        {{ ucfirst($item->status) }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('proforma.show', $item->id) }}" 
       style="color:#28a745; text-decoration:none; font-weight:600;">
        View
    </a>
                    <a href="{{ route('proforma.edit', $item->id) }}" 
                       style="color:#007bff; text-decoration:none; font-weight:600;">
                        Edit
                    </a>
                    |
                    <form action="{{ route('proforma.destroy', $item->id) }}" method="POST" 
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
