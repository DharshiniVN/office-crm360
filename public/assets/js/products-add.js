// Products form fields configuration
const productsFields = [
  ['category', 'Product Category', 'select', ['school_management', 'billing', 'whatsapp_api', 'digital_visiting_card', 'brand_bizz', 'cloud_india_hub']],
  ['closerYear', 'Closer Year', 'number'],
  ['closerDate', 'Closer Date', 'date'],
  ['clientName', 'Client Name', 'text'],
  ['clientMob', 'Client Mobile', 'tel'],
  ['clientGmailID', 'Client Gmail ID', 'email'],
  ['projectName', 'Project Name', 'text'],
  ['domainName', 'Domain Name', 'text'],
  ['domainBookingPlace', 'Domain Booking Place', 'select', ['godaddy', 'cloudindia', 'namecheap', 'other']],
  ['domainBookingDate', 'Domain Booking Date', 'date'],
  ['domainBookingYear', 'Domain Booking Year', 'number'],
  ['professionalGsuitEmailID', 'Professional/Gsuit Email ID', 'email'],
  ['noOfEmailID', 'No. of Email ID', 'number'],
  ['altEmailID', 'Alt. Email ID', 'email'],
  ['server', 'Server', 'select', ['shared', 'vps', 'dedicated', 'cloud']],
  ['clientLocation', 'Client Location', 'text'],
  ['state', 'State', 'text'],
  ['country', 'Country', 'text'],
  ['clientDOB', 'Client DOB', 'date'],
  ['campaign', 'Campaign', 'text'],
  ['bdm', 'BDM', 'text'],
  ['frontendDeveloper', 'Frontend Developer', 'text'],
  ['backendDeveloper', 'Backend Developer', 'text'],
  ['projectStartDate', 'Project Start Date', 'date'],
  ['projectDeadline', 'Project Deadline', 'date'],
  ['demoDate', 'Demo Date', 'date'],
  ['projectCloserDate', 'Project Closer Date', 'date'],
  ['finalStatus', 'Final Status', 'select', ['Completed', 'In Progress', 'Pending', 'Cancelled']],
  ['projectCost', 'Project Cost', 'number'],
  ['withGST', 'With GST', 'number'],
  ['serverCost', 'Server Cost', 'number'],
  ['emailCost', 'Email Cost', 'number'],
  ['initialPayment', 'Initial Payment', 'number'],
  ['secondPayment', '2nd Payment', 'number'],
  ['remPayment', 'Rem. Payment', 'number'],
  ['pendingPayment', 'Pending Payment', 'number'],
  ['remark', 'Remark', 'textarea'],
  ['projectStatus', 'Project Status', 'select', ['Active', 'Completed', 'On Hold', 'Cancelled']],
  ['amc', 'AMC', 'select', ['Yes', 'No']],
  ['renewalStatus', 'Renewal Status', 'select', ['Active', 'Pending', 'Expired', 'Not Required']],
  ['renewalMonth', 'Renewal Month', 'text'],
  ['renewalDate', 'Renewal Date', 'date'],
  ['renewalItems', 'Renewal Items', 'text'],
  ['renewalAmount', 'Renewal Amount', 'number'],
  ['renewalRemark', 'Renewal Remark', 'textarea']
];

// Get form element
const form = document.getElementById('addForm');

// Dynamically create form fields
productsFields.forEach(([key, label, type, options]) => {
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
    'closerYear', 'domainBookingYear', 'noOfEmailID', 'projectCost', 'withGST',
    'serverCost', 'emailCost', 'initialPayment', 'secondPayment', 'remPayment',
    'pendingPayment', 'renewalAmount'
  ];
  
  numericFields.forEach(field => {
    if (data[field]) data[field] = Number(data[field]);
  });
  
  // Convert date fields to proper format
  const dateFields = [
    'closerDate', 'domainBookingDate', 'clientDOB', 'projectStartDate',
    'projectDeadline', 'demoDate', 'projectCloserDate', 'renewalDate'
  ];
  
  dateFields.forEach(field => {
    if (data[field]) {
      const date = new Date(data[field]);
      data[field] = date.toISOString().split('T')[0];
    }
  });
  
  // Save to localStorage
  const key = 'accounts_products_data';
  const existingData = JSON.parse(localStorage.getItem(key) || '[]');
  existingData.push(data);
  localStorage.setItem(key, JSON.stringify(existingData));
  
  // Redirect to main page
  location.href = 'index.html';
});

// Auto-calculate GST if project cost is entered
const projectCostInput = form.querySelector('input[name="projectCost"]');
const gstInput = form.querySelector('input[name="withGST"]');

if (projectCostInput && gstInput) {
  projectCostInput.addEventListener('input', () => {
    const cost = parseFloat(projectCostInput.value) || 0;
    gstInput.value = Math.round(cost * 1.18); // 18% GST
  });
}
