@extends('layouts.app')

@section('title', $categoryName . ' Products Reports')

@section('content')
<div class="container mt-4 position-relative">

    {{-- 🔹 Floating Back Button --}}
    <a href="{{ route('products.index') }}" 
       class="btn btn-secondary"
       style="position: absolute; top: 10px; right: 10px; border-radius: 8px; padding: 8px 18px;">
       ◀ Back
    </a>

    <h1 class="fw-bold mb-4">{{ $categoryName }} Products Reports</h1>

    {{-- 🔹 Top Bar: Search + Export --}}
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap" style="gap: 10px;">
        <div class="d-flex align-items-center gap-2" style="flex-wrap: wrap;">
            <input type="text" id="productSearch" class="form-control" placeholder="Search products..." style="width: 650px;">
            <button class="btn btn-success" id="exportCsvBtn">Export CSV</button>
            <button class="btn btn-info text-white" id="printPdfBtn">Print / Save PDF</button>
        </div>
    </div>

    {{-- 🔹 Products Reports Table --}}
    <div class="mt-3">
      
        @if ($allProducts->isEmpty())
            <p>No products available.</p>
        @else
            <table class="table table-bordered" id="productsTable">
                <thead class="table-primary">
                    <tr>
                        
                        <th>Client Name</th>
                        <th>Client Mobile</th>
                        <th>Client Gmail ID</th>
                        <th>Project Name</th>
                        <th>Renewal Status</th>
                        <th>Renewal Date</th>
                        <th>Renewal Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allProducts as $index => $product)
                        <tr>
                            
                            <td>{{ $product->client_name }}</td>
                            <td>{{ $product->client_mobile }}</td>
                            <td>{{ $product->client_gmail }}</td>
                            <td>{{ $product->project_name }}</td>
                            <td>{{ $product->renewal_status }}</td>
                            <td>{{ $product->renewal_date }}</td>
                            <td>{{ $product->renewal_amount }}</td>
                            

                        
                             
                            <td>
                             <a href="{{ route('products.view', $product->id) }}" class="btn btn-sm btn-primary">
                                 View
                             </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>

{{-- 🔹 JS: Search, CSV, Print --}}
<script>
    document.getElementById('productSearch').addEventListener('keyup', function() {
        let value = this.value.toLowerCase();
        let rows = document.querySelectorAll('#productsTable tbody tr');
        rows.forEach(row => {
            row.style.display = row.innerText.toLowerCase().includes(value) ? '' : 'none';
        });
    });

    document.getElementById('exportCsvBtn').addEventListener('click', function() {
        let table = document.getElementById('productsTable');
        let csv = [];
        for (let row of table.rows) {
            let cols = [...row.cells].map(cell => `"${cell.innerText}"`);
            csv.push(cols.join(','));
        }
        let blob = new Blob([csv.join('\n')], { type: 'text/csv' });
        let link = document.createElement('a');
        link.href = URL.createObjectURL(blob);
        link.download = '{{ $categorySlug }}-products-reports.csv';
        link.click();
    });

    document.getElementById('printPdfBtn').addEventListener('click', function() {
        window.print();
    });
</script>
@endsection
