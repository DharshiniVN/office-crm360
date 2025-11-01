@extends('layouts.app')

@section('title', 'Graphics Project Details')

@section('topbar')
  <div class="hamburger-menu">☰</div>
  <div class="h1">Graphics Project Details</div>
  <div class="actions">
    <button class="btn" id="backBtn">◀ Back</button>
  </div>
@endsection

@section('content')
<div class="panel">
  <form class="form" id="detailForm">
    {{-- Form fields will be populated by JS --}}
  </form>
  <div class="actions" style="margin-top: 20px;">
    <button class="btn" id="editBtn">Edit</button>
    <button class="btn primary" id="saveBtn" style="display: none;">Save</button>
    <button class="btn danger" id="deleteBtn">Delete</button>
  </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('assets/js/graphics-detail.js') }}"></script>
@endpush
