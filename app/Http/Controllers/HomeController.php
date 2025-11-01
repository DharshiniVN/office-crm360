<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Account;

use App\Models\GraphicProject;
use App\Models\DigitalMarketingCampaign;

class HomeController extends Controller
{
   public function index()
{
    $websiteCategories = [
        'gdr', 'wordpress', 'hardcoding', 'web application',
        'ios', 'ecom', 'webapp', 'maintenance', 'android', 'hardcode'
    ];

    $websiteCount = Account::whereIn('category', $websiteCategories)->count();
    $websiteRenewals = Account::whereIn('category', $websiteCategories)
        ->whereNotNull('renewal_date')
        ->count();

    $productsCount = Product::count();
    $productRenewals = 0;

    $graphicsCount = GraphicProject::count();
    $graphicsRenewals = 0;

    $digitalMarketingCount = DigitalMarketingCampaign::count();
    $digitalMarketingRenewals = 0;

    $renewalCount = 0;
    $renewalRenewals = 0;

    return view('layouts.home', compact(
        'websiteCount',
        'websiteRenewals',
        'productsCount',
        'productRenewals',
        'digitalMarketingCount',
        'digitalMarketingRenewals',
        'graphicsCount',
        'graphicsRenewals',
        'renewalCount',
        'renewalRenewals'
    ));
}
}