<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Account;

class WebsiteController extends Controller
{
    public function index()
    {
        $accounts = Account::all();
        return view('modules.website.index', compact('accounts'));
    }
}