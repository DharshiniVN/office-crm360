/* Income & Expense Reports JS */

const incomeExpenseFields = [
  ['date', 'Date'],
  ['project_name', 'Project Name'],
  ['income_from', 'Income From'],
  ['expense_for', 'Expense For'],
  ['description', 'Description'],
  ['price', 'Price'],
  ['actions', 'Actions']
];

function getIncomeData(){
  return JSON.parse(localStorage.getItem('accounts_income_data') || '[]');
}

function getExpenseData(){
  return JSON.parse(localStorage.getItem('accounts_expense_data') || '[]');
}

function getQueryParam(param) {
  const urlParams = new URLSearchParams(window.location.search);
  return urlParams.get(param);
}

function renderTable(data, type) {
  const table = document.getElementById('table');
  if(!table) return;
  table.innerHTML = '';
  if(data.length === 0){
    table.innerHTML = '<tr><td colspan="' + incomeExpenseFields.length + '">No records found</td></tr>';
    return;
  }
  const thead = document.createElement('thead');
  const trHead = document.createElement('tr');
  incomeExpenseFields.forEach(([key, label]) => {
    if(key === 'income_from' && type === 'expense') return;
    if(key === 'expense_for' && type === 'income') return;
    const th = document.createElement('th');
    th.textContent = label;
    trHead.appendChild(th);
  });
  thead.appendChild(trHead);
  table.appendChild(thead);

  const tbody = document.createElement('tbody');
  data.forEach((entry, index) => {
    const tr = document.createElement('tr');
    incomeExpenseFields.forEach(([key]) => {
      if(key === 'income_from' && type === 'expense') return;
      if(key === 'expense_for' && type === 'income') return;
      const td = document.createElement('td');
      if(key === 'price'){
        td.textContent = '₹' + parseFloat(entry[key] || 0).toLocaleString();
      } else if(key === 'actions'){
        td.innerHTML = `
          <button class="btn small edit-btn" data-index="${index}" data-type="${type}">Edit</button>
          <button class="btn small danger delete-btn" data-index="${index}" data-type="${type}">Delete</button>
        `;
      } else {
        td.textContent = entry[key] || '';
      }
      tr.appendChild(td);
    });
    tbody.appendChild(tr);
  });
  table.appendChild(tbody);
}

function setupSearch(inputId, tableId, data, type) {
  const input = document.getElementById(inputId);
  if(!input) return;
  input.addEventListener('input', () => {
    const val = input.value.toLowerCase();
    const filtered = data.filter(d => JSON.stringify(d).toLowerCase().includes(val));
    renderTable(filtered, type);
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
        if(cell.textContent !== 'Actions'){  // skip Actions column
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
      for(let j = 0; j < row.cells.length - 1; j++){  // skip last cell "Actions"
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


document.addEventListener('DOMContentLoaded', () => {
  const type = getQueryParam('type') || 'income';
  let data = type === 'income' ? getIncomeData() : getExpenseData();

  renderTable(data, type);

  setupSearch('search', 'table', data, type);

  setupExport('export', 'table');

  // Add event listeners for edit and delete buttons
  const table = document.getElementById('table');
  table.addEventListener('click', (e) => {
    if (e.target.classList.contains('edit-btn')) {
      const index = parseInt(e.target.getAttribute('data-index'));
      const type = e.target.getAttribute('data-type');
      editEntry(index, type);
    } else if (e.target.classList.contains('delete-btn')) {
      const index = parseInt(e.target.getAttribute('data-index'));
      const type = e.target.getAttribute('data-type');
      deleteEntry(index, type);
    }
  });



  // Edit entry function
  function editEntry(index, type) {
    const dataKey = type === 'income' ? 'accounts_income_data' : 'accounts_expense_data';
    const currentData = JSON.parse(localStorage.getItem(dataKey) || '[]');
    const entry = currentData[index];

    if (!entry) {
      alert('Entry not found!');
      return;
    }

    openEditModal(entry, index, type, currentData, dataKey);
  }

  // Delete entry function
  function deleteEntry(index, type) {
    if (confirm('Are you sure you want to delete this entry?')) {
      const dataKey = type === 'income' ? 'accounts_income_data' : 'accounts_expense_data';
      const currentData = JSON.parse(localStorage.getItem(dataKey) || '[]');
      currentData.splice(index, 1);
      localStorage.setItem(dataKey, JSON.stringify(currentData));
      // Refresh table
      data = JSON.parse(localStorage.getItem(dataKey) || '[]');
      renderTable(data, type);
    }
  }

  // Open edit modal and populate form
  function openEditModal(entry, index, type, currentData, dataKey) {
    const modal = document.getElementById('editModal');
    const form = document.getElementById('editForm');
    modal.classList.add('open');

    form.innerHTML = `
      <div class="field">
        <label>Type:</label>
        <input type="text" value="${entry.type}" disabled />
      </div>
      <div class="field">
        <label>Price:</label>
        <input type="number" name="price" value="${entry.price || ''}" step="0.01" required />
      </div>
      <div class="field">
        <label>Date:</label>
        <input type="date" name="date" value="${entry.date || ''}" required />
      </div>
      <div class="field">
        <label>Project Name:</label>
        <input type="text" name="project_name" value="${entry.project_name || ''}" required />
      </div>
      <div class="field">
        <label>${type === 'income' ? 'Income From:' : 'Expense For:'}</label>
        <input type="text" name="source" value="${entry.income_from || entry.expense_for || ''}" required />
      </div>
      <div class="field">
        <label>Description:</label>
        <textarea name="description" rows="3">${entry.description || ''}</textarea>
      </div>
    `;

    const saveBtn = document.getElementById('saveEdit');
    saveBtn.onclick = (e) => {
      e.preventDefault();
      const formData = new FormData(form);
      const updatedEntry = {
        type: entry.type,
        price: formData.get('price'),
        date: formData.get('date'),
        project_name: formData.get('project_name'),
        description: formData.get('description')
      };
      if (entry.type === 'income') {
        updatedEntry.income_from = formData.get('source');
      } else {
        updatedEntry.expense_for = formData.get('source');
      }
      currentData[index] = updatedEntry;
      localStorage.setItem(dataKey, JSON.stringify(currentData));
      modal.classList.remove('open');
      renderTable(currentData, type);
    };
  }

  // Hamburger menu toggle
  const hamburger = document.querySelector('.hamburger-menu');
  const sidebar = document.querySelector('.sidebar');
  if (hamburger && sidebar) {
    hamburger.addEventListener('click', () => {
      sidebar.classList.toggle('open');
    });
  }
});
