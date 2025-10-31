@extends('layouts.app')

@section('title', 'Products Management')

@section('content')
<div class="topbar" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <h1 style="margin: 0;">Products Management</h1>
    <a href="{{ route('products.add') }}" class="btn-add" style="padding: 10px 20px; background: #007bff; color: white; text-decoration: none; border-radius: 5px;">+ Add Product</a>
</div>

@if(session('success'))
    <div style="color: green; margin-bottom: 15px;">{{ session('success') }}</div>
@endif

<div class="cards" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">

    <!-- School Management Software Card -->
    <div class="card acc1" 
         style="padding: 20px; border-radius: 10px; cursor: pointer; background-color: #f0f4ff; border: 1px solid #d0d7ff; position: relative;"
         onclick="window.location='{{ route('products.category', ['category' => 'school-management-software']) }}'">
        <div class="label" style="font-weight: bold; font-size: 16px;">School Management Software</div>
        <div style="color: #000; font-size: 28px; font-weight: bold; margin-top: 10px;">
        {{ $categoryCounts['school-management-software'] ?? 0 }}
        </div>
        <div class="muted" style="color: #666; margin-top: 10px;">Renewals: {{ $schoolProjects ?? 0 }}</div>
        <a href="{{ route('products.category', ['category' => 'school-management-software']) }}" 
           style="position: absolute; top: 10px; right: 10px; 
                  background: white; padding: 3px 8px; 
                  border-radius: 12px; text-decoration: none; 
                  color: black; font-weight: bold; font-size: 12px;">Open</a>
    </div>


    <!-- Billing Software Card -->
<div class="card acc1" 
     style="padding: 20px; border-radius: 10px; cursor: pointer; background-color: #f0f4ff; border: 1px solid #d0d7ff; position: relative;"
     onclick="window.location='{{ route('products.category', ['category' => 'billing-software']) }}'">
    <div class="label" style="font-weight: bold; font-size: 16px;">Billing Software</div>
    <div style="color: #000; font-size: 28px; font-weight: bold; margin-top: 10px;">
        {{ $categoryCounts['billing-software'] ?? 0 }}
    </div>
    <div class="muted" style="color: #666; margin-top: 10px;">Renewals: {{ $billingProjects ?? 0 }}</div>
    <a href="{{ route('products.category', ['category' => 'billing-software']) }}" 
       style="position: absolute; top: 10px; right: 10px; 
              background: white; padding: 3px 8px; 
              border-radius: 12px; text-decoration: none; 
              color: black; font-weight: bold; font-size: 12px;">Open</a>
