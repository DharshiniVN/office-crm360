// Graphics form fields configuration
const graphicsFields = [
  ['category', 'Graphics Category', 'select', ['logo', 'other_graphics', 'company_profile']],
  ['srNo', 'Sr. No.', 'number'],
  ['project', 'Project', 'text'],
  ['campaign', 'Campaign', 'text'],
  ['projectName', 'Project Name', 'text'],
  ['domainName', 'Domain Name', 'text'],
  ['clientName', 'Client Name', 'text'],
  ['clientNumber', 'Client Number', 'tel'],
  ['bdm', 'BDM', 'text'],
  ['assignedPerson', 'Assigned Person', 'text'],
  ['tl', 'TL', 'text'],
  ['projectMonth', 'Project Month', 'text'],
  ['projectClosingDate', 'Project Closing Date', 'date'],
  ['projectStartingDt', 'Project Starting Date', 'date'],
  ['projectClosingDt', 'Project Closing Date', 'date'],
  ['remark', 'Remark', 'textarea'],
  ['clientCharges', 'Client Charges', 'number'],
  ['initialPayment', 'Initial Payment', 'number'],
  ['secondPayment', '2nd Payment', 'number'],
  ['remainingPayment', 'Remaining Payment', 'number'],
  ['projectStatus', 'Project Status', 'select', ['Active', 'Completed', 'On Hold', 'Cancelled']],
  ['clientNo', 'Client No', 'tel'],
  ['mailID', 'Mail ID', 'email'],
  ['amc', 'AMC', 'number']
];

// Get form element
const form = document.getElementById('addForm');

// Dynamically create form fields
graphicsFields.forEach(([key, label, type, options]) => {
  const wrap = document.createElement('div');
  wrap.className = 'field';
  let control = '';
  
  if (type === 'select') {
    control = `<select name="${key}" required>`;
    control += '<option value="">Select...</option>';
    options.forEach(o => control += `<option value="${o}">${o}</option>`);
    control += '</select>';
  } else if (type === 'textarea') {
    control = `<textarea name="${key}" rows="3"></textarea>`;
  } else {
    control = `<input type="${type}" name="${key}" ${type === 'number' ? 'step="any"' : ''} required>`;
  }
  
  wrap.innerHTML = `<label for="${key}">${label}</label>${control}`;
  form.appendChild(wrap);
});

// Form submission handler
form.addEventListener('submit', e => {
  e.preventDefault();
  
  // Get form data
  const formData = new FormData(form);
  const data = Object.fromEntries(formData.entries());
  
  // Convert numeric fields
  const numericFields = [
    'srNo', 'clientCharges', 'initialPayment', 'secondPayment', 'remainingPayment', 'amc'
  ];
  
  numericFields.forEach(field => {
    if (data[field]) data[field] = Number(data[field]);
  });
  
  // Convert date fields to proper format
  const dateFields = [
    'projectClosingDate', 'projectStartingDt', 'projectClosingDt'
  ];
  
  dateFields.forEach(field => {
    if (data[field]) {
      const date = new Date(data[field]);
      data[field] = date.toISOString().split('T')[0];
    }
  });
  
  // Save to localStorage
  const key = 'accounts_graphics_data';
  const existingData = JSON.parse(localStorage.getItem(key) || '[]');
  existingData.push(data);
  localStorage.setItem(key, JSON.stringify(existingData));
  
  // Redirect to main page
 location.href = '/graphics';
});
