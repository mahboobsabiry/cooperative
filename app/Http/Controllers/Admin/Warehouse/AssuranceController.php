<?php

namespace App\Http\Controllers\Admin\Warehouse;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAssuranceRequest;
use App\Models\Office\Company;
use App\Models\Warehouse\Assurance;
use Illuminate\Http\Request;
use Morilog\Jalali\CalendarUtils;
use Morilog\Jalali\Jalalian;

class AssuranceController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:warehouse_assurance_view', ['only' => ['index', 'returned', 'absolute', 'show']]);
        $this->middleware('permission:warehouse_assurance_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:warehouse_assurance_edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:warehouse_assurance_delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assurances = Assurance::all()->where('status', 1);
        return view('admin.warehouse.assurances.index', compact('assurances'));
    }

    /**
     * Display a listing of the resource.
     */
    public function returned()
    {
        $assurances = Assurance::all()->where('status', 2);
        return view('admin.warehouse.assurances.returned', compact('assurances'));
    }

    /**
     * Display a listing of the resource.
     */
    public function absolute()
    {
        $assurances = Assurance::all()->where('status', 3);
        return view('admin.warehouse.assurances.absolute', compact('assurances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        return view('admin.warehouse.assurances.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAssuranceRequest $request)
    {
        $assurance = new Assurance();
        $assurance->company_id      = $request->company_id;
        $assurance->good_name       = $request->good_name;
        $assurance->assurance_total = $request->assurance_total;
        $assurance->inquiry_number  = $request->inquiry_number;
        $assurance->inquiry_date    = $request->inquiry_date;
        $assurance->bank_tt_number  = $request->bank_tt_number;
        $assurance->bank_tt_date    = $request->bank_tt_date;

        // Convert Inquiry Jalalian Date to Carbon
        $assurance_in_date = Jalalian::fromFormat('Y/m/d', $assurance->inquiry_date)->toCarbon();
        // Add year to expire date
        $one_year = $assurance_in_date->addYear()->format('Y/m/d');
        // Change Carbon to Jalalian Again
        $expire_date = CalendarUtils::strftime('Y/m/d', strtotime($one_year));
        // Save Expire Date
        $assurance->expire_date     = $expire_date;

        $assurance->reason          = $request->reason;
        $assurance->save();

        return redirect()->route('admin.warehouse.assurances.index')->with([
            'message'   => 'موفقانه ثبت گردید',
            'alertType' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $assurance = Assurance::find($id);
        return view('admin.warehouse.assurances.show', compact('assurance'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
