/* Website & Applications Reports JS */

const waFields = [
  ['slno', 'Sl No'],
  ['clientName', 'Client Name'],
  ['contact', 'Contact'],
  ['gmail1', 'Gmail1'],
  ['category', 'Category'],
  ['renewalAmount', 'Renewal Amount'],
  ['renewalDate', 'Renewal Date'],
  ['actions', 'Actions']
];

function getWAData(){
  return JSON.parse(localStorage.getItem('accounts_wa_data') || '[]');
}

function renderWATable(data) {
  const table = document.getElementById('table');
  if(!table) return;
  table.innerHTML = '';
  if(data.length === 0){
    table.innerHTML = '<tr><td colspan="' + waFields.length + '">No records found</td></tr>';
    return;
  }
  const thead = document.createElement('thead');
  const trHead = document.createElement('tr');
  waFields.forEach(([key, label]) => {
    const th = document.createElement('th');
    th.textContent = label;
    trHead.appendChild(th);
  });
  thead.appendChild(trHead);
  table.appendChild(thead);

  const tbody = document.createElement('tbody');
  data.forEach((entry, index) => {
    const tr = document.createElement('tr');
    waFields.forEach(([key]) => {
      const td = document.createElement('td');
      if(key === 'renewalAmount'){
        td.textContent = '₹' + (entry['renewalAmount'] || entry['renewalAmount'] === 0 ? parseFloat(entry['renewalAmount']).toLocaleString() : '');
      } else if(key === 'renewalDate'){
        td.textContent = entry['renewalDate'] || '';
      } else if(key === 'actions'){
        td.innerHTML = `<button class="btn small view-btn" data-index="${index}">View</button>`;
      } else {
        td.textContent = entry[key] || '';
      }
      tr.appendChild(td);
    });
    tbody.appendChild(tr);
  });
  table.appendChild(tbody);
}

function setupSearchWA(inputId) {
  const input = document.getElementById(inputId);
  if(!input) return;
  input.addEventListener('input', () => {
    const val = input.value.toLowerCase();
    const filtered = getWAData().filter(d => JSON.stringify(d).toLowerCase().includes(val));
    renderWATable(filtered);
  });
}

document.addEventListener('DOMContentLoaded', () => {
  let data = getWAData();
  if(data.length === 0){
    const sample = [
      {
        slno: '1',
        clientName: 'Sample Client',
        contact: '1234567890',
        gmail1: 'sample@gmail.com',
        category: 'Website',
        renewalAmount: '10000',
        renewalDate: '2024-12-01'
      }
    ];
    localStorage.setItem('accounts_wa_data', JSON.stringify(sample));
    data = sample;
  }
  renderWATable(data);
  setupSearchWA('search');

  const table = document.getElementById('table');
  table.addEventListener('click', (e) => {
    if(e.target.classList.contains('view-btn')){
      const index = e.target.getAttribute('data-index');
      // Navigate to detail page with index param
     window.location.href = `/wa-detail?slno=${index}&type=website`;
    }
  });
});
