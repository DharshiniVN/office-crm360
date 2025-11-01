@extends('layouts.app')

@section('title', 'Update Sample Data')

@section('content')
    <div class="container mt-5">
        <h1>Updating Sample Data...</h1>
        <p>This page will update your localStorage with the new 20-entry sample data.</p>
        <div id="status">Loading...</div>
    </div>
@endsection

@push('scripts')
<script>
    function updateData() {
        try {
            // Clear old data
            localStorage.removeItem('accounts_wa_data');
            localStorage.removeItem('accounts_products_data');
            localStorage.removeItem('accounts_dm_data');
            localStorage.removeItem('accounts_graphics_data');

            // Show success message with link to dashboard
            document.getElementById('status').innerHTML = 
                'Data cleared successfully! <a href="{{ url("/") }}">Click here to go back to the dashboard</a> and refresh to see the new data.';
        } catch (error) {
            document.getElementById('status').innerHTML = 'Error updating data: ' + error.message;
        }
    }

    // Run update when page loads
    window.onload = updateData;
</script>
@endpush
