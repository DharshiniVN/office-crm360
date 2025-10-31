<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Add Income/Expense</title>
  <link rel="stylesheet" href="{{ asset('dashboard-ui/css/styles.css') }}">
<link rel="stylesheet" href="{{ asset('dashboard-ui/css/mobile-responsive.css') }}">
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
        <div class="h1">Add Income/Expense</div>
        <div class="topbar-buttons">
          <a href="index.html" class="btn">Back</a>
        </div>
      </div>

      <div class="panel" style="background:var(--brand-2)">
        <div style="display:flex;align-items:center;gap:16px">
          <div style="font-size:42px">💰</div>
          <div>
            <div style="font-weight:800;font-size:24px">Add New Entry</div>
            <div class="muted">Add a new income or expense entry</div>
          </div>
        </div>
      </div>

      <div id="income-expense-form-container" class="form-container" style="margin-top: 20px;"></div>
    </main>
  </div>
  <script src="{{ asset('dashboard-ui/js/app.js') }}"></script>
<script src="{{ asset('dashboard-ui/js/add-income-expense.js') }}"></script>
</body>
</html>
