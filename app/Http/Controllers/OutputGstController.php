<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OutputGst;

class OutputGstController extends Controller
{
    // show all GST records
    public function index()
    {
        $records = OutputGst::all();
        return view('account-billing.output-gst.index', compact('records'));
    }

    // show form to add new
    public function create()
    {
        return view('account-billing.output-gst.create');
    }

    // store form data
    public function store(Request $request)
    {
        $validated = $request->validate([
            'sl_no'           => 'nullable|numeric',
            'invoice_no'      => 'required|string|max:255',
            'invoice_date'    => 'required|date',
            'invoice_month'   => 'nullable|string|max:50',
            'cust_name'       => 'nullable|string|max:255',
            'company'         => 'nullable|string|max:255',
            'comp'            => 'nullable|string|max:255',
            'invoice_amount'  => 'required|numeric|min:0',
            'gst_amount'      => 'required|numeric|min:0',
            'tds_deduction'   => 'nullable|in:yes,no',
            'payment_status'  => 'nullable|in:yes,no',
            'gst_no'          => 'nullable|string|max:50',
        ]);

        OutputGst::create([
            'sl_no' => $request->sl_no,
            'invoice_no' => $request->invoice_no,
            'invoice_date' => $request->invoice_date,
            'invoice_month' => $request->invoice_month,
            'cust_name' => $request->cust_name,
            'company' => $request->company,
            'comp' => $request->comp,
            'invoice_amount' => $request->invoice_amount,
            'gst_amount' => $request->gst_amount,
            'tds_deduction' => $request->tds_deduction == 'yes',
            'payment_status' => $request->payment_status == 'yes',
            'gst_no' => $request->gst_no,
        ]);

        return redirect()->route('output-gst.index')->with('success', 'Output GST record added successfully.');
    }
}
