<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GstReport;

class GstReportController extends Controller
{
    public function index()
    {
        $gstReports = GstReport::all(); // Fetch from DB
        return view('account-billing.gst-report', compact('gstReports'));
    }
}
