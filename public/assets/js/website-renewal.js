  // Website Renewal Dashboard JavaScript

document.addEventListener('DOMContentLoaded', () => {
  const renewalCardsContainer = document.getElementById('renewal-cards');
  const mainContent = document.querySelector('main.content');

  // Get data from existing localStorage keys
  function getRenewalData() {
    const waData = JSON.parse(localStorage.getItem('accounts_wa_data') || '[]');
    const productsData = JSON.parse(localStorage.getItem('accounts_products_data') || '[]');
    const domainData = JSON.parse(localStorage.getItem('accounts_domain_data') || '[]');
    const serverData = JSON.parse(localStorage.getItem('accounts_server_data') || '[]');

    const renewalData = [];

    // Process website & application data
    waData.forEach((item, index) => {
      if (item.renewalDate) {
        renewalData.push({
          slno: index + 1,
          clientName: item.clientName || item.name || '',
          contactNumber: item.contactNumber || item.phone || '',
          gmailId1: item.gmailId1 || item.email || '',
          gmailId2: item.gmailId2 || '',
          customerProductCategory: item.category || 'Website/Application',
          websiteUrl: item.websiteUrl || item.url || '',
          applicationUrl: item.applicationUrl || '',
          domainName: item.domainName || '',
          domainBookingDate: item.domainBookingDate || item.bookingDate || '',
          renewalAmount: item.renewalAmount || item.amount || 0,
          renewalDate: item.renewalDate,
          renewStatus: item.renewStatus || 'payment pending',
          category: item.category === 'Application' ? 'application' : 'website'
        });
      }
    });

    // Process products data
    productsData.forEach((item, index) => {
      if (item.renewalDate) {
        renewalData.push({
          slno: renewalData.length + 1,
          clientName: item.clientName || item.name || '',
          contactNumber: item.contactNumber || item.phone || '',
          gmailId1: item.gmailId1 || item.email || '',
          gmailId2: item.gmailId2 || '',
          customerProductCategory: 'Product',
          websiteUrl: '',
          applicationUrl: '',
          domainName: item.domainName || '',
          domainBookingDate: item.domainBookingDate || item.bookingDate || '',
          renewalAmount: item.renewalAmount || item.amount || 0,
          renewalDate: item.renewalDate,
          renewStatus: item.renewStatus || 'payment pending',
          category: 'product'
        });
      }
    });

    // Process domain data
    domainData.forEach((item, index) => {
      renewalData.push({
        slno: renewalData.length + 1,
        clientName: item.clientName || item.name || '',
        contactNumber: item.contactNumber || item.phone || '',
        gmailId1: item.gmailId1 || item.email || '',
        gmailId2: item.gmailId2 || '',
        customerProductCategory: 'Domain',
        websiteUrl: '',
        applicationUrl: '',
        domainName: item.domainName || item.name || '',
        domainBookingDate: item.domainBookingDate || item.bookingDate || '',
        renewalAmount: item.renewalAmount || item.amount || 0,
        renewalDate: item.renewalDate || '',
        renewStatus: item.renewStatus || 'payment pending',
        category: 'domain'
      });
    });

    // Process server data
    serverData.forEach((item, index) => {
      renewalData.push({
        slno: renewalData.length + 1,
        clientName: item.clientName || item.name || '',
        contactNumber: item.contactNumber || item.phone || '',
        gmailId1: item.gmailId1 || item.email || '',
        gmailId2: item.gmailId2 || '',
        customerProductCategory: 'Server',
        websiteUrl: '',
        applicationUrl: '',
        domainName: item.domainName || '',
        domainBookingDate: item.domainBookingDate || item.bookingDate || '',
        renewalAmount: item.renewalAmount || item.amount || 0,
        renewalDate: item.renewalDate || '',
        renewStatus: item.renewStatus || 'payment pending',
        category: 'server'
      });
    });

    return renewalData;
  }

  // Card definitions
  const cards = [
    { id: 'website', label: 'Website Renewal' },
    { id: 'application', label: 'Application Renewal' },
    { id: 'product', label: 'Product Renewal' },
    { id: 'domain', label: 'Domain Renewal' },
    { id: 'server', label: 'Server Renewal' }
  ];

  // Render cards
  function renderCards() {
    renewalCardsContainer.innerHTML = '';
    cards.forEach(card => {
      const cardDiv = document.createElement('div');
      cardDiv.className = 'card renewal-card';
      cardDiv.id = `${card.id}-card`;
      cardDiv.textContent = card.label;
      cardDiv.style.cursor = 'pointer';
      cardDiv.style.padding = '20px';
      cardDiv.style.borderRadius = '16px';
      cardDiv.style.background = 'var(--panel)';
      cardDiv.style.boxShadow = 'var(--shadow)';
      cardDiv.style.fontWeight = '700';
      cardDiv.style.fontSize = '18px';
      cardDiv.style.textAlign = 'center';
      cardDiv.style.userSelect = 'none';
      cardDiv.addEventListener('click', () => {
        showRenewalTable(card.id);
      });
      renewalCardsContainer.appendChild(cardDiv);
    });
  }

  // Format date as YYYY-MM-DD
  function formatDate(date) {
    const d = new Date(date);
    const month = '' + (d.getMonth() + 1);
    const day = '' + d.getDate();
    const year = d.getFullYear();

    return [year, month.padStart(2, '0'), day.padStart(2, '0')].join('-');
  }

  // Update renewal status in original localStorage
  function updateRenewalStatus(category, index, status) {
    const newDate = formatDate(new Date());

    if (category === 'website' || category === 'application') {
      const waData = JSON.parse(localStorage.getItem('accounts_wa_data') || '[]');
      const renewalItems = waData.filter(item => item.renewalDate);
      if (renewalItems[index]) {
        renewalItems[index].renewStatus = status;
        renewalItems[index].renewalDate = newDate;
        localStorage.setItem('accounts_wa_data', JSON.stringify(waData));
      }
    } else if (category === 'product') {
      const productsData = JSON.parse(localStorage.getItem('accounts_products_data') || '[]');
      const renewalItems = productsData.filter(item => item.renewalDate);
      if (renewalItems[index]) {
        renewalItems[index].renewStatus = status;
        renewalItems[index].renewalDate = newDate;
        localStorage.setItem('accounts_products_data', JSON.stringify(productsData));
      }
    } else if (category === 'domain') {
      const domainData = JSON.parse(localStorage.getItem('accounts_domain_data') || '[]');
      if (domainData[index]) {
        domainData[index].renewStatus = status;
        domainData[index].renewalDate = newDate;
        localStorage.setItem('accounts_domain_data', JSON.stringify(domainData));
      }
    } else if (category === 'server') {
      const serverData = JSON.parse(localStorage.getItem('accounts_server_data') || '[]');
      if (serverData[index]) {
        serverData[index].renewStatus = status;
        serverData[index].renewalDate = newDate;
        localStorage.setItem('accounts_server_data', JSON.stringify(serverData));
      }
    }
  }

  // Show renewal table filtered by category
  function showRenewalTable(category) {
    // Get fresh data from localStorage
    const renewalData = getRenewalData();

    // Filter data by category and renewal date <= today
    let filteredData;
    const today = new Date();
    if (category === 'product') {
      // For product renewal, show only product category with renewal date and renewalDate <= today
      filteredData = renewalData.filter(item => item.category === 'product' && item.renewalDate && new Date(item.renewalDate) <= today);
    } else {
      filteredData = renewalData.filter(item => item.category === category && item.renewalDate && new Date(item.renewalDate) <= today);
    }

    // Create container for table and back button
    const container = document.createElement('div');
    container.className = 'renewal-table-container';
    container.style.marginTop = '20px';

    // Back button
    const backBtn = document.createElement('button');
    backBtn.textContent = '← Back';
    backBtn.className = 'btn';
    backBtn.style.marginBottom = '10px';
    backBtn.addEventListener('click', () => {
      container.remove();
      renewalCardsContainer.style.display = 'grid';
    });

    // Table element
    const table = document.createElement('table');
    table.className = 'data-table';

    // Table header
    const thead = document.createElement('thead');
    const headerRow = document.createElement('tr');
    const columns = [
      'Sl No', 'Client Name', 'Contact Number', 'Gmail ID 1', 'Gmail ID 2', 'Customer Product Category',
      'Website URL', 'Application URL', 'Domain Name', 'Domain Booking Date', 'Renewal Amount',
      'Renewal Date', 'Renew Status', 'Action'
    ];
    columns.forEach(col => {
      const th = document.createElement('th');
      th.textContent = col;
      headerRow.appendChild(th);
    });
    thead.appendChild(headerRow);
    table.appendChild(thead);

    // Table body
    const tbody = document.createElement('tbody');

    filteredData.forEach((item, index) => {
      const tr = document.createElement('tr');

      // Sl No
      const tdSlNo = document.createElement('td');
      tdSlNo.textContent = item.slno || index + 1;
      tr.appendChild(tdSlNo);

      // Client Name
      const tdClientName = document.createElement('td');
      tdClientName.textContent = item.clientName;
      tr.appendChild(tdClientName);

      // Contact Number
      const tdContact = document.createElement('td');
      tdContact.textContent = item.contactNumber;
      tr.appendChild(tdContact);

      // Gmail ID 1
      const tdGmail1 = document.createElement('td');
      tdGmail1.textContent = item.gmailId1;
      tr.appendChild(tdGmail1);

      // Gmail ID 2
      const tdGmail2 = document.createElement('td');
      tdGmail2.textContent = item.gmailId2;
      tr.appendChild(tdGmail2);

      // Customer Product Category
      const tdCategory = document.createElement('td');
      tdCategory.textContent = item.customerProductCategory;
      tr.appendChild(tdCategory);

      // Website URL
      const tdWebsite = document.createElement('td');
      tdWebsite.textContent = item.websiteUrl;
      tr.appendChild(tdWebsite);

      // Application URL
      const tdApp = document.createElement('td');
      tdApp.textContent = item.applicationUrl;
      tr.appendChild(tdApp);

      // Domain Name
      const tdDomain = document.createElement('td');
      tdDomain.textContent = item.domainName;
      tr.appendChild(tdDomain);

      // Domain Booking Date
      const tdDomainBooking = document.createElement('td');
      tdDomainBooking.textContent = item.domainBookingDate;
      tr.appendChild(tdDomainBooking);

      // Renewal Amount
      const tdRenewalAmount = document.createElement('td');
      tdRenewalAmount.textContent = item.renewalAmount;
      tr.appendChild(tdRenewalAmount);

      // Renewal Date
      const tdRenewalDate = document.createElement('td');
      tdRenewalDate.textContent = item.renewalDate;
      tr.appendChild(tdRenewalDate);

      // Renew Status
      const tdRenewStatus = document.createElement('td');
      // Determine status by comparing today's date and renewal date
      const renewalDateObj = new Date(item.renewalDate);
      let statusText = '';
      if (item.renewStatus === 'payment done' || item.renewStatus === 'renewal done') {
        statusText = item.renewStatus;
      } else {
        if (today > renewalDateObj) {
          statusText = 'payment pending';
        } else {
          statusText = 'payment done';
        }
      }
      tdRenewStatus.textContent = statusText;
      tr.appendChild(tdRenewStatus);

      // Action (pay button if payment pending)
      const tdAction = document.createElement('td');
      if (statusText === 'payment pending') {
        const payBtn = document.createElement('button');
        payBtn.textContent = 'Pay';
        payBtn.className = 'btn primary';
        payBtn.addEventListener('click', () => {
          // Update status and renewal date in original localStorage
          updateRenewalStatus(category, item.slno - 1, 'payment done');
          // Refresh table
          showRenewalTable(category);
        });
        tdAction.appendChild(payBtn);
      } else {
        tdAction.textContent = '-';
      }
      tr.appendChild(tdAction);

      tbody.appendChild(tr);
    });

    table.appendChild(tbody);

    // Hide cards and show table
    renewalCardsContainer.style.display = 'none';
    mainContent.appendChild(container);
    container.appendChild(backBtn);
    container.appendChild(table);
  }

  // Initial render
  renderCards();
});
