<?php

namespace App\Http\Controllers\Admin\Asycuda;

use App\Http\Controllers\Controller;
use App\Http\Requests\COALRequest;
use App\Models\Asycuda\CalResume;
use App\Models\Asycuda\COAL;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Morilog\Jalali\Jalalian;
use Spatie\Browsershot\Browsershot;

// Companies Activity License Controller
class COALController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:asy_coal_view', ['only' => ['index', 'expired', 'show']]);
        $this->middleware('permission:asy_coal_create', ['only' => ['create','store', 'reg_form', 'refresh']]);
        $this->middleware('permission:asy_coal_edit', ['only' => ['edit','update']]);
        $this->middleware('permission:asy_coal_delete', ['only' => ['destroy']]);
    }

    // Index
    public function index()
    {
        $coal = COAL::all()->where('status', 1);

        return view('admin.asycuda.coal.index', compact('coal'));
    }

    public function expired()
    {
        $coal = COAL::all()->where('status', 0);
        return view('admin.asycuda.coal.expired', compact('coal'));
    }

    // Create
    public function create()
    {
        if (Auth::user()->isAdmin()) {
            return redirect()->route('admin.asycuda.coal.index')->with([
                'message'   => 'شما اجازه ثبت جواز شرکت را ندارید.',
                'alertType' => 'danger'
            ]);
        }
        return view('admin.asycuda.coal.create');
    }

    // Store
    public function store(COALRequest $request)
    {
        if (Auth::user()->isAdmin()) {
            return redirect()->route('admin.asycuda.coal.index')->with([
                'message'   => 'شما اجازه ثبت جواز شرکت را ندارید.',
                'alertType' => 'danger'
            ]);
        }
        $cal = new COAL();
        $cal->user_id           = Auth::user()->id;
        $cal->company_name      = $request->company_name;
        $cal->company_tin       = $request->company_tin;
        $cal->license_number    = $request->license_number;

        // Convert Jalali to Georgian & Save to the DB
        // $export_date = Jalalian::fromFormat('Y/m/d', $request->export_date)->toCarbon();
        $cal->export_date   = $request->export_date;
        // $expire_date = Jalalian::fromFormat('Y/m/d', $request->expire_date)->toCarbon();
        $cal->expire_date   = $request->expire_date;

        $cal->owner_name    = $request->owner_name;
        $cal->owner_phone   = $request->owner_phone;
        $cal->phone         = $request->phone;
        $cal->email         = $request->email;
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
        if (Auth::user()->isAdmin()) {
            return redirect()->route('admin.asycuda.coal.index')->with([
                'message'   => 'شما اجازه ویرایش جواز شرکت را ندارید.',
                'alertType' => 'danger'
            ]);
        }
        $cal = COAL::where(['id' => $id, 'user_id' => Auth::user()->id])->firstOrFail();
        return view('admin.asycuda.coal.edit', compact('cal'));
    }

    // Update
    public function update(Request $request, $id)
    {
        if (Auth::user()->isAdmin()) {
            return redirect()->route('admin.asycuda.coal.index')->with([
                'message'   => 'شما اجازه ویرایش جواز شرکت را ندارید.',
                'alertType' => 'danger'
            ]);
        }
        $cal = COAL::where(['id' => $id, 'user_id' => Auth::user()->id])->firstOrFail();

        $request->validate([
            'company_name'  => 'required|unique:coal,company_name,' . $cal->id,
            'company_tin'   => 'required|unique:coal,company_tin,' . $cal->id,
            'license_number'=> 'required|unique:coal,license_number,' . $cal->id,
            'export_date'   => 'required',
            'expire_date'   => 'required',
            'owner_name'    => 'required|min:3|max:128',
            'owner_phone'   => 'nullable|min:8|max:15|unique:coal,owner_phone,' . $cal->id,
            'phone'         => 'nullable|min:8|max:15|unique:coal,phone,' . $cal->id,
            'email'         => 'nullable|min:5|max:128|unique:coal,email,' . $cal->id,
            'address'       => 'required|min:3|max:255',
            'info'          => 'nullable'
        ]);

        $cal->user_id           = Auth::user()->id;
        $cal->company_name      = $request->company_name;
        $cal->company_tin       = $request->company_tin;
        $cal->license_number    = $request->license_number;

        // Convert Jalali to Georgian & Save to the DB
        // $export_date = Jalalian::fromFormat('Y/m/d', $request->export_date)->toCarbon();
        $cal->export_date   = $request->export_date;
        // $expire_date = Jalalian::fromFormat('Y/m/d', $request->expire_date)->toCarbon();
        $cal->expire_date   = $request->expire_date;

        $cal->owner_name    = $request->owner_name;
        $cal->owner_phone   = $request->owner_phone;
        $cal->phone         = $request->phone;
        $cal->email         = $request->email;
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

    // Refresh Company Activity License
    public function refresh($id)
    {
        $cal = COAL::find($id);

        if (Jalalian::fromFormat('Y-m-d', $cal->expire_date)->toCarbon() < today()) {
            $cal->update([
                'status'    => 0,
                'info'      => 'تاریخ جواز ختم گردیده است.'
            ]);
        }

        return redirect()->back()->with([
            'message'   => 'تازه سازی انجام شد.',
            'alertType' => 'success'
        ]);
    }

    // Upload Cal Form
    public function upload_file(Request $request, $id)
    {
        // Employee
        $cal = COAL::find($id);

        foreach ($request->file('file') as $item) {
            // New File
            $file = new File();
            $fileName = 'cal-file-' . time() . '.' . $item->getClientOriginalExtension();
            $item->storeAs('coal/files', $fileName, 'public');
            $file->path   = $fileName;
            $cal->files()->save($file);
        }

        return redirect()->back()->with([
            'message'   => 'موفقانه ثبت گردید.',
            'alertType' => 'success'
        ]);
    }

    // Delete File
    public function delete_file($id)
    {
        $file = File::find($id);
        if (file_exists(storage_path('app/public/coal/files/' . $file->path))) {
            unlink(storage_path('app/public/coal/files/' . $file->path));
        }
        $file->delete();
        return redirect()->back()->with([
            'message'   => 'سند موفقانه حذف گردید.',
            'alertType' => 'success'
        ]);
    }

    // Add CAL Resume
    public function add_cal_resume($id)
    {
        $cal = COAL::find($id);
        if (Auth::user()->isAdmin()) {
            return redirect()->back()->with([
                'message'   => 'شما اجازه ویرایش جواز شرکت را ندارید.',
                'alertType' => 'danger'
            ]);
        }
        if (Jalalian::fromFormat('Y-m-d', $cal->expire_date)->toCarbon() > today()) {
            return redirect()->back()->with([
                'message'   => 'تاریخ جواز فعالیت فعلی شرکت تا هنوز انقضاء نگردیده است. مدت ' . '<b>' . now()->diffInDays(Jalalian::fromFormat('Y-m-d', $cal->expire_date)->toCarbon()) . '</b>' . ' روز دیگر باقی مانده است.',
                'alertType' => 'danger'
            ]);
        }
        return view('admin.asycuda.coal.add_cal_resume', compact('cal'));
    }

    // Store CAL Resume
    public function store_cal_resume(Request $request, $id)
    {
        $request->validate([
            'license_number'    => 'required|numeric|min:11|max:999999',
            'owner_name'        => 'required',
            'owner_phone'       => 'required',
            'export_date'       => 'required',
            'expire_date'       => 'required',
            'address'           => 'required',
            'info'              => 'nullable'
        ]);

        $cal = COAL::find($id);

        $resume = new CalResume();
        $resume->user_id       = Auth::user()->id;
        $resume->cal_id        = $cal->id;
        $resume->company_name  = $cal->company_name;
        $resume->company_tin   = $cal->company_tin;
        $resume->license_number    = $request->license_number;
        $resume->owner_name        = $request->owner_name;
        $resume->owner_phone       = $request->owner_phone;
        $resume->export_date       = $request->export_date;
        $resume->expire_date       = $request->expire_date;
        $resume->address           = $request->address;
        $resume->info              = $request->info;
        $resume->save();

        $cal->update(['owner_name' => $request->owner_name, 'owner_phone' => $request->owner_phone, 'export_date' => $request->export_date, 'expire_date' => $request->expire_date, 'address' => $request->address]);

        //  Has File && Save
        if ($request->hasFile('license')) {
            $license = $request->file('license');
            $fileName = 'cal-license-' . time() . rand(111, 99999) . '.' . $license->getClientOriginalExtension();
            $resume->storeImage($license->storeAs('coal/files/licenses', $fileName, 'public'));

            // New File
            $file = new File();
            $fileName = 'cal-file-' . time() . '.' . $license->getClientOriginalExtension();
            $license->storeAs('coal/files', $fileName, 'public');
            $file->path   = $fileName;
            $cal->files()->save($file);
        }

        return redirect()->route('admin.asycuda.coal.show', $cal->id)->with([
            'message'   => 'موفقانه ثبت گردید!',
            'alertType' => 'success'
        ]);
    }
}
