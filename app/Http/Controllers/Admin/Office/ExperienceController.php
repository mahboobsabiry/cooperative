<?php

namespace App\Http\Controllers\Admin\Office;

use App\Http\Controllers\Controller;
use App\Models\Office\Employee;
use App\Models\Office\Experience;
use App\Models\Office\Position;
use Illuminate\Http\Request;

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
            'on_duty'   => 1,
            'start_duty'    => $request->start_date,
            'duty_doc_number'   => $request->doc_number,
            'duty_position' => $request->position
        ]);

        return redirect()->route('admin.office.employees.experiences', $employee->id)->with([
            'message'   => 'معلومات بست خدمتی موفقانه ذخیره گردید.',
            'alertType' => 'success'
        ]);
    }
}
