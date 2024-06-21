<?php

namespace App\Http\Controllers\Admin\Office;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Office\Employee;
use App\Models\Office\Resume;
use Illuminate\Http\Request;
use Morilog\Jalali\CalendarUtils;
use Morilog\Jalali\Jalalian;

class ResumeController extends Controller
{
    // Index
    public function index($id)
    {
        $employee = Employee::find($id);

        $age = Jalalian::now()->getYear() - $employee->birth_year;

        return view('admin.office.employees.resumes', compact('employee', 'age'));
    }

    // Add Duty Position
    public function add_duty_position($id)
    {
        $employee = Employee::find($id);

        return view('admin.office.employees.entry.add_duty_position', compact('employee'));
    }

    // Add Duty Position POST Method
    public function add_duty_pos(Request $request, $id)
    {
        $employee = Employee::find($id);

        $request->validate([
            'position'  => 'required',
            'start_date'    => 'required',
            'doc_number'    => 'required',
            'doc_date'      => 'required'
        ]);

        $emp_resume = Resume::where('employee_id', $employee->id)->latest()->first();
        if ($emp_resume) {
            $emp_resume->update(['end_date' => CalendarUtils::strftime('Y-m-d', strtotime(now()))]);
        }

        // Save Record to Experiences Table
        $resume = new Resume();
        $resume->employee_id    = $employee->id;
        $resume->position       = $request->position;
        $resume->position_type  = 1;
        $resume->start_date     = $request->start_date;
        $resume->doc_number     = $request->doc_number;
        $resume->doc_date       = $request->doc_date;
        $resume->info           = $request->info;
        $resume->save();

        //  Has File && Save Avatar Image
        if ($request->hasFile('photo')) {
            $avatar = $request->file('photo');
            $fileName = 'emp-resume-doc-' . time() . '.' . $avatar->getClientOriginalExtension();
            $resume->storeImage($avatar->storeAs('employees/resumes', $fileName, 'public'));
        }

        // Update Duty Position Table
        $employee->update([
            'on_duty'           => 1,
            'start_duty'        => $request->start_date,
            'duty_doc_number'   => $request->doc_number,
            'duty_doc_date'     => $request->doc_date,
            'duty_position'     => $request->position
        ]);

        if ($request->hasFile('photo')) {
            // File
            $file = $request->file('photo');
            // New Document
            $document = new File();
            $fileName = 'emp-document-' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('employees/docs', $fileName, 'public');
            $document->path   = $fileName;
            $employee->files()->save($document);
        }

        return redirect()->route('admin.office.employees.resumes', $employee->id)->with([
            'message'   => 'کارمند هذا طور خدمتی مقرر گردید.',
            'alertType' => 'success'
        ]);
    }

    // Change to Main Position
    public function change_to_main_position($id)
    {
        $employee = Employee::find($id);

        if ($employee->on_duty == 0) {
            return back()->with([
                'message'   => 'کارمند در اصل بست میباشد.',
                'alertType' => 'warning'
            ]);
        }

        return view('admin.office.employees.entry.change_to_main_position', compact('employee'));
    }

    // Change to Main Position POST Method
    public function change_to_main_pos(Request $request, $id)
    {
        $employee = Employee::find($id);

        $request->validate([
            'start_date'    => 'required',
            'doc_number'    => 'required',
            'doc_date'      => 'required'
        ]);

        $emp_resume = Resume::where('employee_id', $employee->id)->latest()->first();
        if ($emp_resume) {
            $emp_resume->update(['end_date' => CalendarUtils::strftime('Y-m-d', strtotime(now()))]);
        }

        // Save Record to Experiences Table
        $resume = new Resume();
        $resume->employee_id    = $employee->id;
        $resume->position       = $employee->position->title;
        $resume->position_type  = 0;
        $resume->start_date     = $request->start_date;
        $resume->doc_number     = $request->doc_number;
        $resume->doc_date       = $request->doc_date;
        $resume->info           = $request->info;
        $resume->save();

        //  Has File && Save Avatar Image
        if ($request->hasFile('photo')) {
            $avatar = $request->file('photo');
            $fileName = 'emp-resume-doc-' . time() . '.' . $avatar->getClientOriginalExtension();
            $resume->storeImage($avatar->storeAs('employees/resumes', $fileName, 'public'));
        }

        // Update Duty Position Table
        $employee->update([
            'on_duty'           => 0,
            'start_duty'        => null,
            'duty_doc_number'   => null,
            'duty_doc_date'     => null,
            'duty_position'     => null
        ]);

        if ($request->hasFile('photo')) {
            // File
            $file = $request->file('photo');
            // New Document
            $document = new File();
            $fileName = 'emp-document-' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('employees/docs', $fileName, 'public');
            $document->path   = $fileName;
            $employee->files()->save($document);
        }

        return redirect()->route('admin.office.employees.resumes', $employee->id)->with([
            'message'   => 'کارمند هذا به اصل بست مقرر گردید.',
            'alertType' => 'success'
        ]);
    }

