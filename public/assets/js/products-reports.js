/* Products Reports JS */

const productsFields = [
  ['closerYear', 'Closer Year'],
  ['closerDate', 'Closer Date'],
  ['clientName', 'Client Name'],
  ['clientMob', 'Client Mobile'],
  ['clientGmailID', 'Client Gmail ID'],
  ['projectName', 'Project Name'],
  ['domainName', 'Domain Name'],
  ['domainBookingPlace', 'Domain Booking Place'],
  ['domainBookingDate', 'Domain Booking Date'],
  ['domainBookingYear', 'Domain Booking Year'],
  ['professionalGsuitEmailID', 'Professional/Gsuit Email ID'],
  ['noOfEmailID', 'No. of Email ID'],
  ['altEmailID', 'Alt. Email ID'],
  ['server', 'Server'],
  ['clientLocation', 'Client Location'],
  ['state', 'State'],
  ['country', 'Country'],
  ['clientDOB', 'Client DOB'],
  ['campaign', 'Campaign'],
  ['bdm', 'BDM'],
  ['frontendDeveloper', 'Frontend Developer'],
  ['backendDeveloper', 'Backend Developer'],
  ['projectStartDate', 'Project Start Date'],
  ['projectDeadline', 'Project Deadline'],
  ['demoDate', 'Demo Date'],
  ['projectCloserDate', 'Project Closer Date'],
  ['finalStatus', 'Final Status'],
  ['projectCost', 'Project Cost'],
  ['withGST', 'With GST'],
  ['serverCost', 'Server Cost'],
  ['emailCost', 'Email Cost'],
  ['initialPayment', 'Initial Payment'],
  ['secondPayment', '2nd Payment'],
  ['remPayment', 'Rem. Payment'],
  ['pendingPayment', 'Pending Payment'],
  ['remark', 'Remark'],
  ['projectStatus', 'Project Status'],
  ['amc', 'AMC'],
  ['renewalStatus', 'Renewal Status'],
  ['renewalMonth', 'Renewal Month'],
  ['renewalDate', 'Renewal Date'],
  ['renewalItems', 'Renewal Items'],
  ['renewalAmount', 'Renewal Amount'],
  ['renewalRemark', 'Renewal Remark']
];

// Sample data for Products module
const sampleProductsData = [
  {
    closerYear:2024, closerDate:'2024-01-15', clientName:'ABC School', clientMob:'9876543210',
    clientGmailID:'abc.school@gmail.com', projectName:'School Management System', domainName:'abcschool.com',
    domainBookingPlace:'godaddy', domainBookingDate:'2024-01-10', domainBookingYear:2024,
    professionalGsuitEmailID:'admin@abcschool.com', noOfEmailID:10, altEmailID:'info@abcschool.com',
    server:'vps', clientLocation:'Mumbai', state:'Maharashtra', country:'India', clientDOB:'1980-05-15',
    campaign:'Education Software', bdm:'Raj Sharma', frontendDeveloper:'Amit Kumar', backendDeveloper:'Priya Singh',
    projectStartDate:'2024-01-01', projectDeadline:'2024-03-31', demoDate:'2024-02-15', projectCloserDate:'2024-03-20',
    finalStatus:'Completed', projectCost:50000, withGST:59000, serverCost:5000, emailCost:2000,
    initialPayment:20000, secondPayment:20000, remPayment:19000, pendingPayment:0,
    remark:'System implemented successfully', projectStatus:'Completed', amc:'Yes',
    renewalStatus:'Active', renewalMonth:'January', renewalDate:'2025-01-15', renewalItems:'Software License, Support',
    renewalAmount:10000, renewalRemark:'Annual maintenance contract', category:'school_management'
  },
  {
    closerYear:2024, closerDate:'2024-02-10', clientName:'Retail Store', clientMob:'8765432109',
    clientGmailID:'retail.store@gmail.com', projectName:'Billing Software', domainName:'retailstore.com',
    domainBookingPlace:'cloudindia', domainBookingDate:'2024-02-05', domainBookingYear:2024,
    professionalGsuitEmailID:'billing@retailstore.com', noOfEmailID:5, altEmailID:'sales@retailstore.com',
    server:'shared', clientLocation:'Delhi', state:'Delhi', country:'India', clientDOB:'1975-08-20',
    campaign:'Retail Automation', bdm:'Neha Gupta', frontendDeveloper:'Sandeep Roy', backendDeveloper:'Vikram Patel',
    projectStartDate:'2024-02-01', projectDeadline:'2024-04-30', demoDate:'2024-03-10', projectCloserDate:'2024-04-15',
    finalStatus:'Completed', projectCost:30000, withGST:35400, serverCost:3000, emailCost:1000,
    initialPayment:15000, secondPayment:12000, remPayment:8400, pendingPayment:0,
    remark:'POS system integrated', projectStatus:'Active', amc:'Yes',
    renewalStatus:'Active', renewalMonth:'February', renewalDate:'2025-02-10', renewalItems:'Software Updates, Support',
    renewalAmount:6000, renewalRemark:'Standard maintenance', category:'billing'
  },
  {
    closerYear:2024, closerDate:'2024-03-05', clientName:'Tech Solutions', clientMob:'7654321098',
    clientGmailID:'tech.solutions@gmail.com', projectName:'WhatsApp Business API', domainName:'techsolutions.in',
    domainBookingPlace:'namecheap', domainBookingDate:'2024-03-01', domainBookingYear:2024,
    professionalGsuitEmailID:'support@techsolutions.in', noOfEmailID:8, altEmailID:'contact@techsolutions.in',
    server:'cloud', clientLocation:'Bangalore', state:'Karnataka', country:'India', clientDOB:'1988-12-10',
    campaign:'Business Automation', bdm:'Arun Kumar', frontendDeveloper:'Meera Nair', backendDeveloper:'Karthik Rao',
    projectStartDate:'2024-03-01', projectDeadline:'2024-05-31', demoDate:'2024-04-15', projectCloserDate:'2024-05-20',
    finalStatus:'In Progress', projectCost:40000, withGST:47200, serverCost:4000, emailCost:1500,
    initialPayment:20000, secondPayment:15000, remPayment:12200, pendingPayment:12200,
    remark:'API integration in progress', projectStatus:'Active', amc:'Yes',
    renewalStatus:'Pending', renewalMonth:'March', renewalDate:'2025-03-05', renewalItems:'API License, Support',
    renewalAmount:8000, renewalRemark:'Annual subscription', category:'whatsapp_api'
  }
];

