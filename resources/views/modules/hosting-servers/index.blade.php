<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Hosting & Servers Dashboard</title>
<link rel="stylesheet" href="{{ asset('dashboard-ui/css/styles.css') }}">
<link rel="stylesheet" href="{{ asset('dashboard-ui/css/mobile-responsive.css') }}">
<style>
/* --- Design system variables --- */
:root {
  --font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  --bg-color: #f8f9fa;
  --container-bg: #ffffff;
  --text-primary: #1e293b;
  --text-secondary: #64748b;
  --border-radius-lg: 20px;
  --border-radius-md: 12px;
  --border-radius-sm: 8px;
  --box-shadow: 0 12px 35px -10px rgba(0, 0, 0, 0.1);

  /* Color Palette */
  --blue-100: #e0f2fe;
  --blue-200: #c7defb;
  --blue-500: #5a9bf7;
  --blue-900: #1a4d8f;

  --green-100: #dcfce7;
  --green-200: #d7f0e5;
  --green-500: #4ac4a1;
  --green-900: #3c6e52;

  --yellow-100: #fffbeb;
  --yellow-200: #ffeda7;
  --yellow-500: #f5a623;

  --purple-100: #ede9fe;
  --purple-200: #c7c8fc;
  --purple-500: #a78bfa;
  --purple-900: #3e3fa8;
  --purple-text: #5056a9;

  --red-100: #fee2e2;
  --red-200: #ffccd3;
  --red-500: #d33150;
  --red-text: #bf636e;
}

/* --- Global styles --- */
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}





h1 {
  font-size: 1.8rem;
  font-weight: 900;
}

h2 {
  font-size: 1.4rem;
  font-weight: 900;
  margin-bottom: 1rem;
}

h3 {
  font-size: 1.1rem;
  font-weight: 600;
  margin-bottom: 0.7rem;
}

/* --- Header section --- */
.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  gap: 1rem;
  margin-bottom: 1.5rem;
}

.header-buttons {
  display: flex;
  gap: 0.7rem;
  flex-wrap: wrap;
  justify-content: flex-end;
}

.header-buttons button {
  padding: 0.5em 1.2em;
  font-weight: 600;
  border-radius: var(--border-radius-sm);
  border: none;
  cursor: pointer;
  background: rgb(237,238,255);
  color: rgb(95,98,116);
  transition: background 0.3s ease;
}

.header-buttons .compance {
  background: rgb(255,241,244);
  color: rgb(168,81,102);
}

/* --- Search bar --- */
.search-bar {
  display: flex;
  align-items: center;
  gap: 0.7rem;
  background-color: rgb(254,242,244);
  color:rgb(33,28,32);
  padding: 0.7rem 1.2rem;
  border-radius: var(--border-radius-md);
  font-weight: 600;
  margin-bottom: 2rem;
}

/* --- Summary cards --- */
.summary-cards {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 1rem;
  margin-bottom: 2rem;
}

