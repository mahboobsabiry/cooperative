<?php

namespace App\Http\Controllers\Admin\Office;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Office\Employee;
use App\Models\Office\Experience;
use App\Models\Office\Position;
use Illuminate\Http\Request;
use Morilog\Jalali\CalendarUtils;
use Morilog\Jalali\Jalalian;

class EmployeeHelperController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:office_employee_create', ['only' => ['add_background']]);
        $this->middleware('permission:office_employee_edit', ['only' => ['updateEmployeeStatus','duty_position', 'reset_position', 'change_position_ocustom', 'in_return', 'duc_position', 'fire_employee', 'retire_employee']]);
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

    // Retire Employee
    public function retire_employee($id)
    {
        $employee = Employee::find($id);

        $get_year = Jalalian::now()->getYear() - $employee->birth_year;

        if ($get_year >= 65) {
            // Add To HIS/HER background - experiences
            $last_exp = $employee->experiences()->latest()->first();
            $last_exp->update(['end_date' => CalendarUtils::strftime('Y-m-d', strtotime(now()))]);

            // Update Employee Information/Deactivate his/her activity
            $employee->update([
                'position_id'   => null,
                'hostel_id'     => null,
                'position_code' => null,
                'status'        => 2,
                'on_duty'       => 0,
                'duty_position' => null,
                'duty_doc_number'   => null,
                'start_duty'    => null,
                'info'          => 'بعد از خدمات بی نظیر و قابل ستایش، بازنشسته شد.'
            ]);

            // Deactivate BCD-MIS User Status
            if ($employee->user) {
                $employee->user->update(['status' => 0]);
            }

            // Deactivate Asycuda User Status
            if ($employee->asycuda_user) {
                $employee->asycuda_user->update(['status' => 0]);
            }

            return redirect()->back()->with([
                'message'   => 'کارمند متذکره تقاعد نمود.',
                'alertType' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'message'   => 'کارمند واجد شرایط تقاعدی نمی باشد.',
                'alertType' => 'danger'
            ]);
        }
    }

    // Fire Employee
    public function fire_employee(Request $request, $id)
    {
        $request->validate([
            'info'  => 'required'
        ]);
        $employee = Employee::find($id);

        // Deactivate BCD-MIS user
        if ($employee->user) {
            $employee->user->update(['status', 0]);
        }

        // Deactivate Asycuda user
        if ($employee->asycuda_user) {
            $employee->asycuda_user->update(['status', 0]);
        }

        // Update Experiences
        $last_exp = $employee->experiences()->latest()->first();
        $last_exp->update(['end_date' => CalendarUtils::strftime('Y-m-d', strtotime(now()))]);

        // Fire Employee
        $employee->update([
            'position_id'   => null,
            'hostel_id'     => null,
            'position_code' => null,
            'status'        => 3,
            'info'          => $request->info,
            'on_duty'       => 0,
            'duty_position' => null,
            'start_duty'    => null,
            'duty_doc_number'   => null
        ]);
        return redirect()->back()->with([
            'message'   => 'کارمند منفک گردید!',
            'alertType' => 'danger'
        ]);
    }

    // Reset Position
    public function reset_position($id)
    {
        $employee = Employee::find($id);
        $employee->update([
            'background'        => $employee->background . 'از تاریخ ' . $employee->start_duty . ' الی تاریخ ' . CalendarUtils::strftime('Y-m-d', strtotime(now())) . ' نظر به مکتوب نمبر ' . $employee->duty_doc_number . ' مورخ ' . CalendarUtils::strftime('Y-m-d', strtotime(now())) . ' در بست ' . $employee->duty_position . " استحصال وظیفه گردید.<br>",
            'on_duty'           => 0,
            'start_duty'        => null,
            'duty_doc_number'   => null,
            'duty_position'     => null
        ]);
        return back()->with([
            'message'   => 'کارمند به اصل بست تبدیل گردید.',
            'alertType' => 'success'
        ]);
    }

    public function change_position_ocustom(Request $request, $id)
    {
        $employee = Employee::find($id);

        if ($employee->on_duty == 0) {
            $duty_position = ' الی تاریخ ' . CalendarUtils::strftime('Y-m-d', strtotime(now())) . ' منحیث ' . $employee->position->title . ' ' . $employee->position_code . ' در بست ' . $employee->position->position_number . ' ایفای وظیفه نمود. <br>';
        } else {
            $duty_position = ' الی تاریخ ' . CalendarUtils::strftime('Y-m-d', strtotime(now())) . ' منحیث ' . $employee->_duty_position . ' ایفای وظیفه نمود. <br>';
        }

        $employee->update([
            'background'    => $employee->background . $duty_position . 'از تاریخ ' . CalendarUtils::strftime('Y-m-d', strtotime(now())) . ' نظر به مکتوب نمبر ' . $request->doc_number . ' مورخ ' . $request->doc_date . ' از بست ' . $employee->position->title . ' ' . $employee->position_code . ' به بست ' . $request->bg_position . ' اداره ' . $request->cus_org . ' تغییر بست نمود.',
            'position_id'   => null,
            'hostel_id'     => null,
            'position_code' => null,
            'on_duty'       => 0,
            'start_duty'    => null,
            'duty_doc_number' => null,
            'duty_position' => null,
            'status' => 0
        ]);

        return redirect()->back()->with([
            'message'   => 'بست کارمند متذکره به گمرک و یا ارگان دیگر تغییر کرد.',
            'alertType' => 'warning'
        ]);
    }

    // Change Position In Return
    public function in_return(Request $request, $id)
    {
        $employee = Employee::find($id);
        $req_emp = Employee::where('position_id', $request->position_id)->first();
        $emp_position_id        = $employee->position_id;
        $emp_position_code      = $employee->position_code;
        $emp_name               = $employee->name;
        $emp_position_title     = $employee->position->title;
        $req_emp_position_id    = $req_emp->position_id;
        $req_emp_position_code  = $req_emp->position_code;
        $req_emp_name           = $req_emp->name;
        $req_emp_position_title = $req_emp->position->title;

        // Change The Employee Number
        if ($employee->on_duty == 0) {
            $req_emp->update([
                'position_id'   => null,
                'position_code' => null
            ]);
            $employee->update([
                'position_id'   => $req_emp_position_id,
                'position_code' => $req_emp_position_code,
                'background'    => $employee->background . 'از تاریخ ' . CalendarUtils::strftime('Y-m-d', strtotime(now())) . ' طور بالمعاوضه با ' . $req_emp_name . ' در بست ' . $req_emp_position_title . " ایفای وظیفه نمود.<br>"
            ]);

            $req_emp->update([
                'position_id'   => $emp_position_id,
                'position_code' => $emp_position_code,
                'background'    => $req_emp->background . 'از تاریخ ' . CalendarUtils::strftime('Y-m-d', strtotime(now())) . ' طور بالمعاوضه با ' . $emp_name . ' در بست ' . $emp_position_title . " ایفای وظیفه نمود.<br>"
            ]);
        } else {
            $req_emp->update([
                'position_id'   => null,
                'position_code' => null
            ]);
            $employee->update([
                'position_id'   => $req_emp_position_id,
                'position_code' => $req_emp_position_code,
                'background'    => $employee->background . 'از تاریخ ' . $employee->start_duty . ' الی تاریخ ' . now() . ' نظر به مکتوب نمبر ' . $employee->duty_doc_number. ' منحیث ' . $employee->duty_position . " ایفای وظیفه نمود.<br>" . 'از تاریخ ' . now() . ' طور بالمعاوضه با ' . $req_emp_name . ' در بست ' . $req_emp_position_title . " ایفای وظیفه نمود.<br>",
                'on_duty'       => 0,
                'start_duty'    => null,
                'duty_doc_number'   => null,
                'duty_position'     => null
            ]);
            $req_emp->update([
                'position_id'   => $emp_position_id,
                'position_code' => $emp_position_code,
                'background'    => $req_emp->background . 'از تاریخ ' . $req_emp->start_duty . ' الی تاریخ ' . CalendarUtils::strftime('Y-m-d', strtotime(now())) . ' نظر به مکتوب نمبر ' . $req_emp->duty_doc_number. ' منحیث ' . $req_emp->duty_position . " ایفای وظیفه نمود.<br>" . 'از تاریخ ' . CalendarUtils::strftime('Y-m-d', strtotime(now())) . ' طور بالمعاوضه با ' . $emp_name . ' در بست ' . $emp_position_title . " ایفای وظیفه نمود.<br>",
                'on_duty'       => 0,
                'start_duty'    => null,
                'duty_doc_number'   => null,
                'duty_position'     => null
            ]);
        }

        return back()->with([
            'message'   => 'بالمعاوضه موفقانه انجام شد!',
            'alertType' => 'success'
        ]);
    }

    // Discount/Upgrade/Discount Position
    public function duc_position(Request $request, $id)
    {
        $employee = Employee::find($id);
        $position = Position::where('id', $request->position_id)->first();
        $emp_posc = Employee::where('position_code', $request->position_code)->first();

        $request->validate([
            'position_id'   => 'required',
            'position_code' => 'required',
            'code'
        ]);

        if ($position->num_of_pos == 1) {
            if ($position->employees->count() == 1) {
                $emp_posc->update([
                    'position_id'   => null,
                    'position_code' => null,
                    'status'        => 3
                ]);
                if ($employee->on_duty == 0) {
                    $employee->update([
                        'position_id'   => $position->id,
                        'position_code' => $request->position_code,
                        'background'    => $employee->background . ' از تاریخ ' . CalendarUtils::strftime('Y-m-d', strtotime(now())) . ' به بست ' . $position->title . ' نظر به مکتوب نمبر ' . $request->doc_number . ' مورخ ' . CalendarUtils::strftime('Y-m-d', strtotime(now())) . " تغییر بست گردید.<br>"
                    ]);
                } else {
                    $employee->update([
                        'position_id'   => $position->id,
                        'position_code' => $request->position_code,
                        'background'    => $employee->background. ' الی تاریخ ' . CalendarUtils::strftime('Y-m-d', strtotime(now())). ' منحیث ' . $employee->duty_position. ' طور خدمتی ایفای وظیفه نموده و از تاریخ متذکره ' . ' به بست ' . $position->title . ' نظر به مکتوب نمبر ' . $request->doc_number . ' مورخ ' . CalendarUtils::strftime('Y-m-d', strtotime(now())) . " تغییر بست گردید.<br>",
                        'on_duty'   => 0,
                        'start_duty'    => null,
                        'duty_doc_number'   => null,
                        'duty_position'     => null
                    ]);
                }

                $message = 'موفقانه بست تبدیل گردید! لطفا به صفحه کارمند ' . "<a href=" . ' " ' . route("admin.employees.show", $emp_posc
->id) . ' ">' . $emp_posc->name . "</a>" . ' رفته و سرنوشت آن را تعیین نمایید.';
            } else {
                $employee->update([
                    'position_id'   => $position->id,
                    'position_code' => $request->position_code,
                    'background'    => $employee->background . ' از تاریخ ' . CalendarUtils::strftime('Y-m-d', strtotime(now())) . ' نظر به مکتوب نمبر ' . $request->doc_number . ' منحیث ' . $position->title . " ایفای وظیفه نمود.<br>"
                ]);
                $message = 'موفقانه تبدیل گردید';
            }
        } else {
            $emp_posc->update([
                'position_id'   => null,
                'position_code' => null,
                'status'        => 3
            ]);
            $employee->update([
                'position_id'   => $position->id,
                'position_code' => $request->position_code,
                'background'    => $employee->background . ' از تاریخ ' . CalendarUtils::strftime('Y-m-d', strtotime(now())) . ' نظر به مکتوب نمبر ' . $request->doc_number . ' منحیث ' . $position->title . " ایفای وظیفه نمود.<br>"
            ]);

            $message = 'موفقانه بست تبدیل گردید! لطفا به صفحه کارمند ' . "<a href=" . ' " ' . route("admin.employees.show", $emp_posc
                    ->id) . ' ">' . $emp_posc->name . "</a>" . ' رفته و سرنوشت آن را تعیین نمایید.';
        }

        return redirect()->back()->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }

    // New Document
    public function new_doc(Request $request, $id)
    {
        // Employee
        $employee = Employee::find($id);

        if ($request->hasFile('document')) {
            // File
            $file = $request->file('document');
            // New Document
            $document = new Document();
            $fileName = 'emp-document-' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('employees/docs', $fileName, 'public');
            $document->path   = $fileName;
            $employee->documents()->save($document);
        }

        return redirect()->back()->with([
            'message'   => 'سند موفقانه ثبت گردید.',
            'alertType' => 'success'
        ]);
    }

    // Delete Document
    public function delete_doc($id)
    {
        $document = Document::find($id);
        // dd(storage_path('app/public/employees/docs/' . $document->path));
        if (file_exists(storage_path('app/public/employees/docs/' . $document->path))) {
            unlink(storage_path('app/public/employees/docs/' . $document->path));
        }
        $document->delete();
        return redirect()->back()->with([
            'message'   => 'سند موفقانه حذف گردید.',
            'alertType' => 'success'
        ]);
    }
}
