// Special Features module JavaScript

document.addEventListener('DOMContentLoaded', () => {
  const cardsContainer = document.getElementById('special-features-cards');

  // Function to get fresh data
  function getSpecialFeaturesData() {
    return JSON.parse(localStorage.getItem('accounts_special_features_data') || '[]');
  }

  // Initialize sample data if empty
  if (getSpecialFeaturesData().length === 0) {
    const sampleData = [
      {
        feature_name: "Advanced Analytics",
        category: "Analytics",
        description: "Provides detailed analytics and reporting",
        status: "Active"
      }
    ];
    localStorage.setItem('accounts_special_features_data', JSON.stringify(sampleData));
  }

  // Render Special Features cards
  function renderCards() {
    const data = getSpecialFeaturesData();

    cardsContainer.innerHTML = `
      <div class="special-features-header" style="margin-bottom: 20px;">
        <button class="btn primary" id="add-special-feature-btn">+ Add Feature</button>
      </div>

      ${data.length > 0 ? data.map((item, index) => `
        <div class="card acc${(index % 4) + 1}">
          <div class="label">${item.feature_name}</div>
          <div class="muted">${item.category}</div>
          <div class="tag">${item.status}</div>
          <div class="description">${item.description}</div>
        </div>
      `).join('') : '<div class="card"><div class="label">No Features Found</div><div class="muted">Add your first special feature</div></div>'}

      <div id="special-features-form-container" class="form-container" style="display: none;"></div>
    `;

    // Add event listener for add button
    document.getElementById('add-special-feature-btn').addEventListener('click', () => {
      createSpecialFeatureForm();
    });
  }

  // Create Special Feature form
  function createSpecialFeatureForm(entry = null, editIndex = null) {
    const formContainer = document.getElementById('special-features-form-container');
    const isEdit = entry !== null;

    formContainer.style.display = 'block';
    formContainer.innerHTML = `
      <form id="special-features-form" class="form">
        <h3 style="grid-column: 1 / -1;">${isEdit ? 'Edit' : 'Add'} Special Feature</h3>

        <div class="field">
          <label>Feature Name:</label>
          <input type="text" name="feature_name" class="input" value="${entry ? entry.feature_name || '' : ''}" required>
        </div>

        <div class="field">
          <label>Category:</label>
          <input type="text" name="category" class="input" value="${entry ? entry.category || '' : ''}" required>
        </div>

        <div class="field">
          <label>Description:</label>
          <textarea name="description" class="input" rows="3">${entry ? entry.description || '' : ''}</textarea>
        </div>

        <div class="field">
          <label>Status:</label>
          <select name="status" class="input" required>
            <option value="Active" ${entry && entry.status === 'Active' ? 'selected' : ''}>Active</option>
            <option value="Inactive" ${entry && entry.status === 'Inactive' ? 'selected' : ''}>Inactive</option>
            <option value="Deprecated" ${entry && entry.status === 'Deprecated' ? 'selected' : ''}>Deprecated</option>
          </select>
        </div>

        <div class="form-actions">
          <button type="submit" class="btn primary">${isEdit ? 'Update' : 'Save'}</button>
          <button type="button" class="btn" id="cancel-form">Cancel</button>
        </div>
      </form>
    `;

    // Form event listeners
    document.getElementById('special-features-form').addEventListener('submit', (e) => {
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
    const form = document.getElementById('special-features-form');
    const formData = new FormData(form);
    const entry = {
      feature_name: formData.get('feature_name'),
      category: formData.get('category'),
      description: formData.get('description'),
      status: formData.get('status')
    };

    const currentData = JSON.parse(localStorage.getItem('accounts_special_features_data') || '[]');
    currentData.push(entry);
    localStorage.setItem('accounts_special_features_data', JSON.stringify(currentData));

    // Hide form and refresh
    document.getElementById('special-features-form-container').style.display = 'none';
    renderCards();
  }

  // Update entry
  function updateEntry(index) {
    const form = document.getElementById('special-features-form');
    const formData = new FormData(form);
    const entry = {
      feature_name: formData.get('feature_name'),
      category: formData.get('category'),
      description: formData.get('description'),
      status: formData.get('status')
    };

    const currentData = JSON.parse(localStorage.getItem('accounts_special_features_data') || '[]');
    currentData[index] = entry;
    localStorage.setItem('accounts_special_features_data', JSON.stringify(currentData));

    // Hide form and refresh
    document.getElementById('special-features-form-container').style.display = 'none';
    renderCards();
  }

  // Initial render
  renderCards();
});