function getProductsData(){
  let data = JSON.parse(localStorage.getItem('accounts_products_data') || '[]');
  if(data.length === 0){
    localStorage.setItem('accounts_products_data', JSON.stringify(sampleProductsData));
    data = sampleProductsData;
  }
  return data;
}

function getQueryParam(param) {
  const urlParams = new URLSearchParams(window.location.search);
  return urlParams.get(param);
}

function renderTable(data, tableId) {
  const table = document.getElementById(tableId);
  if(!table) return;
  table.innerHTML = '';
  if(data.length === 0){
    table.innerHTML = '<tr><td colspan="9">No records found</td></tr>';
    return;
  }

  // Define columns to display
  const displayColumns = [
    ['clientName', 'Client Name'],
    ['clientMob', 'Client Mobile'],
    ['clientGmailID', 'Client Gmail ID'],
    ['projectName', 'Project Name'],
    ['renewalStatus', 'Renewal Status'],
    ['renewalDate', 'Renewal Date'],
    ['renewalAmount', 'Renewal Amount']
  ];

  const thead = document.createElement('thead');
  const trHead = document.createElement('tr');
  displayColumns.forEach(([key, label]) => {
    const th = document.createElement('th');
    th.textContent = label;
    trHead.appendChild(th);
  });
  const thView = document.createElement('th');
  thView.textContent = 'View';
  trHead.appendChild(thView);
  thead.appendChild(trHead);
  table.appendChild(thead);

  const tbody = document.createElement('tbody');
  data.forEach((row, rowIndex) => {
    const tr = document.createElement('tr');
    displayColumns.forEach(([key]) => {
      const td = document.createElement('td');
      td.textContent = row[key] || '';
      tr.appendChild(td);
    });
    const tdView = document.createElement('td');
    const viewBtn = document.createElement('button');
    viewBtn.className = 'btn';
    viewBtn.textContent = 'View';
    viewBtn.setAttribute('data-view', rowIndex);
    tdView.appendChild(viewBtn);
    tr.appendChild(tdView);
    tbody.appendChild(tr);
  });
  table.appendChild(tbody);
}

function filterDataByCategory(data, category) {
  if(!category || category === 'total') return data;
  return data.filter(d => d.category === category);
}

function filterRenewals(data) {
  const now = new Date();
  return data.filter(d => {
    const dDate = new Date(d.renewalDate);
    const diff = (dDate - now) / (1000*60*60*24);
    return diff <= 60;
  });
}

function setupSearch(inputId, tableId, data) {
  const input = document.getElementById(inputId);
  if(!input) return;
  input.addEventListener('input', () => {
    const val = input.value.toLowerCase();
    const filtered = data.filter(d => JSON.stringify(d).toLowerCase().includes(val));
    renderTable(filtered, tableId);
  });
}

function setupExport(buttonId, tableId) {
  const button = document.getElementById(buttonId);
  if(!button) return;
  button.addEventListener('click', () => {
    const table = document.getElementById(tableId);
    if(!table) return;
    let csv = [];
    // Add header
    const headerRow = table.rows[0];
    if(headerRow){
      let headerData = [];
      for(let cell of headerRow.cells){
        if(cell.textContent !== 'View'){  // skip View column
          headerData.push('"' + cell.textContent.replace(/"/g, '""') + '"');
        }
      }
      csv.push(headerData.join(','));
    }
    // Add data rows
    for(let i = 1; i < table.rows.length; i++){
      let row = table.rows[i];
      if(row.cells[0] && row.cells[0].textContent === 'No records found') continue;
      let rowData = [];
      for(let j = 0; j < row.cells.length - 1; j++){  // skip last cell "View"
        let cell = row.cells[j];
        rowData.push('"' + cell.textContent.replace(/"/g, '""') + '"');
      }
      csv.push(rowData.join(','));
    }
    const csvString = csv.join('\n');
    const blob = new Blob([csvString], {type: 'text/csv;charset=utf-8;'});
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = tableId + '.csv';
    a.click();
    URL.revokeObjectURL(url);
  });
}

function handleViewClick(e){
  const btn = e.target.closest('button[data-view]');
  if(!btn) return;
  const index = btn.dataset.view;
  const category = getQueryParam('type') || 'total';
  window.location.href = `product-detail.html?index=${index}&type=${category}`;
}

document.addEventListener('DOMContentLoaded', () => {
  const category = getQueryParam('type') || 'total';
  const data = getProductsData();
  const filteredData = filterDataByCategory(data, category);
  const renewals = filterRenewals(filteredData);

  renderTable(filteredData, 'table1');
  renderTable(renewals, 'table2');

  setupSearch('search1', 'table1', filteredData);
  setupSearch('search2', 'table2', renewals);

  setupExport('export1', 'table1');
  setupExport('export2', 'table2');

  // Add event listeners for view buttons
  document.getElementById('table1').addEventListener('click', handleViewClick);
  document.getElementById('table2').addEventListener('click', handleViewClick);
});
