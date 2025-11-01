@extends('layouts.app')

@section('title', 'Accounts — Dashboard')

@section('content')
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
        <a class="card acc1" href="{{ url('website') }}">
            <div class="label">Website & Applications</div>
            <div class="muted">Create, track, renew</div>
            <div class="count">{{ $websiteCount ?? 0 }}</div>
            <div class="muted">Renewals: <span>{{ $websiteRenewals ?? 0 }}</span></div>
            <div class="tag">Open</div>
        </a>

        <a class="card acc2" href="{{ url('products') }}">
            <div class="label">Products</div>
            <div class="muted">School Management, Billing Software, WhatsApp API</div>
            <div class="count">{{ $productsCount ?? 0 }}</div>
            <div class="muted">Renewals: <span>{{ $productRenewals ?? 0 }}</span></div>
            <div class="tag">Open</div>
        </a>

        <a class="card acc3" href="{{ url('digital-marketing') }}">
            <div class="label">Digital Marketing</div>
            <div class="muted">SEO, Ad Campaigns, Social Media</div>
            <div class="count">{{ $digitalMarketingCount ?? 0 }}</div>
            <div class="muted">Renewals: <span>{{ $digitalMarketingRenewals ?? 0 }}</span></div>
            <div class="tag">Open</div>
        </a>

        <a class="card acc4" href="{{ url('graphics') }}">
            <div class="label">Graphics</div>
            <div class="muted">Logo, Company Profile, Product Catalog</div>
            <div class="count">{{ $graphicsCount ?? 0 }}</div>
            <div class="muted">Renewals: <span>{{ $graphicsRenewals ?? 0 }}</span></div>
            <div class="tag">Open</div>
        </a>

        <a class="card acc1" href="{{ url('renewal') }}">
            <div class="label">Renewal</div>
            <div class="muted">SEO, ads, and social media renewals</div>
            <div class="count">{{ $renewalCount ?? 0 }}</div>
            <div class="muted">Overdue: <span>{{ $renewalRenewals ?? 0 }}</span></div>
            <div class="tag">Open</div>
        </a>

        <a class="card acc2" href="{{ url('account-billing') }}">
            <div class="label">Account and Billing</div>
            <div class="muted">Manage accounts and billing</div>
            <div class="count">—</div>
            <div class="tag">Coming Soon</div>
        </a>

        <a class="card acc3" href="{{ url('hosting-servers') }}">
            <div class="label">Hosting and Servers</div>
            <div class="muted">Server management and hosting services</div>
            <div class="count">—</div>
            <div class="tag">Coming Soon</div>
        </a>

        <a class="card acc4" href="{{ url('special-features') }}">
            <div class="label">Special Features</div>
            <div class="muted">Advanced features and integrations</div>
            <div class="count">—</div>
            <div class="tag">Coming Soon</div>
        </a>
    </div>
@endsection