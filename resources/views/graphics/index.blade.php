@extends('layouts.app')

@section('title', 'Graphics Design')

@section('content')
<div class="topbar" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <h1 style="margin: 0;">Graphics Design</h1>
    <a href="{{ route('graphics.create') }}" class="btn-add" style="padding: 10px 20px; background: #007bff; color: white; text-decoration: none; border-radius: 5px;">+ Add Graphics Project</a>
</div>

@if(session('success'))
    <div style="color: green; margin-bottom: 15px;">{{ session('success') }}</div>
@endif

<div class="cards" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">

    <!-- Logo Card -->
    <div class="card acc1"
         style="padding: 20px; border-radius: 10px; cursor: pointer; background-color: #f0f4ff; border: 1px solid #d0d7ff; position: relative;"
         onclick="window.location='{{ route('graphics.category', ['category' => 'logo']) }}'">
        <div class="label" style="font-weight: bold; font-size: 16px;">Logo</div>
        <div style="color: #000; font-size: 28px; font-weight: bold; margin-top: 10px;">
            {{ $logoCount ?? 0 }}
        </div>
        <div class="muted" style="color: #666; margin-top: 10px;">
            Renewals: {{ $logoRenewals ?? 0 }}
        </div>
        <a href="{{ route('graphics.category', ['category' => 'logo']) }}"
           style="position: absolute; top: 10px; right: 10px;
                  background: white; padding: 3px 8px;
                  border-radius: 12px; text-decoration: none;
                  color: black; font-weight: bold; font-size: 12px;">Open</a>
    </div>

    <!-- Other Graphics Card -->
    <div class="card acc1"
         style="padding: 20px; border-radius: 10px; cursor: pointer; background-color: #f0f4ff; border: 1px solid #d0d7ff; position: relative;"
         onclick="window.location='{{ route('graphics.category', ['category' => 'other']) }}'">
        <div class="label" style="font-weight: bold; font-size: 16px;">Other Graphics</div>
        <div style="color: #000; font-size: 28px; font-weight: bold; margin-top: 10px;">
            {{ $otherCount ?? 0 }}
        </div>
        <div class="muted" style="color: #666; margin-top: 10px;">
            Renewals: {{ $otherRenewals ?? 0 }}
        </div>
        <a href="{{ route('graphics.category', ['category' => 'other']) }}"
           style="position: absolute; top: 10px; right: 10px;
                  background: white; padding: 3px 8px;
                  border-radius: 12px; text-decoration: none;
                  color: black; font-weight: bold; font-size: 12px;">Open</a>
    </div>

    <!-- Company Profile / Catalog Card -->
    <div class="card acc1"
         style="padding: 20px; border-radius: 10px; cursor: pointer; background-color: #f0f4ff; border: 1px solid #d0d7ff; position: relative;"
         onclick="window.location='{{ route('graphics.category', ['category' => 'catalog']) }}'">
        <div class="label" style="font-weight: bold; font-size: 16px;">Company Profile / Catalog</div>
        <div style="color: #000; font-size: 28px; font-weight: bold; margin-top: 10px;">
            {{ $profileCount ?? 0 }}
        </div>
        <div class="muted" style="color: #666; margin-top: 10px;">
            Renewals: {{ $profileRenewals ?? 0 }}
        </div>
        <a href="{{ route('graphics.category', ['category' => 'catalog']) }}"
           style="position: absolute; top: 10px; right: 10px;
                  background: white; padding: 3px 8px;
                  border-radius: 12px; text-decoration: none;
                  color: black; font-weight: bold; font-size: 12px;">Open</a>
    </div>

    

</div>
@endsection
