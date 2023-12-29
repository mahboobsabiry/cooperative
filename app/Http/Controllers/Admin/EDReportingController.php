<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EDEmpty;
use App\Models\EDRejected;
use App\Models\EDTrex;
use Illuminate\Http\Request;
use Morilog\Jalali\CalendarUtils;
use Morilog\Jalali\Jalalian;

class EDReportingController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:exit_door', [
            'only' => ['index']
        ]);
    }

    // Index
    public function index(Request $request)
    {
        // $from = CalendarUtils::createCarbonFromFormat('Y/m/d', $request->from_date);
        // $to = CalendarUtils::createCarbonFromFormat('Y/m/d', $request->to_date);

        $from = $request->from_date;
        $to = $request->to_date;

        if ($request->exit_type == 1) {         // Transit
            $query = EDTrex::where('is_tr', 1)->whereBetween('created_at', [$from, $to])->get();
        } elseif ($request->exit_type == 2) {   // Export
            $query = EDTrex::where('is_tr', 0)->where('created_at', '<=', $from)->where('created_at', '>=', $to)->get();
        } elseif ($request->exit_type == 3) {   // Empty Vehicles
            $query = EDEmpty::where('created_at', '<=', $from)->where('created_at', '>=', $to)->get();
        } elseif($request->exit_type == 4) {    // Returned Goods
            $query = EDTrex::where('is_returned', 1)->where('created_at', '<=', $from)->where('created_at', '>=', $to)->get();
        } elseif ($request->exit_type == 5) {   // Rejected Goods
            $query = EDRejected::where('created_at', '<=', $from)->where('created_at', '>=', $to)->get();
        } else {
            $query = EDTrex::get();
        }

        return view('admin.exit-door.reporting', compact('query'));
    }
}
