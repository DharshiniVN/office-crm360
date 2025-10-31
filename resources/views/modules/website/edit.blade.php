@extends('layouts.app')

@section('content')
<h2>Edit Account</h2>

<form action="{{ route('accounts.update', $account->id) }}" method="POST">
  @csrf
  @method('PUT')

  <label>Client Name</label>
  <input type="text" name="client_name" value="{{ $account->client_name }}" required>

  <label>Contact</label>
  <input type="text" name="contact" value="{{ $account->contact }}" required>

  <label>Gmail</label>
  <input type="email" name="gmail" value="{{ $account->gmail }}" required>

  <label>Category</label>
  <input type="text" name="category" value="{{ $account->category }}" required>

  <label>Renewal Amount</label>
  <input type="number" name="renewal_amount" value="{{ $account->renewal_amount }}" required>

  <label>Renewal Date</label>
  <input type="date" name="renewal_date" value="{{ $account->renewal_date }}" required>

  <label>Company ID</label>
  <input type="text" name="company_id" value="{{ $account->company_id }}">

  <input type="hidden" name="updated_by" value="{{ auth()->id() }}">

  <button type="submit">Update</button>
</form>
@endsection