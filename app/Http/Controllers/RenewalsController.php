<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\GraphicProject;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Schema;
class RenewalsController extends Controller
{
    public function index()
    {
        $allRenewals = $this->getAllRenewals();

        $totalRenewals = $allRenewals->count();
        $thisMonthRenewals = $allRenewals->filter(fn($r) => !empty($r['expiry_date']) && Carbon::parse($r['expiry_date'])->isBetween(Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()))->count();
        $overdueRenewals = $allRenewals->filter(fn($r) => !empty($r['expiry_date']) && Carbon::parse($r['expiry_date'])->lt(Carbon::now()))->count();
        $expiringRenewals = $allRenewals->filter(fn($r) => !empty($r['expiry_date']) && Carbon::parse($r['expiry_date'])->isBetween(Carbon::now(), Carbon::now()->addWeek()))->count();

        return view('renewals.index', compact(
            'totalRenewals',
            'thisMonthRenewals',
            'overdueRenewals',
            'expiringRenewals'
        ));
    }

    public function fetchRenewals($type)
    {
        $data = $this->getAllRenewals();

        switch ($type) {
            case 'thisMonth':
                $renewals = $data->filter(fn($r) => !empty($r['expiry_date']) && Carbon::parse($r['expiry_date'])->isBetween(Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()));
                break;
            case 'overdue':
                $renewals = $data->filter(fn($r) => !empty($r['expiry_date']) && Carbon::parse($r['expiry_date'])->lt(Carbon::now()));
                break;
            case 'expiring':
                $renewals = $data->filter(fn($r) => !empty($r['expiry_date']) && Carbon::parse($r['expiry_date'])->isBetween(Carbon::now(), Carbon::now()->addWeek()));
                break;
            default:
                $renewals = $data;
        }

        return response()->json(array_values($renewals->toArray()));
    }

    private function getAllRenewals()
    {
        $products = Product::select(
            'id',
            'client_name',
            'project_name as service',
            'project_start_date as start_date',
            'renewal_date as expiry_date',
            'renewal_amount as amount',
            'renewal_status as status'
        )->get()->map(function ($item) {
            $item->type = 'product';
            return $item;
        });

        $graphics = GraphicProject::select(
            'id',
            'client_name',
            'project_name as service',
            'project_starting_date as start_date',
            'project_closing_date as expiry_date',
            'client_charges as amount',
            'project_status as status'
        )->get()->map(function ($item) {
            $item->type = 'graphic';
            return $item;
        });

        return collect()->merge($products)->merge($graphics);
    }

    

public function requestPayment(Request $request, $id)
{
    try {
        $record = Product::find($id) ?? GraphicProject::find($id);
        if (!$record) {
            return response()->json(['success' => false, 'message' => 'Record not found'], 404);
        }

        // determine amount safely
        $amountDecimal = $record->renewal_amount ?? $record->amount ?? $record->client_charges ?? 0;
        if (empty($amountDecimal) || $amountDecimal <= 0) {
            return response()->json(['success' => false, 'message' => 'Invalid amount for this record'], 422);
        }

        // optionally create razorpay order here (demo uses simple response)
        //$record->payment_request_id = 'req_' . time();
        if (Schema::hasColumn($record->getTable(), 'renewal_remark')) {
            $record->renewal_remark = 'Payment requested';
        }
        $record->save();

        return response()->json([
            'success' => true,
            'message' => 'Payment request created',
            'razorpay_key' => env('RAZORPAY_KEY', 'rzp_test_1DP5mmOlF5G5ag'),
            'amount' => $amountDecimal,
            'client_name' => $record->client_name,
            'service' => $record->service ?? null,
        ]);
    } catch (\Exception $e) {
        \Log::error('requestPayment exception: '.$e->getMessage(), ['trace' => $e->getTraceAsString()]);
        return response()->json(['success' => false, 'message' => 'Server error: '.$e->getMessage()], 500);
    }
}

}
