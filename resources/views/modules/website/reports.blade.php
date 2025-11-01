<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Reports</title>
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
    @media (max-width: 768px) {
      .table-wrap {
        max-height: 500px !important;
      }
      .table-actions {
        flex-direction: row !important;
        justify-content: space-between !important;
        align-items: center !important;
        flex-wrap: nowrap !important;
      }
      .table-actions .search {
        flex-grow: 1 !important;
        margin-right: 10px !important;
        min-width: 120px !important;
      }
      .table-actions div {
        white-space: nowrap !important;
      }
      .table-actions .btn {
        margin-right: 8px !important;
        padding: 6px 8px !important;
        font-size: 12px !important;
      }
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
        <div class="h1" id="report-title">Reports</div>
        <div class="actions"><a class="btn" href="{{ url('/website') }}" style="position: static; right: auto; top: auto; z-index: auto;">◀ Back</a></div>
      </div>

      <section class="table-wrap">
        <div class="table-actions">
          <input id="search1" class="search" placeholder="Search table 1..." />
          <div>
            <button class="btn" id="export1">Export CSV</button>
            <button class="btn" onclick="setTimeout(() => window.print(), 100)">Print / Save PDF</button>
          </div>
        </div>
        <div style="overflow:auto">
          {{--<div class="table-actions">
  <button class="btn" onclick="document.getElementById('add-form-total').style.display='block'">+ Add Details</button>
</div>--}}
<div id="add-form-total" style="display:none; margin-bottom:20px;">
  <form action="{{ route('accounts.store') }}" method="POST">
  @csrf
  <input type="text" name="client_name" required>
  <input type="text" name="contact" required>
  <input type="email" name="gmail" required>
  <input type="text" name="category" required>
  <input type="number" name="renewal_amount" required>
<input type="date" name="renewal_date" required>

  <input type="text" name="company_id">
  <input type="number" name="created_by">
  <input type="number" name="updated_by">
   <input type="text" name="gmail1">
<input type="text" name="gmail2">
<input type="url" name="websiteUrl">
<input type="url" name="appUrl">
<input type="text" name="domainname">
<input type="date" name="domainBookingDate">
<input type="text" name="domainPlace">
<input type="text" name="server">
<input type="text" name="mailId">
<input type="checkbox" name="gsuite" value="1">
<input type="checkbox" name="webmail" value="1">
<input type="text" name="location">
<input type="url" name="gpage">
<input type="number" name="projectCost">
<input type="number" name="finalCost">
<input type="number" name="advPayment">
<input type="date" name="advDate">
<input type="date" name="pay2Date">
<input type="text" name="txn2">
<input type="text" name="txn3">
<input type="text" name="extra">
<input type="date" name="birthday">
<input type="date" name="anniversary">
  <button type="submit" class="btn">Save</button>
</form>

</div>
          <table class="table">
  <thead>
    <tr>
      <th>SNo</th>
      <th>client_name</th>
      <th>Contact</th>
      <th>gmail1</th>
      <th>Category</th>
      <th>renewal_amount</th>
      <th>renewal_date</th>
      <th>company_id</th>
      <th>created_by</th>
      <th>updated_by</th>

      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($accounts as $account)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $account->client_name }}</td>
        <td>{{ $account->contact }}</td>
        <td>{{ $account->gmail }}</td>
        <td>{{ $account->category }}</td>
        <td>{{ $account->renewal_amount }}</td>
<td>{{ $account->renewal_date }}</td>
        <td>{{ $account->company_id }}</td>
      <td>{{ $account->created_by }}</td>
      <td>{{ $account->updated_by }}</td>

        <td>
          <a href="{{ route('accounts.edit', $account->id) }}">Edit</a>
          <form action="{{ route('accounts.destroy', $account->id) }}" method="POST" style="display:inline;">
            @csrf @method('DELETE')
            <button type="submit">Delete</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
        </div>
      </section>

      <h3 style="margin:18px 4px 8px">Renewals Due</h3>
      <section class="table-wrap">
        <div class="table-actions">
          <input id="search2" class="search" placeholder="Search renewals..." />
          <div>
            <button class="btn" id="export2">Export CSV</button>
            <button class="btn" onclick="setTimeout(() => window.print(), 100)">Print / Save PDF</button>
          </div>
        </div>
        <div style="overflow:auto">
          {{--<div class="table-actions">
  <button class="btn" onclick="document.getElementById('add-form-renewal').style.display='block'">+ Add Details</button>
</div>--}}
<div id="add-form-renewal" style="display:none; margin-bottom:20px;">
  <form action="{{ route('accounts.store') }}" method="POST">
  @csrf
  <input type="text" name="client_name" required>
  <input type="text" name="contact" required>
  <input type="email" name="gmail" required>
  <input type="text" name="category" required>
  <input type="number" name="renewal_amount" required>
<input type="date" name="renewal_date" required>

  <input type="text" name="company_id">
  <input type="number" name="created_by">
  <input type="number" name="updated_by">
  <input type="text" name="gmail1">
<input type="text" name="gmail2">
<input type="url" name="websiteUrl">
<input type="url" name="appUrl">
<input type="text" name="domainname">
<input type="date" name="domainBookingDate">
<input type="text" name="domainPlace">
<input type="text" name="server">
<input type="text" name="mailId">
<input type="checkbox" name="gsuite" value="1">
<input type="checkbox" name="webmail" value="1">
<input type="text" name="location">
<input type="url" name="gpage">
<input type="number" name="projectCost">
<input type="number" name="finalCost">
<input type="number" name="advPayment">
<input type="date" name="advDate">
<input type="date" name="pay2Date">
<input type="text" name="txn2">
<input type="text" name="txn3">
<input type="text" name="extra">
<input type="date" name="birthday">
<input type="date" name="anniversary">
  <button type="submit" class="btn">Save</button>
</form>
</div>
          <table class="table">
  <thead>
    <tr>
      <th>SNo</th>
      <th>client_name</th>
      <th>Contact</th>
      <th>gmail1</th>
      <th>Category</th>
      <th>renewal_amount</th>
      <th>renewal_date</th>
      <th>company_id</th>
      <th>created_by</th>
      <th>updated_by</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($renewalsDue as $account)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $account->client_name }}</td>
        <td>{{ $account->contact }}</td>
        <td>{{ $account->gmail }}</td>
        <td>{{ $account->category }}</td>
        <td>{{ $account->renewal_amount }}</td>
<td>{{ $account->renewal_date }}</td>
           <td>{{ $account->company_id }}</td>
      <td>{{ $account->created_by }}</td>
      <td>{{ $account->updated_by }}</td>
        <td>
          <a href="{{ route('accounts.edit', $account->id) }}">Edit</a>
          <form action="{{ route('accounts.destroy', $account->id) }}" method="POST" style="display:inline;">
            @csrf @method('DELETE')
            <button type="submit">Delete</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
        </div>
      </section>
    </main>
  </div>



  <script src="{{ asset('dashboard-ui/js/app.js') }}"></script>
<script src="{{ asset('dashboard-ui/js/reports.js') }}"></script>
</body>
</html>
