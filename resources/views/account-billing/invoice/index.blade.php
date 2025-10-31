@extends('layouts.app')

@section('content')
<div class="content" style="padding:20px;">

  <!-- ✅ Topbar -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Invoice Management</h2>
    <div>
      <a href="{{ route('account-billing.index') }}" class="btn btn-outline-secondary">← Back</a>
      <a href="{{ route('invoice.create') }}" class="btn btn-primary">+ New Invoice</a>
    </div>
  </div>

  <!-- ✅ Compact Right-Aligned Invoice Info Card -->
<div class="container mt-3">
  <div class="d-flex justify-content-end">
    <div class="card shadow-sm" style="background: #b4e1aeff; border-radius: 8px; padding: 12px; width: 350px;">
      <div class="d-flex align-items-start gap-1">
        <div style="font-size:22px; line-height:1;">🧾</div>
        <div>
          <h6 class="fw-semibold mb-1" style="font-size:16px;">Invoice System</h6>
          <p class="text-muted mb-0" style="font-size:13px;">Create and manage client invoices</p>
        </div>
      </div>
    </div>
  </div>
</div>




  <!-- ✅ Invoice Cards / Table -->
  <div class="card shadow-sm p-4" style="background:white; border-radius:12px;">
    <h5 class="fw-bold mb-3">All Invoices</h5>

    <table class="table table-bordered align-middle">
      <thead class="table-light">
        <tr>
         
          <th>PI</th>
          <th>Invoice Date</th>
          <th>Bill To</th>
          <th>Status</th>
          <th>Total Amount</th>
          <th>Actions</th>
        </tr>
      </thead>

      <tbody>
        @forelse($invoices as $index => $invoice)
          <tr>
            
            <td>{{ $invoice->pi ?? '—' }}</td>
            <td>{{ $invoice->invoice_date ? \Carbon\Carbon::parse($invoice->invoice_date)->format('d-m-Y') : '—' }}</td>
            <td>{{ $invoice->bill_to_name ?? '—' }}</td>
            <td>
              <span class="badge 
                {{ $invoice->invoice_status == 'Pending' ? 'bg-warning' : 
                   ($invoice->invoice_status == 'Paid' ? 'bg-success' : 'bg-secondary') }}">
                {{ ucfirst($invoice->invoice_status ?? 'N/A') }}
              </span>
            </td>
            <td>₹{{ number_format($invoice->total_amount_after_tax ?? 0, 2) }}</td>
            <td>
              <a href="{{ route('invoice.show', $invoice->id) }}" class="btn btn-sm btn-info">View</a>
              <a href="{{ route('invoice.edit', $invoice->id) }}" class="btn btn-sm btn-warning">Edit</a>
              <form action="{{ route('invoice.destroy', $invoice->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this invoice?')">Delete</button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="7" class="text-center text-muted">No Invoices Found</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

</div>
@endsection
