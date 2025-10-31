@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="topbar">
  <div class="h1">{{ $title }}</div>
</div>

<table border="1" cellpadding="8" cellspacing="0" style="width:100%;border-collapse:collapse;margin-top:20px;">
  <thead style="background:#f0f4ff;">
    <tr>
      <th>Client</th>
      <th>Service</th>
      <th>Start Date</th>
      <th>Expiry Date</th>
      <th>Amount</th>
      <th>Status</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @forelse($renewals as $r)
    <tr>
      <td>{{ $r->client_name }}</td>
      <td>{{ $r->service ?? '-' }}</td>
      <td>{{ $r->start_date ? \Carbon\Carbon::parse($r->start_date)->format('d M Y') : '-' }}</td>
      <td>{{ $r->expiry_date ? \Carbon\Carbon::parse($r->expiry_date)->format('d M Y') : '-' }}</td>
      <td>₹{{ number_format($r->amount ?? 0, 2) }}</td>
      <td>{{ ucfirst($r->status ?? 'Pending') }}</td>
      <td><a href="{{ route('renewals.payment', [$r->id, request()->route('type')]) }}" class="btn btn-success btn-sm">Renew</a></td>
    </tr>
    @empty
    <tr><td colspan="7" style="text-align:center;">No renewals found</td></tr>
    @endforelse
  </tbody>
</table>

<div class="pagination" style="margin-top:20px;text-align:center;">
  <button class="btn">Previous</button>
  <button class="btn">1</button>
  <button class="btn">2</button>
  <button class="btn">3</button>
  <button class="btn">Next</button>
</div>
@endsection
