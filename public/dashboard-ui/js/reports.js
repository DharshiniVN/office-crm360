
// Utilities
const params = new URLSearchParams(location.search);
const type = params.get('type')||'total';
const titleMap = {
  total:'Total Report',
  wordpress:'WordPress',
  hardcode:'Hardcoding',
  ecom:'E‑commerce',
  maintenance:'Modification / Maintenance',
  applications:'Applications',
  webapp:'Web Application',
  android:'Android Application',
  ios:'iOS Application'
};
document.getElementById('report-title').textContent = titleMap[type] || 'Report';

function getData(){
  return JSON.parse(localStorage.getItem('accounts_wa_data')||'[]');
}
function setData(rows){ localStorage.setItem('accounts_wa_data', JSON.stringify(rows)); }

function filterByType(rows){
  if(type==='total') return rows;
  if(type==='applications') return rows.filter(r=>['webapp','android','ios'].includes(r.category));
  return rows.filter(r=>r.category===type);
}

function buildTable(el, rows){
  if(rows.length===0){ el.innerHTML = '<tr><td colspan="9">No data</td></tr>'; return; }
  const cols = ['slno', 'clientName', 'contact', 'gmail1', 'category', 'renewalAmount', 'renewalDate'];
  const header = '<tr>' + cols.map(c=>`<th>${c.replace(/([A-Z])/g, ' $1').replace(/^./, str => str.toUpperCase())}</th>`).join('') + '<th>View</th></tr>';
  const body = rows.map((r,i)=>{
    return '<tr>' + cols.map(c=>`<td>${r[c]??''}</td>`).join('') + `<td><button class="btn" data-view="${r.slno}">View</button></td></tr>`;
  }).join('');
  el.innerHTML = header + body;
}

function addSearch(inputEl, tableEl, sourceRows){
  inputEl.addEventListener('input', ()=>{
    const q = inputEl.value.toLowerCase();
    const filtered = sourceRows.filter(r=> JSON.stringify(r).toLowerCase().includes(q));
    buildTable(tableEl, filtered);
  });
}

function exportCSV(rows, filename='export.csv'){
  const cols = Object.keys(rows[0]||{});
  const escape = (v)=> `"${String(v??'').replace(/"/g,'""')}"`;
  const csv = [cols.join(',')].concat(
    rows.map(r=> cols.map(c=>escape(r[c])).join(','))
  ).join('\n');
  const blob = new Blob([csv], {type:'text/csv;charset=utf-8;'});
  const url = URL.createObjectURL(blob);
  const a = document.createElement('a');
  a.href = url; a.download = filename; a.click();
  URL.revokeObjectURL(url);
}

function renewalsDue(rows){
  const now = new Date();
  return rows.filter(r=>{
    const d = new Date(r.renewalDate);
    const diff = (d - now)/(1000*60*60*24);
    return !isNaN(diff) && diff <= 60;
  });
}

// Init
const rowsAll = filterByType(getData());
const table1 = document.getElementById('table1');
const table2 = document.getElementById('table2');

buildTable(table1, rowsAll);
buildTable(table2, renewalsDue(rowsAll));

addSearch(document.getElementById('search1'), table1, rowsAll);
addSearch(document.getElementById('search2'), table2, renewalsDue(rowsAll));

document.getElementById('export1').onclick = ()=> exportCSV(rowsAll, `${type}-all.csv`);
document.getElementById('export2').onclick = ()=> exportCSV(renewalsDue(rowsAll), `${type}-renewals.csv`);

// Handle view button clicks
function handleViewClick(e){
  const btn = e.target.closest('button[data-view]');
  if(!btn) return;
  const slno = btn.dataset.view;
  window.location.href = `/wa-detail?slno=${slno}&type=${type}`;
}

table1.addEventListener('click', handleViewClick);
table2.addEventListener('click', handleViewClick);
