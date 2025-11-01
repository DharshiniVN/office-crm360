@extends('layouts.app')

@section('title', 'Expense Report')

@section('content')
<style>
  @media print {
    .table-actions, .actions, .topbar { display: none !important; }
    .content { margin: 0 !important; padding: 20px !important; }
    .table { width: 100% !important; border-collapse: collapse !important; }
    .table th, .table td { border: 1px solid #000 !important; padding: 8px !important; }
    body { font-size: 12px !important; }
  }
</style>

<main class="content" style="max-width: 1200px; margin: auto; padding: 20px;">
  <div class="topbar" style="display: flex; justify-content: space-between; align-items: center;">
    <h1 style="font-size: 22px; font-weight: 900;">Income/Expense Report</h1>
    <a class="btn" href="{{ route('account-billing.expense-report') }}"
       style="background: #0061FF; color: #fff; padding: 8px 16px; border-radius: 8px; text-decoration: none;">◀ Back</a>
  </div>

  <section class="table-wrap" style="margin-top: 25px;">
    <div class="table-actions" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
      <input id="search" class="search" placeholder="Search entries..." style="padding: 8px; border-radius: 8px; border: 1px solid #ccc; width: 250px;" />
      <div>
        <button class="btn" id="export" style="margin-right: 8px;">Export CSV</button>
        <button class="btn" onclick="setTimeout(() => window.print(), 100)">Print / Save PDF</button>
      </div>
    </div>

    <div style="overflow-x:auto;">
      <table class="table" id="expenseTable" style="width: 100%; border-collapse: collapse;">
        <thead>
          <tr style="background: #EAF1FF;">
            <th>Date</th>
            <th>Project Name</th>
            <th>Expense To</th>
            <th>Description</th>
            <th>Amount</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($entries ?? [] as $entry)
            <tr>
              <td>{{ $entry->date }}</td>
              <td>{{ $entry->project_name }}</td>
              <td>{{ $entry->expense_to }}</td>
              <td>{{ $entry->description }}</td>
              <td>₹{{ number_format($entry->amount, 2) }}</td>
              <td>
                <button class="btn btn-warning btn-sm">Edit</button>
                <button class="btn btn-danger btn-sm">Delete</button>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </section>
</main>

<script src="{{ asset('assets/js/income-expense-reports.js') }}"></script>
@endsection
