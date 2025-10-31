<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Income & Expense Reports</title>
  <link rel="stylesheet" href="{{ asset('dashboard-ui/css/styles.css') }}">

  <style>
    @media print {
      .layout { display: block !important; }
      .sidebar, .topbar, .table-actions, .actions { display: none !important; }
      .content { margin: 0 !important; padding: 20px !important; display: block !important; }
      .table-wrap { page-break-inside: avoid; overflow: visible !important; }
      .table-wrap > div { overflow: visible !important; }
      .table { width: 100% !important; border-collapse: collapse !important; display: table !important; }
      .table th, .table td { border: 1px solid #000 !important; padding: 8px !important; }
      .modal { display: none; }
      body { font-size: 12px !important; }
      * { box-sizing: border-box !important; }
    }
  </style>
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
        <div class="h1">Income & Expense Reports</div>
        <div class="actions"><a class="btn" href="index.html" style="position: fixed; right: 20px; top: 20px; z-index: 1000;">◀ Back</a></div>
      </div>

      <section class="table-wrap">
        <div class="table-actions">
          <input id="search" class="search" placeholder="Search entries..." />
          <div>
            <button class="btn" id="export">Export CSV</button>
            <button class="btn" onclick="setTimeout(() => window.print(), 100)">Print / Save PDF</button>
          </div>
        </div>
        <div style="overflow-x:auto;">
          <table class="table" id="table"></table>
        </div>
      </section>
    </main>
  </div>

  <div class="modal" id="editModal">
    <div class="dialog">
      <div class="title">Edit Entry</div>
      <form class="form" id="editForm"></form>
      <div class="actions">
        <button class="btn" onclick="document.getElementById('editModal').classList.remove('open')">Cancel</button>
        <button class="btn primary" id="saveEdit">Save</button>
      </div>
    </div>
  </div>

  <script src="{{ asset('dashboard-ui/js/reports.js') }}"></script>

</html>
