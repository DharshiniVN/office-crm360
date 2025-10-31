<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProformaInvoice;

class ProformaInvoiceController extends Controller
{
    /**
     * Display list of proforma invoices.
     */
    public function index()
    {
        $proformas = ProformaInvoice::latest()->get();
        return view('account-billing.proforma.index', compact('proformas'));
    }

    /**
     * Show create form.
     */
    public function create()
    {
        return view('account-billing.proforma.create');
    }

    /**
     * Store new proforma invoice.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'pi_number' => 'required|string|max:50',
            'transport_mode' => 'nullable|string|max:100',
            'invoice_date' => 'required|date',
            'vehicle_number' => 'nullable|string|max:50',
            'reverse_charge' => 'nullable|string|max:5',
            'state' => 'nullable|string|max:100',
            'code' => 'nullable|string|max:10',
            'place_of_supply' => 'nullable|string|max:150',

            'bill_name' => 'nullable|string|max:150',
            'bill_address' => 'nullable|string|max:255',
            'bill_gstin' => 'nullable|string|max:20',
            'bill_state' => 'nullable|string|max:100',
            'bill_code' => 'nullable|string|max:10',

            'ship_name' => 'nullable|string|max:150',
            'ship_address' => 'nullable|string|max:255',
            'ship_gstin' => 'nullable|string|max:20',
            'ship_state' => 'nullable|string|max:100',
            'ship_code' => 'nullable|string|max:10',

            'beneficiary_name' => 'nullable|string|max:150',
            'bank_account' => 'nullable|string|max:50',
            'ifsc' => 'nullable|string|max:20',
            'pan' => 'nullable|string|max:20',

            'total_before_tax' => 'nullable|numeric',
            'igst_percent' => 'nullable|numeric',
            'total_tax' => 'nullable|numeric',
            'round_off' => 'nullable|numeric',
            'total_after_tax' => 'nullable|numeric',
            'gst_reverse_charge' => 'nullable|numeric',
            'status' => 'nullable|string|max:50',
        ]);

        ProformaInvoice::create($data);
        return redirect()->route('proforma.index')->with('success', 'Proforma Invoice created successfully!');
    }

    /**
     * Edit form.
     */
    public function edit($id)
    {
        $proforma = ProformaInvoice::findOrFail($id);
        return view('account-billing.proforma.edit', compact('proforma'));
    }

    /**
     * Update invoice.
     */
    public function update(Request $request, $id)
    {
        $proforma = ProformaInvoice::findOrFail($id);

        $data = $request->validate([
            'pi_number' => 'required|string|max:50',
            'transport_mode' => 'nullable|string|max:100',
            'invoice_date' => 'required|date',
            'vehicle_number' => 'nullable|string|max:50',
            'reverse_charge' => 'nullable|string|max:5',
            'state' => 'nullable|string|max:100',
            'code' => 'nullable|string|max:10',
            'place_of_supply' => 'nullable|string|max:150',

            'bill_name' => 'nullable|string|max:150',
            'bill_address' => 'nullable|string|max:255',
            'bill_gstin' => 'nullable|string|max:20',
            'bill_state' => 'nullable|string|max:100',
            'bill_code' => 'nullable|string|max:10',

            'ship_name' => 'nullable|string|max:150',
            'ship_address' => 'nullable|string|max:255',
            'ship_gstin' => 'nullable|string|max:20',
            'ship_state' => 'nullable|string|max:100',
            'ship_code' => 'nullable|string|max:10',

            'beneficiary_name' => 'nullable|string|max:150',
            'bank_account' => 'nullable|string|max:50',
            'ifsc' => 'nullable|string|max:20',
            'pan' => 'nullable|string|max:20',

            'total_before_tax' => 'nullable|numeric',
            'igst_percent' => 'nullable|numeric',
            'total_tax' => 'nullable|numeric',
            'round_off' => 'nullable|numeric',
            'total_after_tax' => 'nullable|numeric',
            'gst_reverse_charge' => 'nullable|numeric',
            'status' => 'nullable|string|max:50',
        ]);

        $proforma->update($data);
        return redirect()->route('proforma.index')->with('success', 'Proforma Invoice updated successfully!');
    }

    /**
     * Delete invoice.
     */
    public function destroy($id)
    {
        $proforma = ProformaInvoice::findOrFail($id);
        $proforma->delete();
        return redirect()->route('proforma.index')->with('success', 'Proforma Invoice deleted!');
    }
}
