// Sidebar management
function loadSidebar() {
  const sidebarHTML = `
    <div class="brand">
      <div class="logo">A</div>
      <div class="title">Accounts</div>
    </div>
    <div class="nav">
      <div class="section-title">Menu</div>
      <a href="../index.html" class="${getCurrentPage() === 'dashboard' ? 'active' : ''}"><span>📁</span><span class="text">Dashboard</span></a>
      <a href="../website/index.html" class="${getCurrentPage() === 'website' ? 'active' : ''}"><span>📁</span><span class="text">Website & Applications</span></a>
      <a href="../products/index.html" class="${getCurrentPage() === 'products' ? 'active' : ''}"><span>📁</span><span class="text">Products</span></a>
      <a href="../digital-marketing/index.html" class="${getCurrentPage() === 'digital-marketing' ? 'active' : ''}"><span>📁</span><span class="text">Digital Marketing</span></a>
      <a href="../graphics/index.html" class="${getCurrentPage() === 'graphics' ? 'active' : ''}"><span>📁</span><span class="text">Graphics</span></a>
      <a href="../renewal/index.html" class="${getCurrentPage() === 'renewal' ? 'active' : ''}"><span>📁</span><span class="text">Renewal</span></a>
      <a href="../account-billing/index.html" class="${getCurrentPage() === 'account-billing' ? 'active' : ''}"><span>📁</span><span class="text">Account and Billing</span></a>
      <a href="../hosting-servers/index.html" class="${getCurrentPage() === 'hosting-servers' ? 'active' : ''}"><span>📁</span><span class="text">Hosting and Servers</span></a>
      <a href="../special-features/index.html" class="${getCurrentPage() === 'special-features' ? 'active' : ''}"><span>📁</span><span class="text">Special Features</span></a>
    </div>
  `;

  const sidebar = document.querySelector('.sidebar');
  if (sidebar) {
    sidebar.innerHTML = sidebarHTML;
  }
}

function getCurrentPage() {
  const path = window.location.pathname;

  if (path.includes('/index.html') || path.endsWith('/')) {
    return 'dashboard';
  } else if (path.includes('/website/')) {
    return 'website';
  } else if (path.includes('/products/')) {
    return 'products';
  } else if (path.includes('/digital-marketing/')) {
    return 'digital-marketing';
  } else if (path.includes('/graphics/')) {
    return 'graphics';
  } else if (path.includes('/renewal/')) {
    return 'renewal';
  } else if (path.includes('/account-billing/')) {
    return 'account-billing';
  } else if (path.includes('/hosting-servers/')) {
    return 'hosting-servers';
  } else if (path.includes('/special-features/')) {
    return 'special-features';
  }

  return '';
}

// Load sidebar when DOM is ready
document.addEventListener('DOMContentLoaded', loadSidebar);
