// Function to get renewal data from all sources
function getRenewalData() {
  const waData = JSON.parse(localStorage.getItem('accounts_wa_data') || '[]');
  const productsData = JSON.parse(localStorage.getItem('accounts_products_data') || '[]');
  const dmData = JSON.parse(localStorage.getItem('accounts_dm_data') || '[]');
  const graphicsData = JSON.parse(localStorage.getItem('accounts_graphics_data') || '[]');

  const allRenewals = [];

// Process website & application data
waData.forEach(item => {
  const startDate = item.domainBookingDate || (item.renewalDate ? new Date(new Date(item.renewalDate) - 365 * 24 * 60 * 60 * 1000).toISOString().split('T')[0] : 'N/A');
  allRenewals.push({
    client: item.clientName,
    service: item.category || 'Website & Application',
    start: startDate,
    expiry: item.renewalDate || 'N/A',
    amount: item.renewalAmount || 0,
    status: item.renewalDate ? getStatus(item.renewalDate) : 'no renewal',
    source: 'wa',
    data: item
  });
});

// Process products data
productsData.forEach(item => {
  allRenewals.push({
    client: item.clientName,
    service: item.projectName || item.category || 'Product',
    start: item.domainBookingDate || item.projectStartDate || 'N/A',
    expiry: item.renewalDate || 'N/A',
    amount: item.renewalAmount || 0,
    status: item.renewalDate ? getStatus(item.renewalDate) : 'no renewal',
    source: 'products',
    data: item
  });
});

// Process digital marketing data
dmData.forEach(item => {
  const startDate = item.startDate || item.bookingDate || (item.renewalDate ? new Date(new Date(item.renewalDate) - 365 * 24 * 60 * 60 * 1000).toISOString().split('T')[0] : 'N/A');
  allRenewals.push({
    client: item.clientName || item.name,
    service: 'Digital Marketing',
    start: startDate,
    expiry: item.renewalDate || 'N/A',
    amount: item.renewalAmount || item.amount || 0,
    status: item.renewalDate ? getStatus(item.renewalDate) : 'no renewal',
    source: 'dm',
    data: item
  });
});

// Process graphics data
graphicsData.forEach(item => {
  const startDate = item.startDate || item.bookingDate || (item.renewalDate ? new Date(new Date(item.renewalDate) - 365 * 24 * 60 * 60 * 1000).toISOString().split('T')[0] : 'N/A');
  allRenewals.push({
    client: item.clientName || item.name,
    service: 'Graphics',
    start: startDate,
    expiry: item.renewalDate || 'N/A',
    amount: item.renewalAmount || item.amount || 0,
    status: item.renewalDate ? getStatus(item.renewalDate) : 'no renewal',
    source: 'graphics',
    data: item
  });
});

  return allRenewals;
}

// Function to determine status based on expiry date
function getStatus(expiryDate) {
  const today = new Date();
  const expiry = new Date(expiryDate);
  const diffTime = expiry - today;
  const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

  if (diffDays < 0) return 'overdue';
  if (diffDays <= 30) return 'expiring';
  return 'active';
}

// Function to get renewals for current month
function getThisMonthRenewals(renewals) {
  const now = new Date();
  const currentMonth = now.getMonth();
  const currentYear = now.getFullYear();

  return renewals.filter(r => {
    const expiry = new Date(r.expiry);
    return expiry.getMonth() === currentMonth && expiry.getFullYear() === currentYear;
  });
}

// Function to populate table
function populateTable(renewals) {
  const tableBody = document.querySelector("#renewalsTable tbody");
  const paginationDiv = document.getElementById("pagination");
  tableBody.innerHTML = '';
  paginationDiv.innerHTML = '';

  const totalRecords = renewals.length;
  const totalPages = Math.ceil(totalRecords / recordsPerPage);
  const startIndex = (currentPage - 1) * recordsPerPage;
  const endIndex = startIndex + recordsPerPage;
  const pageData = renewals.slice(startIndex, endIndex);

  pageData.forEach((r, index) => {
    const globalIndex = startIndex + index;
    const tr = document.createElement("tr");
    tr.innerHTML = `
      <td data-label="Client">${r.client}</td>
      <td data-label="Service">${r.service}</td>
      <td data-label="Start Date">${r.start}</td>
      <td data-label="Expiry Date">${r.expiry}</td>
      <td data-label="Amount">$${r.amount}</td>
      <td data-label="Status"><span class="status ${r.status}">${r.status.charAt(0).toUpperCase() + r.status.slice(1)}</span></td>
      <td data-label="Actions" class="actions">
        <button class="btn-renew" data-index="${globalIndex}">Renew</button>
      </td>
    `;
    tableBody.appendChild(tr);
  });

  // Generate pagination controls
  if (totalPages > 1) {
    const prevBtn = document.createElement("button");
    prevBtn.textContent = "Previous";
    prevBtn.disabled = currentPage === 1;
    prevBtn.addEventListener("click", () => {
      if (currentPage > 1) {
        currentPage--;
        populateTable(renewals);
      }
    });
    paginationDiv.appendChild(prevBtn);

    for (let i = 1; i <= totalPages; i++) {
      const pageBtn = document.createElement("button");
      pageBtn.textContent = i;
      pageBtn.classList.toggle("active", i === currentPage);
      pageBtn.addEventListener("click", () => {
        currentPage = i;
        populateTable(renewals);
      });
      paginationDiv.appendChild(pageBtn);
    }

    const nextBtn = document.createElement("button");
    nextBtn.textContent = "Next";
    nextBtn.disabled = currentPage === totalPages;
    nextBtn.addEventListener("click", () => {
      if (currentPage < totalPages) {
        currentPage++;
        populateTable(renewals);
      }
    });
    paginationDiv.appendChild(nextBtn);
  }
}