</div>


    <!-- WhatsApp Meta API Card -->
    <div class="card acc1" 
         style="padding: 20px; border-radius: 10px; cursor: pointer; background-color: #f0f4ff; border: 1px solid #d0d7ff; position: relative;"
         onclick="window.location='{{ route('products.category', ['category' => 'whatsapp-meta-api']) }}'">
        <div class="label" style="font-weight: bold; font-size: 16px;">WhatsApp Meta API</div>
        <div style="color: #000; font-size: 28px; font-weight: bold; margin-top: 10px;">
        {{ $categoryCounts['whatsapp-meta-api'] ?? 0 }}
        </div>
        <div class="muted" style="color: #666; margin-top: 10px;">Renewals: {{ $whatsappProjects ?? 0 }}</div>
        <a href="{{ route('products.category', ['category' => 'whatsapp-meta-api']) }}" 
           style="position: absolute; top: 10px; right: 10px; 
                  background: white; padding: 3px 8px; 
                  border-radius: 12px; text-decoration: none; 
                  color: black; font-weight: bold; font-size: 12px;">Open</a>
    </div>

    <!-- Digital Visiting Card Card -->
    <div class="card acc1" 
         style="padding: 20px; border-radius: 10px; cursor: pointer; background-color: #f0f4ff; border: 1px solid #d0d7ff; position: relative;"
         onclick="window.location='{{ route('products.category', ['category' => 'digital-visiting-card']) }}'">
        <div class="label" style="font-weight: bold; font-size: 16px;">Digital Visiting Card</div>
        <div style="color: #000; font-size: 28px; font-weight: bold; margin-top: 10px;">
        {{ $categoryCounts['digital-visiting-card'] ?? 0 }}
        </div>
        <div class="muted" style="color: #666; margin-top: 10px;">Renewals: {{ $digitalProjects ?? 0 }}</div>
        <a href="{{ route('products.category', ['category' => 'digital-visiting-card']) }}" 
           style="position: absolute; top: 10px; right: 10px; 
                  background: white; padding: 3px 8px; 
                  border-radius: 12px; text-decoration: none; 
                  color: black; font-weight: bold; font-size: 12px;">Open</a>
    </div>

    <!-- Brand Bizz Card -->
    <div class="card acc1" 
         style="padding: 20px; border-radius: 10px; cursor: pointer; background-color: #f0f4ff; border: 1px solid #d0d7ff; position: relative;"
         onclick="window.location='{{ route('products.category', ['category' => 'brand-bizz']) }}'">
        <div class="label" style="font-weight: bold; font-size: 16px;">Brand Bizz</div>
        <div style="color: #000; font-size: 28px; font-weight: bold; margin-top: 10px;">
        {{ $categoryCounts['brand-bizz'] ?? 0 }}
        </div>
        <div class="muted" style="color: #666; margin-top: 10px;">Renewals: {{ $brandProjects ?? 0 }}</div>
        <a href="{{ route('products.category', ['category' => 'brand-bizz']) }}" 
           style="position: absolute; top: 10px; right: 10px; 
                  background: white; padding: 3px 8px; 
                  border-radius: 12px; text-decoration: none; 
                  color: black; font-weight: bold; font-size: 12px;">Open</a>
    </div>

    <!-- Cloud India Hub Card -->
    <div class="card acc1" 
         style="padding: 20px; border-radius: 10px; cursor: pointer; background-color: #f0f4ff; border: 1px solid #d0d7ff; position: relative;"
         onclick="window.location='{{ route('products.category', ['category' => 'cloud-india-hub']) }}'">
        <div class="label" style="font-weight: bold; font-size: 16px;">Cloud India Hub</div>
        <div style="color: #000; font-size: 28px; font-weight: bold; margin-top: 10px;">
        {{ $categoryCounts['cloud-india-hub'] ?? 0 }}
        </div>
        <div class="muted" style="color: #666; margin-top: 10px;">Renewals: {{ $cloudProjects ?? 0 }}</div>
        <a href="{{ route('products.category', ['category' => 'cloud-india-hub']) }}" 
           style="position: absolute; top: 10px; right: 10px; 
                  background: white; padding: 3px 8px; 
                  border-radius: 12px; text-decoration: none; 
                  color: black; font-weight: bold; font-size: 12px;">Open</a>
    </div>
    <!-- Total Products Card -->
<div class="card acc1" 
     style="padding: 20px; border-radius: 10px; cursor: pointer; background-color: #e0f7fa; border: 1px solid #b2ebf2; position: relative;"
     onclick="window.location='{{ route('products.all') }}'">
    <div class="label" style="font-weight: bold; font-size: 16px;">Total Products</div>
    <div style="color: #000; font-size: 28px; font-weight: bold; margin-top: 10px;">
        {{ \App\Models\Product::count() ?? 0 }}
    </div>
    <div class="muted" style="color: #666; margin-top: 10px;">
    Renewals: {{ \App\Models\Product::where('renewal_status', 'due')->count() }}
</div>
    <a href="{{ route('products.all') }}" 
       style="position: absolute; top: 10px; right: 10px; 
              background: white; padding: 3px 8px; 
              border-radius: 12px; text-decoration: none; 
              color: black; font-weight: bold; font-size: 12px;">Open</a>
</div>
</div>
@endsection
