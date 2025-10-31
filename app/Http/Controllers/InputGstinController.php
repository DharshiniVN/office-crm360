<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InputGstin;

class InputGstinController extends Controller
{
    public function index()
    {
        $inputGstins = InputGstin::all();
        return view('account-billing.input-gstin.index', compact('inputGstins'));
    }

    public function create()
    {
        return view('account-billing.input-gstin.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'invoice_no' => 'required|string|max:255',
            'invoice_date' => 'required|date',
            'invoice_month' => 'required|string|max:50',
            'company' => 'required|string|max:255',
            'gst_no' => 'required|string|max:255',
        ]);

        InputGstin::create($request->all());

        return redirect()->route('input-gstin.index')->with('success', 'Input GSTIN entry added successfully.');
    }
}
