@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #f3f4f6;
        font-family: 'Arial', sans-serif;
    }
    .invoice-container {
        background-color: white;
        width: 80%;
        margin: 40px auto;
        border: 3px solid #000;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 8px;
    }
    td, th {
        border: 2px solid #000;
        padding: 5px 8px;
        font-size: 14px;
        vertical-align: top;
    }
    th {
        background-color: #f8f9fa;
        font-weight: bold;
        text-align: left;
    }
    .center {
        text-align: center;
    }
    .bold {
        font-weight: bold;
    }
    .no-border {
        border: none !important;
    }
    .print-btns {
        text-align: center;
        margin-top: 20px;
    }
    .print-btns button {
        padding: 8px 20px;
        border-radius: 6px;
        border: none;
        font-weight: bold;
        cursor: pointer;
    }
    .btn-print {
        background-color: #007bff;
        color: white;
        margin-right: 10px;
    }
    .btn-back {
        background-color: #f1f1f1;
        border: 1px solid #ccc;
    }
    @media print {
        .print-btns {
            display: none;
        }
        body {
            background: white;
        }
        .invoice-container {
            box-shadow: none;
            border: 2px solid #000;
        }
    }
</style>

<div class="invoice-container">
    <table>
        <tr>
            <td style="width:30%; text-align:center;">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" width="120">
            </td>
            <td>
                <b>Name:</b> WFB DIGITAL MANTRA IT SERVICES PRIVATE LIMITED<br>
                <b>Address:</b> 23, 3rd Floor, Nandita Manison, 1st Cross, 1st Stage,<br>
                Kumaraswamy Layout, Bengaluru, Karnataka, 560078<br>
                <b>GSTIN:</b> 29AACCW6067A1ZB<br>
                <b>PAN:</b> AACCW6067A
            </td>
        </tr>
    </table>

    <h3 class="center">Original Invoice</h3>

    <table>
        <tr>
            <td><b>PI:</b> PI12345</td>
            <td><b>Transport Mode:</b> N/A</td>
        </tr>
        <tr>
            <td><b>Invoice Date:</b> 1/6/2024</td>
            <td><b>Vehicle Number:</b> N/A</td>
        </tr>
        <tr>
            <td><b>Reverse Charge (Y/N):</b> N</td>
            <td><b>Code:</b> N/A</td>
        </tr>
        <tr>
            <td><b>State:</b> N/A</td>
            <td><b>Place of Supply:</b> N/A</td>
        </tr>
    </table>

    <table>
        <tr>
            <th>Bill to Party</th>
            <th>Ship to Party</th>
        </tr>
        <tr>
            <td>
                <b>Name:</b> John Doe<br>
                <b>Address:</b> N/A
            </td>
            <td>
                <b>Name:</b> N/A<br>
                <b>Address:</b> N/A
            </td>
        </tr>
        <tr>
            <td><b>GSTIN:</b> N/A</td>
            <td><b>State:</b> N/A | <b>Code:</b> N/A</td>
        </tr>
    </table>

    <table>
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
        <tr>
            <td>1.</td>
            <td>Product A</td>
            <td>N/A</td>
            <td>N/A</td>
            <td>N/A</td>
            <td>N/A</td>
            <td>N/A</td>
            <td>N/A</td>
        </tr>
    </table>

    <table>
        <tr>
            <td><b>Bank Details</b></td>
            <td><b>Total Amount before Tax:</b> N/A</td>
        </tr>
        <tr>
            <td><b>Beneficiary Name:</b> N/A</td>
            <td><b>Add: IGST:</b> N/A%</td>
        </tr>
        <tr>
            <td><b>Bank Name:</b> N/A</td>
            <td><b>Total Tax Amount:</b> N/A</td>
        </tr>
        <tr>
            <td><b>Bank IFSC:</b> N/A</td>
            <td><b>Round Off:</b> N/A</td>
        </tr>
        <tr>
            <td><b>PAN CARD Number:</b> N/A</td>
            <td><b>Total Amount after Tax:</b> 1162</td>
        </tr>
    </table>

    <p class="center"><i>Certified that the particulars given above are true and correct</i></p>

    <table>
        <tr>
            <td style="height:70px;">Invoice Status: Paid</td>
            <td class="center">
                For (Web Digital Mantra IT Services Pvt Ltd)<br><br>
                Authorized Signatory
            </td>
        </tr>
    </table>

    <div class="print-btns">
        <button class="btn-print" onclick="window.print()">Print Invoice</button>
        <a href="{{ route('proforma.index') }}"><button class="btn-back">Back to Table</button></a>
    </div>
</div>
@endsection
