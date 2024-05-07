<?php

namespace App\Http\Controllers\Admin\Office;

use App\Http\Controllers\Controller;
use App\Models\Office\Employee;
use App\Models\Office\Leave;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $employee = Employee::find($id);
        return view('admin.office.employees.leaves.index', compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $employee = Employee::find($id);
        return view('admin.office.employees.leaves.create', compact('employee'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'start_date'    => 'required',
            'end_date'      => 'required',
            'leave_type'    => 'required',
            'reason'        => 'nullable'
        ]);

        $employee = Employee::find($id);

        // Working on dates
        $start_date = Jalalian::fromFormat('Y/m/d', $request->start_date)->toCarbon();
        $end_date = Jalalian::fromFormat('Y/m/d', $request->end_date)->toCarbon();
        $emp_leaves = Leave::where('employee_id', $employee->id)->where('year', Jalalian::fromFormat('Y/m/d', $request->start_date)->getYear())->get();
        $leave_year_days = $emp_leaves->sum('days');

        // Previous Year
        $prev_year = Jalalian::now()->subYears(1)->getYear();
        $emp_prev_leaves = Leave::where('employee_id', $employee->id)->where('year', $prev_year)->get();
        $prev_year_days = $emp_prev_leaves->sum('days');
        if ($prev_year_days < 50) {
            $prev_year_remaining_days = 50 - $prev_year_days;
            if ($leave_year_days > 50 + $prev_year_remaining_days) {
                return redirect()->back()->with([
                    'message'   => 'کارمند در طول یک سال بیشتر از ۵۰ روز نمیتواند رخصتی اخذ نماید.',
                    'alertType' => 'danger'
                ]);
            }
        } elseif ($prev_year_days > 50) {
            $prev_year_remaining_days = $prev_year_days - 50;
            if ($leave_year_days > 50 - $prev_year_remaining_days) {
                return redirect()->back()->with([
                    'message'   => 'کارمند در طول یک سال بیشتر از ۵۰ روز نمیتواند رخصتی اخذ نماید.',
                    'alertType' => 'danger'
                ]);
            }
        } else {
            $prev_year_remaining_days = 0;
            if ($leave_year_days > 50 + $prev_year_remaining_days) {
                return redirect()->back()->with([
                    'message'   => 'کارمند در طول یک سال بیشتر از ۵۰ روز نمیتواند رخصتی اخذ نماید.',
                    'alertType' => 'danger'
                ]);
            }
        }
        // Reject saving

        $leave = new Leave();
        $leave->employee_id = $employee->id;
        $leave->year = Jalalian::now()->getYear();
        $leave->start_date = $request->start_date;
        $leave->end_date = $request->end_date;
        // Days
        $days = $start_date->diffInDays($end_date);
        $leave->days = $days;
        $leave->reason = $request->reason;
        $leave->save();

        return redirect()->route('admin.office.employees.leaves.index', $employee->id)->with([
            'message'   => 'رخصتی موفقانه ثبت شد',
            'alertType' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
