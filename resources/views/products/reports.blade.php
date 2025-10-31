@extends('layouts.app')

@section('title', 'Products Reports')

@section('content')
<div class="topbar">
    <div class="hamburger-menu">☰</div>
    <div class="h1">Products Reports</div>
    <div class="actions"><a class="btn" href="{{ route('products.index') }}">◀ Back</a></div>
</div>

<section class="table-wrap">
    <div class="table-actions">
        <input id="search1" class="search" placeholder="Search products..." />
        <div>
            <button class="btn" id="export1">Export CSV</button>
            <button class="btn" onclick="setTimeout(() => window.print(), 100)">Print / Save PDF</button>
        </div>
    </div>
    <div style="overflow:auto">
        <table class="table" id="table1"></table>
    </div>
</section>

<h3 style="margin:18px 4px 8px">Renewals Due</h3>
<section class="table-wrap">
    <div class="table-actions">
        <input id="search2" class="search" placeholder="Search renewals..." />
        <div>
            <button class="btn" id="export2">Export CSV</button>
            <button class="btn" onclick="setTimeout(() => window.print(), 100)">Print / Save PDF</button>
        </div>
    </div>
    <div style="overflow:auto">
        <table class="table" id="table2"></table>
    </div>
</section>
@endsection

@push('scripts')
<script src="{{ asset('assets/js/products-reports.js') }}"></script>
@endpush
