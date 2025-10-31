document.addEventListener('DOMContentLoaded', () => {
  // Utility function for showing notifications
  function showNotification(message, type = 'info') {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `notification ${type}`;
    notification.style.cssText = `
      position: fixed;
      top: 20px;
      right: 20px;
      padding: 12px 16px;
      border-radius: 8px;
      color: white;
      font-weight: 500;
      z-index: 1000;
      max-width: 300px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
      animation: slideIn 0.3s ease-out;
    `;

    // Set background color based on type
    if (type === 'success') {
      notification.style.backgroundColor = '#10b981';
    } else if (type === 'error') {
      notification.style.backgroundColor = '#ef4444';
    } else if (type === 'warning') {
      notification.style.backgroundColor = '#f59e0b';
    } else {
      notification.style.backgroundColor = '#3b82f6';
    }

    notification.textContent = message;

    // Add animation styles
    const style = document.createElement('style');
    style.textContent = `
      @keyframes slideIn {
        from { transform: translateX(100%); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
      }
    `;
    document.head.appendChild(style);

    document.body.appendChild(notification);

    // Auto remove after 3 seconds
    setTimeout(() => {
      notification.style.animation = 'slideOut 0.3s ease-in';
      setTimeout(() => {
        if (notification.parentNode) {
          notification.parentNode.removeChild(notification);
        }
      }, 300);
    }, 3000);
  }

  // Button click handlers for all buttons including new ones
  const buttons = document.querySelectorAll('.btn.ghost');
  const cardsContainer = document.querySelector('.cards');

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

  function renderGstCards() {
    cardsContainer.innerHTML = `
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

    document.getElementById('output-gst-card').addEventListener('click', () => {
      showNotification('Output GST card clicked', 'info');
    });

    document.getElementById('input-gst-card').addEventListener('click', () => {
      showNotification('Input GSTIN card clicked', 'info');
    });
  }

  buttons.forEach(button => {
    if (button.textContent.trim() === 'GST Report') {
      button.addEventListener('click', () => {
        // Navigate to GST page instead of rendering cards here
        window.location.href = '/gst';
      });
    } else if (button.textContent.trim() === 'Invoice') {
      button.addEventListener('click', () => {
        // Navigate to Invoice page
       window.location.href = '/invoice';
      });
    } else if (button.textContent.trim() === 'Total Revenue') {
      button.addEventListener('click', () => {
        // Navigate to Income Expense page
       window.location.href = '/income-expense';
      });
    } else if (button.textContent.trim() === 'Proforma Invoice') {
      button.addEventListener('click', () => {
        // Navigate to Proforma Invoice page
       window.location.href = '/invoice/proforma';
      });
    } else {
      button.addEventListener('click', () => {
        showNotification(`Button "${button.textContent}" clicked.`, 'info');
      });
    }
  });

  // Initialize sample income and expense data if empty
  if (JSON.parse(localStorage.getItem('accounts_income_data') || '[]').length === 0) {
    const sampleIncomeData = [
      {
        type: "income",
        price: "50000",
        date: new Date().toISOString().split('T')[0],
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
      },
      {
        type: "income",
        price: "45000",
        date: "2024-04-10",
        project_name: "App Development",
        income_from: "Client C",
        description: "Mobile app development",
        bill: null
      }
    ];
    localStorage.setItem('accounts_income_data', JSON.stringify(sampleIncomeData));
  }

  if (JSON.parse(localStorage.getItem('accounts_expense_data') || '[]').length === 0) {
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

  // Display total income amount in the Total Revenue card
  const totalRevenueAmount = document.getElementById('total-revenue-amount');
  if (totalRevenueAmount) {
    // Fetch income and expense data from separate localStorage keys
    const incomeData = JSON.parse(localStorage.getItem('accounts_income_data') || '[]');
    const expenseData = JSON.parse(localStorage.getItem('accounts_expense_data') || '[]');
    // Calculate total income by summing 'price' from income and subtracting 'price' from expense
    const totalIncome = incomeData.reduce((sum, item) => sum + parseFloat(item.price || 0), 0);
    const totalExpense = expenseData.reduce((sum, item) => sum + parseFloat(item.price || 0), 0);
    const netIncome = totalIncome - totalExpense;
    totalRevenueAmount.textContent = `₹${netIncome.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2})}`;
  }
  
  // Listen for storage events to update total revenue dynamically if data changes
  window.addEventListener('storage', (event) => {
    if (event.key === 'accounts_income_data' || event.key === 'accounts_expense_data') {
      const incomeData = JSON.parse(localStorage.getItem('accounts_income_data') || '[]');
      const expenseData = JSON.parse(localStorage.getItem('accounts_expense_data') || '[]');
      const totalIncome = incomeData.reduce((sum, item) => sum + parseFloat(item.price || 0), 0);
      const totalExpense = expenseData.reduce((sum, item) => sum + parseFloat(item.price || 0), 0);
      const netIncome = totalIncome - totalExpense;
      const totalRevenueAmount = document.getElementById('total-revenue-amount');
      if (totalRevenueAmount) {
        totalRevenueAmount.textContent = `₹${netIncome.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2})}`;
      }
    }
  });

  // Function to update Revenue vs Expenses Chart
  function updateRevenueExpensesChart() {
    const incomeData = JSON.parse(localStorage.getItem('accounts_income_data') || '[]');
    const expenseData = JSON.parse(localStorage.getItem('accounts_expense_data') || '[]');

    const revenueByMonth = {};
    const expensesByMonth = {};

    incomeData.forEach(item => {
      const date = new Date(item.date);
      const monthYear = `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}`;
      revenueByMonth[monthYear] = (revenueByMonth[monthYear] || 0) + parseFloat(item.price || 0);
    });

    expenseData.forEach(item => {
      const date = new Date(item.date);
      const monthYear = `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}`;
      expensesByMonth[monthYear] = (expensesByMonth[monthYear] || 0) + parseFloat(item.price || 0);
    });

    const allMonths = new Set([...Object.keys(revenueByMonth), ...Object.keys(expensesByMonth)]);
    const sortedMonths = Array.from(allMonths).sort();

    const labels = sortedMonths.map(month => {
      const [year, monthNum] = month.split('-');
      return new Date(year, monthNum - 1).toLocaleString('default', { month: 'short', year: 'numeric' });
    });

    const revenueData = sortedMonths.map(month => revenueByMonth[month] || 0);
    const expensesData = sortedMonths.map(month => expensesByMonth[month] || 0);

    const maxValue = Math.max(...revenueData, ...expensesData) * 1.2 || 40;

    if (revenueExpensesChart) {
      revenueExpensesChart.data.labels = labels;
      revenueExpensesChart.data.datasets[0].data = revenueData;
      revenueExpensesChart.data.datasets[1].data = expensesData;
      revenueExpensesChart.options.scales.y.max = maxValue;
      revenueExpensesChart.options.scales.y1.max = maxValue;
      revenueExpensesChart.update();
    }
  }

  // Revenue vs Expenses Chart (Bar + Line)
  const ctxRevenueExpenses = document.getElementById('revenueExpensesChart').getContext('2d');
  const revenueExpensesChart = new Chart(ctxRevenueExpenses, {
    type: 'bar',
    data: {
      labels: [],
      datasets: [
        {
          label: 'Revenue',
          data: [],
          backgroundColor: '#2563eb',
          borderRadius: 6,
          barPercentage: 0.6,
        },
        {
          label: 'Expenses',
          data: [], // Line data
          type: 'line',
          borderColor: '#ef4444',
          borderWidth: 2,
          fill: false,
          tension: 0.3,
          pointRadius: 4,
          yAxisID: 'y1',
        }
      ]
    },
    options: {
      responsive: true,
      interaction: {
        mode: 'index',
        intersect: false,
      },
      scales: {
        y: {
          beginAtZero: true,
          position: 'left',
          grid: {
            drawOnChartArea: false,
          }
        },
        y1: {
          beginAtZero: true,
          position: 'right',
          grid: {
            drawOnChartArea: false,
          },
          display: false,
        }
      },
      plugins: {
        legend: {
          display: false,
        }
      }
    }
  });

  // Function to update Proforma Invoice Status Chart
  function updateProformaInvoiceStatusChart() {
    const proformaData = JSON.parse(localStorage.getItem('accounts_proforma_invoice_data') || '[]');

    // Aggregate counts by status for the current month
    const statusCounts = {
      Pending: 0,
      Accepted: 0,
      Rejected: 0,
    };

    proformaData.forEach(item => {
      const date = new Date(item.invoiceDate || item.proformaDate || item.date);
      const now = new Date();
      if (date.getFullYear() === now.getFullYear() && date.getMonth() === now.getMonth()) {
        const status = item.proformaStatus || item.status || 'Pending';
        if (statusCounts.hasOwnProperty(status)) {
          statusCounts[status]++;
        }
      }
    });

    const data = [
      statusCounts.Pending,
      statusCounts.Accepted,
      statusCounts.Rejected,
    ];

    invoiceStatusChart.data.labels = ['Pending', 'Accepted', 'Rejected'];
    invoiceStatusChart.data.datasets[0].data = data;
    invoiceStatusChart.data.datasets[0].backgroundColor = ['#fbbf24', '#10b981', '#ef4444'];
    invoiceStatusChart.update();
  }

  // Invoice Status Donut Chart
  const ctxInvoiceStatus = document.getElementById('invoiceStatusChart').getContext('2d');
  const invoiceStatusChart = new Chart(ctxInvoiceStatus, {
    type: 'doughnut',
    data: {
      labels: ['Pending', 'Accepted', 'Rejected'],
      datasets: [{
        data: [0, 0, 0],
        backgroundColor: ['#fbbf24', '#10b981', '#ef4444'],
        borderWidth: 0,
      }]
    },
    options: {
      cutout: '70%',
      responsive: true,
      plugins: {
        legend: {
          display: false,
        },
        tooltip: {
          enabled: true,
        }
      }
    }
  });

  // Load and render invoice data in the invoice table
  function loadInvoiceData() {
    let invoices = [];
    try {
      invoices = JSON.parse(localStorage.getItem('accounts_invoice_data') || '[]');
    } catch (e) {
      console.warn('localStorage access failed, falling back to in-memory data', e);
    }

    // Initialize sample invoice data if empty or localStorage inaccessible
if (!invoices || invoices.length === 0 || invoices.length < 22) {
      invoices = [
        {
          pi: "PI12345",
          billName: "John Doe",
          productDescription: "Product A",
          totalAfterTax: 1162,
          invoiceDate: "2024-06-01",
          invoiceStatus: "Paid"
        },
        {
          pi: "PI67890",
          billName: "Alice Brown",
          productDescription: "Product B",
          totalAfterTax: 2216,
          invoiceDate: "2024-06-05",
          invoiceStatus: "Pending"
        },
        {
          pi: "PI10003",
          billName: "Client 3",
          productDescription: "Product 3",
          totalAfterTax: 3486,
          invoiceDate: "2024-06-12"
        },
        {
          pi: "PI10004",
          billName: "Client 4",
          productDescription: "Product 4",
          totalAfterTax: 4432,
          invoiceDate: "2024-06-13",
          invoiceStatus: "Pending"
        },
        {
          pi: "PI10005",
          billName: "Client 5",
          productDescription: "Product 5",
          totalAfterTax: 5810,
          invoiceDate: "2024-06-14"
        },
        {
          pi: "PI10006",
          billName: "Client 6",
          productDescription: "Product 6",
          totalAfterTax: 6648,
          invoiceDate: "2024-06-15"
        },
        {
          pi: "PI10007",
          billName: "Client 7",
          productDescription: "Product 7",
          totalAfterTax: 8134,
          invoiceDate: "2024-06-16"
        },
        {
          pi: "PI10008",
          billName: "Client 8",
          productDescription: "Product 8",
          totalAfterTax: 8864,
          invoiceDate: "2024-06-17"
        },
        {
          pi: "PI10009",
          billName: "Client 9",
          productDescription: "Product 9",
          totalAfterTax: 10458,
          invoiceDate: "2024-06-18"
        },
        {
          pi: "PI10010",
          billName: "Client 10",
          productDescription: "Product 10",
          totalAfterTax: 11080,
          invoiceDate: "2024-06-19"
        },
        {
          pi: "PI10011",
          billName: "Client 11",
          productDescription: "Product 11",
          totalAfterTax: 12782,
          invoiceDate: "2024-06-20"
        },
        {
          pi: "PI10012",
          billName: "Client 12",
          productDescription: "Product 12",
          totalAfterTax: 13296,
          invoiceDate: "2024-06-21"
        },
        {
          pi: "PI10013",
          billName: "Client 13",
          productDescription: "Product 13",
          totalAfterTax: 15106,
          invoiceDate: "2024-06-22"
        },
        {
          pi: "PI10014",
          billName: "Client 14",
          productDescription: "Product 14",
          totalAfterTax: 15512,
          invoiceDate: "2024-06-23"
        },
        {
          pi: "PI10015",
          billName: "Client 15",
          productDescription: "Product 15",
          totalAfterTax: 17430,
          invoiceDate: "2024-06-24"
        },
        {
          pi: "PI10016",
          billName: "Client 16",
          productDescription: "Product 16",
          totalAfterTax: 17728,
          invoiceDate: "2024-06-25"
        },
        {
          pi: "PI10017",
          billName: "Client 17",
          productDescription: "Product 17",
          totalAfterTax: 19754,
          invoiceDate: "2024-06-26"
        },
        {
          pi: "PI10018",
          billName: "Client 18",
          productDescription: "Product 18",
          totalAfterTax: 19944,
          invoiceDate: "2024-06-27"
        },
        {
          pi: "PI10019",
          billName: "Client 19",
          productDescription: "Product 19",
          totalAfterTax: 22078,
          invoiceDate: "2024-06-28"
        },
        {
          pi: "PI10020",
          billName: "Client 20",
          productDescription: "Product 20",
          totalAfterTax: 22160,
          invoiceDate: "2024-06-29"
        },
        {
          pi: "PI10021",
          billName: "Client 21",
          productDescription: "Product 21",
          totalAfterTax: 24302,
          invoiceDate: "2024-06-30"
        },
        {
          pi: "PI10022",
          billName: "Client 22",
          productDescription: "Product 22",
          totalAfterTax: 24376,
          invoiceDate: "2024-07-01"
        }
  ];

}

try {
  localStorage.setItem('accounts_invoice_data', JSON.stringify(invoices));
} catch (e) {
  console.warn('Failed to save invoices to localStorage', e);
}

// Render invoice data in the table
    const invoiceTableBody = document.getElementById('invoice-table-body');
    if (invoiceTableBody) {
      invoiceTableBody.innerHTML = '';
      invoices.forEach(invoice => {
        const row = document.createElement('tr');
        row.innerHTML = `
          <td>${invoice.pi || 'N/A'}</td>
          <td>${invoice.billName || 'N/A'}</td>
          <td>${invoice.productDescription || 'N/A'}</td>
          <td>$${invoice.totalAfterTax || 'N/A'}</td>
          <td>${invoice.invoiceDate || 'N/A'}</td>
        `;
        invoiceTableBody.appendChild(row);
      });
    }
  }

  // Load invoice data on page load
  loadInvoiceData();

  // Function to calculate and update pending payments count
  function updatePendingPaymentsCount() {
    let invoices = [];
    try {
      invoices = JSON.parse(localStorage.getItem('accounts_invoice_data') || '[]');
    } catch (e) {
      console.warn('localStorage access failed, falling back to in-memory data', e);
    }

    // Count invoices with "Pending" status
    const pendingCount = invoices.filter(invoice => invoice.invoiceStatus === 'Pending').length;

    // Update the pending payments count in the UI
    const pendingPaymentsElement = document.getElementById('pending-payments-count');
    if (pendingPaymentsElement) {
      pendingPaymentsElement.textContent = pendingCount;
    }
  }

  // Update pending payments count on page load
  updatePendingPaymentsCount();

  // Listen for storage events to update pending payments count dynamically if invoice data changes
  window.addEventListener('storage', (event) => {
    if (event.key === 'accounts_invoice_data') {
      updatePendingPaymentsCount();
    }
  });

  // Update charts on page load
  updateRevenueExpensesChart();
  updateProformaInvoiceStatusChart();

  // Listen for storage events to update charts dynamically
  window.addEventListener('storage', (event) => {
    if (event.key === 'accounts_income_data' || event.key === 'accounts_expense_data') {
      updateRevenueExpensesChart();
    }
    if (event.key === 'accounts_proforma_invoice_data') {
      updateProformaInvoiceStatusChart();
    }
  });
});
