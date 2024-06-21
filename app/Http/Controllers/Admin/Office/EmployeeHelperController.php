<?php

namespace App\Http\Controllers\Admin\Office;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Office\Employee;
use App\Models\Office\Notice;
use App\Models\Office\Resume;
use App\Models\Office\Position;
use Illuminate\Http\Request;
use Morilog\Jalali\CalendarUtils;
use Morilog\Jalali\Jalalian;

class EmployeeHelperController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:office_employee_edit', ['only' => ['updateEmployeeStatus', 'new_file', 'delete_file']]);
        $this->middleware('permission:office_employee_add_notice', ['only' => ['add_notice']]);
        $this->middleware('permission:office_employee_add_score', ['only' => ['add_score']]);
    }

    // Update Status
    public function updateEmployeeStatus(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['status'] == 'Active') {
                $status = 0;
            } else {
                $status = 1;
            }
            $employee = Employee::where('id', $data['employee_id'])->first();
            $employee->update(['status' => $status]);
            if ($employee->asycuda_user) {
                $employee->user->update(['status' => $status]);
            }
            if ($employee->asycuda_user) {
                $employee->asycuda_user->update(['status' => $status]);
            }
            return response()->json(['status' => $status, 'employee_id' => $data['employee_id']]);
        }
    }

    // Fire Employee
    public function add_notice(Request $request, $id)
    {
        $request->validate([
            'notice_file'  => 'nullable|image|mimes:jpg,png,jfif',
            'reason'    => 'required'
        ]);
        // Employee
        $employee = Employee::find($id);
        // Latest Notice
        $latest_notice = $employee->notices->last();

        /**
         * Return back if employee already fired.
         */
        if ($latest_notice && $latest_notice->notice == 4) {
            return back()->with(['message' => 'کارمند هذا منفک گردیده است!', 'alertType' => 'warning']);
        }

        /** @var $notice
         * Save into notices table
         */
        $notice = new Notice();
        $notice->employee_id = $employee->id;
        $notice->reason = $request->reason;

        if ($latest_notice && $latest_notice->notice == 1) {
            $notice->notice = 2;
            $notice->notice_text = 'اخطاریه';
        } elseif ($latest_notice && $latest_notice->notice == 2) {
            $notice->notice = 3;
            $notice->notice_text = 'اخطاریه کتبی';
        } elseif ($latest_notice && $latest_notice->notice == 3) {
            $notice->notice = 4;
            $notice->notice_text = 'منفک';
        } else {
            $notice->notice = 1;
            $notice->notice_text = 'توصیه';
        }
        $notice->save();

        //  Has File && Save Notice Image
        if ($request->hasFile('notice_file')) {
            $doc = $request->file('notice_file');
            $fileName = 'employee-notice-' . time() . rand(111, 99999) . '.' . $doc->getClientOriginalExtension();
            $notice->storeImage($doc->storeAs('employees/files', $fileName, 'public'));
        }

        /**
         * If employee fires
         */
        if ($notice->notice == 4) {
            $employee->update([
                'position_id'   => null,
                'hostel_id'     => null,
                'ps_code_id'    => null,
                'on_duty'       => 0,
                'start_duty'    => null,
                'duty_doc_number'   => null,
                'duty_doc_date'     => null,
                'duty_position'     => null,
                'status'            => 2,
                'info'              => 'به علت ' . $notice->reason . ' منفک گردیده است.'
            ]);

            return redirect()->back()->with([
                'message'   => 'کارمند منفک گردید!',
                'alertType' => 'danger'
            ]);
        }

        return redirect()->back()->with([
            'message'   => 'هشدار ثبت شد!',
            'alertType' => 'danger'
        ]);
    }

    // New File
    public function new_file(Request $request, $id)
    {
        // Employee
        $employee = Employee::find($id);

        if ($request->hasFile('file')) {
            // File
            $item = $request->file('file');
            foreach ($item as $i) {
                // New Document
                $file = new File();
                $fileName = 'emp-file-' . time() . rand(111, 99999) . '.' . $i->getClientOriginalExtension();
                $i->storeAs('employees/files', $fileName, 'public');
                $file->path   = $fileName;
                $employee->files()->save($file);
            }
        }

        return redirect()->back()->with([
            'message'   => 'سند موفقانه ثبت گردید.',
            'alertType' => 'success'
        ]);
    }

    // Delete File
    public function delete_file($id)
    {
        $file = File::find($id);
        if (file_exists(storage_path('app/public/employees/files/' . $file->path))) {
            unlink(storage_path('app/public/employees/files/' . $file->path));
        }
        $file->delete();
        return redirect()->back()->with([
            'message'   => 'سند موفقانه حذف گردید.',
            'alertType' => 'success'
        ]);
    }
}
