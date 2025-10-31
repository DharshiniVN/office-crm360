<aside class="sidebar">
    <div class="brand">
        <div class="logo">A</div>
        <div class="title">Accounts</div>
    </div>
    <div class="nav">
  <div class="section-title">Menu</div>

  <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">
      <span>📁</span><span class="text">Dashboard</span>
  </a>

  <a href="{{ url('website') }}" class="{{ request()->is('website*') ? 'active' : '' }}">
      <span>📁</span><span class="text">Website & Applications</span>
  </a>

  <a href="{{ url('products') }}" class="{{ request()->is('products*') ? 'active' : '' }}">
      <span>📁</span><span class="text">Products</span>
  </a>

  <a href="{{ url('digital-marketing') }}" class="{{ request()->is('digital-marketing*') ? 'active' : '' }}">
      <span>📁</span><span class="text">Digital Marketing</span>
  </a>

  <a href="{{ url('graphics') }}" class="{{ request()->is('graphics*') ? 'active' : '' }}">
      <span>📁</span><span class="text">Graphics</span>
  </a>

  <a href="{{ url('renewals') }}" class="{{ request()->is('renewals*') ? 'active' : '' }}">
      <span>📁</span><span class="text">Renewal</span>
  </a>

  <a href="{{ url('account-billing') }}" class="{{ request()->is('account-billing*') ? 'active' : '' }}">
      <span>📁</span><span class="text">Account and Billing</span>
  </a>

  <a href="{{ url('hosting') }}" class="{{ request()->is('hosting*') ? 'active' : '' }}">
      <span>📁</span><span class="text">Hosting and Servers</span>
  </a>

  <a href="{{ url('special-features') }}" class="{{ request()->is('special-features*') ? 'active' : '' }}">
      <span>📁</span><span class="text">Special Features</span>
  </a>
</div>

</aside>
