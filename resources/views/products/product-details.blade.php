@extends('layouts.app')

@section('title', 'Product Details')

@section('content')
<div class="topbar">
    <div class="h1">Product Details</div>
    <div class="actions">
        <button class="btn" onclick="history.back()">◀ Back</button>
    </div>
</div>

<div class="panel">
    <form class="form" id="detailForm">
        <!-- Fields populated dynamically -->
    </form>
    <div class="actions" style="margin-top: 20px;">
        <a class="btn" href="{{ route('products.edit', $product->id) }}">Edit</a>
        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button class="btn danger">Delete</button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('assets/js/product-detail.js') }}"></script>
@endpush
