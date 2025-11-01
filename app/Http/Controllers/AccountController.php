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
    \Log::info('STORE method triggered');
\Log::info('Request payload:', $request->all());
    $data = $request->except('_token');

    $data['client_name'] = $request->input('client_name');
    $data['contact'] = $request->input('contact');
    $data['gmail'] = $request->input('gmail'); // use gmail from form
    //$data['gmail1'] = $request->input('gmail1');
    $data['gmail2'] = $request->input('gmail2');
    $data['category'] = $request->input('category');
    $data['renewal_amount'] = $request->input('renewal_amount');
    $data['renewal_date'] = $request->input('renewal_date');
    $data['company_id'] = $request->input('company_id');
    $data['created_by'] = $request->input('created_by') ?? auth()->id();
    $data['updated_by'] = $request->input('updated_by') ?? auth()->id();
    $data['websiteUrl'] = $request->input('websiteUrl');
    $data['appUrl'] = $request->input('appUrl');
    $data['domainname'] = $request->input('domainname');
    $data['domainBookingDate'] = $request->input('domainBookingDate');
    $data['domainPlace'] = $request->input('domainPlace');
    $data['server'] = $request->input('server');
    $data['mailId'] = $request->input('mailId');
    $data['gsuite'] = $request->has('gsuite') ? 1 : 0;
    $data['webmail'] = $request->has('webmail') ? 1 : 0;
    $data['location'] = $request->input('location');
    $data['gpage'] = $request->input('gpage');
    $data['projectCost'] = $request->input('projectCost');
    $data['finalCost'] = $request->input('finalCost');
    $data['advPayment'] = $request->input('advPayment');
    $data['advDate'] = $request->input('advDate');
    $data['pay2Date'] = $request->input('pay2Date');
    $data['txn2'] = $request->input('txn2');
    $data['txn3'] = $request->input('txn3');
    $data['extra'] = $request->input('extra');
    $data['birthday'] = $request->input('birthday');
    $data['anniversary'] = $request->input('anniversary');
$request->validate([
  'client_name' => 'required|string',
  'contact' => 'required|string',
  'gmail' => 'required|email',
  'category' => 'required|string',
  'renewal_amount' => 'required|numeric',
  'renewal_date' => 'required|date',
]);
    Account::create($data);

    return redirect()->route('accounts.index')->with('success', 'Account saved successfully.');
}


public function edit(Account $account)
{
    return view('modules.website.edit', compact('account'));
}

//public function update(Request $request, Account $account)
//{
  //  $account->update($request->all());
    //return redirect()->route('website.index');
//}

//public function destroy(Account $account)
//{
  //  $account->delete();
    //return redirect()->route('website.index');
//}

}