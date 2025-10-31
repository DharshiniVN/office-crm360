<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Hosting and Servers</title>
  <link rel="stylesheet" href="{{ asset('dashboard-ui/css/styles.css') }}">

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
<a href="{{ url('/account-billing') }}"><span>📁</span><span class="text">Account and Billing</span></a>
<a href="{{ url('/hosting-servers') }}" class="active"><span>📁</span><span class="text">Hosting and Servers</span></a>
<a href="{{ url('/special-features') }}"><span>📁</span><span class="text">Special Features</span></a>
      </div>
    </aside>

    <main class="content">
      <div class="topbar">
        <div class="h1">Hosting and Servers</div>
      </div>
<div class="cards-grid">
  <div class="card domains" style="cursor: pointer;">
    <div class="label">Total Domains</div>
    <div class="count">{{ $totalDomains ?? '0' }}/{{ $activeDomains ?? '0' }}</div>
  </div>

  <div class="card servers" style="cursor: pointer;">
    <div class="label">Servers Active</div>
    <div class="count">{{ $totalServers ?? '0' }}/{{ $activeServers ?? '0' }}</div>
  </div>

  <div class="card emails" style="cursor: pointer;">
    <div class="label">Official Emails</div>
    <div class="count">{{ $totalEmails ?? '0' }}/{{ $activeEmails ?? '0' }}</div>
  </div>

  <div class="card expiries" style="cursor: pointer;">
    <div class="label">Upcoming Expiries</div>
    <div class="count">{{ $upcomingExpiries ?? '0' }}</div>
  </div>
</div>


    </main>
  </div>
  <script src="{{ asset('dashboard-ui/js/hosting-servers.js') }}"></script>
<script src="{{ asset('dashboard-ui/js/hosting-servers.js') }}"></script>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('.card.domains')?.addEventListener('click', () => {
      window.location.href = "{{ url('/hosting-servers/details') }}?type=domains";
    });

    document.querySelector('.card.servers')?.addEventListener('click', () => {
      window.location.href = "{{ url('/hosting-servers/details') }}?type=servers";
    });

    document.querySelector('.card.emails')?.addEventListener('click', () => {
      window.location.href = "{{ url('/hosting-servers/details') }}?type=emails";
    });

    document.querySelector('.card.expiries')?.addEventListener('click', () => {
      window.location.href = "{{ url('/hosting-servers/details') }}?type=expiries";
    });
  });
</script>


</html>
