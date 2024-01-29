<?php

namespace App\Http\Controllers\Admin\Asycuda;

use App\Http\Controllers\Controller;
use App\Http\Requests\COALRequest;
use App\Models\Asycuda\COAL;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;

// Companies Activity License Controller
class COALController extends Controller
{
    // Index
    public function index()
    {
        $coal = COAL::all();
        return view('admin.asycuda.coal.index', compact('coal'));
    }

    // Create
    public function create()
    {
        return view('admin.asycuda.coal.create');
    }

    // Store
    public function store(COALRequest $request)
    {
        $cal = new COAL();
        $cal->company_name      = $request->company_name;
        $cal->company_tin       = $request->company_tin;
        $cal->license_number    = $request->license_number;

        // Convert Jalali to Georgian & Save to the DB
        $export_date = Jalalian::fromFormat('Y/m/d', $request->export_date)->toCarbon();
        $cal->export_date       = $export_date;
        $expire_date = Jalalian::fromFormat('Y/m/d', $request->expire_date)->toCarbon();
        $cal->expire_date   = $expire_date;

        $cal->owner_name    = $request->owner_name;
        $cal->owner_phone   = $request->owner_phone;
        $cal->phone         = $request->phone;
        $cal->address       = $request->address;
        $cal->info          = $request->info;
        $cal->save();

        return redirect()->route('admin.asycuda.coal.show', $cal->id)->with([
            'message'   => 'جواز فعالیت شرکت موفقانه ثبت گردید!',
            'alertType' => 'success'
        ]);
    }

    // Show
    public function show($id)
    {
        $cal = COAL::find($id);
        return view('admin.asycuda.coal.show', compact('cal'));
    }

    // Reg Form
    public function reg_form($id)
    {
        $cal = COAL::find($id);
        return view('admin.asycuda.coal.reg_form', compact('cal'));
    }

    // Edit
    public function edit($id)
    {
        $cal = COAL::find($id);
        return view('admin.asycuda.coal.edit', compact('cal'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $cal = COAL::find($id);
        $cal->company_name      = $request->company_name;
        $cal->company_tin       = $request->company_tin;
        $cal->license_number    = $request->license_number;

        // Convert Jalali to Georgian & Save to the DB
        $export_date = Jalalian::fromFormat('Y/m/d', $request->export_date)->toCarbon();
        $cal->export_date       = $export_date;
        $expire_date = Jalalian::fromFormat('Y/m/d', $request->expire_date)->toCarbon();
        $cal->expire_date   = $expire_date;

        $cal->owner_name    = $request->owner_name;
        $cal->owner_phone   = $request->owner_phone;
        $cal->phone         = $request->phone;
        $cal->address       = $request->address;
        $cal->info          = $request->info;
        $cal->save();

        return redirect()->route('admin.asycuda.coal.show', $cal->id)->with([
            'message'   => 'جواز فعالیت شرکت موفقانه ویرایش گردید!',
            'alertType' => 'success'
        ]);
    }

    // Delete
    public function destroy($id)
    {
        $cal = COAL::find($id);
        $cal->delete();

        return redirect()->route('admin.asycuda.coal.index')->with([
            'message'   => 'جواز فعالیت شرکت حذف گردید!',
            'alertType' => 'danger'
        ]);
    }
}
