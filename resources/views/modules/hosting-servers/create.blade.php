<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Add Hosting Detail</title>
  <link rel="stylesheet" href="{{ asset('dashboard-ui/css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('dashboard-ui/css/mobile-responsive.css') }}">
</head>
<body>
  <div class="layout">
    <aside class="sidebar">
      <div class="brand">
        <div class="logo">A</div>
        <div class="title">Hosting & Servers</div>
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
        <a href="{{ url('/hosting-servers') }}" class="active"><span>📁</span><span class="text">Hosting and Servers</span></a>
        <a href="{{ url('/special-features') }}"><span>📁</span><span class="text">Special Features</span></a>
      </div>
    </aside>

    <main class="content">
      <div class="topbar">
        <div class="hamburger-menu">☰</div>
        <div class="h1">Add Hosting Detail</div>
        <div class="user">
          <div class="avatar"></div>
          <div>John Doe</div>
        </div>
      </div>

      <div class="panel">
        <form method="POST" action="{{ url('/hosting-servers/store') }}">
          @csrf

          <h3>Project Info</h3>
          <input type="text" name="product_category" placeholder="Product Category">
          <input type="text" name="project_name" placeholder="Project Name">
          <input type="text" name="domain_name" placeholder="Domain Name">
          <input type="number" name="domain_booking_year" placeholder="Domain Booking Year">
          <input type="text" name="server" placeholder="Server">

          <h3>Client Info</h3>
          <input type="text" name="client_name" placeholder="Client Name">
          <input type="text" name="client_mobile" placeholder="Client Mobile">
          <input type="email" name="client_gmail" placeholder="Client Gmail ID">
          <input type="text" name="client_location" placeholder="Client Location">
          <input type="text" name="state" placeholder="State">
          <input type="text" name="country" placeholder="Country">
          <input type="date" name="client_dob" placeholder="Client DOB">

          <h3>Email Info</h3>
          <input type="email" name="professional_email" placeholder="Professional/Gsuite Email ID">
          <input type="number" name="email_count" placeholder="No. of Email IDs">
          <input type="email" name="alt_email" placeholder="Alt. Email ID">

          <h3>Team Assignment</h3>
          <input type="text" name="bdm" placeholder="BDM">
          <input type="text" name="frontend_dev" placeholder="Frontend Developer">
          <input type="text" name="backend_dev" placeholder="Backend Developer">

          <h3>Timeline</h3>
          <input type="date" name="project_start_date" placeholder="Project Start Date">
          <input type="date" name="project_deadline" placeholder="Project Deadline">
          <input type="date" name="demo_date" placeholder="Demo Date">
          <input type="date" name="project_closer_date" placeholder="Project Close Date">
          <input type="number" name="closer_year" placeholder="Closer Year">
          <input type="date" name="closer_date" placeholder="Closer Date">

          <h3>Financials</h3>
          <input type="number" step="0.01" name="project_cost" placeholder="Project Cost">
          <input type="number" step="0.01" name="with_gst" placeholder="With GST">
          <input type="number" step="0.01" name="server_cost" placeholder="Server Cost">
          <input type="number" step="0.01" name="email_cost" placeholder="Email Cost">
          <input type="number" step="0.01" name="initial_payment" placeholder="Initial Payment">
          <input type="number" step="0.01" name="second_payment" placeholder="2nd Payment">
          <input type="number" step="0.01" name="remaining_payment" placeholder="Remaining Payment">
          <input type="number" step="0.01" name="pending_payment" placeholder="Pending Payment">

          <h3>Status & Remarks</h3>
          <input type="text" name="final_status" placeholder="Final Status">
          <input type="text" name="project_status" placeholder="Project Status">
          <textarea name="remark" placeholder="Remark"></textarea>

          <h3>Renewal Info</h3>
          <input type="text" name="renewal_month" placeholder="Renewal Month">
          <input type="date" name="renewal_date" placeholder="Renewal Date">
          <input type="text" name="renewal_items" placeholder="Renewal Items">
          <input type="number" step="0.01" name="renewal_amount" placeholder="Renewal Amount">
          <textarea name="renewal_remark" placeholder="Renewal Remark"></textarea>

          <button type="submit">Save Hosting Detail</button>
        </form>
      </div>
    </main>
  </div>

  <script src="{{ asset('dashboard-ui/js/hosting-servers.js') }}"></script>
</body>
</html>