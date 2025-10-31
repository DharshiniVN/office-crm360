<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpecialFeatureController extends Controller
{
    public function index()
    {
        // Simulated data — not using database at all
        $features = [
            'totalReminders' => 0,
            'upcomingReminders' => 0,
            'alertsCount' => 0,
            'renewals' => 0,
            'pendingPayments' => 0,
            'alerts' => [
                'No alerts available'
            ],
            'recentReminders' => [
                'No recent reminders available'
            ]
        ];

        return view('special-features.index', compact('features'));
    }
}
