<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AccountController;
use App\Models\Account;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\DigitalMarketingController;
use App\Http\Controllers\HostingDetailController;


use App\Models\DigitalMarketingCampaign;

Route::get('/digital-marketing/reports', function (Request $request) {
    $type = $request->query('type');

    $campaigns = DigitalMarketingCampaign::where('category', $type)->get();

    $activeCampaigns = $campaigns->where('projectStatus', 'Active');

    $renewalsDue = $campaigns->filter(function ($c) {
        return $c->billingDate && \Carbon\Carbon::parse($c->billingDate)->diffInDays(now()) <= 60;
    });

    return view('modules.digital-marketing.reports', compact('type', 'campaigns', 'activeCampaigns', 'renewalsDue'));
});
Route::post('/accounts', function () {
    Log::info('Fallback route hit!');
    return 'OK';
});

Route::get('/debug-account-count', function () {
    return Account::count();
});


// ✅ Only one route for dashboard — loads data dynamically
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// ✅ Redirect root (/) to dashboard
Route::get('/', function () {
    return redirect('/dashboard');
});


Route::resource('accounts', AccountController::class);



// Account & Billing
Route::get('/account-billing', fn() => view('modules.account-billing.index'));
Route::get('/account-billing/index1', fn() => view('modules.account-billing.index1'));

// Digital Marketing


Route::get('/digital-marketing', [DigitalMarketingController::class, 'index'])->name('digitalmarketing.index');

Route::get('/digital-marketing/add', function () {
    return view('modules.digital-marketing.add');
});
Route::post('/digital-marketing/store', [DigitalMarketingController::class, 'store'])->name('digitalmarketing.store');
Route::get('/digital-marketing/view/{id}', [DigitalMarketingController::class, 'show']);
Route::get('/digital-marketing/edit/{id}', [DigitalMarketingController::class, 'edit']);
Route::post('/digital-marketing/update/{id}', [DigitalMarketingController::class, 'update']);
Route::get('/digital-marketing/delete/{id}', [DigitalMarketingController::class, 'destroy']);
Route::post('/digital-marketing/store', [DigitalMarketingController::class, 'store'])->name('digitalmarketing.store');



// GST
Route::get('/gst', fn() => view('modules.gst.index'));

// Hosting & Servers
Route::get('/hosting-servers', [HostingDetailController::class, 'index']);
Route::get('/hosting-servers/index1', fn() => view('modules.hosting-servers.index1'));
Route::get('/hosting-servers/details', fn() => view('modules.hosting-servers.details'));

// Income & Expense
Route::get('/income-expense', fn() => view('modules.income-expense.index'));
Route::get('/income-expense/add-income-expense', fn() => view('modules.income-expense.add-income-expense'));
Route::get('/income-expense/reports', fn() => view('modules.income-expense.reports'));

// Invoice
Route::get('/invoice', fn() => view('modules.invoice.index'));
Route::get('/invoice/proforma', fn() => view('modules.invoice.proforma'));





// Website
Route::get('/website', [WebsiteController::class, 'index']);

Route::get('/website/add', fn() => view('modules.website.add'));
Route::get('/website/reports', fn() => view('modules.website.reports'));
Route::get('/website/wa-details', fn() => view('modules.website.wa-detail'));
Route::get('/reports', function () {
    return view('modules.website.reports');
});
Route::get('/website/add', function () {
    return view('modules.website.add');
});
Route::get('/reports', function (Request $request) {
    $type = $request->query('type');

    $accounts = $type === 'total'
        ? Account::all()
        : Account::where('category', $type)->get();

    $renewalsDue = Account::whereBetween('renewal_date', [now(), now()->addDays(60)])->get();

    return view('modules.website.reports', compact('type', 'accounts', 'renewalsDue'));
});


Route::get('/wa-detail', function (Request $request) {
    $slno = $request->query('slno');
    $type = $request->query('type');
    return view('modules.website.wa-detail', compact('slno', 'type'));
});
Route::get('/hosting-servers/details', [HostingDetailController::class, 'index']);
Route::get('/hosting-servers/add', [HostingDetailController::class, 'create']);
Route::post('/hosting-servers/store', [HostingDetailController::class, 'store']);