@extends('layouts.app')

@section('title', 'Proforma Invoice')

@section('content')
<div style="max-width:1000px;margin:30px auto;background:#fff;border:2px solid #000;padding:20px;">

    <!-- Header Section -->
    <table width="100%" border="1" cellspacing="0" cellpadding="8" style="border-collapse:collapse;">
        <tr>
            <td width="30%" style="text-align:center;">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Company Logo" style="width:120px;height:120px;object-fit:contain;">
            </td>
            <td>
                <strong>Name:</strong> WFB DIGITAL MANTRA IT SERVICES PRIVATE LIMITED<br>
                <strong>Address:</strong> 23, 3rd Floor, Nandita Manison, 1st Cross, 1st Stage,<br>
                Kumaraswamy Layout, Bengaluru, Karnataka, 560078<br>
                <strong>GSTIN:</strong> 29AACCW6067A1ZB<br>
                <strong>Pan number:</strong> AACCW6067A
            </td>
        </tr>
    </table>

    <h3 style="text-align:center;margin:15px 0;">Proforma Invoice</h3>

    <!-- Invoice Basic Info -->
    <table width="100%" border="1" cellspacing="0" cellpadding="6" style="border-collapse:collapse;">
        <tr>
            <td><strong>PI:</strong> {{ $proforma->pi_number ?? 'PF12345' }}</td>
            <td><strong>Transport Mode:</strong> {{ $proforma->transport_mode ?? 'Air' }}</td>
        </tr>
        <tr>
            <td><strong>Invoice Date:</strong> {{ $proforma->invoice_date ?? '1/6/2024' }}</td>
            <td><strong>Vehicle Number:</strong> {{ $proforma->vehicle_number ?? 'AB12CD3456' }}</td>
        </tr>
        <tr>
            <td><strong>Reverse Charge (Y/N):</strong> {{ $proforma->reverse_charge ?? 'N' }}</td>
            <td><strong>Code:</strong> {{ $proforma->state_code ?? 'CA' }}</td>
        </tr>
        <tr>
            <td><strong>State:</strong> {{ $proforma->state ?? 'California' }}</td>
            <td><strong>Place of Supply:</strong> {{ $proforma->place_of_supply ?? 'Los Angeles' }}</td>
        </tr>
    </table>

    <!-- Bill To / Ship To -->
    <table width="100%" border="1" cellspacing="0" cellpadding="8" style="border-collapse:collapse;margin-top:10px;">
        <tr>
            <th width="50%">Bill to Party</th>
            <th width="50%">Ship to Party</th>
        </tr>
        <tr>
            <td>
                <strong>Name:</strong> {{ $proforma->bill_to_name ?? 'John Doe' }}<br>
                <strong>Address:</strong> {{ $proforma->bill_to_address ?? '123 Main St, Los Angeles, CA' }}<br>
                <strong>GSTIN:</strong> {{ $proforma->bill_to_gstin ?? 'GSTIN123456' }}<br>
                <strong>State:</strong> {{ $proforma->bill_to_state ?? 'California' }}<br>
                <strong>Code:</strong> {{ $proforma->bill_to_code ?? 'CA' }}
            </td>
            <td>
                <strong>Name:</strong> {{ $proforma->ship_to_name ?? 'Jane Smith' }}<br>
                <strong>Address:</strong> {{ $proforma->ship_to_address ?? '456 Elm St, San Francisco, CA' }}<br>
                <strong>GSTIN:</strong> {{ $proforma->ship_to_gstin ?? 'GSTIN654321' }}<br>
                <strong>State:</strong> {{ $proforma->ship_to_state ?? 'California' }}<br>
                <strong>Code:</strong> {{ $proforma->ship_to_code ?? 'CA' }}
            </td>
        </tr>
    </table>

    <!-- Product Table -->
    <table width="100%" border="1" cellspacing="0" cellpadding="6" style="border-collapse:collapse;margin-top:10px;">
        <thead style="background:#f8f8f8;">
            <tr>
                <th>Sr. No.</th>
                <th>Product Description</th>
                <th>SAC Code</th>
                <th>Amount</th>
                <th>Taxable Value</th>
                <th>IGST / CGST+SGST Rate</th>
                <th>IGST / CGST+SGST Amount</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proforma->products ?? [['description'=>'Product A','sac'=>'SAC001','amount'=>1000,'taxable'=>900,'rate'=>'18%','tax'=>162,'total'=>1162]] as $index => $p)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $p['description'] }}</td>
                <td>{{ $p['sac'] }}</td>
                <td>{{ $p['amount'] }}</td>
                <td>{{ $p['taxable'] }}</td>
                <td>{{ $p['rate'] }}</td>
                <td>{{ $p['tax'] }}</td>
                <td>{{ $p['total'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Bank and Tax Details -->
    <table width="100%" border="1" cellspacing="0" cellpadding="6" style="border-collapse:collapse;margin-top:10px;">
        <tr>
            <td>
                <strong>Bank Details</strong><br>
                Beneficiary Name: {{ $proforma->beneficiary_name ?? 'John Doe' }}<br>
                Bank A/C: {{ $proforma->bank_account ?? '1234567890' }}<br>
                IFSC: {{ $proforma->bank_ifsc ?? 'IFSC0001' }}<br>
                PAN: {{ $proforma->pan_number ?? 'PAN123456' }}<br>
                GST on Reverse Charge: {{ $proforma->gst_reverse_charge ?? 'N' }}
            </td>
            <td>
                <strong>Tax Details</strong><br>
                Total Before Tax: {{ $proforma->total_before_tax ?? 1000 }}<br>
                Add IGST: {{ $proforma->igst_rate ?? '18%' }}<br>
                Total Tax Amount: {{ $proforma->total_tax ?? 162 }}<br>
                Round Off: {{ $proforma->round_off ?? 'N/A' }}<br>
                Total After Tax: {{ $proforma->total_after_tax ?? 1162 }}
            </td>
        </tr>
    </table>

    <div style="margin-top:10px;text-align:center;">
        Certified that the particulars given above are true and correct.
    </div>

    <table width="100%" border="1" cellspacing="0" cellpadding="6" style="border-collapse:collapse;margin-top:10px;">
        <tr>
            <td>
                <strong>Proforma Status:</strong> {{ ucfirst($proforma->status ?? 'Pending') }}
            </td>
            <td style="text-align:right;">
                For (WFB Digital Mantra IT Services Pvt Ltd)<br><br><br>
                Authorized Signatory
            </td>
        </tr>
    </table>

    <div style="text-align:center;margin-top:20px;">
        <button onclick="window.print()" 
                style="background:#007bff;color:#fff;padding:10px 20px;border:none;border-radius:5px;cursor:pointer;">
            Print Proforma
        </button>
        <a href="{{ route('proforma.index') }}" 
           style="background:#e0e0e0;color:#000;padding:10px 20px;border-radius:5px;text-decoration:none;">
            Back to Table
        </a>
    </div>

</div>
@endsection
