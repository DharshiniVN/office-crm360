<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HostingDetail;

class HostingDetailController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->query('type');

        if ($type) {
            switch ($type) {
                case 'domains':
                    $details = HostingDetail::whereNotNull('domain_name')->get();
                    break;
                case 'servers':
                    $details = HostingDetail::whereNotNull('server')->get();
                    break;
                case 'emails':
                    $details = HostingDetail::whereNotNull('professional_email')->get();
                    break;
                case 'expiries':
                    $details = HostingDetail::whereMonth('renewal_date', now()->month)
                        ->whereYear('renewal_date', now()->year)
                        ->get();
                    break;
                default:
                    $details = HostingDetail::all();
            }

            return view('modules.hosting-servers.details', compact('details'));
        }

        // Summary counts
        $totalDomains = HostingDetail::whereNotNull('domain_name')->count();
        $activeDomains = HostingDetail::whereNotNull('domain_name')->where('project_status', 'Active')->count();

        $totalServers = HostingDetail::whereNotNull('server')->count();
        $activeServers = HostingDetail::whereNotNull('server')->where('project_status', 'Active')->count();

       $totalEmails = HostingDetail::whereNotNull('professional_email')
    ->where('professional_email', '!=', '')
    ->pluck('professional_email')
    ->unique()
    ->count();

$activeEmails = HostingDetail::whereNotNull('professional_email')
    ->where('professional_email', '!=', '')
    ->where('project_status', 'Active')
    ->pluck('professional_email')
    ->unique()
    ->count();

        $upcomingExpiries = HostingDetail::whereMonth('renewal_date', now()->month)
            ->whereYear('renewal_date', now()->year)
            ->count();

        // Latest 3 entries for table
        $latestThree = HostingDetail::orderBy('renewal_date', 'desc')->take(3)->get();

        // Email breakdown
        $freeEmails = HostingDetail::where('email_cost', 0)->count();
        $paidEmails = HostingDetail::where('email_cost', '>', 0)->count();

        // ✅ Add this debug line here
//dd([
  //  'totalEmails' => $totalEmails,
    //'activeEmails' => $activeEmails,
    //'freeEmails' => $freeEmails,
    //'paidEmails' => $paidEmails,
//]);


       return view('modules.hosting-servers.index', compact(
            'totalDomains', 'activeDomains',
            'totalServers', 'activeServers',
            'totalEmails', 'activeEmails',
            'upcomingExpiries',
            'latestThree',
            'freeEmails',
            'paidEmails'
        ));
    }

    public function create()
    {
        return view('modules.hosting-servers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_category' => 'nullable|string',
            'closer_year' => 'nullable|integer',
            'closer_date' => 'nullable|date',
            'client_name' => 'nullable|string',
            'client_mobile' => 'nullable|string',
            'client_gmail' => 'nullable|email',
            'project_name' => 'nullable|string',
            'domain_name' => 'nullable|string',
            'domain_booking_year' => 'nullable|integer',
            'professional_email' => 'nullable|email',
            'email_count' => 'nullable|integer',
            'alt_email' => 'nullable|email',
            'server' => 'nullable|string',
            'client_location' => 'nullable|string',
            'state' => 'nullable|string',
            'country' => 'nullable|string',
            'client_dob' => 'nullable|date',
            'campaign' => 'nullable|string',
            'bdm' => 'nullable|string',
            'frontend_dev' => 'nullable|string',
            'backend_dev' => 'nullable|string',
            'project_start_date' => 'nullable|date',
            'project_deadline' => 'nullable|date',
            'demo_date' => 'nullable|date',
            'project_closer_date' => 'nullable|date',
            'final_status' => 'nullable|string',
            'project_cost' => 'nullable|numeric',
            'with_gst' => 'nullable|numeric',
            'server_cost' => 'nullable|numeric',
            'email_cost' => 'nullable|numeric',
            'initial_payment' => 'nullable|numeric',
            'second_payment' => 'nullable|numeric',
            'remaining_payment' => 'nullable|numeric',
            'pending_payment' => 'nullable|numeric',
            'remark' => 'nullable|string',
            'project_status' => 'nullable|string',
            'renewal_month' => 'nullable|string',
            'renewal_date' => 'nullable|date',
            'renewal_items' => 'nullable|string',
            'renewal_amount' => 'nullable|numeric',
            'renewal_remark' => 'nullable|string',
        ]);

        HostingDetail::create($validated);

        return redirect('/hosting-servers')->with('success', 'Hosting detail added successfully!');
    }
}