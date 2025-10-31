<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'Accounts')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        
        <a href="{{ url('/dashboard') }}"><span>📁</span><span class="text">Dashboard</span></a>
        <a href="{{ url('/website') }}"><span>📁</span><span class="text">Website & Applications</span></a>
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
        <div class="h1">@yield('title', 'Accounts')</div>
        <div class="actions">
          <a class="btn" href="{{ url()->previous() }}">◀ Back</a>
        </div>
      </div>

      <section class="main-content" style="padding: 20px;">
        @yield('content')
      </section>
    </main>
  </div>

  <script src="{{ asset('dashboard-ui/js/app.js') }}"></script>
</body>
</html>