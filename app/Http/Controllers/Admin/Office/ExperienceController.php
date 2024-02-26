<?php

namespace App\Http\Controllers\Admin\Office;

use App\Http\Controllers\Controller;
use App\Models\Office\Employee;
use App\Models\Office\Experience;
use Illuminate\Http\Request;
use Morilog\Jalali\CalendarUtils;

class ExperienceController extends Controller
{
    // Index
    public function index($id)
    {
        $employee = Employee::find($id);

        return view('admin.office.employees.experiences', compact('employee'));
    }

    // Add Duty Position
    public function add_duty_position($id)
    {
        $employee = Employee::find($id);

        return view('admin.office.employees.add_duty_position', compact('employee'));
    }

    // Add Duty Position POST Method
    public function add_duty_pos(Request $request, $id)
    {
        $employee = Employee::find($id);

        $request->validate([
            'position'  => 'required',
            'start_date'    => 'required',
            'doc_number'    => 'required'
        ]);

        // Save Record to Experiences Table
        $experience = new Experience();
        $experience->employee_id    = $employee->id;
        $experience->position       = $request->position;
        $experience->position_type  = 1;
        $experience->start_date     = $request->start_date;
        $experience->doc_number     = $request->doc_number;
        if ($request->hasFile('document')) {
            $document = $request->file('document');
            $fileName = 'duty-document-' . time() . '.' . $document->getClientOriginalExtension();
            $document->storeAs('employees/documents', $fileName, 'public');
            $experience->document   = $fileName;
        }
        $experience->info       = $request->info;
        $experience->save();

        // Update Duty Position Table
        $employee->update([
            'on_duty'           => 1,
            'start_duty'        => $request->start_date,
            'duty_doc_number'   => $request->doc_number,
            'duty_position'     => $request->position,
            'status'            => 1
        ]);

        return redirect()->route('admin.office.employees.experiences', $employee->id)->with([
            'message'   => 'معلومات بست خدمتی موفقانه ذخیره گردید.',
            'alertType' => 'success'
        ]);
    }

    // Add Duty Position
    public function change_to_main_position($id)
    {
        $employee = Employee::find($id);

        return view('admin.office.employees.change_to_main_position', compact('employee'));
    }

    // Change to Main Position POST Method
    public function change_to_main_pos(Request $request, $id)
    {
        $employee = Employee::find($id);

        if ($employee->on_duty == 0) {
            return redirect()->back()->with([
                'message'   => 'کارمند در بست اصل بست بوده و عملیه تبدیل انجام نمیگردد.',
                'alertType' => 'danger'
            ]);
        }
        $request->validate([
            'start_date'    => 'required',
            'doc_number'    => 'required'
        ]);

        // Change date and time
        $start_date_miladi = CalendarUtils::createCarbonFromFormat('Y/m/d', $request->start_date);
        $start_date_subDays = $start_date_miladi->subDays(1);
        $end_date = CalendarUtils::strftime('Y/m/d', strtotime($start_date_subDays));

        // Last Experience Update
        $last_exp = Experience::latest()->first();
        $last_exp->update([
            'end_date'  => $end_date
        ]);

        // Save Record to Experiences Table
        $experience = new Experience();
        $experience->employee_id    = $employee->id;
        $experience->position       = $employee->position->title;
        $experience->position_type  = 0;
        $experience->start_date     = $request->start_date;
        $experience->doc_number     = $request->doc_number;
        if ($request->hasFile('document')) {
            $document = $request->file('document');
            $fileName = 'duty-document-' . time() . '.' . $document->getClientOriginalExtension();
            $document->storeAs('employees/documents', $fileName, 'public');
            $experience->document   = $fileName;
        }
        $experience->info       = $request->info;
        $experience->save();

        // Update Duty Position Table
        $employee->update([
            'on_duty'       => 0,
            'start_duty'    => null,
            'duty_doc_number'   => null,
            'duty_position' => null,
            'status'        => 0
        ]);

        return redirect()->route('admin.office.employees.experiences', $employee->id)->with([
            'message'   => 'کارمند به اصل بست خویش تبدیل گردید.',
            'alertType' => 'success'
        ]);
    }
}
