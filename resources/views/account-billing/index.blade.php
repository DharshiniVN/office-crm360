<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Accounts & Billing</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/mobile-responsive.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<div class="layout">
    @include('layouts.app') {{-- Reusable sidebar --}}

    <main class="content">

        <div class="topbar">
            <div class="hamburger-menu">☰</div>
            <div class="h1">Accounts & Billing</div>
        </div>

<div style="margin-bottom: 20px;">
    <a href="{{ route('account-billing.finance') }}" class="btn ghost">Total Revenue</a>
    <a href="{{ route('account-billing.gst-report') }}" class="btn ghost">GST Report</a>
    <a href="{{ route('account-billing.proforma') }}" class="btn ghost">Proforma Invoice</a>
    <a href="{{ route('account-billing.invoice') }}" class="btn ghost">Invoice</a>
    <a href="#" class="btn ghost" onclick="alert('Payment link sent successfully!')">Send Payment Link</a>

    <script>
function sendPaymentLink() {
    alert("Payment link sent successfully!");
}
</script>
</div>


        <div class="cards">
            <div class="card" style="background: linear-gradient(90deg, #a1c4fd, #c2e9fb);">
                <div class="label">Total Revenue</div>
                <div class="count" style="font-size: 32px; font-weight: 900;">
                    ₹{{ number_format($totalRevenue, 2) }}
                </div>
            </div>

            <div class="card" style="background: #fde3b9;">
                <div class="label">Pending Payments</div>
                <div class="count" style="font-size: 32px; font-weight: 900;">
                    {{ $pendingPayments }}
                </div>
            </div>

            <div class="card" style="background: #d9f0e1;">
                <div class="label">Advance Payments</div>
                <div class="count" style="font-size: 32px; font-weight: 900;">
                    ₹{{ number_format($advancePayments, 2) }}
                </div>
            </div>
        </div>

        {{-- Invoices Table --}}
        <section style="margin-bottom: 30px;">
            <div class="section-header"><h2>Invoices Report</h2></div>
            <div class="table-wrap">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Invoice No</th>
                            <th>Client Name</th>
                            <th>Service Type</th>
                            <th>Amount</th>
                            <th>Due Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($invoices as $item)
                        <tr>
                            <td>{{ $item->invoice_no }}</td>
                            <td>{{ $item->client_name }}</td>
                            <td>{{ $item->service_type }}</td>
                            <td>₹{{ number_format($item->total_amount,2) }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->due_date)->format('d-m-Y') }}</td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="text-center">No data found</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>

        {{-- Payments Table --}}
        <section style="margin-bottom: 30px;">
            <div class="section-header"><h2>Payments Report</h2></div>
            <div class="table-wrap">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Payment ID</th>
                            <th>Client Name</th>
                            <th>Mode of Payment</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($payments as $pay)
                        <tr>
                            <td>PAY-{{ $pay->id }}</td>
                            <td>{{ $pay->client_name }}</td>
                            <td>{{ $pay->payment_mode }}</td>
                            <td>₹{{ number_format($pay->total_amount, 2) }}</td>
                            <td>
                                <span class="status {{ $pay->payment_status }}">
                                    {{ ucfirst($pay->payment_status) }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="text-center">No payments found</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</div>

<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('assets/js/account-billing.js') }}"></script>

</body>
</html>
