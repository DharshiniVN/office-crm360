<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Accounts & Billing</title>
  <link rel="stylesheet" href="{{ asset('dashboard-ui/css/styles.css') }}">
<link rel="stylesheet" href="{{ asset('dashboard-ui/css/mobile-responsive.css') }}">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <div class="layout">

    <aside class="sidebar">
      <div class="brand">
        <div class="logo">A</div>
        <div class="title">Accounts</div>
      </div>
      <div class="nav">
        <div class="section-title">Menu</div>
        <a href="{{ url('/') }}"><span>📁</span><span class="text">Dashboard</span></a>
<a href="{{ url('/website') }}"><span>📁</span><span class="text">Website & Applications</span></a>
<a href="{{ url('/products') }}"><span>📁</span><span class="text">Products</span></a>
<a href="{{ url('/digital-marketing') }}"><span>📁</span><span class="text">Digital Marketing</span></a>
<a href="{{ url('/graphics') }}"><span>📁</span><span class="text">Graphics</span></a>
<a href="{{ url('/renewal') }}"><span>📁</span><span class="text">Renewal</span></a>
<a href="{{ url('/account-billing') }}" class="active"><span>📁</span><span class="text">Account and Billing</span></a>
<a href="{{ url('/hosting-servers') }}"><span>📁</span><span class="text">Hosting and Servers</span></a>
<a href="{{ url('/special-features') }}"><span>📁</span><span class="text">Special Features</span></a>
      </div>
    </aside>

    <main class="content">
      <div class="topbar">
        <div class="hamburger-menu">☰</div>
        <div class="h1">Accounts & Billing</div>
      </div>

      <div style="margin-bottom: 20px;">
        <button class="btn ghost">Total Revenue</button>
        <button class="btn ghost">GST Report</button>
        <button class="btn ghost">Proforma Invoice</button>
        <button class="btn ghost">Invoice</button>
        <button class="btn ghost">Send Payment Link</button>
      </div>

      <div class="cards">
        <div class="card" style="background: linear-gradient(90deg, #a1c4fd, #c2e9fb);">
        <div class="label">Total Revenue</div>
        <div id="total-revenue-amount" class="count" style="font-size: 32px; font-weight: 900;">$0.00</div>
        </div>
        <div class="card" style="background: #fde3b9;">
          <div class="label">Pending Payments</div>
          <div id="pending-payments-count" class="count" style="font-size: 32px; font-weight: 900;">0</div>
        </div>
        <div class="card" style="background: #d9f0e1;">
          <div class="label">Advance Payments</div>
          <div class="count" style="font-size: 32px; font-weight: 900;">$5,000</div>
        </div>
      </div>

      <section style="margin-bottom: 30px;">
        <div class="section-header">
          <h2>Invoices Report</h2>
        </div>
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
            <tbody id="invoice-table-body">
              <!-- Invoice data will be dynamically loaded here -->
            </tbody>
          </table>
        </div>
      </section>

      <section style="margin-bottom: 30px;">
        <div class="section-header">
          <h2>Payments Report</h2>
        </div>
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
              <tr>
                <td>PAY-001</td>
                <td>Acme Corp</td>
                <td>Bank Transfer</td>
                <td>$5,000</td>
                <td><span style="background:#d9f0e1; color:#065f46; padding: 4px 8px; border-radius: 8px; font-weight: 600;">Success</span></td>
              </tr>
              <tr>
                <td>PAY-002</td>
                <td>Globex Inc.</td>
                <td>Credit Card</td>
                <td>$2,000</td>
                <td><span style="background:#fde3b9; color:#92400e; padding: 4px 8px; border-radius: 8px; font-weight: 600;">Failed</span></td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>

      <div style="display: flex; gap: 40px; margin-bottom: 30px;">
        <div style="flex: 1; background: #fff; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,.06); padding: 5px;">
          <h3 style="margin-top: 0; margin-bottom: 12px;">Revenue vs. Expenses</h3>
          <canvas id="revenueExpensesChart" height="150"></canvas>
        </div>
        <div style="flex: 1; background: #fff; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,.06); padding: 5px;">
          <h3 style="margin-top: 0; margin-bottom: 12px;">Proforma Invoice Status</h3>
          <canvas id="invoiceStatusChart" height="150"></canvas>
          <div style="display: flex; justify-content: space-around; margin-top: 12px;">
            <div><span style="display:inline-block; width: 12px; height: 12px; background: #fbbf24; border-radius: 50%; margin-right: 6px;"></span>Pending</div>
            <div><span style="display:inline-block; width: 12px; height: 12px; background: #10b981; border-radius: 50%; margin-right: 6px;"></span>Accepted</div>
            <div><span style="display:inline-block; width: 12px; height: 12px; background: #ef4444; border-radius: 50%; margin-right: 6px;"></span>Rejected</div>
          </div>
        </div>
      </div>

    </main>
  </div>
  <script src="{{ asset('dashboard-ui/js/app.js') }}"></script>
<script src="{{ asset('dashboard-ui/js/account-billing.js') }}"></script>
</body>
</html>
