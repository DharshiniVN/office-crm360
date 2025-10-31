// Digital Marketing form fields configuration
const dmFields = [
  ['category', 'Campaign Category', 'select', ['seo', 'add_campaign', 'social_media', 'seo_add_social']],
  ['srNo', 'Sr. No.', 'number'],
  ['closerMonth', 'Closer Month', 'text'],
  ['closerDate', 'Closer Date', 'date'],
  ['clientName', 'Client Name', 'text'],
  ['projectName', 'Project Name', 'text'],
  ['businessCategory', 'Business Category', 'text'],
  ['domainName', 'Domain Name', 'text'],
  ['professionalEmailID', 'Professional Email ID', 'email'],
  ['noOfEmailID', 'No. of Email ID', 'number'],
  ['server', 'Server', 'text'],
  ['clientMob', 'Client Mobile', 'tel'],
  ['clientGmailID', 'Client Gmail ID', 'email'],
  ['altEmailID', 'Alt. Email ID', 'email'],
  ['clientLocation', 'Client Location', 'text'],
  ['clientDOB', 'Client DOB', 'date'],
  ['campaign', 'Campaign', 'text'],
  ['bdm', 'BDM', 'text'],
  ['project', 'Project', 'text'],
  ['postingFrequency', 'Posting Frequency', 'text'],
  ['totalPost', 'Total Post', 'number'],
  ['mailID', 'Mail ID', 'email'],
  ['clientNumber', 'Client Number', 'tel'],
  ['projectLead', 'Project Lead', 'text'],
  ['ads', 'Ads', 'text'],
  ['startingMonth', 'Starting Month', 'text'],
  ['billingDate', 'Billing Date', 'date'],
  ['projectStartingDt', 'Project Starting Date', 'date'],
  ['projectClosingDt', 'Project Closing Date', 'date'],
  ['remark', 'Remark', 'textarea'],
  ['clientCharges', 'Client Charges', 'number'],
  ['initialPayment', 'Initial Payment', 'number'],
  ['secondPayment', '2nd Payment', 'number'],
  ['remainingPayment', 'Remaining Payment', 'number'],
  ['projectStatus', 'Project Status', 'select', ['Active', 'Completed', 'On Hold', 'Cancelled']],
  ['clientNo', 'Client No', 'tel'],
  ['mailID2', 'Mail ID 2', 'email']
];

// Get form element
const form = document.getElementById('addForm');

// Dynamically create form fields
dmFields.forEach(([key, label, type, options]) => {
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
    'srNo', 'noOfEmailID', 'totalPost', 'clientCharges', 'initialPayment', 'secondPayment', 'remainingPayment'
  ];
  
  numericFields.forEach(field => {
    if (data[field]) data[field] = Number(data[field]);
  });
  
  // Convert date fields to proper format
  const dateFields = [
    'closerDate', 'billingDate', 'projectStartingDt', 'projectClosingDt', 'clientDOB'
  ];
  
  dateFields.forEach(field => {
    if (data[field]) {
      const date = new Date(data[field]);
      data[field] = date.toISOString().split('T')[0];
    }
  });
  
  // Save to localStorage
  const key = 'accounts_dm_data';
  const existingData = JSON.parse(localStorage.getItem(key) || '[]');
  existingData.push(data);
  localStorage.setItem(key, JSON.stringify(existingData));
  
  // Redirect to main page
  location.href = 'index.html';
});
