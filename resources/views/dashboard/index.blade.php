<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Accounts — Dashboard</title>
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
          <a href="{{ url('/dashboard') }}" class="active">
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
          <a href="{{ url('/hosting-servers') }}">
            <span>📁</span><span class="text">Hosting and Servers</span>
          </a>
          <a href="{{ url('/special-features') }}">
            <span>📁</span><span class="text">Special Features</span>
          </a>
        </div>
      </aside>

      <main class="content">
        <div class="topbar">
          <div class="hamburger-menu">☰</div>
          <div class="h1">Company Profile</div>
          <div class="user">
            <div class="avatar"></div>
            <div>John Doe</div>
          </div>
        </div>

        <div class="panel" style="background: var(--brand-2)">
          <div style="display: flex; align-items: center; gap: 16px">
            <div style="font-size: 42px">🏢</div>
            <div>
              <div style="font-weight: 800; font-size: 24px">
                WEB DIGITAL MANTRA
              </div>
              <div class="muted">
                Welcome back! Choose a module to continue.
              </div>
            </div>
          </div>
        </div>

        <h2>Quick Modules</h2>
        <div class="cards">
          <a class="card acc1" href="{{ url('/website') }}">
            <div class="label">Website & Applications</div>
            <div class="muted">Create, track, renew</div>
            <div class="count">{{ $websiteCount ?? 0 }}</div>
            <div class="muted">Renewals: <span>{{ $digitalMarketingRenewals }}</span></div>

            <div class="tag">Open</div>
          </a>

          <a class="card acc2" href="{{ url('/products') }}">
            <div class="label">Products</div>
            <div class="muted">School Management, Billing Software, WhatsApp API</div>
            <div class="count">{{ $productsCount ?? 0 }}</div>
            <div class="muted">Renewals: <span>{{ $digitalMarketingRenewals }}</span></div>

            <div class="tag">Open</div>
          </a>

          <a class="card acc3" href="{{ url('/digital-marketing') }}">
            <div class="label">Digital Marketing</div>
            <div class="muted">SEO, Ad Campaigns, Social Media</div>
            <div class="count">{{ $digitalMarketingCount }}</div>

            <div class="muted">Renewals: <span>{{ $digitalMarketingRenewals }}</span></div>

            <div class="tag">Open</div>
          </a>

          <a class="card acc4" href="{{ url('/graphics') }}">
            <div class="label">Graphics</div>
            <div class="muted">Logo, Company Profile, Product Catalog</div>
            <div class="count">{{ $graphicsCount ?? 0 }}</div>
            <div class="muted">Renewals: <span>{{ $digitalMarketingRenewals }}</span></div>

            <div class="tag">Open</div>
          </a>

          <a class="card acc1" href="{{ url('/renewal') }}">
            <div class="label">Renewal</div>
            <div class="muted">SEO, ads, and social media renewals</div>
            <div class="count">{{ $renewalCount ?? 0 }}</div>
            <div class="muted">Overdue: <span>0</span></div>
            <div class="tag">Open</div>
          </a>

          <a class="card acc2" href="{{ url('/account-billing') }}">
            <div class="label">Account and Billing</div>
            <div class="muted">Manage accounts and billing</div>
            <div class="count">—</div>
            <div class="tag">Coming Soon</div>
          </a>

          <a class="card acc3" href="{{ url('/hosting-servers') }}">
            <div class="label">Hosting and Servers</div>
            <div class="muted">Server management and hosting services</div>
            <div class="count">—</div>
            <div class="tag">Coming Soon</div>
          </a>

          <a class="card acc4" href="{{ url('/special-features') }}">
            <div class="label">Special Features</div>
            <div class="muted">Advanced features and integrations</div>
            <div class="count">—</div>
            <div class="tag">Coming Soon</div>
          </a>
        </div>
      </main>
    </div>
    <script src="{{ asset('dashboard-ui/js/app.js') }}"></script>
  </body>
</html>
