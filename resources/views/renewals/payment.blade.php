@extends('layouts.app')

@section('title', 'Renewal Payment')

@section('content')
<h2>Renewal Payment for {{ $renewal->client_name ?? 'Unknown Client' }}</h2>
<p><strong>Service:</strong> {{ $renewal->service ?? '-' }}</p>
<p><strong>Amount:</strong> ₹{{ number_format($renewal->amount ?? 0, 2) }}</p>

<form method="POST" action="{{ route('renewals.processPayment', [$renewal->id, $type]) }}">
  @csrf
  <button type="submit" class="btn btn-primary">Pay Now</button>
</form>
@endsection
