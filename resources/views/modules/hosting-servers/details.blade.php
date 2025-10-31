<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Hosting & Servers Details</title>
<link rel="stylesheet" href="{{ asset('dashboard-ui/css/styles.css') }}">

<style>
/* Reuse styles from index.html */
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
  --blue-200: #c7defb;
  --blue-500: #5a9bf7;
}

* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  font-family: var(--font-family);
  background-color: var(--bg-color);
  color: var(--text-primary);
  line-height: 1.5;
  padding: 2rem 1rem;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
  background-color: var(--container-bg);
  border-radius: var(--border-radius-lg);
  box-shadow: var(--box-shadow);
  padding: 2rem;
}

h1 {
  font-size: 1.8rem;
  font-weight: 900;
  margin-bottom: 1rem;
}

.table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 1rem;
}

.table th, .table td {
  padding: 0.75rem;
  text-align: left;
  border-bottom: 1px solid #e2e8f0;
}

.table th {
  font-weight: 600;
  color: var(--blue-500);
  background-color: var(--blue-200);
}

.table tr:hover {
  background-color: #f1f5f9;
}

.status-active {
  color: #10b981;
  font-weight: 600;
}

.status-inactive {
  color: #ef4444;
  font-weight: 600;
}

.back-btn {
  display: inline-block;
  padding: 0.5rem 1rem;
  background-color: var(--blue-500);
  color: white;
  border-radius: var(--border-radius-sm);
  text-decoration: none;
  margin-bottom: 1rem;
}

.back-btn:hover {
  background-color: #3b82f6;
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
    <div class="topbar">
      <div class="h1">Hosting & Servers Details</div>
      <div class="user">
        <div class="avatar"></div>
        <div>John Doe</div>
      </div>
    </div>

    <div class="container">
      <a href="{{ url('/hosting-servers') }}" class="back-btn">← Back to Hosting & Servers</a>
      <h1 id="page-title">Details</h1>
      <table class="table">
  <thead>
    <tr>
      <th>Domain Name</th>
      <th>Server</th>
      <th>Email</th>
      <th>Status</th>
      <th>Renewal Date</th>
    </tr>
  </thead>
  <tbody>
    @forelse($details as $detail)
      <tr>
        <td>{{ $detail->domain_name ?? '-' }}</td>
        <td>{{ $detail->server ?? '-' }}</td>
        <td>{{ $detail->professional_email ?? '-' }}</td>
        <td class="{{ $detail->project_status === 'Active' ? 'status-active' : 'status-inactive' }}">
          {{ $detail->project_status ?? 'Inactive' }}
        </td>
        <td>{{ $detail->renewal_date ?? '-' }}</td>
      </tr>
    @empty
      <tr>
        <td colspan="5">No records found.</td>
      </tr>
    @endforelse
  </tbody>
</table>
    </div>
  </main>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const urlParams = new URLSearchParams(window.location.search);
  const type = urlParams.get('type');

  const productsData = JSON.parse(localStorage.getItem('accounts_products_data') || '[]');

  let filteredData = [];
  let title = '';

  const now = new Date();
  const currentMonth = now.getMonth();
  const currentYear = now.getFullYear();

  switch (type) {
    case 'domains':
      filteredData = productsData.filter(p => p.domainName);
      title = 'Total Domains';
      break;
    case 'servers':
      filteredData = productsData;
      title = 'Servers Active';
      break;
    case 'emails':
      filteredData = productsData.filter(p => p.professionalGsuitEmailID && p.professionalGsuitEmailID.trim() !== '');
      title = 'Official Emails';
      break;
    case 'expiries':
      filteredData = productsData.filter(p => {
        const renewalDate = new Date(p.renewalDate);
        return renewalDate.getMonth() === currentMonth && renewalDate.getFullYear() === currentYear;
      });
      title = 'Upcoming Expiries';
      break;
    default:
      filteredData = productsData;
      title = 'All Records';
  }

  document.getElementById('page-title').textContent = title;

  const tableBody = document.getElementById('table-body');

  filteredData.forEach(product => {
    const row = document.createElement('tr');
    row.innerHTML = `
      <td>${product.domainName || '-'}</td>
      <td>${product.server || '-'}</td>
      <td>${product.professionalGsuitEmailID || '-'}</td>
      <td class="${product.projectStatus === 'Active' ? 'status-active' : 'status-inactive'}">${product.projectStatus || 'Inactive'}</td>
      <td>${product.renewalDate || '-'}</td>
    `;
    tableBody.appendChild(row);
  });
});
</script>
</body>
</html>
