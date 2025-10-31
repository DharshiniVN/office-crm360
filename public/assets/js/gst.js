// GST module JavaScript

document.addEventListener('DOMContentLoaded', () => {
  const gstCardsContainer = document.getElementById('gst-cards');

  // Function to get fresh data
  function getOutputGstData() {
    return JSON.parse(localStorage.getItem('accounts_output_gst_data') || '[]');
  }

  function getInputGstData() {
    return JSON.parse(localStorage.getItem('accounts_input_gst_data') || '[]');
  }

  // Initialize sample data if empty
  if (getOutputGstData().length === 0) {
    const sampleOutputData = [
      {
        sl_no: "1",
        invoice_no: "OUT123",
        invoice_date: "2024-06-01",
        invoice_month: "June",
        cust_name: "Customer A",
        company: "Company A",
        comp: "Comp A",
        invoice_amount: "10000",
        gst_amount: "1800",
        tds_deduction: "No",
        payment_status: "Paid",
        gst_no: "GSTOUT123"
      }
    ];
    localStorage.setItem('accounts_output_gst_data', JSON.stringify(sampleOutputData));
  }
  if (getInputGstData().length === 0) {
    const sampleInputData = [
      {
        sr_no: "1",
        invoice_no: "INP456",
        invoice_date: "2024-06-05",
        invoice_month: "June",
        company: "Company B",
        gst_no: "GSTINP456",
        invoice_amount: "8000",
        gst_amount: "1440",
        cgst: "720",
        sgst: "720",
        remark: "Sample remark"
      }
    ];
    localStorage.setItem('accounts_input_gst_data', JSON.stringify(sampleInputData));
  }

  // Render GST cards
  function renderGstCards() {
    gstCardsContainer.innerHTML = `
      <div class="card acc1" id="output-gst-card">
        <div class="label">Output GST</div>
        <div class="muted">Outgoing GST invoices and compliance</div>
        <div class="count">${getOutputGstData().length}</div>
        <div class="tag">Open</div>
      </div>
      <div class="card acc2" id="input-gst-card">
        <div class="label">Input GSTIN</div>
        <div class="muted">Incoming GST invoices and tracking</div>
        <div class="count">${getInputGstData().length}</div>
        <div class="tag">Open</div>
      </div>
    `;

    // Add event listeners to cards
    document.getElementById('output-gst-card').addEventListener('click', () => {
      showGstSection('output');
    });

    document.getElementById('input-gst-card').addEventListener('click', () => {
      showGstSection('input');
    });
  }

  // Show GST section (output or input)
  function showGstSection(type) {
    const data = type === 'output' ? getOutputGstData() : getInputGstData();
    const title = type === 'output' ? 'Output GST Management' : 'Input GSTIN Management';
    const fields = type === 'output' ? [
      'sl.no', 'Invoice No', 'Invoice Date', 'Invoice Month', 'Cust Name', 'Company', 'Comp',
      'Invoice Amount', 'GST Amount', 'TDS Deduction', 'Payment Status', 'GST No'
    ] : [
      'Sr No', 'Invoice No', 'Invoice Date', 'Invoice Month', 'Company', 'GST No',
      'Invoice Amount', 'GST Amount', 'CGST', 'SGST', 'Remark'
    ];

    gstCardsContainer.innerHTML = `
      <div class="gst-section-container">
        <h2 class="gst-section-title">${title}</h2>
        <div class="gst-buttons-container" id="gst-buttons-container">
          <button class="btn primary gst-button" id="add-gst-btn">+ Add ${type === 'output' ? 'Output GST' : 'Input GSTIN'}</button>
        </div>
        <div class="gst-entries-container" id="gst-entries-container">
          <h3 class="gst-entries-title">Existing Entries (${data.length})</h3>
          ${data.length > 0 ? renderGstTable(data, fields, type) : '<p class="gst-no-entries">No entries found.</p>'}
        </div>
        <div id="gst-form-container" class="gst-form-container" style="display: none;"></div>
      </div>
    `;

    // Add event listeners
    document.getElementById('add-gst-btn').addEventListener('click', () => {
      // Hide buttons and entries when form is shown
      document.getElementById('gst-buttons-container').style.display = 'none';
      document.getElementById('gst-entries-container').style.display = 'none';
      createGstForm(type, fields);
    });

    // Add event listeners for edit and delete buttons using event delegation
    const gstEntriesContainer = document.getElementById('gst-entries-container');
    gstEntriesContainer.addEventListener('click', (e) => {
      if (e.target.classList.contains('edit-btn')) {
        const index = parseInt(e.target.getAttribute('data-index'));
        const type = e.target.getAttribute('data-type');
        editGstEntry(index, type);
      } else if (e.target.classList.contains('delete-btn')) {
        const index = parseInt(e.target.getAttribute('data-index'));
        const type = e.target.getAttribute('data-type');
        deleteGstEntry(index, type);
      }
    });
  }

  // Render GST table
  function renderGstTable(data, fields, type) {
    let html = `
      <table class="data-table">
        <thead>
          <tr>
            ${fields.map(field => `<th>${field}</th>`).join('')}
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
    `;

    data.forEach((entry, index) => {
      html += `<tr>`;
      fields.forEach(field => {
        const key = field.toLowerCase().replace(/[^a-z0-9]/g, '_');
        html += `<td>${entry[key] || ''}</td>`;
      });
      html += `<td>
        <button class="btn small edit-btn" data-index="${index}" data-type="${type}">Edit</button>
        <button class="btn small danger delete-btn" data-index="${index}" data-type="${type}">Delete</button>
      </td></tr>`;
    });

    html += `</tbody></table>`;
    return html;
  }

  // Create GST form
  function createGstForm(type, fields) {
    const formContainer = document.getElementById('gst-form-container');
    formContainer.style.display = 'block';
    formContainer.innerHTML = `
      <form id="gst-form" class="form">
        <h3 style="grid-column: 1 / -1;">Add ${type === 'output' ? 'Output GST' : 'Input GSTIN'}</h3>
        ${fields.map(field => `
          <div class="field">
            <label>${field}:</label>
            ${field.toLowerCase().includes('date') ? 
              `<input type="date" name="${field.toLowerCase().replace(/[^a-z0-9]/g, '_')}" class="input" required>` :
            field.toLowerCase().includes('tds deduction') || field.toLowerCase().includes('payment status') ?
              `<select name="${field.toLowerCase().replace(/[^a-z0-9]/g, '_')}" class="input" required>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
              </select>` :
            field.toLowerCase().includes('amount') ?
              `<input type="number" name="${field.toLowerCase().replace(/[^a-z0-9]/g, '_')}" class="input" step="0.01" required>` :
              `<input type="text" name="${field.toLowerCase().replace(/[^a-z0-9]/g, '_')}" class="input" required>`
            }
          </div>
        `).join('')}
        <div class="form-actions">
          <button type="submit" class="btn primary">Save</button>
          <button type="button" class="btn" id="cancel-form">Cancel</button>
        </div>
      </form>
    `;

    // Form event listeners
    document.getElementById('gst-form').addEventListener('submit', (e) => {
      e.preventDefault();
      saveGstEntry(type);
    });

    document.getElementById('cancel-form').addEventListener('click', () => {
      formContainer.style.display = 'none';
      // Show buttons and entries again when form is cancelled
      document.getElementById('gst-buttons-container').style.display = 'flex';
      document.getElementById('gst-entries-container').style.display = 'block';
    });
  }

  // Save GST entry
  function saveGstEntry(type) {
    const form = document.getElementById('gst-form');
    const formData = new FormData(form);
    const entry = {};

    for (let [key, value] of formData.entries()) {
      entry[key] = value;
    }

    const dataKey = type === 'output' ? 'accounts_output_gst_data' : 'accounts_input_gst_data';
    const currentData = JSON.parse(localStorage.getItem(dataKey) || '[]');
    currentData.push(entry);
    localStorage.setItem(dataKey, JSON.stringify(currentData));

    // Update dashboard count
    if (window.App && window.App.updateDashboardCounts) {
      window.App.updateDashboardCounts();
    }

    // Hide the form and show the table again
    const formContainer = document.getElementById('gst-form-container');
    formContainer.style.display = 'none';

    // Show buttons and entries again
    document.getElementById('gst-buttons-container').style.display = 'flex';
    document.getElementById('gst-entries-container').style.display = 'block';

    // Refresh the section to show updated data
    showGstSection(type);
  }

  // Create edit form with pre-filled data
  function createEditForm(type, fields, entry, index) {
    const formContainer = document.getElementById('gst-form-container');
    formContainer.style.display = 'block';
    formContainer.innerHTML = `
      <form id="gst-edit-form" class="form">
        <h3 style="grid-column: 1 / -1;">Edit ${type === 'output' ? 'Output GST' : 'Input GSTIN'}</h3>
        ${fields.map(field => {
          const fieldKey = field.toLowerCase().replace(/[^a-z0-9]/g, '_');
          const fieldValue = entry[fieldKey] || '';
          return `
            <div class="field">
              <label>${field}:</label>
              ${field.toLowerCase().includes('date') ?
                `<input type="date" name="${fieldKey}" class="input" value="${fieldValue}" required>` :
              field.toLowerCase().includes('tds deduction') || field.toLowerCase().includes('payment status') ?
                `<select name="${fieldKey}" class="input" required>
                  <option value="Yes" ${fieldValue === 'Yes' ? 'selected' : ''}>Yes</option>
                  <option value="No" ${fieldValue === 'No' ? 'selected' : ''}>No</option>
                </select>` :
              field.toLowerCase().includes('amount') ?
                `<input type="number" name="${fieldKey}" class="input" value="${fieldValue}" step="0.01" required>` :
                `<input type="text" name="${fieldKey}" class="input" value="${fieldValue}" required>`
              }
            </div>
          `;
        }).join('')}
        <div class="form-actions">
          <button type="submit" class="btn primary">Update</button>
          <button type="button" class="btn" id="cancel-edit-form">Cancel</button>
        </div>
      </form>
    `;

    // Form event listeners
    document.getElementById('gst-edit-form').addEventListener('submit', (e) => {
      e.preventDefault();
      updateGstEntry(type, index);
    });

    document.getElementById('cancel-edit-form').addEventListener('click', () => {
      formContainer.style.display = 'none';
      // Show buttons and entries again when form is cancelled
      document.getElementById('gst-buttons-container').style.display = 'flex';
      document.getElementById('gst-entries-container').style.display = 'block';
    });
  }

  // Update GST entry
  function updateGstEntry(type, index) {
    const form = document.getElementById('gst-edit-form');
    const formData = new FormData(form);
    const entry = {};

    for (let [key, value] of formData.entries()) {
      entry[key] = value;
    }

    const dataKey = type === 'output' ? 'accounts_output_gst_data' : 'accounts_input_gst_data';
    const currentData = JSON.parse(localStorage.getItem(dataKey) || '[]');
    currentData[index] = entry;
    localStorage.setItem(dataKey, JSON.stringify(currentData));

    // Update dashboard count
    if (window.App && window.App.updateDashboardCounts) {
      window.App.updateDashboardCounts();
    }

    // Hide the form and show the table again
    const formContainer = document.getElementById('gst-form-container');
    formContainer.style.display = 'none';

    // Show buttons and entries again
    document.getElementById('gst-buttons-container').style.display = 'flex';
    document.getElementById('gst-entries-container').style.display = 'block';

    // Refresh the section to show updated data
    showGstSection(type);
  }

  // Edit GST entry
  function editGstEntry(index, type) {
    const dataKey = type === 'output' ? 'accounts_output_gst_data' : 'accounts_input_gst_data';
    const currentData = JSON.parse(localStorage.getItem(dataKey) || '[]');
    const entry = currentData[index];

    if (!entry) {
      alert('Entry not found!');
      return;
    }

    const fields = type === 'output' ? [
      'sl.no', 'Invoice No', 'Invoice Date', 'Invoice Month', 'Cust Name', 'Company', 'Comp',
      'Invoice Amount', 'GST Amount', 'TDS Deduction', 'Payment Status', 'GST No'
    ] : [
      'Sr No', 'Invoice No', 'Invoice Date', 'Invoice Month', 'Company', 'GST No',
      'Invoice Amount', 'GST Amount', 'CGST', 'SGST', 'Remark'
    ];

    // Hide buttons and entries when form is shown
    document.getElementById('gst-buttons-container').style.display = 'none';
    document.getElementById('gst-entries-container').style.display = 'none';

    // Create edit form with pre-filled data
    createEditForm(type, fields, entry, index);
  }

  // Delete GST entry
  function deleteGstEntry(index, type) {
    if (confirm('Are you sure you want to delete this entry?')) {
      const dataKey = type === 'output' ? 'accounts_output_gst_data' : 'accounts_input_gst_data';
      const currentData = JSON.parse(localStorage.getItem(dataKey) || '[]');
      currentData.splice(index, 1);
      localStorage.setItem(dataKey, JSON.stringify(currentData));

      // Update dashboard count
      if (window.App && window.App.updateDashboardCounts) {
        window.App.updateDashboardCounts();
      }

      // Refresh the section
      showGstSection(type);
    }
  }

  // Add back button functionality
  const backButton = document.querySelector('.actions .btn');
  if (backButton) {
    backButton.addEventListener('click', () => {
      window.location.href = '../account-billing/index.html';
    });
  }

  // Initial render
  renderGstCards();
});
