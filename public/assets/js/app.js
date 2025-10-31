
// Shared helpers
function getData(key){
  let raw = localStorage.getItem(key);
  if(raw){
    try{ return JSON.parse(raw); }catch(e){}
  }
  return window[`sample${key.split('_')[1].charAt(0).toUpperCase() + key.split('_')[1].slice(1)}Data`] || [];
}

function setData(key, rows){
  localStorage.setItem(key, JSON.stringify(rows));
}

// Helper functions for renewal calculations
function dueSoon(rec) {
  if (!rec.renewalDate) return false;
  const d = new Date(rec.renewalDate);
  const diff = (d - new Date()) / (1000 * 60 * 60 * 24);
  return diff <= 60;
}

function getStatus(expiryDate) {
  if (!expiryDate) return 'no renewal';
  const today = new Date();
  const expiry = new Date(expiryDate);
  const diffTime = expiry - today;
  const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
  if (diffDays < 0) return 'overdue';
  if (diffDays <= 30) return 'expiring';
  return 'active';
}

// Count records for dashboard
function updateDashboardCounts() {
  const waData = getData('accounts_wa_data');
  const productsData = getData('accounts_products_data');
  const dmData = getData('accounts_dm_data');
  const graphicsData = getData('accounts_graphics_data');
  const websiteRenewalData = getData('accounts_website_renewal_data');
  const dmRenewalData = getData('accounts_dm_renewal_data');
  const invoiceData = getData('accounts_invoice_data');
  const outputGstData = getData('accounts_output_gst_data');
  const inputGstData = getData('accounts_input_gst_data');
  const incomeExpenseData = getData('accounts_income_expense_data');

  const waCount = waData ? waData.length : 0;
  const productsCount = productsData ? productsData.length : 0;
  const dmCount = dmData ? dmData.length : 0;
  const graphicsCount = graphicsData ? graphicsData.length : 0;
  const websiteRenewalCount = websiteRenewalData ? websiteRenewalData.length : 0;

  // Calculate renewal counts
  const waRenewalCount = waData ? waData.filter(dueSoon).length : 0;

  const productCategories = ['school_management', 'billing', 'whatsapp_api', 'digital_visiting_card', 'brand_bizz', 'cloud_india_hub'];
  const productsRenewalCount = productCategories.reduce((sum, cat) => {
    return sum + (productsData ? productsData.filter(r => r.category === cat && dueSoon(r)).length : 0);
  }, 0);

  const dmCategories = ['seo', 'add_campaign', 'social_media', 'seo_add_social'];
  const dmRenewalCount = dmCategories.reduce((sum, cat) => {
    return sum + (dmData ? dmData.filter(r => r.category === cat && dueSoon(r)).length : 0);
  }, 0);

  const graphicsCategories = ['logo', 'other_graphics', 'company_profile'];
  const graphicsRenewalCount = graphicsCategories.reduce((sum, cat) => {
    return sum + (graphicsData ? graphicsData.filter(r => r.category === cat && dueSoon(r)).length : 0);
  }, 0);

  // Aggregate all renewal data for overdue count
  const allRenewalData = [
    ...(waData || []),
    ...(productsData || []),
    ...(dmData || []),
    ...(graphicsData || [])
  ];
  const overdueCount = allRenewalData.filter(r => getStatus(r.renewalDate) === 'overdue').length;

  // Use total renewals count from renewal dashboard page logic
  // We can get this by calling getRenewalData() from assets/js/renewals.js and counting length
  // But since this is a different file, we replicate the logic here

  // Aggregate all renewal data from all sources
  const renewalData = [
    ...waData,
    ...productsData,
    ...dmData,
    ...graphicsData
  ];
  const renewalCount = renewalData.length;

  const invoiceCount = invoiceData ? invoiceData.length : 0;
  const gstCount = (outputGstData ? outputGstData.length : 0) + (inputGstData ? inputGstData.length : 0);
  const incomeExpenseCount = incomeExpenseData ? incomeExpenseData.length : 0;

  if(document.getElementById('count-wa')) document.getElementById('count-wa').textContent = waCount;
  if(document.getElementById('renewal-wa')) document.getElementById('renewal-wa').textContent = waRenewalCount;
  if(document.getElementById('count-products')) document.getElementById('count-products').textContent = productsCount;
  if(document.getElementById('renewal-products')) document.getElementById('renewal-products').textContent = productsRenewalCount;
  // Also update product cards if present
  if(typeof renderProductCards === 'function') {
    renderProductCards();
  }
  if(document.getElementById('count-dm')) document.getElementById('count-dm').textContent = dmCount;
  if(document.getElementById('renewal-dm')) document.getElementById('renewal-dm').textContent = dmRenewalCount;
  if(document.getElementById('count-graphics')) document.getElementById('count-graphics').textContent = graphicsCount;
  if(document.getElementById('renewal-graphics')) document.getElementById('renewal-graphics').textContent = graphicsRenewalCount;
  if(document.getElementById('count-renewal')) document.getElementById('count-renewal').textContent = renewalCount;
  if(document.getElementById('renewal-overdue')) document.getElementById('renewal-overdue').textContent = overdueCount;
  if(document.getElementById('count-invoice')) document.getElementById('count-invoice').textContent = invoiceCount;
  if(document.getElementById('count-gst')) document.getElementById('count-gst').textContent = gstCount;
  if(document.getElementById('count-income-expense')) document.getElementById('count-income-expense').textContent = incomeExpenseCount;

  // Also update cards on dashboard page if present
  if(typeof renderCards === 'function') {
    renderCards();
  }
}

