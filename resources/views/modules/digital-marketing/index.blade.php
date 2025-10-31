<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Digital Marketing</title>
  <link rel="stylesheet" href="{{ asset('dashboard-ui/css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('dashboard-ui/css/mobile-responsive.css') }}">
  <style>
  .dm-grid {
    display: flex;
    gap: 20px;
    margin-top: 40px;
    flex-wrap: wrap;
    justify-content: center;
  }

  .dm-grid .card {
    position: relative;
    flex: 1;
    min-width: 250px;
    max-width: 280px;
    border-radius: 16px;
    padding: 25px 20px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    color: #1e1e2d;
    text-align: left;
    transition: all 0.3s ease;
  }

  .dm-grid .card:hover {
    transform: translateY(-5px);
  }

  /* Background colors */
  .blue { background-color: #e4eeff; }
  .green { background-color: #e6f9eb; }
  .yellow { background-color: #fff7d9; }
  .pink { background-color: #ffe5e5; }

  /* Card Title */
  .dm-grid .card h3 {
    font-size: 18px;
    font-weight: 700;
    margin-top: 30px;
    margin-bottom: 10px;
  }

  /* Count and renewals */
  .dm-grid .count {
    font-size: 28px;
    font-weight: bold;
    margin-bottom: 6px;
  }

  .dm-grid .muted {
    color: #555;
    font-size: 14px;
  }

  /* Open button at top right */
  .dm-grid .open-btn {
    position: absolute;
    top: 12px;
    right: 16px;
    background: #f3f3f3;
    border: none;
    border-radius: 20px;
    font-size: 13px;
    padding: 6px 12px;
    cursor: pointer;
    color: #333;
    transition: background 0.2s ease;
  }

  .dm-grid .open-btn:hover {
    background: #e0e0e0;
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
        <a href="{{ url('/') }}">📁 Dashboard</a>
        <a href="{{ url('/website') }}">📁 Website & Applications</a>
        <a href="{{ url('/products') }}">📁 Products</a>
        <a href="{{ url('/digital-marketing') }}" class="active">📁 Digital Marketing</a>
        <a href="{{ url('/graphics') }}">📁 Graphics</a>
        <a href="{{ url('/renewal') }}">📁 Renewal</a>
        <a href="{{ url('/account-billing') }}">📁 Account and Billing</a>
        <a href="{{ url('/hosting-servers') }}">📁 Hosting and Servers</a>
        <a href="{{ url('/special-features') }}">📁 Special Features</a>
      </div>
    </aside>

    <main class="content">
      <div class="topbar">
        <div class="h1">Digital Marketing</div>
        <a class="btn primary" href="{{ url('/digital-marketing/add') }}">+ Add Campaign</a>
      </div>

      <div class="dm-grid">
        <div class="card blue">
          <h3>SEO</h3>
          <div class="count">{{ $seoCount }}</div>
          <div class="muted">Renewals: {{ $seoRenewals }}</div>
          <a href="{{ url('/digital-marketing/reports?type=seo') }}" class="open-btn">Open</a>

        </div>

        <div class="card green">
          <h3>Add Campaign</h3>
          <div class="count">{{ $addCount }}</div>
          <div class="muted">Renewals: {{ $addRenewals }}</div>
          <a href="{{ url('/digital-marketing/reports?type=seo') }}" class="open-btn">Open</a>

        </div>

        <div class="card yellow">
          <h3>Social Media Marketing</h3>
          <div class="count">{{ $socialCount }}</div>
          <div class="muted">Renewals: {{ $socialRenewals }}</div>
          <a href="{{ url('/digital-marketing/reports?type=seo') }}" class="open-btn">Open</a>

        </div>

        <div class="card pink">
          <h3>SEO + Add + Social</h3>
          <div class="count">{{ $comboCount }}</div>
          <div class="muted">Renewals: {{ $comboRenewals }}</div>
          <a href="{{ url('/digital-marketing/reports?type=seo') }}" class="open-btn">Open</a>

        </div>
      </div>
    </main>
  </div>
</body>
</html>
