<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Http\Request;
use Morilog\Jalali\CalendarUtils;

class EmpController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:employee_mgmt', [
            'only' => ['change_position_ocustom', 'change_position_employees']
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

    // Changed Position Employees List
    public function change_position_employees()
    {
        $employees = Employee::where('status', 0)->get();
        return view('admin.employees.change_position', compact('employees'));
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
            'position_code' => 'required|unique:employees,position_code,' . $employee->id,
            'code'
        ]);

        if ($position->num_of_pos == 1) {
            if ($position->employees->count() == 1) {
                $pos_emp = $position->employees->first();
                $pos_emp->update([
                    'position_id'   => null,
                    'position_code' => null
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
            } else {
                $employee->update([
                    'position_id'   => $position->id,
                    'position_code' => $request->position_code,
                    'background'    => $employee->background . ' از تاریخ ' . CalendarUtils::strftime('Y-m-d', strtotime(now())) . ' نظر به مکتوب نمبر ' . $request->doc_number . ' منحیث ' . $position->title . " ایفای وظیفه نمود.<br>"
                ]);
            }
        } else {
            if ($position->employees->count() < $position->num_of_pos) {
                $employee->update([
                    'position_id'   => $position->id,
                    'position_code' => $request->position_code,
                    'background'    => $employee->background . ' از تاریخ ' . CalendarUtils::strftime('Y-m-d', strtotime(now())) . ' نظر به مکتوب نمبر ' . $request->doc_number . ' منحیث ' . $position->title . " ایفای وظیفه نمود.<br>"
                ]);
            }elseif ($position->employees->count() == $position->num_of_pos) {
                $emp_posc->update([
                    'position_id'   => null,
                    'position_code' => null
                ]);
                $employee->update([
                    'position_id'   => $position->id,
                    'position_code' => $request->position_code,
                    'background'    => $employee->background . ' از تاریخ ' . CalendarUtils::strftime('Y-m-d', strtotime(now())) . ' نظر به مکتوب نمبر ' . $request->doc_number . ' منحیث ' . $position->title . " ایفای وظیفه نمود.<br>"
                ]);
            }
        }

        return redirect()->back()->with([
            'message'   => 'تبدیلی انجام شد!',
            'alertType' => 'success'
        ]);
    }

    // Fired Employees
    public function fired_employees()
    {
        return 'OK';
    }
}
