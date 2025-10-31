// Proforma Invoice module JavaScript

document.addEventListener('DOMContentLoaded', () => {
  const newProformaBtn = document.getElementById('new-proforma-btn');
  const formContainer = document.getElementById('proforma-form-container');
  const displayContainer = document.getElementById('proforma-display-container');
  const cardsContainer = document.getElementById('proforma-cards');

  // Create back button and insert next to new proforma button
  const backBtn = document.createElement('button');
  backBtn.id = 'back-btn';
  backBtn.className = 'btn';
  backBtn.innerHTML = '← Back';
  backBtn.style.display = 'none'; // Initially hidden
  newProformaBtn.parentNode.insertBefore(backBtn, newProformaBtn.nextSibling);

  backBtn.addEventListener('click', resetForm);

  let proformas = [];
  try {
    proformas = JSON.parse(localStorage.getItem('accounts_proforma_invoice_data') || '[]');
  } catch (e) {
    console.warn('localStorage access failed, falling back to in-memory data', e);
  }

  let editingIndex = null;

  // Add dummy data if no proformas exist or if there are less than 6 proformas
  if (proformas.length === 0 || proformas.length < 6) {
    // If there's existing data, keep it and add sample data
    if (proformas.length > 0) {
      // Add sample data to existing data
      const sampleData = [
        {
          pi: "PF12345",
          transportMode: "Air",
          invoiceDate: "2024-06-01",
          vehicleNumber: "AB12CD3456",
          reverseCharge: "N",
          reverseCharge2: "N",
          state: "California",
          code: "CA",
          placeOfSupply: "Los Angeles",
          billName: "John Doe",
          billAddress: "123 Main St, Los Angeles, CA",
          billGSTIN: "GSTIN123456",
          billState: "California",
          billCode: "CA",
          shipName: "Jane Smith",
          shipAddress: "456 Elm St, San Francisco, CA",
          shipGSTIN: "GSTIN654321",
          shipState: "California",
          shipCode: "CA",
          productDescription: "Product A",
          sacCode: "SAC001",
          amount: 1000,
          taxableValue: 900,
          taxRate: "18%",
          taxAmount: 162,
          total: 1162,
          beneficiaryName: "John Doe",
          bankAccount: "1234567890",
          bankIFSC: "IFSC0001",
          panCard: "PAN123456",
          totalBeforeTax: 1000,
          igst: 18,
          totalTaxAmount: 162,
          roundOff: 0,
          totalAfterTax: 1162,
          gstReverseCharge: "N",
          proformaStatus: "Pending"
        },
        {
          pi: "PF12346",
          transportMode: "Road",
          invoiceDate: "2024-06-05",
          vehicleNumber: "MH12AB1234",
          reverseCharge: "N",
          reverseCharge2: "N",
          state: "Maharashtra",
          code: "MH",
          placeOfSupply: "Mumbai",
          billName: "Rajesh Kumar",
          billAddress: "456 Business Tower, Bandra West, Mumbai, Maharashtra",
          billGSTIN: "GSTIN789012",
          billState: "Maharashtra",
          billCode: "MH",
          shipName: "Rajesh Kumar",
          shipAddress: "456 Business Tower, Bandra West, Mumbai, Maharashtra",
          shipGSTIN: "GSTIN789012",
          shipState: "Maharashtra",
          shipCode: "MH",
          productDescription: "Digital Marketing Services",
          sacCode: "SAC002",
          amount: 2500,
          taxableValue: 2250,
          taxRate: "18%",
          taxAmount: 405,
          total: 2905,
          beneficiaryName: "Rajesh Kumar",
          bankAccount: "9876543210",
          bankIFSC: "HDFC0001",
          panCard: "PAN789012",
          totalBeforeTax: 2500,
          igst: 18,
          totalTaxAmount: 405,
          roundOff: 0,
          totalAfterTax: 2905,
          gstReverseCharge: "N",
          proformaStatus: "Accepted"
        },
        {
          pi: "PF12347",
          transportMode: "Sea",
          invoiceDate: "2024-06-10",
          vehicleNumber: "CONTAINER001",
          reverseCharge: "Y",
          reverseCharge2: "N",
          state: "Gujarat",
          code: "GJ",
          placeOfSupply: "Ahmedabad",
          billName: "Priya Sharma",
          billAddress: "789 Corporate Park, SG Highway, Ahmedabad, Gujarat",
          billGSTIN: "GSTIN345678",
          billState: "Gujarat",
          billCode: "GJ",
          shipName: "Global Logistics Ltd",
          shipAddress: "Port Area, Mundra, Gujarat",
          shipGSTIN: "GSTIN901234",
          shipState: "Gujarat",
          shipCode: "GJ",
          productDescription: "Website Development Package",
          sacCode: "SAC003",
          amount: 5000,
          taxableValue: 4500,
          taxRate: "18%",
          taxAmount: 810,
          total: 5810,
          beneficiaryName: "Priya Sharma",
          bankAccount: "5678901234",
          bankIFSC: "ICIC0002",
          panCard: "PAN345678",
          totalBeforeTax: 5000,
          igst: 18,
          totalTaxAmount: 810,
          roundOff: 0,
          totalAfterTax: 5810,
          gstReverseCharge: "Y",
          proformaStatus: "Pending"
        },
        {
          pi: "PF12348",
          transportMode: "Air",
          invoiceDate: "2024-06-15",
          vehicleNumber: "AI456BC7890",
          reverseCharge: "N",
          reverseCharge2: "N",
          state: "Delhi",
          code: "DL",
          placeOfSupply: "New Delhi",
          billName: "Amit Singh",
          billAddress: "321 Nehru Place, New Delhi",
          billGSTIN: "GSTIN567890",
          billState: "Delhi",
          billCode: "DL",
          shipName: "Tech Solutions Pvt Ltd",
          shipAddress: "456 Connaught Place, New Delhi",
          shipGSTIN: "GSTIN123789",
          shipState: "Delhi",
          shipCode: "DL",
          productDescription: "Mobile App Development",
          sacCode: "SAC004",
          amount: 7500,
          taxableValue: 6750,
          taxRate: "18%",
          taxAmount: 1215,
          total: 8715,
          beneficiaryName: "Amit Singh",
          bankAccount: "3456789012",
          bankIFSC: "SBI0003",
          panCard: "PAN567890",
          totalBeforeTax: 7500,
          igst: 18,
          totalTaxAmount: 1215,
          roundOff: 0,
          totalAfterTax: 8715,
          gstReverseCharge: "N",
          proformaStatus: "Rejected"
        },
        {
          pi: "PF12349",
          transportMode: "Road",
          invoiceDate: "2024-06-20",
          vehicleNumber: "KA01CD5678",
          reverseCharge: "N",
          reverseCharge2: "N",
          state: "Karnataka",
          code: "KA",
          placeOfSupply: "Bangalore",
          billName: "Sneha Reddy",
          billAddress: "654 MG Road, Bangalore, Karnataka",
          billGSTIN: "GSTIN234567",
          billState: "Karnataka",
          billCode: "KA",
          shipName: "Sneha Reddy",
          shipAddress: "654 MG Road, Bangalore, Karnataka",
          shipGSTIN: "GSTIN234567",
          shipState: "Karnataka",
          shipCode: "KA",
          productDescription: "Graphics Design Package",
          sacCode: "SAC005",
          amount: 3000,
          taxableValue: 2700,
          taxRate: "18%",
          taxAmount: 486,
          total: 3486,
          beneficiaryName: "Sneha Reddy",
          bankAccount: "7890123456",
          bankIFSC: "AXIS0004",
          panCard: "PAN234567",
          totalBeforeTax: 3000,
          igst: 18,
          totalTaxAmount: 486,
          roundOff: 0,
          totalAfterTax: 3486,
          gstReverseCharge: "N",
          proformaStatus: "Pending"
        },
        {
          pi: "PF12350",
          transportMode: "Courier",
          invoiceDate: "2024-06-25",
          vehicleNumber: "TRACK123456",
          reverseCharge: "N",
          reverseCharge2: "N",
          state: "Tamil Nadu",
          code: "TN",
          placeOfSupply: "Chennai",
          billName: "Venkat Raman",
          billAddress: "987 Anna Salai, Chennai, Tamil Nadu",
          billGSTIN: "GSTIN678901",
          billState: "Tamil Nadu",
          billCode: "TN",
          shipName: "South India Corp",
          shipAddress: "321 Mount Road, Chennai, Tamil Nadu",
          shipGSTIN: "GSTIN456789",
          shipState: "Tamil Nadu",
          shipCode: "TN",
          productDescription: "SEO Optimization Service",
          sacCode: "SAC006",
          amount: 4000,
          taxableValue: 3600,
          taxRate: "18%",
          taxAmount: 648,
          total: 4648,
          beneficiaryName: "Venkat Raman",
          bankAccount: "9012345678",
          bankIFSC: "IDBI0005",
          panCard: "PAN678901",
          totalBeforeTax: 4000,
          igst: 18,
          totalTaxAmount: 648,
          roundOff: 0,
          totalAfterTax: 4648,
          gstReverseCharge: "N",
          proformaStatus: "Accepted"
        }
      ];
      // Add sample data to existing proformas
      proformas = [...proformas, ...sampleData];
    } else {
      // No existing data, use sample data
      proformas = [
        {
          pi: "PF12345",
          transportMode: "Air",
          invoiceDate: "2024-06-01",
          vehicleNumber: "AB12CD3456",
          reverseCharge: "N",
          reverseCharge2: "N",
          state: "California",
          code: "CA",
          placeOfSupply: "Los Angeles",
          billName: "John Doe",
          billAddress: "123 Main St, Los Angeles, CA",
          billGSTIN: "GSTIN123456",
          billState: "California",
          billCode: "CA",
          shipName: "Jane Smith",
          shipAddress: "456 Elm St, San Francisco, CA",
          shipGSTIN: "GSTIN654321",
          shipState: "California",
          shipCode: "CA",
          productDescription: "Product A",
          sacCode: "SAC001",
          amount: 1000,
          taxableValue: 900,
          taxRate: "18%",
          taxAmount: 162,
          total: 1162,
          beneficiaryName: "John Doe",
          bankAccount: "1234567890",
          bankIFSC: "IFSC0001",
          panCard: "PAN123456",
          totalBeforeTax: 1000,
          igst: 18,
          totalTaxAmount: 162,
          roundOff: 0,
          totalAfterTax: 1162,
          gstReverseCharge: "N",
          proformaStatus: "Pending"
        },
        {
          pi: "PF12346",
          transportMode: "Road",
          invoiceDate: "2024-06-05",
          vehicleNumber: "MH12AB1234",
          reverseCharge: "N",
          reverseCharge2: "N",
          state: "Maharashtra",
          code: "MH",
          placeOfSupply: "Mumbai",
          billName: "Rajesh Kumar",
          billAddress: "456 Business Tower, Bandra West, Mumbai, Maharashtra",
          billGSTIN: "GSTIN789012",
          billState: "Maharashtra",
          billCode: "MH",
          shipName: "Rajesh Kumar",
          shipAddress: "456 Business Tower, Bandra West, Mumbai, Maharashtra",
          shipGSTIN: "GSTIN789012",
          shipState: "Maharashtra",
          shipCode: "MH",
          productDescription: "Digital Marketing Services",
          sacCode: "SAC002",
          amount: 2500,
          taxableValue: 2250,
          taxRate: "18%",
          taxAmount: 405,
          total: 2905,
          beneficiaryName: "Rajesh Kumar",
          bankAccount: "9876543210",
          bankIFSC: "HDFC0001",
          panCard: "PAN789012",
          totalBeforeTax: 2500,
          igst: 18,
          totalTaxAmount: 405,
          roundOff: 0,
          totalAfterTax: 2905,
          gstReverseCharge: "N",
          proformaStatus: "Accepted"
        },
        {
          pi: "PF12347",
          transportMode: "Sea",
          invoiceDate: "2024-06-10",
          vehicleNumber: "CONTAINER001",
          reverseCharge: "Y",
          reverseCharge2: "N",
          state: "Gujarat",
          code: "GJ",
          placeOfSupply: "Ahmedabad",
          billName: "Priya Sharma",
          billAddress: "789 Corporate Park, SG Highway, Ahmedabad, Gujarat",
          billGSTIN: "GSTIN345678",
          billState: "Gujarat",
          billCode: "GJ",
          shipName: "Global Logistics Ltd",
          shipAddress: "Port Area, Mundra, Gujarat",
          shipGSTIN: "GSTIN901234",
          shipState: "Gujarat",
          shipCode: "GJ",
          productDescription: "Website Development Package",
          sacCode: "SAC003",
          amount: 5000,
          taxableValue: 4500,
          taxRate: "18%",
          taxAmount: 810,
          total: 5810,
          beneficiaryName: "Priya Sharma",
          bankAccount: "5678901234",
          bankIFSC: "ICIC0002",
          panCard: "PAN345678",
          totalBeforeTax: 5000,
          igst: 18,
          totalTaxAmount: 810,
          roundOff: 0,
          totalAfterTax: 5810,
          gstReverseCharge: "Y",
          proformaStatus: "Pending"
        },
        {
          pi: "PF12348",
          transportMode: "Air",
          invoiceDate: "2024-06-15",
          vehicleNumber: "AI456BC7890",
          reverseCharge: "N",
          reverseCharge2: "N",
          state: "Delhi",
          code: "DL",
          placeOfSupply: "New Delhi",
          billName: "Amit Singh",
          billAddress: "321 Nehru Place, New Delhi",
          billGSTIN: "GSTIN567890",
          billState: "Delhi",
          billCode: "DL",
          shipName: "Tech Solutions Pvt Ltd",
          shipAddress: "456 Connaught Place, New Delhi",
          shipGSTIN: "GSTIN123789",
          shipState: "Delhi",
          shipCode: "DL",
          productDescription: "Mobile App Development",
          sacCode: "SAC004",
          amount: 7500,
          taxableValue: 6750,
          taxRate: "18%",
          taxAmount: 1215,
          total: 8715,
          beneficiaryName: "Amit Singh",
          bankAccount: "3456789012",
          bankIFSC: "SBI0003",
          panCard: "PAN567890",
          totalBeforeTax: 7500,
          igst: 18,
          totalTaxAmount: 1215,
          roundOff: 0,
          totalAfterTax: 8715,
          gstReverseCharge: "N",
          proformaStatus: "Rejected"
        },
        {
          pi: "PF12349",
          transportMode: "Road",
          invoiceDate: "2024-06-20",
          vehicleNumber: "KA01CD5678",
          reverseCharge: "N",
          reverseCharge2: "N",
          state: "Karnataka",
          code: "KA",
          placeOfSupply: "Bangalore",
          billName: "Sneha Reddy",
          billAddress: "654 MG Road, Bangalore, Karnataka",
          billGSTIN: "GSTIN234567",
          billState: "Karnataka",
          billCode: "KA",
          shipName: "Sneha Reddy",
          shipAddress: "654 MG Road, Bangalore, Karnataka",
          shipGSTIN: "GSTIN234567",
          shipState: "Karnataka",
          shipCode: "KA",
          productDescription: "Graphics Design Package",
          sacCode: "SAC005",
          amount: 3000,
          taxableValue: 2700,
          taxRate: "18%",
          taxAmount: 486,
          total: 3486,
          beneficiaryName: "Sneha Reddy",
          bankAccount: "7890123456",
          bankIFSC: "AXIS0004",
          panCard: "PAN234567",
          totalBeforeTax: 3000,
          igst: 18,
          totalTaxAmount: 486,
          roundOff: 0,
          totalAfterTax: 3486,
          gstReverseCharge: "N",
          proformaStatus: "Pending"
        },
        {
          pi: "PF12350",
          transportMode: "Courier",
          invoiceDate: "2024-06-25",
          vehicleNumber: "TRACK123456",
          reverseCharge: "N",
          reverseCharge2: "N",
          state: "Tamil Nadu",
          code: "TN",
          placeOfSupply: "Chennai",
          billName: "Venkat Raman",
          billAddress: "987 Anna Salai, Chennai, Tamil Nadu",
          billGSTIN: "GSTIN678901",
          billState: "Tamil Nadu",
          billCode: "TN",
          shipName: "South India Corp",
          shipAddress: "321 Mount Road, Chennai, Tamil Nadu",
          shipGSTIN: "GSTIN456789",
          shipState: "Tamil Nadu",
          shipCode: "TN",
          productDescription: "SEO Optimization Service",
          sacCode: "SAC006",
          amount: 4000,
          taxableValue: 3600,
          taxRate: "18%",
          taxAmount: 648,
          total: 4648,
          beneficiaryName: "Venkat Raman",
          bankAccount: "9012345678",
          bankIFSC: "IDBI0005",
          panCard: "PAN678901",
          totalBeforeTax: 4000,
          igst: 18,
          totalTaxAmount: 648,
          roundOff: 0,
          totalAfterTax: 4648,
          gstReverseCharge: "N",
          proformaStatus: "Accepted"
        }
      ];
    }
    saveProformas();
  }

  function saveProformas() {
    localStorage.setItem('accounts_proforma_invoice_data', JSON.stringify(proformas));
  }

  function createForm() {
    formContainer.innerHTML = `
      <form id="proforma-form" class="form" style="background:#fff; padding:20px; border-radius:12px; box-shadow: var(--shadow); max-width: 900px; display: flex; flex-direction: column; gap: 16px;">
        <h3>New Proforma Invoice</h3>
        <div class="field">
          <label>PI:</label>
          <input type="text" name="pi" required class="input"/>
        </div>
        <div class="field">
          <label>Transport Mode:</label>
          <input type="text" name="transportMode" class="input"/>
        </div>
        <div class="field">
          <label>Invoice Date:</label>
          <input type="date" name="invoiceDate" required class="input"/>
        </div>
        <div class="field">
          <label>Vehicle Number:</label>
          <input type="text" name="vehicleNumber" class="input"/>
        </div>
        <div class="field">
          <label>Reverse Charge (Y/N):</label>
          <select name="reverseCharge" required class="input">
            <option value="N">N</option>
            <option value="Y">Y</option>
          </select>
        </div>
        <div class="field">
          <label>Reverse Charge (Y/N):</label>
          <select name="reverseCharge2" required class="input">
            <option value="N">N</option>
            <option value="Y">Y</option>
          </select>
        </div>
        <div class="field">
          <label>State:</label>
          <input type="text" name="state" required class="input"/>
        </div>
        <div class="field">
          <label>Code:</label>
          <input type="text" name="code" required class="input"/>
        </div>
        <div class="field">
          <label>Place of Supply:</label>
          <input type="text" name="placeOfSupply" required class="input"/>
        </div>

        <h4>Bill to Party</h4>
        <label>Name:
          <input type="text" name="billName" required />
        </label>
        <label>Address:
          <textarea name="billAddress" rows="2" required></textarea>
        </label>
        <label>GSTIN:
          <input type="text" name="billGSTIN" required />
        </label>
        <label>State:
          <input type="text" name="billState" required />
        </label>
        <label>Code:
          <input type="text" name="billCode" required />
        </label>

        <h4>Ship to Party</h4>
        <label>Name:
          <input type="text" name="shipName" required />
        </label>
        <label>Address:
          <textarea name="shipAddress" rows="2" required></textarea>
        </label>
        <label>GSTIN:
          <input type="text" name="shipGSTIN" required />
        </label>
        <label>State:
          <input type="text" name="shipState" required />
        </label>
        <label>Code:
          <input type="text" name="shipCode" required />
        </label>

        <h4>Product Details</h4>
        <table style="width:100%; border-collapse: collapse; margin-bottom: 12px;">
          <thead>
            <tr>
              <th>Sr. No.</th>
              <th>Product Description</th>
              <th>SAC Code</th>
              <th>Amount</th>
              <th>Taxable Value</th>
              <th>IGST or CGST & SGST Rate</th>
              <th>IGST or CGST & SGST Amount</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody id="product-rows">
            <tr>
              <td>1</td>
              <td><input type="text" name="productDescription" required /></td>
              <td><input type="text" name="sacCode" required /></td>
              <td><input type="number" name="amount" required /></td>
              <td><input type="number" name="taxableValue" required /></td>
              <td><input type="text" name="taxRate" required /></td>
              <td><input type="number" name="taxAmount" required /></td>
              <td><input type="number" name="total" required /></td>
            </tr>
          </tbody>
        </table>
        <button type="button" id="add-product-row" style="margin-bottom: 12px;">Add Product</button>

        <h4>Bank Details</h4>
        <label>Beneficiary Name:
          <input type="text" name="beneficiaryName" required />
        </label>
        <label>Bank Current A/C:
          <input type="text" name="bankAccount" required />
        </label>
        <label>Bank IFSC:
          <input type="text" name="bankIFSC" required />
        </label>
        <label>PAN Card Number:
          <input type="text" name="panCard" required />
        </label>

        <h4>Tax Details</h4>
        <label>Total Amount before Tax:
          <input type="number" name="totalBeforeTax" required />
        </label>
        <label>Add: IGST (%):
          <input type="number" name="igst" required />
        </label>
        <label>Total Tax Amount:
          <input type="number" name="totalTaxAmount" required />
        </label>
        <label>Round Off:
          <input type="number" name="roundOff" required />
        </label>
        <label>Total Amount after Tax:
          <input type="number" name="totalAfterTax" required />
        </label>
        <label>GST on Reverse Charge:
          <input type="text" name="gstReverseCharge" required />
        </label>

        <h4>Additional Info</h4>
        <label>Proforma Status:
          <select name="proformaStatus" required>
            <option value="Pending">Pending</option>
            <option value="Accepted">Accepted</option>
            <option value="Rejected">Rejected</option>
          </select>
        </label>

        <div style="margin-top: 20px; display: flex; gap: 10px;">
          <button type="submit" class="btn primary">Save Proforma</button>
          <button type="button" id="cancel-form" class="btn">Cancel</button>
        </div>
      </form>
    `;
  }

  function renderProforma(proforma) {
    // Format date for display
    const invoiceDate = proforma.invoiceDate ? new Date(proforma.invoiceDate).toLocaleDateString('en-IN') : '';

    // Defensive checks and normalization for product data arrays
    const descriptions = Array.isArray(proforma.productDescription) ? proforma.productDescription : [proforma.productDescription || 'N/A'];
    const sacCodes = Array.isArray(proforma.sacCode) ? proforma.sacCode : [proforma.sacCode || 'N/A'];
    const amounts = Array.isArray(proforma.amount) ? proforma.amount : [proforma.amount || 'N/A'];
    const taxableValues = Array.isArray(proforma.taxableValue) ? proforma.taxableValue : [proforma.taxableValue || 'N/A'];
    const taxRates = Array.isArray(proforma.taxRate) ? proforma.taxRate : [proforma.taxRate || 'N/A'];
    const taxAmounts = Array.isArray(proforma.taxAmount) ? proforma.taxAmount : [proforma.taxAmount || 'N/A'];
    const totals = Array.isArray(proforma.total) ? proforma.total : [proforma.total || 'N/A'];

    // Find max length among product arrays to avoid index errors
    const maxLength = Math.max(
      descriptions.length,
      sacCodes.length,
      amounts.length,
      taxableValues.length,
      taxRates.length,
      taxAmounts.length,
      totals.length
    );

    // Pad arrays to maxLength with 'N/A' if needed
    function padArray(arr) {
      const copy = arr.slice();
      while (copy.length < maxLength) {
        copy.push('N/A');
      }
      return copy;
    }

    const descs = padArray(descriptions);
    const sacs = padArray(sacCodes);
    const amts = padArray(amounts);
    const taxVals = padArray(taxableValues);
    const rates = padArray(taxRates);
    const taxAmts = padArray(taxAmounts);
    const tots = padArray(totals);

    let productRows = '';
    for(let i = 0; i < maxLength; i++){
      productRows += `<tr>
        <td style="border: 3px solid black; padding: 6px;">${i+1}.</td>
        <td style="border: 3px solid black; padding: 6px;">${descs[i]}</td>
        <td style="border: 3px solid black; padding: 6px;">${sacs[i]}</td>
        <td style="border: 3px solid black; padding: 6px;">${amts[i]}</td>
        <td style="border: 3px solid black; padding: 6px;">${taxVals[i]}</td>
        <td style="border: 3px solid black; padding: 6px;">${rates[i]}</td>
        <td style="border: 3px solid black; padding: 6px;">${taxAmts[i]}</td>
        <td style="border: 3px solid black; padding: 6px;">${tots[i]}</td>
      </tr>`;
    }

    return `
      <div class="invoice-print-container" style="width: 900px; font-family: Arial, sans-serif; border: 3px solid black; background: white; padding: 0; margin: 0 auto; color: black;">
        <table style="width: 100%; border-collapse: collapse; font-size: 12px; border: 3px solid black;">
          <thead>
            <tr>
              <td style="border: 3px solid black; padding: 6px; width: 20%; vertical-align: top;">
                <img src="https://i.ibb.co/2dQZxqZ/wdm-logo.png" alt="Logo" style="width: 130px; height: auto; margin-bottom: 4px;"/>
              </td>
              <td style="border: 3px solid black; padding: 6px; text-align: center; vertical-align: top; font-size: 14px; font-weight: bold;">
                Name: WFB DIGITAL MANTRA IT SERVICES PRIVATE LIMITED<br/>
                Address: 23, 3rd Floor, Nandita Manison, 1st Cross, 1st Stage, Kumaraswamy Layout, Bengaluru, Karnataka, 560078<br/>
                GSTIN: 29AACCW6067A1ZB<br/>
                Pan number: AACCW6067A
              </td>
            </tr>
            <tr>
              <td colspan="2" style="border: 3px solid black; text-align: center; font-weight: bold; font-size: 16px; padding: 8px;">
                Proforma Invoice
              </td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="border: 3px solid black; padding: 6px;">
                PI: ${proforma.pi || 'N/A'}
              </td>
              <td style="border: 3px solid black; padding: 6px;">
                Transport Mode: ${proforma.transportMode || 'N/A'}
              </td>
            </tr>
            <tr>
              <td style="border: 3px solid black; padding: 6px;">
                Invoice Date: ${invoiceDate}
              </td>
              <td style="border: 3px solid black; padding: 6px;">
                Vehicle Number: ${proforma.vehicleNumber || 'N/A'}
              </td>
            </tr>
            <tr>
              <td style="border: 3px solid black; padding: 6px;">
                Reverse Charge (Y/N): ${proforma.reverseCharge || 'N'}
              </td>
              <td style="border: 3px solid black; padding: 6px;">
                Reverse Charge (Y/N): ${proforma.reverseCharge2 || 'N'}
              </td>
            </tr>
            <tr>
              <td style="border: 3px solid black; padding: 6px;">
                State: ${proforma.state || 'N/A'}
              </td>
              <td style="border: 3px solid black; padding: 6px;">
                Code: ${proforma.code || 'N/A'}
              </td>
            </tr>
            <tr>
              <td colspan="2" style="border: 3px solid black; padding: 6px;">
                Place of Supply: ${proforma.placeOfSupply || 'N/A'}
              </td>
            </tr>
            <tr>
              <td colspan="2" style="border: 3px solid black; padding: 6px;">
                <table style="width: 100%; border-collapse: collapse; font-size: 12px;">
                  <tr>
                    <td style="border: 3px solid black; padding: 6px; width: 50%; font-weight: bold;">Bill to Party</td>
                    <td style="border: 3px solid black; padding: 6px; width: 50%; font-weight: bold;">Ship to Party</td>
                  </tr>
                  <tr>
                    <td style="border: 3px solid black; padding: 6px;">
                      Name: ${proforma.billName || 'N/A'}<br/>
                      Address: ${proforma.billAddress || 'N/A'}
                    </td>
                    <td style="border: 3px solid black; padding: 6px;">
                      Name: ${proforma.shipName || 'N/A'}<br/>
                      Address: ${proforma.shipAddress || 'N/A'}
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td colspan="2" style="border: 3px solid black; padding: 6px;">
                <table style="width: 100%; border-collapse: collapse; font-size: 12px;">
                  <tr>
                    <td style="border: 3px solid black; padding: 6px; width: 33%;">GSTIN: ${proforma.billGSTIN || 'N/A'}</td>
                    <td style="border: 3px solid black; padding: 6px; width: 33%;">State: ${proforma.billState || 'N/A'}</td>
                    <td style="border: 3px solid black; padding: 6px; width: 33%;">Code ${proforma.billCode || 'N/A'}</td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td colspan="2" style="border: 3px solid black; padding: 6px;">
                <table style="width: 100%; border-collapse: collapse; font-size: 12px;">
                  <thead>
                    <tr>
                      <th style="border: 3px solid black; padding: 6px;">Sr. No.</th>
                      <th style="border: 3px solid black; padding: 6px;">Product Description</th>
                      <th style="border: 3px solid black; padding: 6px;">SAC code</th>
                      <th style="border: 3px solid black; padding: 6px;">Amount</th>
                      <th style="border: 3px solid black; padding: 6px;">Taxable Value</th>
                      <th style="border: 3px solid black; padding: 6px;">IGST or CGST & SGST Rate</th>
                      <th style="border: 3px solid black; padding: 6px;">IGST or CGST & SGST Amount</th>
                      <th style="border: 3px solid black; padding: 6px;">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    ${productRows}
                  </tbody>
                </table>
              </td>
            </tr>
            <tr>
              <td style="border: 3px solid black; padding: 6px; width: 50%;">
                Bank Details
              </td>
              <td style="border: 3px solid black; padding: 6px; width: 50%;">
                Total Amount before Tax ${proforma.totalBeforeTax || 'N/A'}
              </td>
            </tr>
            <tr>
              <td style="border: 3px solid black; padding: 6px;">
                Beneficiary Name:- ${proforma.beneficiaryName || 'N/A'}
              </td>
              <td style="border: 3px solid black; padding: 6px;">
                Add: IGST ${proforma.igst || 'N/A'}%
              </td>
            </tr>
            <tr>
              <td style="border: 3px solid black; padding: 6px;">
                ${proforma.bankAccount ? proforma.bankAccount.replace(/(\d{4})(\d{4})(\d{4})(\d{4})/, '$1 $2 $3 $4') : 'N/A'}
              </td>
              <td style="border: 3px solid black; padding: 6px;">
                Total Tax Amount ${proforma.totalTaxAmount || 'N/A'}
              </td>
            </tr>
            <tr>
              <td style="border: 3px solid black; padding: 6px;">
                Bank IFSC: ${proforma.bankIFSC || 'N/A'}
              </td>
              <td style="border: 3px solid black; padding: 6px;">
                Round Off ${proforma.roundOff || 'N/A'}
              </td>
            </tr>
            <tr>
              <td style="border: 3px solid black; padding: 6px;">
                PAN CARD Number: ${proforma.panCard || 'N/A'}
              </td>
              <td style="border: 3px solid black; padding: 6px;">
                Total Amount after Tax: ${proforma.totalAfterTax || 'N/A'}
              </td>
            </tr>
            <tr>
              <td colspan="2" style="border: 3px solid black; padding: 6px;">
                GST on Reverse Charge ${proforma.gstReverseCharge || 'N/A'}
              </td>
            </tr>
            <tr>
              <td colspan="2" style="border: 3px solid black; padding: 6px; font-size: 10px; text-align: center;">
                Certified that the particulars given above are true and correct
              </td>
            </tr>
            <tr>
              <td colspan="2" style="border: 3px solid black; padding: 6px; font-size: 10px; text-align: center;">
                Proforma Status: ${proforma.proformaStatus || 'N/A'}
              </td>
            </tr>
            <tr>
              <td style="border: 3px solid black; padding: 6px; width: 50%; height: 100px;">
                Proforma status: ${proforma.proformaStatus || 'N/A'}
              </td>
              <td style="border: 3px solid black; padding: 6px; width: 50%; text-align: center; height: 100px;">
                For (Web Digital Mantra IT Services Pvt Ltd)<br/><br/><br/>
                Authorized Signatory
              </td>
            </tr>
          </tbody>
        </table>
        <div style="text-align: center; margin-top: 20px;">
          <button id="print-proforma" class="btn primary" style="margin-right: 10px;">Print Proforma</button>
          <button id="back-to-table" class="btn">Back to Table</button>
        </div>
      </div>
    `;
  }

  function renderSavedProformas() {
    if (proformas.length === 0) {
      cardsContainer.innerHTML = '<p>No saved proforma invoices.</p>';
      return;
    }
    let html = '<table class="data-table" style="width: 120%; min-width: 1000px;">';
    html += '<thead><tr><th>PI</th><th>Invoice Date</th><th>Bill To</th><th>Status</th><th>Actions</th></tr></thead><tbody>';
    proformas.forEach((inv, index) => {
      const statusClass = inv.proformaStatus === 'Accepted' ? 'success' : inv.proformaStatus === 'Rejected' ? 'error' : 'warning';
      html += `<tr>
        <td>${inv.pi}</td>
        <td>${inv.invoiceDate}</td>
        <td>${inv.billName}</td>
        <td><span class="${statusClass}">${inv.proformaStatus}</span></td>
        <td>
          <button class="btn primary view-btn" data-index="${index}">View</button>
          <button class="btn ghost edit-btn" data-index="${index}">Edit</button>
          ${inv.proformaStatus === 'Pending' ? `<button class="btn success accept-btn" data-index="${index}">Accept</button>
          <button class="btn error reject-btn" data-index="${index}">Reject</button>` : ''}
        </td>
      </tr>`;
    });
    html += '</tbody></table>';
    cardsContainer.innerHTML = html;

    // Add event listeners for view buttons
    document.querySelectorAll('.view-btn').forEach(btn => {
      btn.addEventListener('click', e => {
        const idx = e.target.getAttribute('data-index');
        displayContainer.innerHTML = renderProforma(proformas[idx]);
        displayContainer.style.display = 'block';
        formContainer.style.display = 'none';
        cardsContainer.style.display = 'none';
        newProformaBtn.style.display = 'none';
        backBtn.style.display = 'block';

        // Add event listeners for print and back buttons
        document.getElementById('print-proforma').addEventListener('click', () => {
          window.print();
        });
        document.getElementById('back-to-table').addEventListener('click', () => {
          resetForm();
        });
      });
    });

  // Add event listeners for edit buttons
  document.querySelectorAll('.edit-btn').forEach(btn => {
    btn.addEventListener('click', e => {
      const idx = e.target.getAttribute('data-index');
      openEditForm(parseInt(idx, 10));
    });
  });

  function openEditForm(index) {
    editingIndex = index;
    const proforma = proformas[index];
    formContainer.style.display = 'block';
    displayContainer.style.display = 'none';
    cardsContainer.style.display = 'none';
    newProformaBtn.style.display = 'none';
    backBtn.style.display = 'block';

    createForm();

    const proformaForm = document.getElementById('proforma-form');
    const productRows = document.getElementById('product-rows');

    // Clear existing product rows except the first
    while (productRows.rows.length > 1) {
      productRows.deleteRow(1);
    }

    // Fill form fields with proforma data
    proformaForm.elements['pi'].value = proforma.pi || '';
    proformaForm.elements['transportMode'].value = proforma.transportMode || '';
    proformaForm.elements['invoiceDate'].value = proforma.invoiceDate || '';
    proformaForm.elements['vehicleNumber'].value = proforma.vehicleNumber || '';
    proformaForm.elements['reverseCharge'].value = proforma.reverseCharge || 'N';
    proformaForm.elements['reverseCharge2'].value = proforma.reverseCharge2 || 'N';
    proformaForm.elements['state'].value = proforma.state || '';
    proformaForm.elements['code'].value = proforma.code || '';
    proformaForm.elements['placeOfSupply'].value = proforma.placeOfSupply || '';
    proformaForm.elements['billName'].value = proforma.billName || '';
    proformaForm.elements['billAddress'].value = proforma.billAddress || '';
    proformaForm.elements['billGSTIN'].value = proforma.billGSTIN || '';
    proformaForm.elements['billState'].value = proforma.billState || '';
    proformaForm.elements['billCode'].value = proforma.billCode || '';
    proformaForm.elements['shipName'].value = proforma.shipName || '';
    proformaForm.elements['shipAddress'].value = proforma.shipAddress || '';
    proformaForm.elements['shipGSTIN'].value = proforma.shipGSTIN || '';
    proformaForm.elements['shipState'].value = proforma.shipState || '';
    proformaForm.elements['shipCode'].value = proforma.shipCode || '';
    proformaForm.elements['beneficiaryName'].value = proforma.beneficiaryName || '';
    proformaForm.elements['bankAccount'].value = proforma.bankAccount || '';
    proformaForm.elements['bankIFSC'].value = proforma.bankIFSC || '';
    proformaForm.elements['panCard'].value = proforma.panCard || '';
    proformaForm.elements['totalBeforeTax'].value = proforma.totalBeforeTax || '';
    proformaForm.elements['igst'].value = proforma.igst || '';
    proformaForm.elements['totalTaxAmount'].value = proforma.totalTaxAmount || '';
    proformaForm.elements['roundOff'].value = proforma.roundOff || '';
    proformaForm.elements['totalAfterTax'].value = proforma.totalAfterTax || '';
    proformaForm.elements['gstReverseCharge'].value = proforma.gstReverseCharge || '';
    proformaForm.elements['proformaStatus'].value = proforma.proformaStatus || 'Pending';

    // Fill product rows
    const productKeys = ['productDescription', 'sacCode', 'amount', 'taxableValue', 'taxRate', 'taxAmount', 'total'];
    const maxLength = Math.max(
      Array.isArray(proforma.productDescription) ? proforma.productDescription.length : 1,
      Array.isArray(proforma.sacCode) ? proforma.sacCode.length : 1,
      Array.isArray(proforma.amount) ? proforma.amount.length : 1,
      Array.isArray(proforma.taxableValue) ? proforma.taxableValue.length : 1,
      Array.isArray(proforma.taxRate) ? proforma.taxRate.length : 1,
      Array.isArray(proforma.taxAmount) ? proforma.taxAmount.length : 1,
      Array.isArray(proforma.total) ? proforma.total.length : 1
    );

    for (let i = 0; i < maxLength; i++) {
      if (i > 0) {
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
          <td>${i + 1}</td>
          <td><input type="text" name="productDescription" required /></td>
          <td><input type="text" name="sacCode" required /></td>
          <td><input type="number" name="amount" required /></td>
          <td><input type="number" name="taxableValue" required /></td>
          <td><input type="text" name="taxRate" required /></td>
          <td><input type="number" name="taxAmount" required /></td>
          <td><input type="number" name="total" required /></td>
          <td><button type="button" class="remove-product-row btn">Remove</button></td>
        `;
        productRows.appendChild(newRow);

        newRow.querySelector('.remove-product-row').addEventListener('click', () => {
          newRow.remove();
          Array.from(productRows.rows).forEach((row, index) => {
            row.cells[0].textContent = index + 1;
          });
        });
      }
      // Set values for each product input
      const row = productRows.rows[i];
      row.querySelector('input[name="productDescription"]').value = Array.isArray(proforma.productDescription) ? proforma.productDescription[i] || '' : (i === 0 ? proforma.productDescription || '' : '');
      row.querySelector('input[name="sacCode"]').value = Array.isArray(proforma.sacCode) ? proforma.sacCode[i] || '' : (i === 0 ? proforma.sacCode || '' : '');
      row.querySelector('input[name="amount"]').value = Array.isArray(proforma.amount) ? proforma.amount[i] || '' : (i === 0 ? proforma.amount || '' : '');
      row.querySelector('input[name="taxableValue"]').value = Array.isArray(proforma.taxableValue) ? proforma.taxableValue[i] || '' : (i === 0 ? proforma.taxableValue || '' : '');
      row.querySelector('input[name="taxRate"]').value = Array.isArray(proforma.taxRate) ? proforma.taxRate[i] || '' : (i === 0 ? proforma.taxRate || '' : '');
      row.querySelector('input[name="taxAmount"]').value = Array.isArray(proforma.taxAmount) ? proforma.taxAmount[i] || '' : (i === 0 ? proforma.taxAmount || '' : '');
      row.querySelector('input[name="total"]').value = Array.isArray(proforma.total) ? proforma.total[i] || '' : (i === 0 ? proforma.total || '' : '');
    }

    // Add event listeners for form buttons
    const addProductRowBtn = document.getElementById('add-product-row');
    const cancelFormBtn = document.getElementById('cancel-form');

    addProductRowBtn.addEventListener('click', () => {
      const rowCount = productRows.rows.length + 1;
      const newRow = document.createElement('tr');
      newRow.innerHTML = `
        <td>${rowCount}</td>
        <td><input type="text" name="productDescription" required /></td>
        <td><input type="text" name="sacCode" required /></td>
        <td><input type="number" name="amount" required /></td>
        <td><input type="number" name="taxableValue" required /></td>
        <td><input type="text" name="taxRate" required /></td>
        <td><input type="number" name="taxAmount" required /></td>
        <td><input type="number" name="total" required /></td>
        <td><button type="button" class="remove-product-row btn">Remove</button></td>
      `;
      productRows.appendChild(newRow);

      // Add event listener for remove button
      newRow.querySelector('.remove-product-row').addEventListener('click', () => {
        newRow.remove();
        // Re-number remaining rows
        Array.from(productRows.rows).forEach((row, index) => {
          row.cells[0].textContent = index + 1;
        });
      });
    });

    cancelFormBtn.addEventListener('click', () => {
      resetForm();
    });

    proformaForm.addEventListener('submit', e => {
      e.preventDefault();

      // Validate product rows
      const productRows = document.querySelectorAll('#product-rows tr');
      let isValid = true;
      let errorMessage = '';

      productRows.forEach((row, index) => {
        const inputs = row.querySelectorAll('input[required]');
        inputs.forEach(input => {
          if (!input.value.trim()) {
            isValid = false;
            input.style.borderColor = 'red';
            if (!errorMessage) {
              errorMessage = `Please fill in all required fields in product row ${index + 1}.`;
            }
          } else {
            input.style.borderColor = '';
          }
        });
      });

      if (!isValid) {
        alert(errorMessage);
        return;
      }

      const formData = new FormData(proformaForm);
      const proformaData = {};

      // Collect form data
      formData.forEach((value, key) => {
        if (!proformaData[key]) {
          proformaData[key] = value;
        } else {
          // For multiple product rows, collect as array
          if (!Array.isArray(proformaData[key])) {
            proformaData[key] = [proformaData[key]];
          }
          proformaData[key].push(value);
        }
      });

      // Ensure all product arrays have consistent lengths
      const productKeys = ['productDescription', 'sacCode', 'amount', 'taxableValue', 'taxRate', 'taxAmount', 'total'];
      const maxLength = Math.max(...productKeys.map(key => Array.isArray(proformaData[key]) ? proformaData[key].length : 1));

      productKeys.forEach(key => {
        if (!Array.isArray(proformaData[key])) {
          proformaData[key] = [proformaData[key]];
        }
        // Pad arrays to ensure consistent length
        while (proformaData[key].length < maxLength) {
          proformaData[key].push('');
        }
      });

      if (editingIndex !== null) {
        // Update existing proforma
        proformas[editingIndex] = proformaData;
        editingIndex = null;
      } else {
        // Add new proforma
        proformas.push(proformaData);
      }
      saveProformas();

      // Update the table immediately
      renderSavedProformas();

      // Render proforma for preview
      displayContainer.innerHTML = renderProforma(proformaData);
      displayContainer.style.display = 'block';
      formContainer.style.display = 'none';

      // Print button event
      document.getElementById('print-proforma').addEventListener('click', () => {
        window.print();
      });
      // Back to Table button event
      document.getElementById('back-to-table').addEventListener('click', () => {
        resetForm();
      });
    });
  }

    // Add event listeners for accept buttons
    document.querySelectorAll('.accept-btn').forEach(btn => {
      btn.addEventListener('click', e => {
        const idx = e.target.getAttribute('data-index');
        acceptProforma(idx);
      });
    });

    // Add event listeners for reject buttons
    document.querySelectorAll('.reject-btn').forEach(btn => {
      btn.addEventListener('click', e => {
        const idx = e.target.getAttribute('data-index');
        rejectProforma(idx);
      });
    });
  }

  function acceptProforma(index) {
    if (confirm('Are you sure you want to accept this proforma invoice? It will be converted to an invoice.')) {
      proformas[index].proformaStatus = 'Accepted';
      saveProformas();

      // Convert to invoice
      const proforma = proformas[index];
      const invoice = { ...proforma, invoiceStatus: 'Pending' }; // Set initial invoice status
      delete invoice.proformaStatus; // Remove proforma status

      let invoices = [];
      try {
        invoices = JSON.parse(localStorage.getItem('accounts_invoice_data') || '[]');
      } catch (e) {
        console.warn('localStorage access failed', e);
      }
      invoices.push(invoice);
      localStorage.setItem('accounts_invoice_data', JSON.stringify(invoices));

      renderSavedProformas();
      alert('Proforma invoice accepted and converted to invoice.');
    }
  }

  function rejectProforma(index) {
    if (confirm('Are you sure you want to reject this proforma invoice?')) {
      proformas[index].proformaStatus = 'Rejected';
      saveProformas();
      renderSavedProformas();
      alert('Proforma invoice rejected.');
    }
  }

  function resetForm() {
    formContainer.innerHTML = '';
    formContainer.style.display = 'none';
    displayContainer.style.display = 'none';
    cardsContainer.style.display = 'block';
    newProformaBtn.style.display = 'block';
    backBtn.style.display = 'none';
  }

  newProformaBtn.addEventListener('click', () => {
    formContainer.style.display = 'block';
    displayContainer.style.display = 'none';
    cardsContainer.style.display = 'none';
    newProformaBtn.style.display = 'none';
    backBtn.style.display = 'block';
    createForm();

    const proformaForm = document.getElementById('proforma-form');
    const addProductRowBtn = document.getElementById('add-product-row');
    const productRows = document.getElementById('product-rows');

    addProductRowBtn.addEventListener('click', () => {
      const rowCount = productRows.rows.length + 1;
      const newRow = document.createElement('tr');
      newRow.innerHTML = `
        <td>${rowCount}</td>
        <td><input type="text" name="productDescription" required /></td>
        <td><input type="text" name="sacCode" required /></td>
        <td><input type="number" name="amount" required /></td>
        <td><input type="number" name="taxableValue" required /></td>
        <td><input type="text" name="taxRate" required /></td>
        <td><input type="number" name="taxAmount" required /></td>
        <td><input type="number" name="total" required /></td>
        <td><button type="button" class="remove-product-row btn">Remove</button></td>
      `;
      productRows.appendChild(newRow);

      // Add event listener for remove button
      newRow.querySelector('.remove-product-row').addEventListener('click', () => {
        newRow.remove();
        // Re-number remaining rows
        Array.from(productRows.rows).forEach((row, index) => {
          row.cells[0].textContent = index + 1;
        });
      });
    });

    document.getElementById('cancel-form').addEventListener('click', () => {
      resetForm();
    });

    proformaForm.addEventListener('submit', e => {
      e.preventDefault();

      // Validate product rows
      const productRows = document.querySelectorAll('#product-rows tr');
      let isValid = true;
      let errorMessage = '';

      productRows.forEach((row, index) => {
        const inputs = row.querySelectorAll('input[required]');
        inputs.forEach(input => {
          if (!input.value.trim()) {
            isValid = false;
            input.style.borderColor = 'red';
            if (!errorMessage) {
              errorMessage = `Please fill in all required fields in product row ${index + 1}.`;
            }
          } else {
            input.style.borderColor = '';
          }
        });
      });

      if (!isValid) {
        alert(errorMessage);
        return;
      }

      const formData = new FormData(proformaForm);
      const proformaData = {};

      // Collect form data
      formData.forEach((value, key) => {
        if (!proformaData[key]) {
          proformaData[key] = value;
        } else {
          // For multiple product rows, collect as array
          if (!Array.isArray(proformaData[key])) {
            proformaData[key] = [proformaData[key]];
          }
          proformaData[key].push(value);
        }
      });

      // Ensure all product arrays have consistent lengths
      const productKeys = ['productDescription', 'sacCode', 'amount', 'taxableValue', 'taxRate', 'taxAmount', 'total'];
      const maxLength = Math.max(...productKeys.map(key => Array.isArray(proformaData[key]) ? proformaData[key].length : 1));

      productKeys.forEach(key => {
        if (!Array.isArray(proformaData[key])) {
          proformaData[key] = [proformaData[key]];
        }
        // Pad arrays to ensure consistent length
        while (proformaData[key].length < maxLength) {
          proformaData[key].push('');
        }
      });

      if (editingIndex !== null) {
        // Update existing proforma
        proformas[editingIndex] = proformaData;
        editingIndex = null;
      } else {
        // Add new proforma
        proformas.push(proformaData);
      }
      saveProformas();

      // Update the table immediately
      renderSavedProformas();

      // Render proforma for preview
      displayContainer.innerHTML = renderProforma(proformaData);
      displayContainer.style.display = 'block';
      formContainer.style.display = 'none';

      // Print button event
      document.getElementById('print-proforma').addEventListener('click', () => {
        window.print();
      });
      // Back to Table button event
      document.getElementById('back-to-table').addEventListener('click', () => {
        resetForm();
      });
    });

  });

  // Initial render of saved proformas
  renderSavedProformas();
});
