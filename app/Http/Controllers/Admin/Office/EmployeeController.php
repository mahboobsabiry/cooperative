<?php

namespace App\Http\Controllers\Admin\Office;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Office\Employee;
use App\Models\Office\Hostel;
use App\Models\Office\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Morilog\Jalali\CalendarUtils;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:employee_mgmt', [
            'only' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy',
                'updateEmployeeStatus', 'main_employees', 'on_duty_employees',
                'add_background', 'duty_position', 'reset_position']
        ]);
    }

    // Index
    public function index()
    {
        $employees = Employee::whereNotNull('position_id')->where('status', 1)->orderBy('created_at', 'ASC')->get();

        return view('admin.office.employees.index', compact('employees'));
    }

    public function create()
    {
        $positions = Position::tree();
        $hostels = Hostel::all();
        return view('admin.office.employees.create', compact('positions', 'hostels'));
    }

    // Store Record
    public function store(StoreEmployeeRequest $request)
    {
        $position = Position::where('id', $request->position_id)->first();
        if (!empty($position->employees) && $position->employees()->count() >= $position->num_of_pos) {
            return back()->with([
                'alertType' => 'danger',
                'message'   => 'بست مورد نظر تکمیل میباشد.'
            ]);
        }
        $hostel = Hostel::where('id', $request->hostel_id)->first();
        if (!empty($hostel->employees) && $hostel->employees()->count() > 5) {
            return back()->with([
                'alertType' => 'danger',
                'message'   => 'اتاق مورد نظر گنجایش ندارد.'
            ]);
        }
        $employee = new Employee();
        $employee->position_id  = $request->position_id;
        $employee->hostel_id    = $request->hostel_id;
        $employee->start_job    = $request->start_job;
        $employee->position_code = $request->position_code;
        $employee->name         = $request->name;
        $employee->last_name    = $request->last_name;
        $employee->father_name  = $request->father_name;
        $employee->gender       = $request->gender;
        $employee->emp_number   = $request->emp_number;
        $employee->appointment_number   = $request->appointment_number;
        $employee->appointment_date     = $request->appointment_date;
        $employee->last_duty        = $request->last_duty;

        $employee->birth_year       = $request->birth_year;
        $employee->education        = $request->education;
        $employee->prr_npr          = $request->prr_npr;
        $employee->prr_date         = $request->prr_date;
        $employee->phone            = $request->phone;
        $employee->phone2           = $request->phone2;
        $employee->email            = $request->email;
        $employee->main_province    = $request->main_province;
        $employee->main_district    = $request->main_district;
        $employee->current_province = $request->current_province;
        $employee->current_district = $request->current_district;
        $employee->introducer       = $request->introducer;
        $employee->info             = $request->info;
        $employee->save();

        //  Has File && Save Avatar Image
        if ($request->hasFile('photo')) {
            $avatar = $request->file('photo');
            $fileName = 'employee-' . time() . '.' . $avatar->getClientOriginalExtension();
            $employee->storeImage($avatar->storeAs('employees', $fileName, 'public'));
        }

        //  Has Files && Save Document Images
        if ($request->hasFile('document')) {
            foreach ($request->file('document') as $item) {
                $fileName = 'employee_document-' . time() . '.' . $item->getClientOriginalExtension();
                $employee->storeDocument($item->storeAs('employees', $fileName, 'public'));
            }
        }

        activity('added')
            ->causedBy(Auth::user())
            ->performedOn($employee)
            ->log(trans('messages.employees.addNewEmployeeMsg'));

        $message = trans('messages.employees.addNewEmployeeMsg');
        return redirect()->route('admin.office.employees.show', $employee->id)->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }

    // Show Info
    public function show(Employee $employee)
    {
        $admin = Auth::user()->roles->first()->name == 'Admin';
        $active_employees = Employee::where('status', 1)->whereNotNull('position_id')->where('position_id', '!=', $employee->position_id)->get();
        return view('admin.office.employees.show', compact('employee', 'admin', 'active_employees'));
    }

    // Edit Info
    public function edit(Employee $employee)
    {
        if ($employee->status == 1 || $employee->status == 3) {
            $positions = Position::tree();
            $hostels = Hostel::all();
            return view('admin.office.employees.edit', compact('employee', 'positions', 'hostels'));
        } else {
            return  redirect()->back()->with([
                'message'   => 'شما اجازه ویرایش این کاربر را ندارید.',
                'alertType' => 'danger'
            ]);
        }
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'photo'         => 'nullable|image|mimes:jpg,png,jfif',
            // 'document'      => 'nullable|mimes:jpg,png,jfif',
            'start_job'     => 'required',
            'name'          => 'required|min:3|max:64',
            'last_name'     => 'nullable|min:3|max:64',
            'father_name'   => 'required|min:3|max:64',
            'emp_number'    => 'nullable|unique:employees,emp_number,' . $employee->id,
            'appointment_number'    => 'required',
            'appointment_date'      => 'nullable',
            'last_duty'     => 'nullable',
            'birth_year'    => 'required',
            'education'     => 'nullable',
            'prr_npr'       => 'required',
            'prr_date'      => 'nullable',
            'phone'         => 'nullable|unique:employees,phone,' . $employee->id,
            'phone2'        => 'nullable',
            'email'         => 'nullable|unique:employees,email,' . $employee->id,
            'main_province'     => 'required|min:3|max:64',
            'main_district'     => 'required|min:3|max:64',
            'current_province'  => 'required|min:3|max:64',
            'current_district'  => 'required|min:3|max:64',
            'introducer'        => 'nullable|min:3|max:64',
            'info'              => 'nullable',
        ]);

        $position = Position::where('id', $request->position_id)->first();
        if (!empty($position->employees) && $position->employees()->count() > $position->num_of_pos) {
            return back()->with([
                'alertType' => 'danger',
                'message'   => 'بست مورد نظر تکمیل میباشد.'
            ]);
        }

        $hostel = Hostel::where('id', $request->hostel_id)->first();
        if (!empty($hostel->employees) && $hostel->employees()->count() > 5) {
            return back()->with([
                'alertType' => 'danger',
                'message'   => 'اتاق مورد نظر گنجایش ندارد.'
            ]);
        }

        $pos_id = $employee->position_id;

        $employee->hostel_id    = $request->hostel_id;
        $employee->start_job    = $request->start_job;
        $employee->name         = $request->name;
        $employee->last_name    = $request->last_name;
        $employee->father_name  = $request->father_name;
        $employee->gender       = $request->gender;
        $employee->emp_number   = $request->emp_number;
        $employee->appointment_number    = $request->appointment_number;
        $employee->appointment_date      = $request->appointment_date;
        $employee->last_duty        = $request->last_duty;

        $employee->birth_year       = $request->birth_year;
        $employee->education        = $request->education;
        $employee->prr_npr          = $request->prr_npr;
        $employee->prr_date         = $request->prr_date;
        $employee->phone            = $request->phone;
        $employee->phone2           = $request->phone2;
        $employee->email            = $request->email;
        $employee->main_province    = $request->main_province;
        $employee->main_district    = $request->main_district;
        $employee->current_province = $request->current_province;
        $employee->current_district = $request->current_district;
        $employee->introducer       = $request->introducer;
        $employee->info             = $request->info;
        // If the employee is suspended
        if ($request->position_id != '' && $employee->status == 3) {
            $status = 1;
        } else {
            $status = $employee->status;
        }
        $employee->status = $status;
        // If the position is empty, update the background
        if ($pos_id == null && $request->position_id != '') {
            $employee->background = $employee->background . ' از تاریخ ' . CalendarUtils::strftime('Y-m-d', strtotime(now())) . ' نظر به مکتوب نمبر ' . $request->doc_number . ' در بست ' . $position->title . "<br> ایفای وظیفه نمود.";
        }
        $employee->save();

        //  Has Photo
        if ($request->hasFile('photo')) {
            $avatar = $request->file('photo');
            $fileName = 'employee-' . time() . '.' . $avatar->getClientOriginalExtension();
            $employee->updateImage($avatar->storeAs('employees', $fileName, 'public'));
        }

        //  Has Files && Save Document Images
        if ($request->hasFile('document')) {
            foreach ($request->file('document') as $item) {
                $fileName = 'employee_document-' . time() . '.' . $item->getClientOriginalExtension();
                $employee->storeDocument($item->storeAs('employees', $fileName, 'public'));
            }
        }

        activity('updated')
            ->causedBy(Auth::user())
            ->log(trans('messages.employees.updateEmployeeMsg'));

        $message = trans('messages.employees.updateEmployeeMsg');

        return redirect()->route('admin.office.employees.show', $employee->id)->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }

    // Delete Employee
    public function destroy(Employee $employee)
    {
        $employee->delete();

        activity('deleted')
            ->causedBy(Auth::user())
            ->performedOn($employee)
            ->log(trans('messages.employees.deleteEmployeeMsg'));

        $message = trans('messages.employees.deleteEmployeeMsg');

        return redirect()->route('admin.office.employees.index')->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
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
            Employee::where('id', $data['employee_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'employee_id' => $data['employee_id']]);
        }
    }

    // Main Position Employees
    public function main_employees()
    {
        $employees = Employee::where('status', 1)->whereNotNull('position_id')->where('on_duty', 0)->orderBy('created_at', 'desc')->get();

        return view('admin.office.employees.main', compact('employees'));
    }

    // On Duty Employees
    public function on_duty_employees()
    {
        $employees = Employee::where('status', 1)->whereNotNull('position_id')->where('on_duty', 1)->orderBy('created_at', 'desc')->get();

        return view('admin.office.employees.on_duty', compact('employees'));
    }

    // Add Employee Background
    public function add_background(Request $request, $id)
    {
        $request->validate([
            'from_date'     => 'required',
            'to_date'       => 'required',
            'doc_number'    => 'required',
            'doc_date'      => 'required',
            'bg_position'   => 'required',
        ]);

        $employee = Employee::find($id);

        if (!empty($employee->background)) {
            $employee->update([
                'background' => $employee->background . 'از تاریخ ' . $request->from_date . ' الی تاریخ ' . $request->to_date . ' قرار مکتوب نمبر ' . $request->doc_number . ' مورخ ' . $request->doc_date . ' در بست ' . $request->bg_position . " استحصال وظیفه گردید.<br>"
            ]);
        } else {
            $employee->update([
                'background' => 'از تاریخ ' . $request->from_date . ' الی تاریخ ' . $request->to_date . ' قرار مکتوب نمبر ' . $request->doc_number . ' مورخ ' . $request->doc_date . ' در بست ' . $request->bg_position . " استحصال وظیفه گردید.<br>"
            ]);
        }

        return back()->with([
            'message'   => 'موفقانه ثبت شد!',
            'alertType' => 'success'
        ]);
    }

    // Add Duty Position
    public function duty_position(Request $request, $id)
    {
        // Validate Form
        $request->validate([
            'start_duty'    => 'required',
            'duty_doc_number' => 'required',
            'duty_position' => 'required',
        ]);

        // Get the employee
        $employee = Employee::find($id);
        // Update duty position
        $employee->update([
            'on_duty'   => 1,
            'start_duty'        => $request->start_duty,
            'duty_doc_number'   => $request->duty_doc_number,
            'duty_position'     => $request->duty_position,
            'background'        => $employee->background . ' از تاریخ ' . $request->start_duty . ' نظر به مکتوب نمبر ' . $request->duty_doc_number . ' در بست ' . $request->duty_position .  " طور خدمتی ایفای وظیفه نمود.<br>"
        ]);

        //  Has Files && Save Document Images
        if ($request->hasFile('document')) {
            $item = $request->file('document');
            $fileName = 'employee_document-' . time() . '.' . $item->getClientOriginalExtension();
            $employee->storeDocument($item->storeAs('employees', $fileName, 'public'));
        }

        // Redirect back with success message
        return back()->with([
            'message'   => 'ثبت شد',
            'alertType' => 'success'
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
}