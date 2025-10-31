@extends('layouts.app')

@section('title', 'Renewals Dashboard')

@section('content')
<div class="topbar">
  <div class="h1">Renewals Dashboard</div>
</div>

{{-- Dashboard Cards --}}
<div id="dashboardCards" style="display:flex;gap:15px;flex-wrap:wrap;margin-top:20px;">
  <div class="card" data-type="all" onclick="handleCardClick(this)" style="cursor:pointer;background:#f0f4ff;padding:20px;border-radius:10px;flex:1;text-align:center;">
    <h4>Total Renewals</h4>
    <h2>{{ $totalRenewals }}</h2>
  </div>
  <div class="card" data-type="thisMonth" onclick="handleCardClick(this)" style="cursor:pointer;background:#fff4f0;padding:20px;border-radius:10px;flex:1;text-align:center;">
    <h4>Renewals This Month</h4>
    <h2>{{ $thisMonthRenewals }}</h2>
  </div>
  <div class="card" data-type="overdue" onclick="handleCardClick(this)" style="cursor:pointer;background:#fff0f4;padding:20px;border-radius:10px;flex:1;text-align:center;">
    <h4>Overdue Renewals</h4>
    <h2>{{ $overdueRenewals }}</h2>
  </div>
  <div class="card" data-type="expiring" onclick="handleCardClick(this)" style="cursor:pointer;background:#f0fff4;padding:20px;border-radius:10px;flex:1;text-align:center;">
    <h4>Expiring Soon</h4>
    <h2>{{ $expiringRenewals }}</h2>
  </div>
</div>

{{-- Renewal Table --}}
<div id="renewalData" style="margin-top:30px; display:none;"></div>

{{-- Payment Modal --}}
<div id="paymentModal" style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;
  background:rgba(0,0,0,0.5);justify-content:center;align-items:center;z-index:999;">
  <div style="background:#fff;padding:25px;border-radius:10px;width:360px;position:relative;">
    <h3 style="margin-bottom:10px;">Renewal Payment</h3>
    <p><strong>Client:</strong> <span id="clientName"></span></p>
    <p><strong>Service:</strong> <span id="serviceName"></span></p>
    <p><strong>Amount:</strong> ₹<span id="renewAmount"></span></p>

    <div style="margin-top:20px;text-align:right;">
      <button onclick="closeModal()" 
        style="padding:8px 15px;border:none;background:#ccc;border-radius:5px;margin-right:10px;">Cancel</button>
      <button onclick="startPayment()" 
        style="padding:8px 15px;border:none;background:#007bff;color:#fff;border-radius:5px;cursor:pointer;">Send</button>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
let currentRenewal = {};

// 👇 REMOVE auto-loading of renewals
// document.addEventListener("DOMContentLoaded", () => loadRenewals('all'));

// Handle card click
function handleCardClick(card) {
  document.querySelectorAll('#dashboardCards .card').forEach(c => {
    c.style.boxShadow = 'none';
    c.style.transform = 'scale(1)';
  });
  card.style.boxShadow = '0 4px 10px rgba(0,0,0,0.2)';
  card.style.transform = 'scale(1.03)';
  
  const type = card.getAttribute('data-type');
  loadRenewals(type);
}

// Fetch renewal list
function loadRenewals(type) {
  fetch(`/renewals/fetch/${type}`)
    .then(res => res.json())
    .then(data => {
      let html = '';
      if (data.length === 0) {
        html = `<p style="text-align:center;margin-top:20px;">No renewals found for this category.</p>`;
      } else {
        html = `
          <table border="1" cellspacing="0" cellpadding="10" 
                 style="width:100%;margin-top:20px;border-collapse:collapse;border-radius:10px;">
            <thead style="background:#f0f0f0;">
              <tr>
                <th>Client</th>
                <th>Service</th>
                <th>Start Date</th>
                <th>Expiry Date</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
        `;
        data.forEach(r => {
          html += `
            <tr>
              <td>${r.client_name ?? '-'}</td>
              <td>${r.service ?? '-'}</td>
              <td>${r.start_date ?? '-'}</td>
              <td>${r.expiry_date ?? '-'}</td>
              <td>₹${r.amount ?? '-'}</td>
              <td>${r.status ?? r.renewal_remark ?? '-'}</td>
              <td>
                <button onclick="openPaymentModal(${r.id}, '${r.type}', '${r.client_name}', '${r.service}', '${r.amount}')"
                  style="background:#007bff;color:#fff;border:none;padding:5px 10px;border-radius:5px;cursor:pointer;">
                  Renew
                </button>
              </td>
            </tr>
          `;
        });
        html += `</tbody></table>`;
      }
      const tableDiv = document.getElementById('renewalData');
      tableDiv.innerHTML = html;
      tableDiv.style.display = 'block'; // 👈 show only after clicking
    })
    .catch(err => console.error("Error loading renewals:", err));
}

// Open modal
function openPaymentModal(id, type, client, service, amount) {
  currentRenewal = { id, type, client, service, amount };
  document.getElementById('clientName').innerText = client;
  document.getElementById('serviceName').innerText = service;
  document.getElementById('renewAmount').innerText = amount;
  document.getElementById('paymentModal').style.display = 'flex';
}

// Close modal
function closeModal() {
  document.getElementById('paymentModal').style.display = 'none';
}

// Razorpay Payment
function startPayment() {
  if (!currentRenewal.id) return alert('No renewal selected.');

  fetch(`/renewals/request-payment/${currentRenewal.id}`, {
    method: 'POST',
    headers: {
      'X-CSRF-TOKEN': '{{ csrf_token() }}',
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({ type: currentRenewal.type })
  })
  .then(res => res.json())
  .then(data => {
    if (!data.success) {
      alert(data.message || 'Payment request failed.');
      return;
    }

    const options = {
      "key": "rzp_test_1DP5mmOlF5G5ag",
      "amount": currentRenewal.amount * 100,
      "currency": "INR",
      "name": currentRenewal.client,
      "description": currentRenewal.service,
      "handler": function (response) {
        alert("✅ Payment Successful!\nPayment ID: " + response.razorpay_payment_id);
        closeModal();
        loadRenewals('all');
      },
      "prefill": { "name": currentRenewal.client },
      "theme": { "color": "#007bff" }
    };
    new Razorpay(options).open();
  })
  .catch(err => {
    console.error("Payment error:", err);
    alert('Something went wrong. Please try again.');
  });
}
</script>
@endsection