    // Retire Position Page/Blade
    public function retire_position($id)
    {
        $employee = Employee::find($id);
        $age = Jalalian::now()->getYear() - $employee->birth_year;

        if ($age <= 64) {
            return redirect()->route('admin.office.employees.resumes', $employee->id)->with([
                'message'   => 'کارمند مورد نظر واجد شرایط تقاعدی نمی باشد.',
                'alertType' => 'secondary'
            ]);
        }

        return view('admin.office.employees.entry.retire_position', compact('employee'));
    }

    // Retire Employee POST Method
    public function retire_employee(Request $request, $id)
    {
        $employee = Employee::find($id);

        $request->validate([
            'doc_number'    => 'required',
            'doc_date'      => 'required'
        ]);

        $emp_resume = Resume::where('employee_id', $employee->id)->latest()->first();
        if ($emp_resume) {
            $emp_resume->update(['end_date' => CalendarUtils::strftime('Y-m-d', strtotime(now()))]);
        }

        // Save Record to Experiences Table
        $resume = new Resume();
        $resume->employee_id    = $employee->id;
        $resume->position       = $employee->position->title;
        $resume->position_type  = 0;
        $resume->start_date     = $request->doc_date;
        // $resume->end_date       = $request->start_date;
        $resume->doc_number     = $request->doc_number;
        $resume->doc_date       = $request->doc_date;
        $resume->info           = $request->info;
        $resume->save();

        //  Has File && Save Avatar Image
        if ($request->hasFile('photo')) {
            $avatar = $request->file('photo');
            $fileName = 'emp-resume-doc-' . time() . '.' . $avatar->getClientOriginalExtension();
            $resume->storeImage($avatar->storeAs('employees/resumes', $fileName, 'public'));
        }

        // Update Duty Position Table
        $employee->update([
            'position_id'       => null,
            'hostel_id'         => null,
            'ps_code_id'        => null,
            'on_duty'           => 0,
            'start_duty'        => null,
            'duty_doc_number'   => null,
            'duty_doc_date'     => null,
            'duty_position'     => null,
            'status'            => 1
        ]);

        if ($request->hasFile('photo')) {
            // File
            $file = $request->file('photo');
            // New Document
            $document = new File();
            $fileName = 'emp-document-' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('employees/docs', $fileName, 'public');
            $document->path   = $fileName;
            $employee->documents()->save($document);
        }

        return redirect()->route('admin.office.employees.resumes', $employee->id)->with([
            'message'   => 'کارمند هذا تقاعد نمود.',
            'alertType' => 'success'
        ]);
    }

    // Position Conversion
    public function position_conversion($id)
    {
        $employee = Employee::find($id);

        return view('admin.office.employees.entry.position_conversion', compact('employee'));
    }

    // Position Conversion POST Method
    public function position_convert(Request $request, $id)
    {
        $employee = Employee::find($id);

        $request->validate([
            'start_date'    => 'required',
            'doc_number'    => 'required',
            'doc_date'      => 'required'
        ]);

        $emp_resume = Resume::where('employee_id', $employee->id)->latest()->first();
        if ($emp_resume) {
            $emp_resume->update(['end_date' => CalendarUtils::strftime('Y-m-d', strtotime(now()))]);
        }

        // Save Record to Experiences Table
        $resume = new Resume();
        $resume->employee_id    = $employee->id;
        $resume->position       = $request->position;
        $resume->position_type  = 0;
        $resume->start_date     = $request->start_date;
        // $resume->end_date       = $request->start_date;
        $resume->doc_number     = $request->doc_number;
        $resume->doc_date       = $request->doc_date;
        $resume->info           = $request->info;
        $resume->save();

        //  Has File && Save Avatar Image
        if ($request->hasFile('photo')) {
            $avatar = $request->file('photo');
            $fileName = 'emp-resume-doc-' . time() . '.' . $avatar->getClientOriginalExtension();
            $resume->storeImage($avatar->storeAs('employees/resumes', $fileName, 'public'));
        }

        // Update Duty Position Table
        $employee->update([
            'position_id'       => null,
            'hostel_id'         => null,
            'ps_code_id'        => null,
            'on_duty'           => 0,
            'start_duty'        => null,
            'duty_doc_number'   => null,
            'duty_doc_date'     => null,
            'duty_position'     => null,
            'status'            => 3
        ]);

        if ($request->hasFile('photo')) {
            // File
            $file = $request->file('photo');
            // New Document
            $document = new File();
            $fileName = 'emp-document-' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('employees/docs', $fileName, 'public');
            $document->path   = $fileName;
            $employee->documents()->save($document);
        }

        return redirect()->route('admin.office.employees.resumes', $employee->id)->with([
            'message'   => 'کارمند هذا به اداره/ارگان دیگر تبدیل گردید.',
            'alertType' => 'success'
        ]);
    }
}
