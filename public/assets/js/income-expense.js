// Income & Expense module JavaScript

document.addEventListener('DOMContentLoaded', () => {
  const cardsContainer = document.getElementById('income-expense-cards');

  // Function to get fresh data
  function getIncomeData() {
    return JSON.parse(localStorage.getItem('accounts_income_data') || '[]');
  }

  function getExpenseData() {
    return JSON.parse(localStorage.getItem('accounts_expense_data') || '[]');
  }

  // Get current month data
  function getCurrentMonthData(data) {
    const currentMonth = new Date().getMonth();
    const currentYear = new Date().getFullYear();
    return data.filter(entry => {
      const entryDate = new Date(entry.date);
      return entryDate.getMonth() === currentMonth && entryDate.getFullYear() === currentYear;
    });
  }

  // Calculate total for current month
  function getCurrentMonthTotal(data) {
    const currentMonthData = getCurrentMonthData(data);
    return currentMonthData.reduce((total, entry) => total + parseFloat(entry.price || 0), 0);
  }

  // Initialize sample data if empty
  if (getIncomeData().length === 0) {
    const sampleIncomeData = [
      {
        type: "income",
        price: "50000",
        date: new Date().toISOString().split('T')[0],
        project_name: "Website Development",
        income_from: "Client A",
        description: "Website development payment",
        bill: null
      }
    ];
    localStorage.setItem('accounts_income_data', JSON.stringify(sampleIncomeData));
  }

  if (getExpenseData().length === 0) {
    const sampleExpenseData = [
      {
        type: "expense",
        price: "15000",
        date: new Date().toISOString().split('T')[0],
        project_name: "Marketing Campaign",
        expense_for: "Digital Marketing",
        description: "Social media advertising",
        bill: null
      }
    ];
    localStorage.setItem('accounts_expense_data', JSON.stringify(sampleExpenseData));
  }

  // Render Income & Expense cards as links to reports page
  function renderCards() {
    const incomeTotal = getCurrentMonthTotal(getIncomeData());
    const expenseTotal = getCurrentMonthTotal(getExpenseData());

    cardsContainer.innerHTML = `
      <a class="card acc1" id="income-card" href="reports.html?type=income">
        <div class="label">Income</div>
        <div class="muted">Monthly income tracking</div>
        <div class="count">₹${incomeTotal.toLocaleString()}</div>
        <div class="tag">This Month</div>
      </a>

      <a class="card acc2" id="expense-card" href="reports.html?type=expense">
        <div class="label">Expense</div>
        <div class="muted">Monthly expense tracking</div>
        <div class="count">₹${expenseTotal.toLocaleString()}</div>
        <div class="tag">This Month</div>
      </a>
    `;

    // Add event listener for add button
    document.getElementById('add-income-expense-btn').addEventListener('click', () => {
      window.location.href = 'add-income-expense.html';
    });
  }

  // Initial render
  renderCards();
});
