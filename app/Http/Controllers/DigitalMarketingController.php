<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DigitalMarketingCampaign;

class DigitalMarketingController extends Controller
{
    public function index()
{
    // Fetch all campaigns
    $campaigns = \DB::table('digital_marketing_campaigns')
        ->select('id', 'clientName', 'projectName', 'clientMob', 'clientGmailID', 'category')
        ->get();

    // Count campaigns by category
    $seoCount = \DB::table('digital_marketing_campaigns')->where('category', 'seo')->count();
    $addCount = \DB::table('digital_marketing_campaigns')->where('category', 'add_campaign')->count();
    $socialCount = \DB::table('digital_marketing_campaigns')->where('category', 'social_media')->count();
    $comboCount = \DB::table('digital_marketing_campaigns')->where('category', 'seo_add_social')->count();

    // Count renewals (optional, you can set them to 0 or use logic if available)
    $seoRenewals = 0;
    $addRenewals = 0;
    $socialRenewals = 0;
    $comboRenewals = 0;

    // Pass all variables to the view
    return view('modules.digital-marketing.index', compact(
        'campaigns',
        'seoCount', 'addCount', 'socialCount', 'comboCount',
        'seoRenewals', 'addRenewals', 'socialRenewals', 'comboRenewals'
    ));
}
public function create()
{
    return view('modules.digital-marketing.add');
}
public function show($id)
{
    // Example: fetch record by ID
    $data = \App\Models\DigitalMarketingCampaign::find($id);


    if (!$data) {
        abort(404, 'Record not found');
    }

    // Return a view, e.g. resources/views/digital-marketing/view.blade.php
    return view('modules.digital-marketing.view', compact('data'));
}
public function store(Request $request)
{
    // Validate input
    $validatedData = $request->validate([
        'category' => 'required|string',
        'clientName' => 'required|string|max:255',
        'projectName' => 'required|string|max:255',
        'clientGmailID' => 'nullable|email',
        'projectStatus' => 'required|string',
        // You can add more fields as needed
    ]);

    // Save all request data (for now only the validated + extra allowed)
    \App\Models\DigitalMarketingCampaign::create($request->all());

    return redirect()->route('digitalmarketing.index')
        ->with('success', 'Campaign added successfully!');
}


}