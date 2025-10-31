<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GraphicsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RenewalsController;
use App\Http\Controllers\AccountBillingController;
use App\Http\Controllers\OutputGstController;
use App\Http\Controllers\GstReportController;
use App\Http\Controllers\InputGstinController;
use App\Http\Controllers\ProformaInvoiceController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\SpecialFeatureController;
use App\Http\Controllers\IncomeExpenseController;
use App\Http\Controllers\AuthController;
 Route::get('/', function () {
    if (!session('logged_in')) {
        return redirect('/login');
    }
    return view('layouts.home'); // your Accounts Dashboard page
});
// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');




Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

// ==================== Digital marketing =======================
Route::get('/digital-marketing', [DigitalMarketingController::class, 'index'])->name('digitalmarketing.index');
Route::get('/digital-marketing/create', [DigitalMarketingController::class, 'create'])->name('digitalmarketing.create');
Route::post('/digital-marketing/store', [DigitalMarketingController::class, 'store'])->name('digitalmarketing.store');



// ==================== GRAPHICS ====================
Route::prefix('graphics')->group(function(){
    Route::get('/', [GraphicsController::class, 'index'])->name('graphics.index');
    Route::get('/add', [GraphicsController::class, 'create'])->name('graphics.add');
    Route::post('/add', [GraphicsController::class, 'store'])->name('graphics.store');
    Route::get('/{id}', [GraphicsController::class, 'show'])->name('graphics.detail');
    Route::get('/{id}/edit', [GraphicsController::class, 'edit'])->name('graphics.edit');
    Route::put('/{id}', [GraphicsController::class, 'update'])->name('graphics.update');
    Route::delete('/{id}', [GraphicsController::class, 'destroy'])->name('graphics.destroy');
    Route::get('/reports', [GraphicsController::class, 'reports'])->name('graphics.reports');
});


Route::get('graphics/add', [GraphicsController::class, 'create'])->name('graphics.add');
Route::get('/graphics', [GraphicsController::class, 'index'])->name('graphics.index');
Route::get('/graphics/add', [GraphicsController::class, 'create'])->name('graphics.create');
Route::post('/graphics/add', [GraphicsController::class, 'store'])->name('graphics.store');
Route::get('/graphics/category/{category}', [GraphicsController::class, 'category'])->name('graphics.category');
Route::get('/graphics/view/{id}', [GraphicsController::class, 'view'])->name('graphics.view');
Route::get('/graphics/edit/{id}', [GraphicsController::class, 'edit'])->name('graphics.edit');
Route::delete('/graphics/delete/{id}', [GraphicsController::class, 'destroy'])->name('graphics.destroy');


Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductsController::class, 'create'])->name('products.add');
Route::post('/products', [ProductsController::class, 'store'])->name('products.store');
Route::get('/products/category/{category}', [ProductsController::class, 'category'])->name('products.category');

Route::get('/products/{id}/edit', [ProductsController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductsController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductsController::class, 'destroy'])->name('products.destroy');
// View single product
Route::get('/products/view/{id}', [App\Http\Controllers\ProductsController::class, 'show'])->name('products.view');
Route::get('/products/all', [ProductsController::class, 'allProducts'])->name('products.all');


Route::get('/renewals', [RenewalsController::class, 'index'])->name('renewals.index');
Route::get('/renewals/fetch/{type}', [RenewalsController::class, 'fetchRenewals'])->name('renewals.fetch');
Route::post('/renewals/request-payment/{id}', [RenewalsController::class, 'requestPayment'])->name('renewals.requestPayment');



Route::get('/account-billing', [AccountBillingController::class, 'index'])->name('account.billing');
Route::get('/account-billing/finance', [AccountBillingController::class, 'financePage'])->name('account-billing.finance');
Route::get('/account-billing/gst-report', [AccountBillingController::class, 'gstReport'])->name('account-billing.gst-report');
Route::get('/account-billing/proforma', [AccountBillingController::class, 'proformaInvoice'])->name('account-billing.proforma');
Route::get('/account-billing/invoice', [AccountBillingController::class, 'invoice'])->name('account-billing.invoice');
Route::get('/account-billing/payment-link', [AccountBillingController::class, 'sendPaymentLink'])->name('account-billing.payment-link');
Route::get('/account-billing', [AccountBillingController::class, 'index'])
    ->name('account-billing.index');
Route::get('/account-billing/add-income-expense', [AccountBillingController::class, 'addIncomeExpensePage'])
    ->name('account-billing.add-income-expense');

Route::get('/account-billing/income/create', [AccountBillingController::class, 'createIncome'])
    ->name('account-billing.create-income');

Route::post('/account-billing/income/store', [AccountBillingController::class, 'storeIncome'])
    ->name('account-billing.store-income');

Route::post('/account-billing/save-entry', [AccountBillingController::class, 'saveIncomeExpense'])
    ->name('account-billing.save-entry');

Route::post('/account-billing/store-income-expense', [AccountBillingController::class, 'storeIncomeExpense'])->name('account-billing.store-income-expense');    
Route::get('/account-billing/gst-report', [AccountBillingController::class, 'gstReport'])
    ->name('account-billing.gst-report');



