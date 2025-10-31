// Invoice module JavaScript

document.addEventListener('DOMContentLoaded', () => {
  const newInvoiceBtn = document.getElementById('new-invoice-btn');
  const formContainer = document.getElementById('invoice-form-container');
  const displayContainer = document.getElementById('invoice-display-container');
  const cardsContainer = document.getElementById('invoice-cards');

  // Create back button and insert next to new invoice button
  const backBtn = document.createElement('button');
  backBtn.id = 'back-btn';
  backBtn.className = 'btn';
  backBtn.innerHTML = '← Back';
  backBtn.style.display = 'none'; // Initially hidden
  newInvoiceBtn.parentNode.insertBefore(backBtn, newInvoiceBtn.nextSibling);

  // Add event listener for back button
  backBtn.addEventListener('click', () => {
    resetForm();
  });

let invoices = [];
try {
  invoices = JSON.parse(localStorage.getItem('accounts_invoice_data') || '[]');
} catch (e) {
  console.warn('localStorage access failed, falling back to in-memory data', e);
}

  // Add dummy data if no invoices exist
  if (invoices.length === 0) {
    invoices = [
      {
        pi: "PI12345",
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
        invoiceStatus: "Paid"
      },
      {
        pi: "PI67890",
        transportMode: "Road",
        invoiceDate: "2024-06-05",
        vehicleNumber: "XY98ZT7654",
        reverseCharge: "Y",
        reverseCharge2: "N",
        state: "Texas",
        code: "TX",
        placeOfSupply: "Houston",
        billName: "Alice Brown",
        billAddress: "789 Oak St, Houston, TX",
        billGSTIN: "GSTIN789012",
        billState: "Texas",
        billCode: "TX",
        shipName: "Bob White",
        shipAddress: "321 Pine St, Dallas, TX",
        shipGSTIN: "GSTIN210987",
        shipState: "Texas",
        shipCode: "TX",
        productDescription: "Product B",
        sacCode: "SAC002",
        amount: 2000,
        taxableValue: 1800,
        taxRate: "12%",
        taxAmount: 216,
        total: 2216,
        beneficiaryName: "Alice Brown",
        bankAccount: "0987654321",
        bankIFSC: "IFSC0002",
        panCard: "PAN789012",
        totalBeforeTax: 2000,
        igst: 12,
        totalTaxAmount: 216,
        roundOff: 0,
        totalAfterTax: 2216,
        gstReverseCharge: "Y",
        invoiceStatus: "Pending"
      },
      {
        pi: "PI10003",
        transportMode: "Sea",
        invoiceDate: "2024-06-12",
        vehicleNumber: "SHIP001",
        reverseCharge: "N",
        reverseCharge2: "N",
        state: "Florida",
        code: "FL",
        placeOfSupply: "Miami",
        billName: "Client 3",
        billAddress: "Address 3, Miami, FL",
        billGSTIN: "GSTIN100003",
        billState: "Florida",
        billCode: "FL",
        shipName: "Ship 3",
        shipAddress: "Ship Address 3, Miami, FL",
        shipGSTIN: "GSTIN200003",
        shipState: "Florida",
        shipCode: "FL",
        productDescription: "Product 3",
        sacCode: "SAC103",
        amount: 3000,
        taxableValue: 2700,
        taxRate: "18%",
        taxAmount: 486,
        total: 3486,
        beneficiaryName: "Client 3",
        bankAccount: "1234567893",
        bankIFSC: "IFSC1003",
        panCard: "PAN100003",
        totalBeforeTax: 3000,
        igst: 18,
        totalTaxAmount: 486,
        roundOff: 0,
        totalAfterTax: 3486,
        gstReverseCharge: "N",
        invoiceStatus: "Paid"
      },
      {
        pi: "PI10004",
        transportMode: "Air",
        invoiceDate: "2024-06-13",
        vehicleNumber: "AB12CD3458",
        reverseCharge: "Y",
        reverseCharge2: "N",
        state: "New York",
        code: "NY",
        placeOfSupply: "New York City",
        billName: "Client 4",
        billAddress: "Address 4, New York City, NY",
        billGSTIN: "GSTIN100004",
        billState: "New York",
        billCode: "NY",
        shipName: "Ship 4",
        shipAddress: "Ship Address 4, New York City, NY",
        shipGSTIN: "GSTIN200004",
        shipState: "New York",
        shipCode: "NY",
        productDescription: "Product 4",
        sacCode: "SAC104",
        amount: 4000,
        taxableValue: 3600,
        taxRate: "12%",
        taxAmount: 432,
        total: 4432,
        beneficiaryName: "Client 4",
        bankAccount: "0987654324",
        bankIFSC: "IFSC1004",
        panCard: "PAN100004",
        totalBeforeTax: 4000,
        igst: 12,
        totalTaxAmount: 432,
        roundOff: 0,
        totalAfterTax: 4432,
        gstReverseCharge: "Y",
        invoiceStatus: "Pending"
      },
      {
        pi: "PI10005",
        transportMode: "Road",
        invoiceDate: "2024-06-14",
        vehicleNumber: "XY98ZT7656",
        reverseCharge: "N",
        reverseCharge2: "N",
        state: "Illinois",
        code: "IL",
        placeOfSupply: "Chicago",
        billName: "Client 5",
        billAddress: "Address 5, Chicago, IL",
        billGSTIN: "GSTIN100005",
        billState: "Illinois",
        billCode: "IL",
        shipName: "Ship 5",
        shipAddress: "Ship Address 5, Chicago, IL",
        shipGSTIN: "GSTIN200005",
        shipState: "Illinois",
        shipCode: "IL",
        productDescription: "Product 5",
        sacCode: "SAC105",
        amount: 5000,
        taxableValue: 4500,
        taxRate: "18%",
        taxAmount: 810,
        total: 5810,
        beneficiaryName: "Client 5",
        bankAccount: "1234567895",
        bankIFSC: "IFSC1005",
        panCard: "PAN100005",
        totalBeforeTax: 5000,
        igst: 18,
        totalTaxAmount: 810,
        roundOff: 0,
        totalAfterTax: 5810,
        gstReverseCharge: "N",
        invoiceStatus: "Paid"
      },
      {
        pi: "PI10006",
        transportMode: "Air",
        invoiceDate: "2024-06-15",
        vehicleNumber: "AB12CD3459",
        reverseCharge: "N",
        reverseCharge2: "Y",
        state: "Pennsylvania",
        code: "PA",
        placeOfSupply: "Philadelphia",
        billName: "Client 6",
        billAddress: "Address 6, Philadelphia, PA",
        billGSTIN: "GSTIN100006",
        billState: "Pennsylvania",
        billCode: "PA",
        shipName: "Ship 6",
        shipAddress: "Ship Address 6, Philadelphia, PA",
        shipGSTIN: "GSTIN200006",
        shipState: "Pennsylvania",
        shipCode: "PA",
        productDescription: "Product 6",
        sacCode: "SAC106",
        amount: 6000,
        taxableValue: 5400,
        taxRate: "12%",
        taxAmount: 648,
        total: 6648,
        beneficiaryName: "Client 6",
        bankAccount: "0987654326",
        bankIFSC: "IFSC1006",
        panCard: "PAN100006",
        totalBeforeTax: 6000,
        igst: 12,
        totalTaxAmount: 648,
        roundOff: 0,
        totalAfterTax: 6648,
        gstReverseCharge: "N",
        invoiceStatus: "Pending"
      },
      {
        pi: "PI10007",
        transportMode: "Sea",
        invoiceDate: "2024-06-16",
        vehicleNumber: "SHIP002",
        reverseCharge: "Y",
        reverseCharge2: "N",
        state: "Georgia",
        code: "GA",
        placeOfSupply: "Atlanta",
        billName: "Client 7",
        billAddress: "Address 7, Atlanta, GA",
        billGSTIN: "GSTIN100007",
        billState: "Georgia",
        billCode: "GA",
        shipName: "Ship 7",
        shipAddress: "Ship Address 7, Atlanta, GA",
        shipGSTIN: "GSTIN200007",
        shipState: "Georgia",
        shipCode: "GA",
        productDescription: "Product 7",
        sacCode: "SAC107",
        amount: 7000,
        taxableValue: 6300,
        taxRate: "18%",
        taxAmount: 1134,
        total: 8134,
        beneficiaryName: "Client 7",
        bankAccount: "1234567897",
        bankIFSC: "IFSC1007",
        panCard: "PAN100007",
        totalBeforeTax: 7000,
        igst: 18,
        totalTaxAmount: 1134,
        roundOff: 0,
        totalAfterTax: 8134,
        gstReverseCharge: "Y",
        invoiceStatus: "Paid"
      },
      {
        pi: "PI10008",
        transportMode: "Road",
        invoiceDate: "2024-06-17",
        vehicleNumber: "XY98ZT7657",
        reverseCharge: "N",
        reverseCharge2: "N",
        state: "Michigan",
        code: "MI",
        placeOfSupply: "Detroit",
        billName: "Client 8",
        billAddress: "Address 8, Detroit, MI",
        billGSTIN: "GSTIN100008",
        billState: "Michigan",
        billCode: "MI",
        shipName: "Ship 8",
        shipAddress: "Ship Address 8, Detroit, MI",
        shipGSTIN: "GSTIN200008",
        shipState: "Michigan",
        shipCode: "MI",
        productDescription: "Product 8",
        sacCode: "SAC108",
        amount: 8000,
        taxableValue: 7200,
        taxRate: "12%",
        taxAmount: 864,
        total: 8864,
        beneficiaryName: "Client 8",
        bankAccount: "0987654328",
        bankIFSC: "IFSC1008",
        panCard: "PAN100008",
        totalBeforeTax: 8000,
        igst: 12,
        totalTaxAmount: 864,
        roundOff: 0,
        totalAfterTax: 8864,
        gstReverseCharge: "N",
        invoiceStatus: "Pending"
      },
      {
        pi: "PI10009",
        transportMode: "Air",
        invoiceDate: "2024-06-18",
        vehicleNumber: "AB12CD3460",
        reverseCharge: "N",
        reverseCharge2: "N",
        state: "Ohio",
        code: "OH",
        placeOfSupply: "Columbus",
        billName: "Client 9",
        billAddress: "Address 9, Columbus, OH",
        billGSTIN: "GSTIN100009",
        billState: "Ohio",
        billCode: "OH",
        shipName: "Ship 9",
        shipAddress: "Ship Address 9, Columbus, OH",
        shipGSTIN: "GSTIN200009",
        shipState: "Ohio",
        shipCode: "OH",
        productDescription: "Product 9",
        sacCode: "SAC109",
        amount: 9000,
        taxableValue: 8100,
        taxRate: "18%",
        taxAmount: 1458,
        total: 10458,
        beneficiaryName: "Client 9",
        bankAccount: "1234567899",
        bankIFSC: "IFSC1009",
        panCard: "PAN100009",
        totalBeforeTax: 9000,
        igst: 18,
        totalTaxAmount: 1458,
        roundOff: 0,
        totalAfterTax: 10458,
        gstReverseCharge: "N",
        invoiceStatus: "Paid"
      },
      {
        pi: "PI10010",
        transportMode: "Sea",
        invoiceDate: "2024-06-19",
        vehicleNumber: "SHIP003",
        reverseCharge: "Y",
        reverseCharge2: "N",
        state: "North Carolina",
        code: "NC",
        placeOfSupply: "Raleigh",
        billName: "Client 10",
        billAddress: "Address 10, Raleigh, NC",
        billGSTIN: "GSTIN100010",
        billState: "North Carolina",
        billCode: "NC",
        shipName: "Ship 10",
        shipAddress: "Ship Address 10, Raleigh, NC",
        shipGSTIN: "GSTIN200010",
        shipState: "North Carolina",
        shipCode: "NC",
        productDescription: "Product 10",
        sacCode: "SAC110",
        amount: 10000,
        taxableValue: 9000,
        taxRate: "12%",
        taxAmount: 1080,
        total: 11080,
        beneficiaryName: "Client 10",
        bankAccount: "0987654330",
        bankIFSC: "IFSC1010",
        panCard: "PAN100010",
        totalBeforeTax: 10000,
        igst: 12,
        totalTaxAmount: 1080,
        roundOff: 0,
        totalAfterTax: 11080,
        gstReverseCharge: "Y",
        invoiceStatus: "Pending"
      },
      {
        pi: "PI10011",
        transportMode: "Road",
        invoiceDate: "2024-06-20",
        vehicleNumber: "XY98ZT7658",
        reverseCharge: "N",
        reverseCharge2: "N",
        state: "Virginia",
        code: "VA",
        placeOfSupply: "Richmond",
        billName: "Client 11",
        billAddress: "Address 11, Richmond, VA",
        billGSTIN: "GSTIN100011",
        billState: "Virginia",
        billCode: "VA",
        shipName: "Ship 11",
        shipAddress: "Ship Address 11, Richmond, VA",
        shipGSTIN: "GSTIN200011",
        shipState: "Virginia",
        shipCode: "VA",
        productDescription: "Product 11",
        sacCode: "SAC111",
        amount: 11000,
        taxableValue: 9900,
        taxRate: "18%",
        taxAmount: 1782,
        total: 12782,
        beneficiaryName: "Client 11",
        bankAccount: "1234567811",
        bankIFSC: "IFSC1011",
        panCard: "PAN100011",
        totalBeforeTax: 11000,
        igst: 18,
        totalTaxAmount: 1782,
        roundOff: 0,
        totalAfterTax: 12782,
        gstReverseCharge: "N",
        invoiceStatus: "Paid"
      },
      {
        pi: "PI10012",
        transportMode: "Air",
        invoiceDate: "2024-06-21",
        vehicleNumber: "AB12CD3461",
        reverseCharge: "N",
        reverseCharge2: "Y",
        state: "Washington",
        code: "WA",
        placeOfSupply: "Seattle",
        billName: "Client 12",
        billAddress: "Address 12, Seattle, WA",
        billGSTIN: "GSTIN100012",
        billState: "Washington",
        billCode: "WA",
        shipName: "Ship 12",
        shipAddress: "Ship Address 12, Seattle, WA",
        shipGSTIN: "GSTIN200012",
        shipState: "Washington",
        shipCode: "WA",
        productDescription: "Product 12",
        sacCode: "SAC112",
        amount: 12000,
        taxableValue: 10800,
        taxRate: "12%",
        taxAmount: 1296,
        total: 13296,
        beneficiaryName: "Client 12",
        bankAccount: "0987654332",
        bankIFSC: "IFSC1012",
        panCard: "PAN100012",
        totalBeforeTax: 12000,
        igst: 12,
        totalTaxAmount: 1296,
        roundOff: 0,
        totalAfterTax: 13296,
        gstReverseCharge: "N",
        invoiceStatus: "Pending"
      },
      {
        pi: "PI10013",
        transportMode: "Sea",
        invoiceDate: "2024-06-22",
        vehicleNumber: "SHIP004",
        reverseCharge: "Y",
        reverseCharge2: "N",
        state: "Arizona",
        code: "AZ",
        placeOfSupply: "Phoenix",
        billName: "Client 13",
        billAddress: "Address 13, Phoenix, AZ",
        billGSTIN: "GSTIN100013",
        billState: "Arizona",
        billCode: "AZ",
        shipName: "Ship 13",
        shipAddress: "Ship Address 13, Phoenix, AZ",
        shipGSTIN: "GSTIN200013",
        shipState: "Arizona",
        shipCode: "AZ",
        productDescription: "Product 13",
        sacCode: "SAC113",
        amount: 13000,
        taxableValue: 11700,
        taxRate: "18%",
        taxAmount: 2106,
        total: 15106,
        beneficiaryName: "Client 13",
        bankAccount: "1234567813",
        bankIFSC: "IFSC1013",
        panCard: "PAN100013",
        totalBeforeTax: 13000,
        igst: 18,
        totalTaxAmount: 2106,
        roundOff: 0,
        totalAfterTax: 15106,
        gstReverseCharge: "Y",
        invoiceStatus: "Paid"
      },
      {
        pi: "PI10014",
        transportMode: "Road",
        invoiceDate: "2024-06-23",
        vehicleNumber: "XY98ZT7659",
        reverseCharge: "N",
        reverseCharge2: "N",
        state: "Tennessee",
        code: "TN",
        placeOfSupply: "Nashville",
        billName: "Client 14",
        billAddress: "Address 14, Nashville, TN",
        billGSTIN: "GSTIN100014",
        billState: "Tennessee",
        billCode: "TN",
        shipName: "Ship 14",
        shipAddress: "Ship Address 14, Nashville, TN",
        shipGSTIN: "GSTIN200014",
        shipState: "Tennessee",
        shipCode: "TN",
        productDescription: "Product 14",
        sacCode: "SAC114",
        amount: 14000,
        taxableValue: 12600,
        taxRate: "12%",
        taxAmount: 1512,
        total: 15512,
        beneficiaryName: "Client 14",
        bankAccount: "0987654334",
        bankIFSC: "IFSC1014",
        panCard: "PAN100014",
        totalBeforeTax: 14000,
        igst: 12,
        totalTaxAmount: 1512,
        roundOff: 0,
        totalAfterTax: 15512,
        gstReverseCharge: "N",
        invoiceStatus: "Pending"
      },
      {
        pi: "PI10015",
        transportMode: "Air",
        invoiceDate: "2024-06-24",
        vehicleNumber: "AB12CD3462",
        reverseCharge: "N",
        reverseCharge2: "N",
        state: "Indiana",
        code: "IN",
        placeOfSupply: "Indianapolis",
        billName: "Client 15",
        billAddress: "Address 15, Indianapolis, IN",
        billGSTIN: "GSTIN100015",
        billState: "Indiana",
        billCode: "IN",
        shipName: "Ship 15",
        shipAddress: "Ship Address 15, Indianapolis, IN",
        shipGSTIN: "GSTIN200015",
        shipState: "Indiana",
        shipCode: "IN",
        productDescription: "Product 15",
        sacCode: "SAC115",
        amount: 15000,
        taxableValue: 13500,
        taxRate: "18%",
        taxAmount: 2430,
        total: 17430,
        beneficiaryName: "Client 15",
        bankAccount: "1234567815",
        bankIFSC: "IFSC1015",
        panCard: "PAN100015",
        totalBeforeTax: 15000,
        igst: 18,
        totalTaxAmount: 2430,
        roundOff: 0,
        totalAfterTax: 17430,
        gstReverseCharge: "N",
        invoiceStatus: "Paid"
      },
      {
        pi: "PI10016",
        transportMode: "Sea",
        invoiceDate: "2024-06-25",
        vehicleNumber: "SHIP005",
        reverseCharge: "Y",
        reverseCharge2: "N",
        state: "Massachusetts",
        code: "MA",
        placeOfSupply: "Boston",
        billName: "Client 16",
        billAddress: "Address 16, Boston, MA",
        billGSTIN: "GSTIN100016",
        billState: "Massachusetts",
        billCode: "MA",
        shipName: "Ship 16",
        shipAddress: "Ship Address 16, Boston, MA",
        shipGSTIN: "GSTIN200016",
        shipState: "Massachusetts",
        shipCode: "MA",
        productDescription: "Product 16",
        sacCode: "SAC116",
        amount: 16000,
        taxableValue: 14400,
        taxRate: "12%",
        taxAmount: 1728,
        total: 17728,
        beneficiaryName: "Client 16",
        bankAccount: "0987654336",
        bankIFSC: "IFSC1016",
        panCard: "PAN100016",
        totalBeforeTax: 16000,
        igst: 12,
        totalTaxAmount: 1728,
        roundOff: 0,
        totalAfterTax: 17728,
        gstReverseCharge: "Y",
        invoiceStatus: "Pending"
      },
      {
        pi: "PI10017",
        transportMode: "Road",
        invoiceDate: "2024-06-26",
        vehicleNumber: "XY98ZT7660",
        reverseCharge: "N",
        reverseCharge2: "N",
        state: "Maryland",
        code: "MD",
        placeOfSupply: "Baltimore",
        billName: "Client 17",
        billAddress: "Address 17, Baltimore, MD",
        billGSTIN: "GSTIN100017",
        billState: "Maryland",
        billCode: "MD",
        shipName: "Ship 17",
        shipAddress: "Ship Address 17, Baltimore, MD",
        shipGSTIN: "GSTIN200017",
        shipState: "Maryland",
        shipCode: "MD",
        productDescription: "Product 17",
        sacCode: "SAC117",
        amount: 17000,
        taxableValue: 15300,
        taxRate: "18%",
        taxAmount: 2754,
        total: 19754,
        beneficiaryName: "Client 17",
        bankAccount: "1234567817",
        bankIFSC: "IFSC1017",
        panCard: "PAN100017",
        totalBeforeTax: 17000,
        igst: 18,
        totalTaxAmount: 2754,
        roundOff: 0,
        totalAfterTax: 19754,
        gstReverseCharge: "N",
        invoiceStatus: "Paid"
      },
      {
        pi: "PI10018",
        transportMode: "Air",
        invoiceDate: "2024-06-27",
        vehicleNumber: "AB12CD3463",
        reverseCharge: "N",
        reverseCharge2: "Y",
        state: "Wisconsin",
        code: "WI",
        placeOfSupply: "Milwaukee",
        billName: "Client 18",
        billAddress: "Address 18, Milwaukee, WI",
        billGSTIN: "GSTIN100018",
        billState: "Wisconsin",
        billCode: "WI",
        shipName: "Ship 18",
        shipAddress: "Ship Address 18, Milwaukee, WI",
        shipGSTIN: "GSTIN200018",
        shipState: "Wisconsin",
        shipCode: "WI",
        productDescription: "Product 18",
        sacCode: "SAC118",
        amount: 18000,
        taxableValue: 16200,
        taxRate: "12%",
        taxAmount: 1944,
        total: 19944,
        beneficiaryName: "Client 18",
        bankAccount: "0987654338",
        bankIFSC: "IFSC1018",
        panCard: "PAN100018",
        totalBeforeTax: 18000,
        igst: 12,
        totalTaxAmount: 1944,
        roundOff: 0,
        totalAfterTax: 19944,
        gstReverseCharge: "N",
        invoiceStatus: "Pending"
      },
      {
        pi: "PI10019",
        transportMode: "Sea",
        invoiceDate: "2024-06-28",
        vehicleNumber: "SHIP006",
        reverseCharge: "Y",
        reverseCharge2: "N",
        state: "Minnesota",
        code: "MN",
        placeOfSupply: "Minneapolis",
        billName: "Client 19",
        billAddress: "Address 19, Minneapolis, MN",
        billGSTIN: "GSTIN100019",
        billState: "Minnesota",
        billCode: "MN",
        shipName: "Ship 19",
        shipAddress: "Ship Address 19, Minneapolis, MN",
        shipGSTIN: "GSTIN200019",
        shipState: "Minnesota",
        shipCode: "MN",
        productDescription: "Product 19",
        sacCode: "SAC119",
        amount: 19000,
        taxableValue: 17100,
        taxRate: "18%",
        taxAmount: 3078,
        total: 22078,
        beneficiaryName: "Client 19",
        bankAccount: "1234567819",
        bankIFSC: "IFSC1019",
        panCard: "PAN100019",
        totalBeforeTax: 19000,
        igst: 18,
        totalTaxAmount: 3078,
        roundOff: 0,
        totalAfterTax: 22078,
        gstReverseCharge: "Y",
        invoiceStatus: "Paid"
      },
      {
        pi: "PI10020",
        transportMode: "Road",
        invoiceDate: "2024-06-29",
        vehicleNumber: "XY98ZT7661",
        reverseCharge: "N",
        reverseCharge2: "N",
        state: "Colorado",
        code: "CO",
        placeOfSupply: "Denver",
        billName: "Client 20",
        billAddress: "Address 20, Denver, CO",
        billGSTIN: "GSTIN100020",
        billState: "Colorado",
        billCode: "CO",
        shipName: "Ship 20",
        shipAddress: "Ship Address 20, Denver, CO",
        shipGSTIN: "GSTIN200020",
        shipState: "Colorado",
        shipCode: "CO",
        productDescription: "Product 20",
        sacCode: "SAC120",
        amount: 20000,
        taxableValue: 18000,
        taxRate: "12%",
        taxAmount: 2160,
        total: 22160,
        beneficiaryName: "Client 20",
        bankAccount: "0987654340",
        bankIFSC: "IFSC1020",
        panCard: "PAN100020",
        totalBeforeTax: 20000,
        igst: 12,
        totalTaxAmount: 2160,
        roundOff: 0,
        totalAfterTax: 22160,
        gstReverseCharge: "N",
        invoiceStatus: "Pending"
      },
      {
        pi: "PI10021",
        transportMode: "Air",
        invoiceDate: "2024-06-30",
        vehicleNumber: "AB12CD3464",
        reverseCharge: "N",
        reverseCharge2: "N",
        state: "Alabama",
        code: "AL",
        placeOfSupply: "Birmingham",
        billName: "Client 21",
        billAddress: "Address 21, Birmingham, AL",
        billGSTIN: "GSTIN100021",
        billState: "Alabama",
        billCode: "AL",
        shipName: "Ship 21",
        shipAddress: "Ship Address 21, Birmingham, AL",
        shipGSTIN: "GSTIN200021",
        shipState: "Alabama",
        shipCode: "AL",
        productDescription: "Product 21",
        sacCode: "SAC121",
        amount: 21000,
        taxableValue: 18900,
        taxRate: "18%",
        taxAmount: 3402,
        total: 24302,
        beneficiaryName: "Client 21",
        bankAccount: "1234567821",
        bankIFSC: "IFSC1021",
        panCard: "PAN100021",
        totalBeforeTax: 21000,
        igst: 18,
        totalTaxAmount: 3402,
        roundOff: 0,
        totalAfterTax: 24302,
        gstReverseCharge: "N",
        invoiceStatus: "Paid"
      },
      {
        pi: "PI10022",
        transportMode: "Sea",
        invoiceDate: "2024-07-01",
        vehicleNumber: "SHIP007",
        reverseCharge: "Y",
        reverseCharge2: "N",
        state: "Louisiana",
        code: "LA",
        placeOfSupply: "New Orleans",
        billName: "Client 22",
        billAddress: "Address 22, New Orleans, LA",
        billGSTIN: "GSTIN100022",
        billState: "Louisiana",
        billCode: "LA",
        shipName: "Ship 22",
        shipAddress: "Ship Address 22, New Orleans, LA",
        shipGSTIN: "GSTIN200022",
        shipState: "Louisiana",
        shipCode: "LA",
        productDescription: "Product 22",
        sacCode: "SAC122",
        amount: 22000,
        taxableValue: 19800,
        taxRate: "12%",
        taxAmount: 2376,
        total: 24376,
        beneficiaryName: "Client 22",
        bankAccount: "0987654342",
        bankIFSC: "IFSC1022",
        panCard: "PAN100022",
        totalBeforeTax: 22000,
        igst: 12,
        totalTaxAmount: 2376,
        roundOff: 0,
        totalAfterTax: 24376,
        gstReverseCharge: "Y",
        invoiceStatus: "Pending"
      } ];
    saveInvoices();
  }

  function saveInvoices() {
    localStorage.setItem('accounts_invoice_data', JSON.stringify(invoices));
  }

  function createForm() {
    formContainer.innerHTML = `
      <form id="invoice-form" class="form" style="background:#fff; padding:20px; border-radius:12px; box-shadow: var(--shadow); max-width: 900px; display: flex; flex-direction: column; gap: 16px;">
        <h3>New Invoice</h3>
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
        <label>Invoice Status:
          <textarea name="invoiceStatus" rows="2" required></textarea>
        </label>

        <div style="margin-top: 12px;">
          <button type="submit" class="btn primary">Submit</button>
          <button type="button" id="cancel-form" class="btn">Cancel</button>
        </div>
      </form>
    `;
  }

  function renderInvoice(invoice) {
    // Format date for display
    const invoiceDate = invoice.invoiceDate ? new Date(invoice.invoiceDate).toLocaleDateString('en-IN') : '';

    // Defensive checks and normalization for product data arrays
    const descriptions = Array.isArray(invoice.productDescription) ? invoice.productDescription : [invoice.productDescription || 'N/A'];
    const sacCodes = Array.isArray(invoice.sacCode) ? invoice.sacCode : [invoice.sacCode || 'N/A'];
    const amounts = Array.isArray(invoice.amount) ? invoice.amount : [invoice.amount || 'N/A'];
    const taxableValues = Array.isArray(invoice.taxableValue) ? invoice.taxableValue : [invoice.taxableValue || 'N/A'];
    const taxRates = Array.isArray(invoice.taxRate) ? invoice.taxRate : [invoice.taxRate || 'N/A'];
    const taxAmounts = Array.isArray(invoice.taxAmount) ? invoice.taxAmount : [invoice.taxAmount || 'N/A'];
    const totals = Array.isArray(invoice.total) ? invoice.total : [invoice.total || 'N/A'];

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
                Original Invoice
              </td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="border: 3px solid black; padding: 6px;">
                PI: ${invoice.pi || 'N/A'}
              </td>
              <td style="border: 3px solid black; padding: 6px;">
                Transport Mode: ${invoice.transportMode || 'N/A'}
              </td>
            </tr>
            <tr>
              <td style="border: 3px solid black; padding: 6px;">
                Invoice Date: ${invoiceDate}
              </td>
              <td style="border: 3px solid black; padding: 6px;">
                Vehicle Number: ${invoice.vehicleNumber || 'N/A'}
              </td>
            </tr>
            <tr>
              <td style="border: 3px solid black; padding: 6px;">
                Reverse Charge (Y/N): ${invoice.reverseCharge || 'N'}
              </td>
              <td style="border: 3px solid black; padding: 6px;">
                Reverse Charge (Y/N): ${invoice.reverseCharge2 || 'N'}
              </td>
            </tr>
            <tr>
              <td style="border: 3px solid black; padding: 6px;">
                State: ${invoice.state || 'N/A'}
              </td>
              <td style="border: 3px solid black; padding: 6px;">
                Code: ${invoice.code || 'N/A'}
              </td>
            </tr>
            <tr>
              <td colspan="2" style="border: 3px solid black; padding: 6px;">
                Place of Supply: ${invoice.placeOfSupply || 'N/A'}
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
                      Name: ${invoice.billName || 'N/A'}<br/>
                      Address: ${invoice.billAddress || 'N/A'}
                    </td>
                    <td style="border: 3px solid black; padding: 6px;">
                      Name: ${invoice.shipName || 'N/A'}<br/>
                      Address: ${invoice.shipAddress || 'N/A'}
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td colspan="2" style="border: 3px solid black; padding: 6px;">
                <table style="width: 100%; border-collapse: collapse; font-size: 12px;">
                  <tr>
                    <td style="border: 3px solid black; padding: 6px; width: 33%;">GSTIN: ${invoice.billGSTIN || 'N/A'}</td>
                    <td style="border: 3px solid black; padding: 6px; width: 33%;">State: ${invoice.billState || 'N/A'}</td>
                    <td style="border: 3px solid black; padding: 6px; width: 33%;">Code ${invoice.billCode || 'N/A'}</td>
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
                Total Amount before Tax ${invoice.totalBeforeTax || 'N/A'}
              </td>
            </tr>
            <tr>
              <td style="border: 3px solid black; padding: 6px;">
                Beneficiary Name:- ${invoice.beneficiaryName || 'N/A'}
              </td>
              <td style="border: 3px solid black; padding: 6px;">
                Add: IGST ${invoice.igst || 'N/A'}%
              </td>
            </tr>
            <tr>
              <td style="border: 3px solid black; padding: 6px;">
                ${invoice.bankAccount ? invoice.bankAccount.replace(/(\d{4})(\d{4})(\d{4})(\d{4})/, '$1 $2 $3 $4') : 'N/A'}
              </td>
              <td style="border: 3px solid black; padding: 6px;">
                Total Tax Amount ${invoice.totalTaxAmount || 'N/A'}
              </td>
            </tr>
            <tr>
              <td style="border: 3px solid black; padding: 6px;">
                Bank IFSC: ${invoice.bankIFSC || 'N/A'}
              </td>
              <td style="border: 3px solid black; padding: 6px;">
                Round Off ${invoice.roundOff || 'N/A'}
              </td>
            </tr>
            <tr>
              <td style="border: 3px solid black; padding: 6px;">
                PAN CARD Number: ${invoice.panCard || 'N/A'}
              </td>
              <td style="border: 3px solid black; padding: 6px;">
                Total Amount after Tax: ${invoice.totalAfterTax || 'N/A'}
              </td>
            </tr>
            <tr>
              <td colspan="2" style="border: 3px solid black; padding: 6px;">
                GST on Reverse Charge ${invoice.gstReverseCharge || 'N/A'}
              </td>
            </tr>
            <tr>
              <td colspan="2" style="border: 3px solid black; padding: 6px; font-size: 10px; text-align: center;">
                Certified that the particulars given above are true and correct
              </td>
            </tr>
            <tr>
              <td style="border: 3px solid black; padding: 6px; width: 50%; height: 100px;">
                Invoice status: ${invoice.invoiceStatus || 'N/A'}
              </td>
              <td style="border: 3px solid black; padding: 6px; width: 50%; text-align: center; height: 100px;">
                For (Web Digital Mantra IT Services Pvt Ltd)<br/><br/><br/>
                Authorized Signatory
              </td>
            </tr>
          </tbody>
        </table>
        <div style="text-align: center; margin-top: 20px;">
          <button id="print-invoice" class="btn primary" style="margin-right: 10px;">Print Invoice</button>
          <button id="back-to-table" class="btn">Back to Table</button>
        </div>
      </div>
    `;
  }

  function renderSavedInvoices() {
    if (invoices.length === 0) {
      cardsContainer.innerHTML = '<p>No saved invoices.</p>';
      return;
    }
    let html = '<table class="data-table" style="width: 120%; min-width: 1000px;">';
    html += '<thead><tr><th>PI</th><th>Invoice Date</th><th>Bill To</th><th>Actions</th></tr></thead><tbody>';
    invoices.forEach((inv, index) => {
      html += `<tr>
        <td>${inv.pi}</td>
        <td>${inv.invoiceDate}</td>
        <td>${inv.billName}</td>
        <td><button class="btn primary view-btn" data-index="${index}">View</button></td>
      </tr>`;
    });
    html += '</tbody></table>';
    cardsContainer.innerHTML = html;

    // Add event listeners for view buttons
    document.querySelectorAll('.view-btn').forEach(btn => {
      btn.addEventListener('click', e => {
        const idx = e.target.getAttribute('data-index');
        displayContainer.innerHTML = renderInvoice(invoices[idx]);
        displayContainer.style.display = 'block';
        formContainer.style.display = 'none';
        cardsContainer.style.display = 'none'; // Hide the table
        newInvoiceBtn.style.display = 'none'; // Hide the new invoice button
        backBtn.style.display = 'block'; // Show the back button

        // Add event listeners for print and back buttons
        document.getElementById('print-invoice').addEventListener('click', () => {
          window.print();
        });
        document.getElementById('back-to-table').addEventListener('click', () => {
          resetForm();
        });
      });
    });
  }

  function resetForm() {
    formContainer.innerHTML = '';
    formContainer.style.display = 'none';
    displayContainer.style.display = 'none'; // Hide the invoice display
    cardsContainer.style.display = 'block'; // Show the table
    newInvoiceBtn.style.display = 'block'; // Show the new invoice button
    backBtn.style.display = 'none'; // Hide the back button
  }

  newInvoiceBtn.addEventListener('click', () => {
    formContainer.style.display = 'block';
    displayContainer.style.display = 'none';
    cardsContainer.style.display = 'none'; // Hide the table
    newInvoiceBtn.style.display = 'none'; // Hide the new invoice button
    backBtn.style.display = 'block'; // Show the back button
    createForm();

    const invoiceForm = document.getElementById('invoice-form');
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

    invoiceForm.addEventListener('submit', e => {
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

      const formData = new FormData(invoiceForm);
      const invoiceData = {};

      // Collect form data
      formData.forEach((value, key) => {
        if (!invoiceData[key]) {
          invoiceData[key] = value;
        } else {
          // For multiple product rows, collect as array
          if (!Array.isArray(invoiceData[key])) {
            invoiceData[key] = [invoiceData[key]];
          }
          invoiceData[key].push(value);
        }
      });

      // Ensure all product arrays have consistent lengths
      const productKeys = ['productDescription', 'sacCode', 'amount', 'taxableValue', 'taxRate', 'taxAmount', 'total'];
      const maxLength = Math.max(...productKeys.map(key => Array.isArray(invoiceData[key]) ? invoiceData[key].length : 1));

      productKeys.forEach(key => {
        if (!Array.isArray(invoiceData[key])) {
          invoiceData[key] = [invoiceData[key]];
        }
        // Pad arrays to ensure consistent length
        while (invoiceData[key].length < maxLength) {
          invoiceData[key].push('');
        }
      });

      // Automatically save the invoice to the table
      invoices.push(invoiceData);
      saveInvoices();

      // Update the table immediately
      renderSavedInvoices();

      // Render invoice for preview
      displayContainer.innerHTML = renderInvoice(invoiceData);
      displayContainer.style.display = 'block';
      formContainer.style.display = 'none';

      // Print button event
      document.getElementById('print-invoice').addEventListener('click', () => {
        window.print();
      });
      // Back to Table button event
      document.getElementById('back-to-table').addEventListener('click', () => {
        resetForm();
      });
    });

  });

  // Initial render of saved invoices
  renderSavedInvoices();
});
