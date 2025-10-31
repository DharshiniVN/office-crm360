// Digital Marketing Reports JS

const dmDisplayColumns = [
  ['srNo', 'Sr No'],
  ['clientName', 'Client Name'],
  ['projectName', 'Project Name'],
  ['clientMob', 'Client Mobile'],
  ['clientGmailID', 'Client Gmail ID']
];

// Sample data for Digital Marketing module
const sampleDMData = [
  {
    srNo: '1',
    clientName: 'Sample DM Client',
    projectName: 'SEO Campaign',
    clientMob: '1234567890',
    clientGmailID: 'dmclient@gmail.com',
    category: 'seo',
    projectStatus: 'Active',
    renewalDate: '2024-12-01'
  }
];

function getDMData(){
  let data = JSON.parse(localStorage.getItem('accounts_dm_data') || '[]');
  if(data.length === 0){
    localStorage.setItem('accounts_dm_data', JSON.stringify(sampleDMData));
    data = sampleDMData;
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
    table.innerHTML = '<tr><td colspan="' + (dmDisplayColumns.length + 1) + '">No records found</td></tr>';
    return;
  }

  const thead = document.createElement('thead');
  const trHead = document.createElement('tr');
  dmDisplayColumns.forEach(([key, label]) => {
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
    dmDisplayColumns.forEach(([key]) => {
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

function filterActiveCampaigns(data) {
  return data.filter(d => d.projectStatus === 'Active');
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
  window.location.href = `/digital-marketing/detail?index=${index}&type=${category}`;
}

document.addEventListener('DOMContentLoaded', () => {
  const category = getQueryParam('type') || 'total';
  const data = getDMData();
  const filteredData = filterDataByCategory(data, category);
  const activeCampaigns = filterActiveCampaigns(filteredData);
  const renewals = filterRenewals(filteredData);

  renderTable(filteredData, 'table1');
  renderTable(activeCampaigns, 'table2');
  renderTable(renewals, 'table3');

  setupSearch('search1', 'table1', filteredData);
  setupSearch('search2', 'table2', activeCampaigns);
  setupSearch('search3', 'table3', renewals);

  setupExport('export1', 'table1');
  setupExport('export2', 'table2');
  setupExport('export3', 'table3');

  document.getElementById('table1').addEventListener('click', handleViewClick);
  document.getElementById('table2').addEventListener('click', handleViewClick);
  document.getElementById('table3').addEventListener('click', handleViewClick);
});
