<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

// Controllers
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AccountBillingController;
use App\Http\Controllers\DigitalMarketingController;
use App\Http\Controllers\HostingDetailController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\GraphicsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RenewalsController;
use App\Http\Controllers\OutputGstController;
use App\Http\Controllers\InputGstinController;
use App\Http\Controllers\ProformaInvoiceController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\SpecialFeatureController;
use App\Http\Controllers\IncomeExpenseController;

// Models
use App\Models\Account;
use App\Models\DigitalMarketingCampaign;

/*
|--------------------------------------------------------------------------
| AUTHENTICATION ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    if (!session('logged_in')) {
        return redirect('/login');
    }
    return view('layouts.home');
});

/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| ACCOUNT & BILLING
|--------------------------------------------------------------------------
*/

Route::prefix('account-billing')->group(function () {
    Route::get('/', [AccountBillingController::class, 'index'])->name('account-billing.index');
    Route::get('/finance', [AccountBillingController::class, 'financePage'])->name('account-billing.finance');
    Route::get('/gst-report', [AccountBillingController::class, 'gstReport'])->name('account-billing.gst-report');
    Route::get('/proforma', [AccountBillingController::class, 'proformaInvoice'])->name('account-billing.proforma');
    Route::get('/invoice', [AccountBillingController::class, 'invoice'])->name('account-billing.invoice');
    Route::get('/payment-link', [AccountBillingController::class, 'sendPaymentLink'])->name('account-billing.payment-link');
    Route::get('/add-income-expense', [AccountBillingController::class, 'addIncomeExpensePage'])->name('account-billing.add-income-expense');
    Route::post('/store-income-expense', [AccountBillingController::class, 'storeIncomeExpense'])->name('account-billing.store-income-expense');
});

/*
|--------------------------------------------------------------------------
| OUTPUT GST
|--------------------------------------------------------------------------
*/

Route::prefix('account-billing/output-gst')->group(function () {
    Route::get('/', [OutputGstController::class, 'index'])->name('output-gst.index');
    Route::get('/create', [OutputGstController::class, 'create'])->name('output-gst.create');
    Route::post('/store', [OutputGstController::class, 'store'])->name('output-gst.store');
});

/*
|--------------------------------------------------------------------------
| INPUT GST
|--------------------------------------------------------------------------
*/

Route::prefix('account-billing/input-gst')->group(function () {
    Route::get('/', [InputGstinController::class, 'index'])->name('input-gst.index');
    Route::get('/create', [InputGstinController::class, 'create'])->name('input-gst.create');
    Route::post('/store', [InputGstinController::class, 'store'])->name('input-gst.store');
});

/*
|--------------------------------------------------------------------------
| PROFORMA & INVOICE
|--------------------------------------------------------------------------
*/

Route::prefix('account-billing')->group(function () {
    Route::resource('proforma', ProformaInvoiceController::class);
    Route::resource('invoice', InvoiceController::class);
});

/*
|--------------------------------------------------------------------------
| INCOME & EXPENSE
|--------------------------------------------------------------------------
*/

Route::prefix('account-billing')->group(function () {
    Route::get('/income-expense', [IncomeExpenseController::class, 'index'])->name('account-billing.income-expense');
    Route::get('/income-report', [IncomeExpenseController::class, 'incomeReport'])->name('account-billing.income-report');
    Route::get('/expense-report', [IncomeExpenseController::class, 'expenseReport'])->name('account-billing.expense-report');
    Route::post('/store', [IncomeExpenseController::class, 'store'])->name('account-billing.store');
});
Route::get('/account-billing/proforma', [AccountBillingController::class, 'proforma'])->name('account-billing.proforma');
Route::get('/account-billing/invoice', [AccountBillingController::class, 'invoice'])->name('account-billing.invoice');

/*
|--------------------------------------------------------------------------
| RENEWALS
|--------------------------------------------------------------------------
*/

Route::get('/renewals', [RenewalsController::class, 'index'])->name('renewals.index');
Route::get('/renewals/fetch/{type}', [RenewalsController::class, 'fetchRenewals'])->name('renewals.fetch');
Route::post('/renewals/request-payment/{id}', [RenewalsController::class, 'requestPayment'])->name('renewals.requestPayment');

/*
|--------------------------------------------------------------------------
| GRAPHICS & PRODUCTS
|--------------------------------------------------------------------------
*/