Route::prefix('account-billing/output-gst')->group(function () {
    Route::get('/', [OutputGstController::class, 'index'])->name('output-gst.index');
    Route::get('/create', [OutputGstController::class, 'create'])->name('output-gst.create');
    Route::post('/store', [OutputGstController::class, 'store'])->name('output-gst.store');
});
    


Route::prefix('account-billing/input-gstin')->group(function () {
    Route::get('/', [InputGstinController::class, 'index'])->name('input-gstin.index');
    Route::get('/create', [InputGstinController::class, 'create'])->name('input-gstin.create');
    Route::post('/store', [InputGstinController::class, 'store'])->name('input-gstin.store');
});
Route::prefix('account-billing/input-gst')->group(function () {
    Route::get('/', [InputGstinController::class, 'index'])->name('input-gst.index');
    Route::get('/create', [InputGstinController::class, 'create'])->name('input-gst.create');
    Route::post('/store', [InputGstinController::class, 'store'])->name('input-gst.store');
});

Route::prefix('account-billing')->group(function () {
    Route::get('/input-gst', [InputGstinController::class, 'index'])->name('input-gst.index');
    Route::get('/input-gst/create', [InputGstinController::class, 'create'])->name('input-gst.create');
});


// GST Report main page
Route::get('/account-billing/gst-report', function () {
    return view('account-billing.gst-report');
})->name('account-billing.gst-report');

// Dummy Output GST page
Route::get('/output-gst', function () {
    return 'Output GST Page (to be created later)';
})->name('output-gst.index');

// Dummy Input GSTIN page
Route::get('/input-gst', function () {
    return 'Input GSTIN Page (to be created later)';
})->name('input-gst.index');

 Route::get('/proforma', [ProformaInvoiceController::class, 'index'])->name('proforma.index');

Route::prefix('account-billing')->group(function () {
    // Proforma Invoice Routes
    Route::get('/proforma', [ProformaInvoiceController::class, 'index'])->name('proforma.index');
    Route::get('/proforma/create', [ProformaInvoiceController::class, 'create'])->name('proforma.create');
    Route::post('/proforma', [ProformaInvoiceController::class, 'store'])->name('proforma.store');
    Route::get('/proforma/{id}/edit', [ProformaInvoiceController::class, 'edit'])->name('proforma.edit');
    Route::put('/proforma/{id}', [ProformaInvoiceController::class, 'update'])->name('proforma.update');
    Route::delete('/proforma/{id}', [ProformaInvoiceController::class, 'destroy'])->name('proforma.destroy');
    Route::get('/proforma/{id}', [ProformaInvoiceController::class, 'show'])->name('proforma.show');
});



Route::prefix('account-billing')->group(function () {
    Route::resource('invoice', InvoiceController::class);
});
Route::prefix('account-billing')->group(function () {
    Route::get('/proforma', [ProformaInvoiceController::class, 'index'])->name('account-billing.proforma');
});
Route::get('/invoice', [InvoiceController::class, 'index'])->name('account-billing.invoice');
Route::get('/invoice/create', [InvoiceController::class, 'create'])->name('invoice.create');
    Route::post('/invoice/store', [InvoiceController::class, 'store'])->name('invoice.store');



// Invoice Management Routes
Route::prefix('account-billing')->group(function () {
    Route::get('/invoice', [InvoiceController::class, 'index'])->name('invoice.index');
    Route::get('/invoice/create', [InvoiceController::class, 'create'])->name('invoice.create');
    Route::post('/invoice', [InvoiceController::class, 'store'])->name('invoice.store');
    Route::get('/invoice/{id}/edit', [InvoiceController::class, 'edit'])->name('invoice.edit');
    Route::put('/invoice/{id}', [InvoiceController::class, 'update'])->name('invoice.update');
    Route::delete('/invoice/{id}', [InvoiceController::class, 'destroy'])->name('invoice.destroy');
    Route::get('/invoice/{id}', [InvoiceController::class, 'show'])->name('invoice.show');
});

Route::get('/account-billing/proforma/view/{id}', [ProformaInvoiceController::class, 'show'])->name('proforma.show');


Route::get('/account-billing/invoice/view/{id}', [InvoiceController::class, 'show'])->name('invoice.show');

Route::get('/account-billing/payment-link', [AccountBillingController::class, 'sendPaymentLink'])
    ->name('account-billing.payment-link');

   

Route::get('/special-features', [SpecialFeatureController::class, 'index'])->name('special-features.index');



Route::prefix('account-billing')->group(function () {
    Route::get('/income-expense', [IncomeExpenseController::class, 'index'])->name('account-billing.income-expense');
    Route::get('/income-report', [IncomeExpenseController::class, 'incomeReport'])->name('account-billing.income-report');
    Route::get('/expense-report', [IncomeExpenseController::class, 'expenseReport'])->name('account-billing.expense-report');
    Route::post('/store', [IncomeExpenseController::class, 'store'])->name('account-billing.store');
});




