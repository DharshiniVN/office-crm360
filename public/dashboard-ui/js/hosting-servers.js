// Hosting and Servers module JavaScript

document.addEventListener('DOMContentLoaded', () => {
  const cardsContainer = document.getElementById('hosting-servers-cards');

  // Function to get fresh data
  function getHostingServersData() {
    return JSON.parse(localStorage.getItem('accounts_hosting_servers_data') || '[]');
  }

  // Initialize sample data if empty
  if (getHostingServersData().length === 0) {
    const sampleData = [
      {
        server_name: "Primary Web Server",
        server_type: "Web Hosting",
        provider: "Hostinger",
        cost: "15000",
        renewal_date: new Date().toISOString().split('T')[0],
        status: "Active",
        description: "Main website hosting server"
      }
    ];
    localStorage.setItem('accounts_hosting_servers_data', JSON.stringify(sampleData));
  }

  // Render Hosting & Servers cards
  function renderCards() {
    const data = getHostingServersData();

    cardsContainer.innerHTML = `
      <div class="hosting-servers-header" style="margin-bottom: 20px;">
        <button class="btn primary" id="add-hosting-servers-btn">+ Add Server/Host</button>
      </div>

      ${data.length > 0 ? data.map((item, index) => `
        <div class="card acc${(index % 4) + 1}">
          <div class="label">${item.server_name}</div>
          <div class="muted">${item.server_type} - ${item.provider}</div>
          <div class="count">₹${parseFloat(item.cost || 0).toLocaleString()}</div>
          <div class="tag">${item.status}</div>
        </div>
      `).join('') : '<div class="card"><div class="label">No Servers Found</div><div class="muted">Add your first server/hosting entry</div></div>'}

      <div id="hosting-servers-form-container" class="form-container" style="display: none;"></div>
    `;

    // Add event listener for add button
    document.getElementById('add-hosting-servers-btn').addEventListener('click', () => {
      createHostingServersForm();
    });
  }

  // Create Hosting/Servers form
  function createHostingServersForm(entry = null, editIndex = null) {
    const formContainer = document.getElementById('hosting-servers-form-container');
    const isEdit = entry !== null;

    formContainer.style.display = 'block';
    formContainer.innerHTML = `
      <form id="hosting-servers-form" class="form">
        <h3 style="grid-column: 1 / -1;">${isEdit ? 'Edit' : 'Add'} Server/Host</h3>

        <div class="field">
          <label>Server Name:</label>
          <input type="text" name="server_name" class="input" value="${entry ? entry.server_name || '' : ''}" required>
        </div>

        <div class="field">
          <label>Server Type:</label>
          <select name="server_type" class="input" required>
            <option value="Web Hosting" ${entry && entry.server_type === 'Web Hosting' ? 'selected' : ''}>Web Hosting</option>
            <option value="VPS" ${entry && entry.server_type === 'VPS' ? 'selected' : ''}>VPS</option>
            <option value="Dedicated Server" ${entry && entry.server_type === 'Dedicated Server' ? 'selected' : ''}>Dedicated Server</option>
            <option value="Cloud Hosting" ${entry && entry.server_type === 'Cloud Hosting' ? 'selected' : ''}>Cloud Hosting</option>
            <option value="Domain" ${entry && entry.server_type === 'Domain' ? 'selected' : ''}>Domain</option>
          </select>
        </div>

        <div class="field">
          <label>Provider:</label>
          <input type="text" name="provider" class="input" value="${entry ? entry.provider || '' : ''}" required>
        </div>

        <div class="field">
          <label>Cost:</label>
          <input type="number" name="cost" class="input" step="0.01" value="${entry ? entry.cost || '' : ''}" required>
        </div>

        <div class="field">
          <label>Renewal Date:</label>
          <input type="date" name="renewal_date" class="input" value="${entry ? entry.renewal_date || '' : new Date().toISOString().split('T')[0]}" required>
        </div>

        <div class="field">
          <label>Status:</label>
          <select name="status" class="input" required>
            <option value="Active" ${entry && entry.status === 'Active' ? 'selected' : ''}>Active</option>
            <option value="Pending" ${entry && entry.status === 'Pending' ? 'selected' : ''}>Pending</option>
            <option value="Expired" ${entry && entry.status === 'Expired' ? 'selected' : ''}>Expired</option>
            <option value="Suspended" ${entry && entry.status === 'Suspended' ? 'selected' : ''}>Suspended</option>
          </select>
        </div>

        <div class="field">
          <label>Description:</label>
          <textarea name="description" class="input" rows="3">${entry ? entry.description || '' : ''}></textarea>
        </div>

        <div class="form-actions">
          <button type="submit" class="btn primary">${isEdit ? 'Update' : 'Save'}</button>
          <button type="button" class="btn" id="cancel-form">Cancel</button>
        </div>
      </form>
    `;

    // Form event listeners
    document.getElementById('hosting-servers-form').addEventListener('submit', (e) => {
      e.preventDefault();
      if (isEdit) {
        updateEntry(editIndex);
      } else {
        saveEntry();
      }
    });

    document.getElementById('cancel-form').addEventListener('click', () => {
      formContainer.style.display = 'none';
    });
  }

  // Save entry
  function saveEntry() {
    const form = document.getElementById('hosting-servers-form');
    const formData = new FormData(form);
    const entry = {
      server_name: formData.get('server_name'),
      server_type: formData.get('server_type'),
      provider: formData.get('provider'),
      cost: formData.get('cost'),
      renewal_date: formData.get('renewal_date'),
      status: formData.get('status'),
      description: formData.get('description')
    };

    const currentData = JSON.parse(localStorage.getItem('accounts_hosting_servers_data') || '[]');
    currentData.push(entry);
    localStorage.setItem('accounts_hosting_servers_data', JSON.stringify(currentData));

    // Hide form and refresh
    document.getElementById('hosting-servers-form-container').style.display = 'none';
    renderCards();
  }

  // Update entry
  function updateEntry(index) {
    const form = document.getElementById('hosting-servers-form');
    const formData = new FormData(form);
    const entry = {
      server_name: formData.get('server_name'),
      server_type: formData.get('server_type'),
      provider: formData.get('provider'),
      cost: formData.get('cost'),
      renewal_date: formData.get('renewal_date'),
      status: formData.get('status'),
      description: formData.get('description')
    };

    const currentData = JSON.parse(localStorage.getItem('accounts_hosting_servers_data') || '[]');
    currentData[index] = entry;
    localStorage.setItem('accounts_hosting_servers_data', JSON.stringify(currentData));

    // Hide form and refresh
    document.getElementById('hosting-servers-form-container').style.display = 'none';
    renderCards();
  }

  // Initial render
  renderCards();
});