// Initialize sample data for new modules if not exists
function initializeSampleData() {
  if (!localStorage.getItem('accounts_website_renewal_data')) {
    localStorage.setItem('accounts_website_renewal_data', JSON.stringify([]));
  }
  if (!localStorage.getItem('accounts_dm_renewal_data')) {
    localStorage.setItem('accounts_dm_renewal_data', JSON.stringify([]));
  }
  if (!localStorage.getItem('accounts_invoice_data')) {
    localStorage.setItem('accounts_invoice_data', JSON.stringify([]));
  }
  if (!localStorage.getItem('accounts_output_gst_data')) {
    localStorage.setItem('accounts_output_gst_data', JSON.stringify([]));
  }
  if (!localStorage.getItem('accounts_input_gst_data')) {
    localStorage.setItem('accounts_input_gst_data', JSON.stringify([]));
  }
  if (!localStorage.getItem('accounts_income_expense_data')) {
    localStorage.setItem('accounts_income_expense_data', JSON.stringify([]));
  }
}

window.App = { getData, setData, updateDashboardCounts };

function equalizeCardHeights() {
  const cards = document.querySelectorAll('.cards .card');
  if (!cards.length) {
    console.log('No cards found for height equalization');
    return;
  }
  let maxHeight = 0;
  cards.forEach(card => {
    card.style.height = 'auto'; // reset height
    const height = card.offsetHeight;
    if (height > maxHeight) maxHeight = height;
  });
  cards.forEach(card => {
    card.style.height = maxHeight + 'px';
  });
  console.log('Card heights equalized to:', maxHeight);
}

function initMobileMenu() {
  const sidebar = document.querySelector('.sidebar');
  if (!sidebar) return;

  // Remove existing hamburger menu if any
  const existingHamburger = document.querySelector('.hamburger-menu');
  if (existingHamburger) {
    existingHamburger.remove();
  }

  if (window.innerWidth <= 768) {
    // Create overlay
    const overlay = document.createElement('div');
    overlay.className = 'sidebar-overlay';
    overlay.style.cssText = `
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0,0,0,0.5);
      z-index: 999;
      display: none;
    `;
    document.body.appendChild(overlay);

    // Create hamburger menu element
    const hamburger = document.createElement('div');
    hamburger.className = 'hamburger-menu';
    hamburger.innerHTML = '☰';
    hamburger.style.cssText = `
      display: block;
      font-size: 24px;
      cursor: pointer;
      color: var(--ink);
      user-select: none;
      z-index: 1100;
    `;

    const topbar = document.querySelector('.topbar');
    if (topbar) {
      topbar.insertBefore(hamburger, topbar.firstChild);

    hamburger.addEventListener('click', () => {
        hamburger.style.display = 'none';
        const isOpen = sidebar.classList.toggle('open');
        document.body.classList.toggle('sidebar-open', isOpen);
        overlay.style.display = isOpen ? 'block' : 'none';
        if (!isOpen) {
          hamburger.style.display = 'block';
        }
      });
    }

    // Close sidebar when clicking outside
    document.addEventListener('click', (e) => {
      if (!sidebar.contains(e.target) && !e.target.closest('.hamburger-menu')) {
        sidebar.classList.remove('open');
        document.body.classList.remove('sidebar-open');
        overlay.style.display = 'none';
        hamburger.style.display = 'block';
      }
    });

    // Close sidebar when clicking on navigation links
    const navLinks = sidebar.querySelectorAll('.nav a');
    navLinks.forEach(link => {
      link.addEventListener('click', () => {
        sidebar.classList.remove('open');
        document.body.classList.remove('sidebar-open');
        overlay.style.display = 'none';
        hamburger.style.display = 'block';
      });
    });
  } else {
    // For desktop, add click event to existing hamburger
    const hamburger = document.querySelector('.hamburger-menu');
    if (hamburger) {
      hamburger.addEventListener('click', () => {
        sidebar.classList.toggle('open');
      });
    }
  }
}





// Update counts when page loads
document.addEventListener('DOMContentLoaded', function() {
  initializeSampleData();
  updateDashboardCounts();

  // Initialize mobile menu
  initMobileMenu();

  // Delay equalization to ensure cards are rendered
  setTimeout(equalizeCardHeights, 100);

  // Reapply on window resize
  window.addEventListener('resize', function() {
    equalizeCardHeights();
    initMobileMenu();
  });

  // Fix sidebar navigation active link update to handle new sidebar links
  const currentPath = window.location.pathname.split('/').pop();
  const navLinks = document.querySelectorAll('.sidebar .nav a');

  navLinks.forEach(link => {
    const href = link.getAttribute('href');
    if (href === currentPath || (href === '' && currentPath === '')) {
      navLinks.forEach(l => l.classList.remove('active'));
      link.classList.add('active');
    }
  });
});
