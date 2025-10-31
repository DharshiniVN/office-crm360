<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\DigitalMarketingCampaign;

class DashboardController extends Controller
{
    public function index()
    {
        /**
         * --------------------------------------
         * WEBSITE & APPLICATIONS MODULE
         * --------------------------------------
         */
        $websiteCategories = [
            'gdr', 'wordpress', 'hardcoding', 'web application',
            'ios', 'ecom', 'webapp', 'maintenance', 'android', 'hardcode'
        ];

        $websiteCount = Account::whereIn('category', $websiteCategories)->count();
        $websiteRenewals = Account::whereIn('category', $websiteCategories)
            ->whereNotNull('renewal_date')
            ->count();

        /**
         * --------------------------------------
         * PRODUCTS MODULE
         * --------------------------------------
         */
        $productsCount = Account::where('category', 'products')->count();
        $productRenewals = Account::where('category', 'products')
            ->whereNotNull('renewal_date')
            ->count();

        /**
         * --------------------------------------
         * DIGITAL MARKETING MODULE
         * (✅ Fetched dynamically from DigitalMarketingCampaign table)
         * --------------------------------------
         */
        $digitalMarketingCount = DigitalMarketingCampaign::count();
        // If you have a 'renewal_date' or 'end_date' in this table, update below accordingly
        $digitalMarketingRenewals = 0;

        /**
         * --------------------------------------
         * GRAPHICS MODULE
         * --------------------------------------
         */
        $graphicsCount = Account::where('category', 'graphics')->count();
        $graphicsRenewals = Account::where('category', 'graphics')
            ->whereNotNull('renewal_date')
            ->count();

        /**
         * --------------------------------------
         * RENEWAL MODULE
         * --------------------------------------
         */
        $renewalCount = Account::where('category', 'renewal')->count();
        $renewalRenewals = Account::where('category', 'renewal')
            ->whereNotNull('renewal_date')
            ->count();

        /**
         * --------------------------------------
         * RETURN TO DASHBOARD VIEW
         * --------------------------------------
         */
        return view('dashboard.index', compact(
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
