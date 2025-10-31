// Sample data for testing income and expense reports responsiveness

const sampleIncomeData = [
  {
    type: "income",
    price: "50000",
    date: "2024-06-01",
    project_name: "Website Development",
    income_from: "Client A",
    description: "Website development payment",
    bill: null
  },
  {
    type: "income",
    price: "30000",
    date: "2024-05-15",
    project_name: "Consulting",
    income_from: "Client B",
    description: "Consulting fees",
    bill: null
  }
];

const sampleExpenseData = [
  {
    type: "expense",
    price: "15000",
    date: "2024-06-01",
    project_name: "Marketing Campaign",
    expense_for: "Digital Marketing",
    description: "Social media advertising",
    bill: null
  },
  {
    type: "expense",
    price: "10000",
    date: "2024-05-20",
    project_name: "Office Supplies",
    expense_for: "Stationery",
    description: "Purchase of office stationery",
    bill: null
  }
];

// Function to load sample data into localStorage for testing
function loadSampleData() {
  localStorage.setItem('accounts_income_data', JSON.stringify(sampleIncomeData));
  localStorage.setItem('accounts_expense_data', JSON.stringify(sampleExpenseData));
  alert('Sample income and expense data loaded into localStorage. Please refresh the reports page.');
}

// Automatically load sample data on script load for testing
loadSampleData();
