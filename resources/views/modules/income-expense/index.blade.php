<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Income & Expense</title>
  <link rel="stylesheet" href="{{ asset('dashboard-ui/css/styles.css') }}">
<link rel="stylesheet" href="{{ asset('dashboard-ui/css/mobile-responsive.css') }}">
</head>
<body>
  <div class="layout">
    
    <aside class="sidebar">
      <!-- Updated sidebar menu -->
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
      <div class="topbar income-expense-topbar">
        <div class="hamburger-menu">☰</div>
        <div class="h1">Income & Expense</div>
        <div class="topbar-buttons">
          <button class="btn" onclick="window.location.href='../account-billing/index.html'">Back</button>
          <button class="btn primary" id="add-income-expense-btn">+ Add Income/Expense</button>
        </div>
      </div>

      <div class="panel" style="background:var(--brand-2)">
        <div style="display:flex;align-items:center;gap:16px">
          <div style="font-size:42px">💰</div>
          <div>
            <div style="font-weight:800;font-size:24px">Financial Tracking</div>
            <div class="muted">Track income and expenses for better financial management</div>
          </div>
        </div>
      </div>

      <div class="cards" id="income-expense-cards" style="margin-top: 20px;">
        <!-- cards will be injected by JS -->
      </div>
    </main>
  </div>
  <script src="{{ asset('dashboard-ui/js/app.js') }}"></script>
<script src="{{ asset('dashboard-ui/js/income-expense.js') }}"></script>
</body>
</html>
