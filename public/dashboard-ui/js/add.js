
const fields = [
  
  ['category', 'Customer Product Category', 'select', ['wordpress','hardcode','ecom','maintenance','webapp','android','ios']],
  ['slno', 'SL No.', 'number'],
  ['client_name', 'Client Name', 'text'],
  ['contact', 'Contact Number', 'text'],
  ['gmail', 'Gmail ID', 'email'],
  ['gmail2', 'Gmail ID 2', 'email'],
  ['websiteUrl', 'Website URL', 'url'],
  ['appUrl', 'Application URL', 'url'],
  ['domainname', 'Domain Name', 'text'],
  ['domainBookingDate', 'Domain Booking Date', 'date'],
  ['domainPlace', 'Domain Booking Place', 'select', ['godaddy','cloudindia','hoix']],
  ['server', 'Server', 'select', ['free','vps','shared']],
  ['mailId', 'Mail ID', 'email'],
  ['gsuite', 'G Suite', 'select', ['true','false']],
  ['webmail', 'Webmail', 'select', ['true','false']],
  ['location', 'Customer Location', 'text'],
  ['gpage', 'Google Page Location', 'url'],
  ['projectCost', 'Project Cost', 'number'],
  ['finalCost', 'Final Project Cost', 'number'],
  ['advPayment', 'Advanced Payment', 'number'],
  ['advDate', 'Advanced Payment Date', 'date'],
  ['pay2Date', '2nd Payment Date', 'date'],
  ['txn2', 'Transaction Number', 'text'],
  ['txn3', '3rd Payment Transaction', 'text'],
  ['extra', 'Add (extra amount or data)', 'text'],
  ['renewal_amount', 'Renewal Amount', 'number'],
  ['renewal_date', 'Renewal Date', 'date'],
  ['company_id', 'Company ID', 'text'],
  ['created_by', 'Created By (User ID)', 'number'],
  ['updated_by', 'Updated By (User ID)', 'number'],
  ['birthday', 'Customer Birthday', 'date'],
  ['anniversary', 'Customer Marriage Anniversary Date', 'date']
];

const form = document.getElementById('addForm');

fields.forEach(([key,label,type,options])=>{
  const wrap = document.createElement('div');
  wrap.className = 'field';
  let control = '';
  if(type==='select'){
    control = `<select name="${key}">` + options.map(o=>`<option value="${o}">${o}</option>`).join('') + `</select>`;
  }else{
    control = `<input type="${type}" name="${key}" ${type==='number'?'step="any"':''}>`;
  }
  wrap.innerHTML = `<label for="${key}">${label}</label>${control}`;
  form.appendChild(wrap);
});

//form.addEventListener('submit',(e)=>{
  //e.preventDefault();
  //const data = Object.fromEntries(new FormData(form).entries());
  // Coerce
  //['slno','projectCost','finalCost','advPayment','renewalAmount'].forEach(k=> data[k] = Number(data[k]||0));
  //['gsuite','webmail'].forEach(k=> data[k] = (data[k]==='true'));
  // Save
  //const key = 'accounts_wa_data';
  //const list = JSON.parse(localStorage.getItem(key)||'[]');
  //list.push(data);
  //localStorage.setItem(key, JSON.stringify(list));
  // Redirect to main page
  //location.href = '/website';
//});
form.addEventListener('submit', (e) => {
  // ✅ Let Laravel handle it naturally — remove preventDefault
  // e.preventDefault(); ❌ REMOVE THIS LINE

  // Optional: you can still log or validate before submitting
  console.log("Submitting to Laravel backend...");
});
