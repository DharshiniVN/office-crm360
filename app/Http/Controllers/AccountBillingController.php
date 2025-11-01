<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\IncomeExpense;
use Illuminate\Http\Request;

class AccountBillingController extends Controller
{
    /**
     * Dashboard Overview (Revenue, Pending, etc.)
     */
    public function index()
    {
        $totalRevenue = Billing::where('payment_status', 'completed')->sum('total_amount');
        $pendingPayments = Billing::where('payment_status', 'pending')->count();
        $advancePayments = Billing::where('payment_status', 'advance')->sum('total_amount');

        $invoices = Billing::orderBy('id', 'DESC')->take(10)->get();
        $payments = Billing::orderBy('id', 'DESC')->take(10)->get();

        return view('account-billing.index', compact(
            'totalRevenue',
            'pendingPayments',
            'advancePayments',
            'invoices',
            'payments'
        ));
    }

    /**
     * Finance Page (Income vs Expense summary)
     */
    public function financePage()
    {
        $totalIncome = IncomeExpense::where('type', 'income')->sum('price');
        $totalExpense = IncomeExpense::where('type', 'expense')->sum('price');

        return view('account-billing.finance', compact('totalIncome', 'totalExpense'));
    }

    /**
     * Add Income/Expense Form Page
     */
    public function addIncomeExpensePage()
    {
        return view('account-billing.add-income-expense');
    }

    /**
     * Store Income/Expense entry
     */
    public function storeIncomeExpense(Request $request)
    {
        $data = $request->validate([
            'type' => 'required',
            'price' => 'required|numeric',
            'date' => 'required|date',
            'project_name' => 'nullable|string',
            'expense_for' => 'nullable|string',
            'description' => 'nullable|string',
            'bill' => 'nullable|file|mimes:jpg,png,pdf|max:2048'
        ]);

        if ($request->hasFile('bill')) {
            $data['bill'] = $request->file('bill')->store('bills', 'public');
        }

        IncomeExpense::create($data);

        return redirect()->route('account-billing.finance')
            ->with('success', 'Entry added successfully!');
    }

    /**
     * GST Report Page (No DB, just open Blade)
     */
    public function gstReport()
    {
        // Simply load the GST Report page — no models, no database
        $inputCount = \App\Models\InputGst::count();
    $outputCount = \App\Models\OutputGst::count();

    $totalInputGst = \App\Models\InputGst::sum('gst_amount');
    $totalOutputGst = \App\Models\OutputGst::sum('gst_amount');

    return view('account-billing.gst-report', compact(
        'inputCount',
        'outputCount',
        'totalInputGst',
        'totalOutputGst'
    ));
    }
    

}
