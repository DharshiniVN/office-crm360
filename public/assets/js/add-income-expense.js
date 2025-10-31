// JavaScript for add-income-expense.html page

document.addEventListener('DOMContentLoaded', () => {
  const formContainer = document.getElementById('income-expense-form-container');

  function createIncomeExpenseForm(entry = null, editIndex = null) {
    const isEdit = entry !== null;

    formContainer.innerHTML = `
      <form id="income-expense-form" class="form">
        <h3 style="grid-column: 1 / -1;">${isEdit ? 'Edit' : 'Add'} Income/Expense</h3>

        <div class="field">
          <label>Type:</label>
          <select name="type" class="input" required ${isEdit ? 'disabled' : ''}>
            <option value="income" ${entry && entry.type === 'income' ? 'selected' : ''}>Income</option>
            <option value="expense" ${entry && entry.type === 'expense' ? 'selected' : ''}>Expense</option>
          </select>
        </div>

        <div class="field">
          <label>Price:</label>
          <input type="number" name="price" class="input" step="0.01" value="${entry ? entry.price || '' : ''}" required>
        </div>

        <div class="field">
          <label>Date:</label>
          <input type="date" name="date" class="input" value="${entry ? entry.date || '' : new Date().toISOString().split('T')[0]}" required>
        </div>

        <div class="field">
          <label>Project Name:</label>
          <input type="text" name="project_name" class="input" value="${entry ? entry.project_name || '' : ''}" required>
        </div>

        <div class="field">
          <label id="source-label">${entry && entry.type === 'income' ? 'Income From:' : 'Expense For:'}</label>
          <input type="text" name="source" class="input" value="${entry ? (entry.income_from || entry.expense_for || '') : ''}" required>
        </div>

        <div class="field">
          <label>Description:</label>
          <textarea name="description" class="input" rows="3">${entry ? entry.description || '' : ''}</textarea>
        </div>

        <div class="field">
          <label>Bill (Optional):</label>
          <input type="file" name="bill" class="input" accept="image/*,.pdf">
          ${entry && entry.bill ? `<div class="bill-preview">Current file: ${entry.bill_name || 'File attached'}</div>` : ''}
        </div>

        <div class="form-actions">
          <button type="submit" class="btn primary">${isEdit ? 'Update' : 'Save'}</button>
          <button type="button" class="btn" id="cancel-form">Cancel</button>
        </div>
      </form>
    `;

    // Update source label based on type selection
    const typeSelect = document.querySelector('select[name="type"]');
    const sourceLabel = document.getElementById('source-label');
    const sourceInput = document.querySelector('input[name="source"]');

    if (!isEdit) {
      typeSelect.addEventListener('change', (e) => {
        if (e.target.value === 'income') {
          sourceLabel.textContent = 'Income From:';
          sourceInput.placeholder = 'Enter income source';
        } else {
          sourceLabel.textContent = 'Expense For:';
          sourceInput.placeholder = 'Enter expense category';
        }
      });
    }

    // Form event listeners
    document.getElementById('income-expense-form').addEventListener('submit', (e) => {
      e.preventDefault();
      if (isEdit) {
        updateEntry(editIndex, entry.type);
      } else {
        saveEntry();
      }
    });

    document.getElementById('cancel-form').addEventListener('click', () => {
      window.location.href = 'index.html';
    });
  }

  // Save entry
  function saveEntry() {
    const form = document.getElementById('income-expense-form');
    const formData = new FormData(form);
    const entry = {
      type: formData.get('type'),
      price: formData.get('price'),
      date: formData.get('date'),
      project_name: formData.get('project_name'),
      description: formData.get('description')
    };

    // Set source field based on type
    if (entry.type === 'income') {
      entry.income_from = formData.get('source');
    } else {
      entry.expense_for = formData.get('source');
    }

    // Handle file upload
    const fileInput = document.querySelector('input[name="bill"]');
    if (fileInput.files[0]) {
      entry.bill = URL.createObjectURL(fileInput.files[0]);
      entry.bill_name = fileInput.files[0].name;
    }

    const dataKey = entry.type === 'income' ? 'accounts_income_data' : 'accounts_expense_data';
    const currentData = JSON.parse(localStorage.getItem(dataKey) || '[]');
    currentData.push(entry);
    localStorage.setItem(dataKey, JSON.stringify(currentData));

    // Redirect back to main page after save
    window.location.href = 'index.html';
  }

  // Edit entry
  function editEntry(index, type) {
    const dataKey = type === 'income' ? 'accounts_income_data' : 'accounts_expense_data';
    const currentData = JSON.parse(localStorage.getItem(dataKey) || '[]');
    const entry = currentData[index];

    if (!entry) {
      alert('Entry not found!');
      return;
    }

    createIncomeExpenseForm(entry, index);
  }

  // Update entry
  function updateEntry(index, type) {
    const form = document.getElementById('income-expense-form');
    const formData = new FormData(form);
    const entry = {
      type: type,
      price: formData.get('price'),
      date: formData.get('date'),
      project_name: formData.get('project_name'),
      description: formData.get('description')
    };

    // Set source field based on type
    if (type === 'income') {
      entry.income_from = formData.get('source');
    } else {
      entry.expense_for = formData.get('source');
    }

    // Handle file upload
    const fileInput = document.querySelector('input[name="bill"]');
    if (fileInput.files[0]) {
      entry.bill = URL.createObjectURL(fileInput.files[0]);
      entry.bill_name = fileInput.files[0].name;
    }

    const dataKey = type === 'income' ? 'accounts_income_data' : 'accounts_expense_data';
    const currentData = JSON.parse(localStorage.getItem(dataKey) || '[]');
    currentData[index] = entry;
    localStorage.setItem(dataKey, JSON.stringify(currentData));

    // Redirect back to main page after update
    window.location.href = 'index.html';
  }

  // Initialize form on page load
  createIncomeExpenseForm();
});