// Function to update summary cards
function updateSummaryCards(renewals) {
  document.getElementById("totalRenewals").textContent = renewals.length;
  document.getElementById("thisMonthRenewals").textContent = getThisMonthRenewals(renewals).length;
  document.getElementById("overdueRenewals").textContent = renewals.filter(r => r.status === "overdue").length;
  document.getElementById("expiringRenewals").textContent = renewals.filter(r => r.status === "expiring").length;
}

// Function to handle renew button click
function handleRenew(index, renewals) {
  const renewal = renewals[index];
  if (confirm(`Renew ${renewal.service} for ${renewal.client}?`)) {
    // Update the renewal date to next year
    const newExpiry = new Date(renewal.expiry);
    newExpiry.setFullYear(newExpiry.getFullYear() + 1);
    const newExpiryStr = newExpiry.toISOString().split('T')[0];

    // Update in original data source
    updateOriginalData(renewal, newExpiryStr);

    // Refresh the page to show updated data
    location.reload();
  }
}

// Function to handle edit button click
function handleEdit(index, renewals) {
  const renewal = renewals[index];
  // For now, just show an alert with the data
  alert(`Edit functionality for ${renewal.client} - ${renewal.service}\n\nCurrent expiry: ${renewal.expiry}\nAmount: $${renewal.amount}`);
  // TODO: Implement actual edit modal/form
}

// Function to update original data source
function updateOriginalData(renewal, newExpiry) {
  let data = JSON.parse(localStorage.getItem(`accounts_${renewal.source}_data`) || '[]');
  const itemIndex = data.findIndex(item => item === renewal.data);

  if (itemIndex !== -1) {
    data[itemIndex].renewalDate = newExpiry;
    localStorage.setItem(`accounts_${renewal.source}_data`, JSON.stringify(data));
  }
}

let renewals = [];
let currentPage = 1;
const recordsPerPage = 5;

function filterAndDisplayRenewals(filterKey) {
  let filteredRenewals = [];
  switch(filterKey) {
    case 'total':
      filteredRenewals = renewals;
      break;
    case 'thisMonth':
      filteredRenewals = getThisMonthRenewals(renewals);
      break;
    case 'overdue':
      filteredRenewals = renewals.filter(r => r.status === 'overdue');
      break;
    case 'expiring':
      filteredRenewals = renewals.filter(r => r.status === 'expiring');
      break;
    default:
      filteredRenewals = renewals;
  }
  currentPage = 1; // Reset to first page on filter
  populateTable(filteredRenewals);
}

function setupSummaryCardClicks() {
  const totalCard = document.getElementById('totalRenewals').parentElement;
  const thisMonthCard = document.getElementById('thisMonthRenewals').parentElement;
  const overdueCard = document.getElementById('overdueRenewals').parentElement;
  const expiringCard = document.getElementById('expiringRenewals').parentElement;

  totalCard.style.cursor = 'pointer';
  thisMonthCard.style.cursor = 'pointer';
  overdueCard.style.cursor = 'pointer';
  expiringCard.style.cursor = 'pointer';

  totalCard.addEventListener('click', () => filterAndDisplayRenewals('total'));
  thisMonthCard.addEventListener('click', () => filterAndDisplayRenewals('thisMonth'));
  overdueCard.addEventListener('click', () => filterAndDisplayRenewals('overdue'));
  expiringCard.addEventListener('click', () => filterAndDisplayRenewals('expiring'));
}

// Initialize the page
document.addEventListener('DOMContentLoaded', function() {
  renewals = getRenewalData();
  updateSummaryCards(renewals);
  filterAndDisplayRenewals('total'); // default view: all renewals
  setupSummaryCardClicks();

  // Add event listeners to buttons
  document.addEventListener('click', function(e) {
    if (e.target.classList.contains('btn-renew')) {
      const index = parseInt(e.target.getAttribute('data-index'));
      handleRenew(index, renewals);
    } else if (e.target.classList.contains('btn-edit')) {
      const index = parseInt(e.target.getAttribute('data-index'));
      handleEdit(index, renewals);
    }
  });
});
