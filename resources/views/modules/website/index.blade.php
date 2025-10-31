<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Website & Applications</title>
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
<a href="{{ url('/website') }}" class="active"><span>📁</span><span class="text">Website & Applications</span></a>
<a href="{{ url('/products') }}"><span>📁</span><span class="text">Products</span></a>
<a href="{{ url('/digital-marketing') }}"><span>📁</span><span class="text">Digital Marketing</span></a>
<a href="{{ url('/graphics') }}"><span>📁</span><span class="text">Graphics</span></a>
<a href="{{ url('/renewal') }}"><span>📁</span><span class="text">Renewal</span></a>
<a href="{{ url('/account-billing') }}"><span>📁</span><span class="text">Account and Billing</span></a>
<a href="{{ url('/hosting-servers') }}"><span>📁</span><span class="text">Hosting and Servers</span></a>
<a href="{{ url('/special-features') }}"><span>📁</span><span class="text">Special Features</span></a>
        </div>
      </aside>
      
      <main class="content">
        <div class="topbar">
          <div class="hamburger-menu">☰</div>
          <div class="h1">Website & Application Development</div>
          <div class="actions"><a class="btn primary" href="{{ url('/website/add') }}">+ Add Details</a></div>
        </div>
      <div class="cards" id="wa-cards">
        <!-- cards injected by JS -->
      </div>
    </main>
  </div>
  <script>
  window.accountsFromLaravel = @json($accounts);
  localStorage.setItem('accounts_wa_data', JSON.stringify(window.accountsFromLaravel));
</script>
  <<script src="{{ asset('dashboard-ui/js/app.js') }}"></script>
<script src="{{ asset('dashboard-ui/js/website.js') }}"></script>
</body>
</html>
