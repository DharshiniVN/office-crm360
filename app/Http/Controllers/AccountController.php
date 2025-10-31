<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class AccountController extends Controller
{

public function index()
{
    $accounts = Account::all();

    $renewalsDue = Account::whereBetween('renewal_date', [
        now(),
        now()->addDays(60)
    ])->get();

    return view('modules.website.reports', compact('accounts', 'renewalsDue'));
}
public function create()
{
    return view('modules.website.create');
}

public function store(Request $request)
{
    $data = $request->except('_token');

    // Manual mappings for DB-required fields
    $data['client_name'] = $request->input('clientName');
    $data['gmail'] = $request->input('gmail1');
    $data['renewal_amount'] = $request->input('renewalAmount');
    $data['renewal_date'] = $request->input('renewalDate');
    $data['gsuite'] = $request->input('gsuite') === 'true' ? 1 : 0;
    $data['webmail'] = $request->input('webmail') === 'true' ? 1 : 0;

    Account::create($data);

    return redirect()->route('dashboard')->with('success', 'Account saved successfully.');
}


public function edit(Account $account)
{
    return view('modules.website.edit', compact('account'));
}

public function update(Request $request, Account $account)
{
    $account->update($request->all());
    return redirect()->route('accounts.index');
}

public function destroy(Account $account)
{
    $account->delete();
    return redirect()->route('accounts.index');
}
}