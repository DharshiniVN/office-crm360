@extends('layouts.app')

@section('title', 'Special Features')

@section('content')
<div style="background:#fff7f7; padding:30px; border-radius:12px;">
    <h1 style="text-align:center; font-weight:800; font-size:32px;">Special Features</h1>

    <!-- Top Buttons -->
    <div style="display:flex; justify-content:center; gap:20px; margin:20px 0;">
        <button style="background:#d8d9ff; border:none; padding:10px 20px; border-radius:10px;">Configure Auto Reminders</button>
        <button style="background:#cfd3ff; border:none; padding:10px 20px; border-radius:10px;">Manage Notifications</button>
        <button style="background:#ffdad9; border:none; padding:10px 20px; border-radius:10px;">🔔 View Logs</button>
    </div>

    <!-- Summary Cards -->
    <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(250px,1fr)); gap:20px;">
        <div style="background:#d6f9f7; padding:20px; border-radius:15px;">
            <h4>Total Auto Reminders Sent</h4>
            <h1 style="font-size:42px; font-weight:700;">{{ $features['totalReminders'] }}</h1>
        </div>
        <div style="background:#fff1c2; padding:20px; border-radius:15px;">
            <h4>Upcoming Reminders</h4>
            <h1 style="font-size:42px; font-weight:700;">{{ $features['upcomingReminders'] }}</h1>
            <p>Renewals<br>Payments<br>Birthdays<br>Anniversaries</p>
        </div>
        <div style="background:#ffe7c2; padding:20px; border-radius:15px;">
            <h4>Alerts & Warnings</h4>
            <h1 style="font-size:42px; font-weight:700;">{{ $features['alertsCount'] }}</h1>
        </div>
    </div>

    <!-- Auto Reminder System & Analytics -->
    <div style="display:grid; grid-template-columns:2fr 1fr; gap:20px; margin-top:25px;">
        <div style="background:#ffe7b5; padding:20px; border-radius:15px;">
            <h3>Auto Reminder System</h3>
            <table width="100%" style="margin-top:10px;">
                <thead>
                    <tr><th align="left">Types</th><th align="left">Channel</th></tr>
                </thead>
                <tbody>
                    <tr><td>Renewals</td><td>Email</td></tr>
                    <tr><td>Payments</td><td>WhatsApp</td></tr>
                    <tr><td>Birthdays</td><td>WhatsApp</td></tr>
                    <tr><td>Anniversaries</td><td>Mar 18 • 1:00</td></tr>
                </tbody>
            </table>
            <div style="margin-top:15px;">
                <button style="background:#d8d9ff; padding:8px 16px; border:none; border-radius:10px;">Send Test Reminder</button>
                <button style="background:#cfd3ff; padding:8px 16px; border:none; border-radius:10px;">Download Logs</button>
            </div>
        </div>

        <div style="background:#dad8ff; padding:20px; border-radius:15px; text-align:center;">
            <h3>Analytics</h3>
            <p style="margin-top:10px; font-weight:600;">Reminders Sent</p>
            <canvas id="remindersChart" width="200" height="200"></canvas>
            <p style="margin-top:10px; font-weight:600;">Channel Split</p>
            <canvas id="channelChart" width="200" height="120"></canvas>
            <button style="margin-top:10px; background:#d8d9ff; border:none; padding:8px 16px; border-radius:10px;">Manage Templates</button>
        </div>
    </div>

    <!-- Notifications & Logs -->
    <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-top:25px;">
        <div style="background:#d9e2ff; padding:20px; border-radius:15px;">
            <h3>Notifications Center</h3>
            <p><strong>Upcoming Renewals:</strong> {{ $features['renewals'] }}</p>
            <p><strong>Pending Payments:</strong> {{ $features['pendingPayments'] }}</p>
            <h4>Alerts</h4>
            <ul>
                @forelse($features['alerts'] as $alert)
                    <li>{{ $alert }}</li>
                @empty
                    <li>No alerts found</li>
                @endforelse
            </ul>
        </div>

        <div style="background:#ffccd0; padding:20px; border-radius:15px;">
            <h3>Logs & Actions</h3>
            <ul>
                <li>Recent Reminders Sent</li>
                <li>Failed / Delayed Reminders</li>
                <li>System Alerts</li>
            </ul>
        </div>
    </div>

    <!-- Recent Reminders -->
    <div style="background:#c4f7f4; padding:20px; border-radius:15px; margin-top:20px;">
        <h3>Recent Reminders</h3>
        <ul>
            @forelse($features['recentReminders'] as $reminder)
                <li>{{ $reminder }}</li>
            @empty
                <li>No recent reminders available</li>
            @endforelse
        </ul>
    </div>
</div>

<!-- Charts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx1 = document.getElementById('remindersChart');
new Chart(ctx1, {
  type: 'pie',
  data: {
    labels: ['Email', 'WhatsApp'],
    datasets: [{ data: [40, 35], backgroundColor: ['#87CEFA', '#FFB347'] }]
  }
});
const ctx2 = document.getElementById('channelChart');
new Chart(ctx2, {
  type: 'bar',
  data: {
    labels: ['Renewals', 'Payments', 'Others'],
    datasets: [{ data: [20, 15, 10], backgroundColor: ['#87CEFA', '#77DD77', '#FFB347'] }]
  },
  options: { plugins: { legend: { display: false } } }
});



</script>
@endsection