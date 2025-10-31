// Get URL parameters
const params = new URLSearchParams(location.search);
const slno = params.get('slno');
const type = params.get('type') || 'total';

function getData(){
  try {
    return JSON.parse(localStorage.getItem('accounts_wa_data') || '[]');
  } catch (e) {
    console.warn('localStorage access failed, falling back to in-memory data', e);
    return [];
  }
}

function setData(rows){
  localStorage.setItem('accounts_wa_data', JSON.stringify(rows));
}

function loadRecord(){
  const data = getData();
  const record = data.find(r => String(r.slno) === String(slno));
  if(!record){
    alert('Record not found');
    window.location.href = 'reports.html?type=' + type;
    return;
  }
  return record;
}

function populateForm(record){
  const form = document.getElementById('detailForm');
  form.innerHTML = '';
  Object.entries(record).forEach(([key, value]) => {
    const fieldDiv = document.createElement('div');
    fieldDiv.className = 'field';
    const label = document.createElement('label');
    label.textContent = key.replace(/([A-Z])/g, ' $1').replace(/^./, str => str.toUpperCase());
    const input = document.createElement('input');
    input.name = key;
    input.value = value || '';
    input.disabled = true;
    fieldDiv.appendChild(label);
    fieldDiv.appendChild(input);
    form.appendChild(fieldDiv);
  });
}

function enableEditing(){
  const inputs = document.querySelectorAll('#detailForm input');
  inputs.forEach(input => input.disabled = false);
  document.getElementById('editBtn').style.display = 'none';
  document.getElementById('saveBtn').style.display = 'inline-block';
}

function saveChanges(){
  const form = document.getElementById('detailForm');
  const inputs = form.querySelectorAll('input');
  const updatedRecord = {};
  inputs.forEach(input => {
    updatedRecord[input.name] = input.value;
  });
  const data = getData();
  const index = data.findIndex(r => String(r.slno) === String(slno));
  if(index >= 0){
    data[index] = updatedRecord;
    setData(data);
    alert('Record updated successfully');
    disableEditing();
  } else {
    alert('Error updating record');
  }
}

function disableEditing(){
  const inputs = document.querySelectorAll('#detailForm input');
  inputs.forEach(input => input.disabled = true);
  document.getElementById('editBtn').style.display = 'inline-block';
  document.getElementById('saveBtn').style.display = 'none';
}

function deleteRecord(){
  if(confirm('Are you sure you want to delete this record?')){
    const data = getData();
    const filteredData = data.filter(r => String(r.slno) !== String(slno));
    setData(filteredData);
    alert('Record deleted successfully');
    window.location.href = '/reports?type=' + type;
  }
}

// Initialize
const record = loadRecord();
if(record){
  populateForm(record);
}

// Event listeners
document.getElementById('editBtn').addEventListener('click', enableEditing);
document.getElementById('saveBtn').addEventListener('click', saveChanges);
document.getElementById('deleteBtn').addEventListener('click', deleteRecord);
document.getElementById('backBtn').addEventListener('click', () => {
  window.location.href = '/reports?type=' + type;
});
