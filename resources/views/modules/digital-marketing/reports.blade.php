<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Digital Marketing Reports</title>
  <link rel="stylesheet" href="{{ asset('dashboard-ui/css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('dashboard-ui/css/mobile-responsive.css') }}">
  <style>
    @media print {
      .layout { display: block !important; }
      .sidebar, .topbar, .table-actions, .actions { display: none !important; }
      .content { margin: 0 !important; padding: 20px !important; display: block !important; }
      .table-wrap { page-break-inside: avoid; overflow: visible !important; }
      .table-wrap > div { overflow: visible !important; }
      .table { width: 100% !important; border-collapse: collapse !important; display: table !important; }
      .table th, .table td { border: 1px solid #000 !important; padding: 8px !important; }
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
        <a href="{{ url('/digital-marketing') }}" class="active"><span>📁</span><span class="text">Digital Marketing</span></a>
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
        <div class="h1">Digital Marketing Reports</div>
        <div class="actions"><a class="btn" href="{{ url('/digital-marketing') }}">◀ Back</a></div>
      </div>

      <h3>All Campaigns</h3>
      <section class="table-wrap">
        <div class="table-actions">
          <input id="search1" class="search" placeholder="Search campaigns..." />
          <button class="btn" onclick="setTimeout(() => window.print(), 100)">Print / Save PDF</button>
        </div>
        <div style="overflow:auto">
          <table class="table">
            <thead>
              <tr>
                <th>Sr No</th>
                <th>Client Name</th>
                <th>Project Name</th>
                <th>Client Mobile</th>
                <th>Client Gmail ID</th>
                <th>View</th>
              </tr>
            </thead>
            <tbody>
              @forelse($campaigns as $index => $c)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $c->clientName }}</td>
                <td>{{ $c->projectName }}</td>
                <td>{{ $c->clientMob }}</td>
                <td>{{ $c->clientGmailID }}</td>
                <td><a href="{{ url('/digital-marketing/view/'.$c->id) }}" class="btn">View</a></td>
              </tr>
              @empty
              <tr><td colspan="6">No campaigns found</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </section>

      <h3>Active Campaigns</h3>
      <section class="table-wrap">
        <div class="table-actions">
          <input id="search2" class="search" placeholder="Search active campaigns..." />
          <button class="btn" onclick="setTimeout(() => window.print(), 100)">Print / Save PDF</button>
        </div>
        <div style="overflow:auto">
          <table class="table">
            <thead>
              <tr>
                <th>Sr No</th>
                <th>Client Name</th>
                <th>Project Name</th>
                <th>Client Mobile</th>
                <th>Client Gmail ID</th>
                <th>View</th>
              </tr>
            </thead>
            <tbody>
              @forelse($activeCampaigns as $index => $c)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $c->clientName }}</td>
                <td>{{ $c->projectName }}</td>
                <td>{{ $c->clientMob }}</td>
                <td>{{ $c->clientGmailID }}</td>
                <td><a href="{{ url('/digital-marketing/view/'.$c->id) }}" class="btn">View</a></td>
              </tr>
              @empty
              <tr><td colspan="6">No active campaigns</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </section>

      <h3>Renewals Due</h3>
      <section class="table-wrap">
        <div class="table-actions">
          <input id="search3" class="search" placeholder="Search renewals due..." />
          <button class="btn" onclick="setTimeout(() => window.print(), 100)">Print / Save PDF</button>
        </div>
        <div style="overflow:auto">
          <table class="table">
            <thead>
              <tr>
                <th>Sr No</th>
                <th>Client Name</th>
                <th>Project Name</th>
                <th>Client Mobile</th>
                <th>Client Gmail ID</th>
              </tr>
            </thead>
            <tbody>
              @forelse($renewalsDue as $index => $r)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $r->clientName }}</td>
                <td>{{ $r->projectName }}</td>
                <td>{{ $r->clientMob }}</td>
                <td>{{ $r->clientGmailID }}</td>
              </tr>
              @empty
              <tr><td colspan="5">No renewals due</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </section>
    </main>
  </div>

  <script src="{{ asset('dashboard-ui/js/app.js') }}"></script>
</body>
</html>