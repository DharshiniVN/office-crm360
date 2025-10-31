function loadSidebar() {
  const current = getCurrentPage();

  const sidebarHTML = `
    <div class="brand">
      <div class="logo">A</div>
      <div class="title">Accounts</div>
    </div>
    <div class="nav">
      <div class="section-title">Menu</div>
      <a href="/dashboard" class="${current === 'dashboard' ? 'active' : ''}"><span>📁</span><span class="text">Dashboard</span></a>
      <a href="/website" class="${current === 'website' ? 'active' : ''}"><span>📁</span><span class="text">Website & Applications</span></a>
      <a href="/products" class="${current === 'products' ? 'active' : ''}"><span>📁</span><span class="text">Products</span></a>
      <a href="/digital-marketing" class="${current === 'digital-marketing' ? 'active' : ''}"><span>📁</span><span class="text">Digital Marketing</span></a>
      <a href="/graphics" class="${current === 'graphics' ? 'active' : ''}"><span>📁</span><span class="text">Graphics</span></a>
      <a href="/renewal" class="${current === 'renewal' ? 'active' : ''}"><span>📁</span><span class="text">Renewal</span></a>
      <a href="/account-billing" class="${current === 'account-billing' ? 'active' : ''}"><span>📁</span><span class="text">Account and Billing</span></a>
      <a href="/hosting-servers" class="${current === 'hosting-servers' ? 'active' : ''}"><span>📁</span><span class="text">Hosting and Servers</span></a>
      <a href="/special-features" class="${current === 'special-features' ? 'active' : ''}"><span>📁</span><span class="text">Special Features</span></a>
    </div>
  `;

  const sidebar = document.querySelector('.sidebar');
  if (sidebar) {
    sidebar.innerHTML = sidebarHTML;
  }
}

function getCurrentPage() {
  const path = window.location.pathname;

  if (path === '/dashboard' || path === '/') return 'dashboard';
  if (path.startsWith('/website')) return 'website';
  if (path.startsWith('/products')) return 'products';
  if (path.startsWith('/digital-marketing')) return 'digital-marketing';
  if (path.startsWith('/graphics')) return 'graphics';
  if (path.startsWith('/renewal')) return 'renewal';
  if (path.startsWith('/account-billing')) return 'account-billing';
  if (path.startsWith('/hosting-servers')) return 'hosting-servers';
  if (path.startsWith('/special-features')) return 'special-features';

  return '';
}

// Load sidebar when DOM is ready
document.addEventListener('DOMContentLoaded', loadSidebar);