Route::prefix('graphics')->group(function () {
    Route::get('/', [GraphicsController::class, 'index'])->name('graphics.index');
    Route::get('/add', [GraphicsController::class, 'create'])->name('graphics.add');
    Route::post('/store', [GraphicsController::class, 'store'])->name('graphics.store');
    Route::get('/{id}', [GraphicsController::class, 'show'])->name('graphics.detail');
    Route::get('/{id}/edit', [GraphicsController::class, 'edit'])->name('graphics.edit');
    Route::put('/{id}', [GraphicsController::class, 'update'])->name('graphics.update');
    Route::delete('/{id}', [GraphicsController::class, 'destroy'])->name('graphics.destroy');
    Route::get('/reports', [GraphicsController::class, 'reports'])->name('graphics.reports');
});
// Route to show the form to create a new graphics project
Route::get('/graphics/create', [GraphicsController::class, 'create'])->name('graphics.create');

// Route to show graphics projects by category
Route::get('/graphics/category/{category}', [GraphicsController::class, 'category'])->name('graphics.category');


Route::prefix('products')->group(function () {
    Route::get('/', [ProductsController::class, 'index'])->name('products.index');
    Route::get('/create', [ProductsController::class, 'create'])->name('products.add');
    Route::post('/store', [ProductsController::class, 'store'])->name('products.store');
    Route::get('/view/{id}', [ProductsController::class, 'show'])->name('products.view');
    Route::get('/edit/{id}', [ProductsController::class, 'edit'])->name('products.edit');
    Route::put('/{id}', [ProductsController::class, 'update'])->name('products.update');
    Route::delete('/{id}', [ProductsController::class, 'destroy'])->name('products.destroy');
});
Route::get('/products/category/{category}', [ProductsController::class, 'category'])->name('products.category');
Route::get('/products/all', [ProductsController::class, 'all'])->name('products.all');
Route::put('/products/add', [ProductsController::class, 'add']);
Route::get('/products/add', [ProductsController::class, 'create'])->name('products.add');
/*
|--------------------------------------------------------------------------
| DIGITAL MARKETING
|--------------------------------------------------------------------------
*/

Route::prefix('digital-marketing')->group(function () {
    Route::get('/', [DigitalMarketingController::class, 'index'])->name('digitalmarketing.index');
    Route::get('/add', [DigitalMarketingController::class, 'create'])->name('digitalmarketing.add');
    Route::post('/store', [DigitalMarketingController::class, 'store'])->name('digitalmarketing.store');
    Route::get('/view/{id}', [DigitalMarketingController::class, 'show'])->name('digitalmarketing.view');
    Route::get('/edit/{id}', [DigitalMarketingController::class, 'edit'])->name('digitalmarketing.edit');
    Route::post('/update/{id}', [DigitalMarketingController::class, 'update'])->name('digitalmarketing.update');
    Route::get('/delete/{id}', [DigitalMarketingController::class, 'destroy'])->name('digitalmarketing.delete');
    Route::get('/reports', function (Request $request) {
        $type = $request->query('type');
        $campaigns = DigitalMarketingCampaign::where('category', $type)->get();
        $activeCampaigns = $campaigns->where('projectStatus', 'Active');
        $renewalsDue = $campaigns->filter(fn($c) => $c->billingDate && Carbon::parse($c->billingDate)->diffInDays(now()) <= 60);
        return view('modules.digital-marketing.reports', compact('type', 'campaigns', 'activeCampaigns', 'renewalsDue'));
    });
});

/*
|--------------------------------------------------------------------------
| WEBSITE
|--------------------------------------------------------------------------
*/
Route::resource('website', AccountController::class)->names('accounts')->except(['show']);
Route::get('/website', [WebsiteController::class, 'index'])->name('accounts.index');
//Route::get('/website', [WebsiteController::class, 'index']);
Route::post('/website', [AccountController::class, 'store'])->name('accounts.store');
Route::get('/website/add', fn() => view('modules.website.add'));
Route::get('/website/reports', fn() => view('modules.website.reports'));
Route::get('/website/wa-details', fn() => view('modules.website.wa-detail'));
Route::get('/reports', function () {
    return view('modules.website.reports');
});
//Route::get('/website/add', function () {
    //return view('modules.website.add');
//});
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

/*
|--------------------------------------------------------------------------
| HOSTING SERVERS
|--------------------------------------------------------------------------
*/

Route::prefix('hosting-servers')->group(function () {
    Route::get('/', [HostingDetailController::class, 'index'])->name('hosting.index');
    Route::get('/add', [HostingDetailController::class, 'create'])->name('hosting.add');
    Route::post('/store', [HostingDetailController::class, 'store'])->name('hosting.store');
});
Route::get('/hosting-servers/details', [HostingdetailController::class, 'details'])->name('hosting.details');

/*
|--------------------------------------------------------------------------
| SPECIAL FEATURES
|--------------------------------------------------------------------------
*/

Route::get('/special-features', [SpecialFeatureController::class, 'index'])->name('special-features.index');

/*
|--------------------------------------------------------------------------
| DEBUG / DEV ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/debug-account-count', fn() => Account::count());
Route::post('/accounts', fn() => Log::info('Fallback route hit!'));