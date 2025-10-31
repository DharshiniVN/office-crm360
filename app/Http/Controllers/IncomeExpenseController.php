<?php
namespace App\Http\Controllers;

use App\Models\IncomeExpense;
use Illuminate\Http\Request;

class IncomeExpenseController extends Controller
{
    public function index()
    {
        $totalIncome = IncomeExpense::where('type', 'income')->sum('price');
        $totalExpense = IncomeExpense::where('type', 'expense')->sum('price');

        return view('account-billing.income-expense', compact('totalIncome', 'totalExpense'));
    }

    public function incomeReport()
    {
        $entries = IncomeExpense::where('type', 'income')->get();
        return view('account-billing.income-report', compact('entries'));
    }

    public function expenseReport()
    {
        $entries = IncomeExpense::where('type', 'expense')->get();
        return view('account-billing.expense-report', compact('entries'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:income,expense',
            'price' => 'required|numeric',
            'date' => 'required|date',
            'project_name' => 'nullable|string',
            'expense_for' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        IncomeExpense::create($validated);

        return redirect()->route('account-billing.income-expense')->with('success', 'Entry added successfully.');
    }
}