.card {
  border-radius: var(--border-radius-lg);
  padding: 1.5rem;
  display: flex;
  align-items: center;
  justify-content: space-between;
  font-weight: 700;
  gap: 1rem;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.card:hover {
  background-color: rgba(0, 0, 0, 0.05);
}

.card .icon {
  width: 2.6rem;
  height: 2.6rem;
  border-radius: var(--border-radius-sm);
  display: grid;
  place-items: center;
  font-size: 1.5rem;
  color: white;
}

.card-content .title {
  font-size: 1rem;
  font-weight: 600;
  color: var(--text-primary);
}

.card-content .value {
  font-size: 2.1rem;
  font-weight: 700;
}

/* Specific card colors */
.card.domains { background: rgb(212,240,255); }
.card.domains .icon { background: rgb(60,154,238); }

.card.servers { background: rgb(212,240,255); }
.card.servers .icon { background: rgb(60,173,153); }

.card.emails { background: rgb(255,235,184); }
.card.emails .icon { background: rgb(246,177,64); }

.card.expiries { background: rgb(217,211,255); }
.card.expiries .icon { background: rgb(149,136,229); }

/* --- Main content grid --- */
.main-content {
  display: grid;
  grid-template-columns: 3fr 1fr;
  gap: 2rem;
}

.left-panel {
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
}

.right-panel {
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
}

/* Domain table */
.domain-table {
  background-color: var(--blue-200);
  padding: 1.5rem;
  border-radius: var(--border-radius-lg);
}

.table-header,
.table-row {
  display: grid;
  grid-template-columns: 1.5fr 1fr 1fr;
  font-size: 0.9rem;
  gap: 1.5rem;
}

.table-header {
  font-weight: 600;
  color: var(--blue-500);
  margin-bottom: 1rem;
}

.table-row {
  font-weight: 500;
  color: var(--text-primary);
  margin-bottom: 0.75rem;
}

/* Email accounts section */
.email-accounts-section {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 1.5rem;
}

.email-card {
  border-radius: var(--border-radius-lg);
  padding: 1.5rem;
}

.email-card.blue { background-color: var(--blue-200); }
.email-card.green { background-color: var(--green-200); }

.email-item {
  display: flex;
  justify-content: space-between;
  font-size: 0.95rem;
  color: var(--text-secondary);
}

.email-item:not(:last-child) {
  margin-bottom: 0.5rem;
}

/* Renewal chart */
.renewal-chart {
  background-color: var(--purple-200);
  padding: 1.5rem;
  border-radius: var(--border-radius-lg);
}

.renewal-chart h3 {
  color: var(--text-primary);
}

.chart-svg {
  width: 100%;
  height: 100px;
}

/* Right-panel boxes */
.box {
  border-radius: var(--border-radius-lg);
  padding: 1.5rem;
}

.box h3 {
  margin-bottom: 0.75rem;
}

.box ul {
  list-style: none;
}

.box ul li {
  font-size: 0.9rem;
  font-weight: 500;
  margin-bottom: 0.5rem;
  display: flex;
  align-items: center;
  gap: 0.5rem;
}

.box ul li::before {
  content: "•";
  font-size: 1.2rem;
}

.analytics-box {
  background-color: rgb(254,241,244);
  color: rgb(85,81,86);
}

.analytics-box ul li::before {
  color: var(--red-text);
}

.tasks-box {
  background-color: rgb(234,234,255);
  color: rgb(85,81,86);
}

.tasks-box ul li::before {
  color: var(--purple-text);
}

/* --- Action buttons --- */
.actions-panel {
  display: flex;
  gap: 1rem;
  flex-wrap: wrap;
  margin-top: 1.5rem;
  justify-content: flex-end;
}

.action-btn {
  font-weight: 600;
  padding: 0.75rem 1.5rem;
  border-radius: var(--border-radius-sm);
  border: none;
  cursor: pointer;
}

.btn-renew {
  background-color: rgb(229,246,245);
  color: rgb(29,45,36);
}

.btn-upgrade {
  background-color: rgb(230,242,253);
  color: rgb(29,45,36);
}

.btn-anned {
  background-color: rgb(233,237,255);
  color:  rgb(29,45,36);
}

/* Responsive design handled in mobile-responsive.css */
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
<a href="{{ url('/dashboard') }}">
  <span>📁</span><span class="text">Dashboard</span>
</a>
<a href="{{ url('/website') }}">
  <span>📁</span><span class="text">Website & Applications</span>
</a>
<a href="{{ url('/products') }}">
  <span>📁</span><span class="text">Products</span>
</a>
<a href="{{ url('/digital-marketing') }}">
  <span>📁</span><span class="text">Digital Marketing</span>
</a>
<a href="{{ url('/graphics') }}">
  <span>📁</span><span class="text">Graphics</span>
</a>
<a href="{{ url('/renewal') }}">
  <span>📁</span><span class="text">Renewal</span>
</a>
<a href="{{ url('/account-billing') }}">
  <span>📁</span><span class="text">Account and Billing</span>
</a>
<a href="{{ url('/hosting-servers') }}" class="active">
  <span>📁</span><span class="text">Hosting and Servers</span>
</a>
<a href="{{ url('/special-features') }}">
  <span>📁</span><span class="text">Special Features</span>
</a>
  </aside>
  <main class="content">
    <!-- HEADER -->
    <div class="topbar">
      <div class="hamburger-menu">☰</div>
      <div class="user">
        <div class="avatar"></div>
        <div>John Doe</div>
      </div>
    </div>

    <div class="container" role="main" aria-label="Hosting and Servers Dashboard">
    <div class="header">
      <h1>Hosting & Servers</h1>
      <div class="header-buttons" role="region" aria-label="Main actions">
        <button id="addDomainBtn" type="button" aria-label="Add Domain">+ Add Domain</button>
        <button id="addServerBtn" type="button" aria-label="Add Server">+ Add Server</button>
        <button id="setupEmailBtn" type="button" aria-label="Setup Email">Setup Email</button>
        <button type="button" class="compance" aria-label="Compliance">👋 Compance</button>
      </div>
    </div>

    <div class="search-bar" role="search" aria-live="polite" aria-atomic="true">
      🔍 Expiring Domains • Server Renewal • Email Accounts Reaching Limit
    </div>

   <section class="summary-cards" aria-label="Summary statistics">
  <div class="card domains" role="region" aria-labelledby="domains-title">
    <div class="icon" aria-hidden="true">🔗</div>
    <div class="card-content">
      <div class="title" id="domains-title">Total Domains</div>
      <div class="value">{{ $totalDomains }}/{{ $activeDomains }}</div>
    </div>
  </div>

  <div class="card servers" role="region" aria-labelledby="servers-title">
    <div class="icon" aria-hidden="true">📊</div>
    <div class="card-content">
      <div class="title" id="servers-title">Servers Active</div>
      <div class="value">{{ $totalServers }}/{{ $activeServers }}</div>
    </div>
  </div>

  <div class="card emails" role="region" aria-labelledby="emails-title">
    <div class="icon" aria-hidden="true">📩</div>
    <div class="card-content">
      <div class="title" id="emails-title">Official Emails</div>
      <div class="value">{{ $totalEmails }}/{{ $activeEmails }}</div>
    </div>
  </div>

  <div class="card expiries" role="region" aria-labelledby="expiries-title">
    <div class="icon" aria-hidden="true">📅</div>
    <div class="card-content">
      <div class="title" id="expiries-title">Upcoming Expiries</div>
      <div class="value">{{ $upcomingExpiries }}</div>
    </div>
  </div>
</section>    
<section class="main-content" aria-label="Hosting and Servers Details">
      <div class="left-panel">
        <div class="domain-table">
          <h2>Hosting & Servers</h2>
          <div class="table-header">
            <span>Domain Booking</span>
            <span>Server Details</span>
            <span>Server Expiry</span>
          </div>
          @foreach($latestThree as $item)
  <div class="table-row">
    <span>{{ $item->domain_name }} {{ \Carbon\Carbon::parse($item->renewal_date)->format('M d, Y') }}</span>
    <span>{{ $item->server ?? 'N/A' }} ₹{{ number_format($item->server_cost ?? 0) }} / mo</span>
    <span>{{ \Carbon\Carbon::parse($item->renewal_date)->format('M d, Y') }}</span>
  </div>
@endforeach
          <div class="table-row">
            <span>mywebsite.com Sat, Aug 10, 2024</span>
            <span>Paid $60 / mo</span>
            <span>Paid Shared Sep 10, 2..</span>
          </div>
          <div class="table-row">
            <span>mysite.net Tue, Nov 12, 2024</span>
            <span>Hios $30 / 224</span>
            <span>Renewal</span>
          </div>
        </div>

        <div class="email-accounts-section">
          <div class="email-card blue">
            <h3>Official Email Accounts</h3>
            <div class="email-item"><span>Free</span><span>{{ $freeEmails }}</span></div>
<div class="email-item"><span>Paid</span><span>{{ $paidEmails }}</span></div>
          </div>
          <div class="email-card green">
            <h3>Official Email Accounts</h3>
           <div class="email-item"><span>Free</span><span>{{ $freeEmails }}</span></div>
<div class="email-item"><span>Paid</span><span>{{ $paidEmails }}</span></div>
          </div>
        </div>

        <div class="renewal-chart" role="img" aria-label="Renewal Expenses chart">
          <h3>Renewal Expenses</h3>
          <svg class="chart-svg" viewBox="0 0 220 100" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
            <path fill="#7c3aed" fill-opacity="0.2" d="M0 70 Q55 90 110 70 T220 40 L220 100 L0 100 Z"></path>
            <path stroke="#7c3aed" stroke-width="3" fill="none" d="M0 70 Q55 90 110 70 T220 40"></path>
          </svg>
        </div>
      </div>

      <div class="right-panel">
        <div class="box analytics-box">
          <h3>Analytics</h3>
          <ul>
            <li>Expiring Domains in 7 Days</li>
            <li>Servers Requiring Renewal</li>
            <li>Email Account Usage Alerts</li>
          </ul>
        </div>
        <div class="box tasks-box">
          <h3>Tasks</h3>
          <ul>
            <li>Expiring Domains in 7 Days</li>
            <li>Servers Requiring Renewal</li>
            <li>Email Account Usage Alerts</li>
          </ul>
        </div>
      </div>
    </section>

    <div class="actions-panel">
      <button class="action-btn btn-renew" type="button">Renew Domain</button>
      <button class="action-btn btn-upgrade" type="button">Upgrade Server</button>
      <button class="action-btn btn-anned" type="button">Anned Account</button>
    </div>
    </div>
  </main>
</div>
<script>
  document.getElementById('addDomainBtn').addEventListener('click', function() {
    window.location.href = "{{ url('/products/add') }}";
  });

  document.getElementById('addServerBtn').addEventListener('click', function() {
    window.location.href = "{{ url('/products/add') }}";
  });

  document.getElementById('setupEmailBtn').addEventListener('click', function() {
    window.location.href = "{{ url('/products/add') }}";
  });


  // Function to update summary cards with data from products
  function updateSummaryCards() {
    const productsData = JSON.parse(localStorage.getItem('accounts_products_data') || '[]');

    // Calculate domains
    const allDomains = new Set(productsData.map(p => p.domainName));
    const activeDomains = new Set(productsData.filter(p => p.projectStatus === 'Active').map(p => p.domainName));
    const totalDomains = allDomains.size;
    const activeDomainCount = activeDomains.size;

    // Calculate servers
    const totalServers = productsData.length; // Each project has a server
    const activeServers = productsData.filter(p => p.projectStatus === 'Active').length;

    // Calculate emails
    // Fix: Count only professionalGsuitEmailID that are non-empty for total and active counts
    const totalEmails = productsData.filter(p => p.professionalGsuitEmailID && p.professionalGsuitEmailID.trim() !== '').length;
    const activeEmails = productsData.filter(p => p.projectStatus === 'Active' && p.professionalGsuitEmailID && p.professionalGsuitEmailID.trim() !== '').length;

    // Calculate upcoming expiries in current month
    const now = new Date();
    const currentMonth = now.getMonth();
    const currentYear = now.getFullYear();
    const upcomingExpiries = productsData.filter(p => {
      const renewalDate = new Date(p.renewalDate);
      return renewalDate.getMonth() === currentMonth && renewalDate.getFullYear() === currentYear;
    }).length;

    // Update the DOM
    document.querySelector('.card.domains .value').textContent = `${totalDomains}/${activeDomainCount}`;
    document.querySelector('.card.servers .value').textContent = `${totalServers}/${activeServers}`;
    document.querySelector('.card.emails .value').textContent = `${totalEmails}/${activeEmails}`;
    document.querySelector('.card.expiries .value').textContent = upcomingExpiries;
  }

  // Function to format date
  function formatDate(dateStr) {
    const date = new Date(dateStr);
    return date.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });
  }

  // Function to update hosting table with latest 3 products
  function updateHostingTable() {
    const productsData = JSON.parse(localStorage.getItem('accounts_products_data') || '[]');
    const sortedData = productsData.sort((a, b) => new Date(b.renewalDate) - new Date(a.renewalDate));
    const latestThree = sortedData.slice(0, 3);

    const tableBody = document.querySelector('.domain-table');
    const header = tableBody.querySelector('.table-header');
    tableBody.innerHTML = '';
    tableBody.appendChild(header);

    latestThree.forEach(product => {
      const row = document.createElement('div');
      row.className = 'table-row';
      row.innerHTML = `
        <span>${product.domainName} ${formatDate(product.renewalDate)}</span>
        <span>${product.server} $${product.renewalAmount} / mo</span>
        <span>${formatDate(product.renewalDate)}</span>
      `;
      tableBody.appendChild(row);
    });
  }

  // Run on page load
  //document.addEventListener('DOMContentLoaded', function() {
    //updateSummaryCards();
    //updateHostingTable();
  //});

  // Add click handlers for cards
 document.querySelector('.card.domains').addEventListener('click', () => {
    window.location.href = "{{ url('/hosting-servers/details') }}?type=domains";
  });

  document.querySelector('.card.servers').addEventListener('click', () => {
    window.location.href = "{{ url('/hosting-servers/details') }}?type=servers";
  });

  document.querySelector('.card.emails').addEventListener('click', () => {
    window.location.href = "{{ url('/hosting-servers/details') }}?type=emails";
  });

  document.querySelector('.card.expiries').addEventListener('click', () => {
    window.location.href = "{{ url('/hosting-servers/details') }}?type=expiries";
  });

</script>
<script src="{{ asset('dashboard-ui/js/hosting-servers.js') }}"></script>

</body>
</html>
