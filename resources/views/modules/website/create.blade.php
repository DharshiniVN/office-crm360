@extends('layouts.app') {{-- Use your layout file if available --}}

@section('content')
<h2>Create Account</h2>
@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
<form action="{{ route('accounts.store') }}" method="POST">
  @csrf

  <label>Client Name</label>
  <input type="text" name="client_name" required>

  <label>Contact</label>
  <input type="text" name="contact" required>

  {{--<label>Gmail</label>]

  <input type="email" name="gmail" required>--}}
   <label>Gmail</label>
<input type="email" name="gmail" required>

  <label>Category</label>
  <input type="text" name="category" required>

  {{--<label>Renewal Amount</label>
  <input type="number" name="renewal_amount" required>

  <label>Renewal Date</label>
  <input type="date" name="renewal_date" required>--}}
  <label>Renewal Amount</label>
<input type="number" name="renewal_amount" required>


<label>Renewal Date</label>
<input type="date" name="renewal_date" required>


  <label>Company ID</label>
  <input type="text" name="company_id">

  <input type="hidden" name="created_by" value="{{ auth()->id() }}">
  <input type="hidden" name="updated_by" value="{{ auth()->id() }}">

  <button type="submit">Create</button>
</form>
@endsection