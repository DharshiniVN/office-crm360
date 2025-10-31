<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>GST</title>
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

    <main class="content" style="max-width: 1200px; width: 100%;">
      <div class="topbar" style="margin-bottom: 20px;">
        <div class="hamburger-menu">☰</div>
        <div class="h1">GST Management</div>
        <div class="actions">
          <button class="btn">Back</button>
        </div>
      </div>

      <div class="panel" style="background:var(--accent-4); margin-bottom: 20px;">
        <div style="display:flex;align-items:center;gap:16px">
          <div style="font-size:42px">🏛️</div>
          <div>
            <div style="font-weight:800;font-size:24px">GST Compliance</div>
            <div class="muted">GST filing and tax compliance management</div>
          </div>
        </div>
      </div>

      <div class="cards" id="gst-cards">
        <!-- cards will be injected by JS -->
      </div>
    </main>
  </div>
  <script src="../assets/js/gst.js"></script>
</body>
</html>
