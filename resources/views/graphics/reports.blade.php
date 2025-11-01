@extends('layouts.app')

@section('title', 'Graphics Reports')

@section('topbar')
  <div class="hamburger-menu">☰</div>
  <div class="h1">Graphics Reports</div>
  <div class="actions"><a class="btn" href="{{ route('graphics.index') }}">◀ Back</a></div>
@endsection

@section('content')
<section class="table-wrap">
  <div class="table-actions">
    <input id="search1" class="search" placeholder="Search projects..." />
    <div>
      <button class="btn" id="export1">Export CSV</button>
      <button class="btn" onclick="setTimeout(() => window.print(), 100)">Print / Save PDF</button>
    </div>
  </div>
  <div style="overflow:auto">
    <table class="table" id="table1"></table>
  </div>
</section>

<h3 style="margin:18px 4px 8px">Active Projects</h3>
<section class="table-wrap">
  <div class="table-actions">
    <input id="search2" class="search" placeholder="Search active projects..." />
    <div>
      <button class="btn" id="export2">Export CSV</button>
      <button class="btn" onclick="setTimeout(() => window.print(), 100)">Print / Save PDF</button>
    </div>
  </div>
  <div style="overflow:auto">
    <table class="table" id="table2"></table>
  </div>
</section>

<h3 style="margin:18px 14px 8px">Renewals Due</h3>
<section class="table-wrap">
  <div class="table-actions">
    <input id="search3" class="search" placeholder="Search renewals due..." />
    <div>
      <button class="btn" id="export3">Export CSV</button>
      <button class="btn" onclick="setTimeout(() => window.print(), 100)">Print / Save PDF</button>
    </div>
  </div>
  <div style="overflow:auto">
    <table class="table" id="table3"></table>
  </div>
</section>
@endsection

@push('scripts')
<script src="{{ asset('assets/js/graphics-reports.js') }}"></script>
@endpush
