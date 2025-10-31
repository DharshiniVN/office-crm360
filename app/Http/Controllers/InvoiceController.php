<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::latest()->get();
        return view('account-billing.invoice.index', compact('invoices'));
    }

    public function create()
    {
        return view('account-billing.invoice.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'pi' => 'nullable|string',
            'transport_mode' => 'nullable|string',
            'invoice_date' => 'nullable|date',
            'vehicle_number' => 'nullable|string',
            'reverse_charge' => 'nullable|string',
            'state' => 'nullable|string',
            'state_code' => 'nullable|string',
            'place_of_supply' => 'nullable|string',
            'bill_to_name' => 'nullable|string',
            'bill_to_address' => 'nullable|string',
            'bill_to_gstin' => 'nullable|string',
            'bill_to_state' => 'nullable|string',
            'bill_to_code' => 'nullable|string',
            'ship_to_name' => 'nullable|string',
            'ship_to_address' => 'nullable|string',
            'ship_to_gstin' => 'nullable|string',
            'ship_to_state' => 'nullable|string',
            'ship_to_code' => 'nullable|string',
            'beneficiary_name' => 'nullable|string',
            'bank_account' => 'nullable|string',
            'bank_ifsc' => 'nullable|string',
            'pan_number' => 'nullable|string',
            'total_before_tax' => 'nullable|numeric',
            'igst_percent' => 'nullable|numeric',
            'total_tax_amount' => 'nullable|numeric',
            'round_off' => 'nullable|numeric',
            'total_after_tax' => 'nullable|numeric',
            'gst_reverse_charge' => 'nullable|string',
            'invoice_status' => 'nullable|string',
        ]);

        Invoice::create($data);

        return redirect()->route('invoice.index')->with('success', 'Invoice created successfully.');
    }

    public function edit($id)
    {
        $invoice = Invoice::findOrFail($id);
        return view('account-billing.invoice.edit', compact('invoice'));
    }

    public function update(Request $request, $id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->update($request->all());

        return redirect()->route('invoice.index')->with('success', 'Invoice updated successfully.');
    }

    public function destroy($id)
    {
        Invoice::findOrFail($id)->delete();
        return redirect()->route('invoice.index')->with('success', 'Invoice deleted successfully.');
    }
}
