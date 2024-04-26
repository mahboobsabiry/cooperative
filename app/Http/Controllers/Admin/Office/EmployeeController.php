<?php

namespace App\Http\Controllers\Admin\Office;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Document;
use App\Models\Office\Employee;
use App\Models\Office\Hostel;
use App\Models\Office\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Morilog\Jalali\CalendarUtils;
use Morilog\Jalali\Jalalian;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:office_employee_view', ['only' => ['index', 'show', 'main_employees', 'on_duty_employees', 'change_position_employees', 'fired_employees', 'suspended_employees', 'retired_employees']]);
        $this->middleware('permission:office_employee_create', ['only' => ['create','store']]);
        $this->middleware('permission:office_employee_edit', ['only' => ['edit','update']]);
        $this->middleware('permission:office_employee_delete', ['only' => ['destroy']]);
    }

    // Index
    public function index()
    {
        $employees = Employee::whereNotNull('position_id')->whereBetween('status', [0,1])->orderBy('created_at', 'ASC')->get();

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
        $age = Jalalian::now()->getYear() - $employee->birth_year;
        $active_employees = Employee::whereBetween('status', [0,1])->whereNotNull('position_id')->where('position_id', '!=', $employee->position_id)->get();
        return view('admin.office.employees.show', compact('employee', 'active_employees', 'age'));
    }

    // Edit Info
    public function edit(Employee $employee)
    {
        if ($employee->status == 0 || $employee->status == 4) {
            $positions = Position::tree();
            $hostels = Hostel::all();
            return view('admin.office.employees.edit', compact('employee', 'positions', 'hostels'));
        } else {
            return  redirect()->back()->with([
                'message'   => 'ویرایش معلومات این کاربر مجاز نمی باشد.',
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
        if ($request->position_id != '' && $employee->status == 4) {
            $status = 1;
        } else {
            $status = $employee->status;
        }
        $employee->status = $status;

        $employee->save();

        //  Has Photo
        if ($request->hasFile('photo')) {
            $avatar = $request->file('photo');
            $fileName = 'employee-' . time() . '.' . $avatar->getClientOriginalExtension();
            $employee->updateImage($avatar->storeAs('employees', $fileName, 'public'));
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

    // Main Position Employees
    public function main_employees()
    {
        $employees = Employee::where('status', 0)->whereNotNull('position_id')->where('on_duty', 0)->orderBy('created_at', 'desc')->get();

        return view('admin.office.employees.main', compact('employees'));
    }

    // On Duty Employees
    public function on_duty_employees()
    {
        $employees = Employee::where('status', 1)->whereNotNull('position_id')->where('on_duty', 1)->orderBy('created_at', 'desc')->get();

        return view('admin.office.employees.on_duty', compact('employees'));
    }

    // Retired Employees
    public function retired_employees()
    {
        $retired_employees = Employee::whereNull('position_id')->where('status', 2)->get();
        return view('admin.office.employees.retired_employees', compact('retired_employees'));
    }

    // Fired Employees
    public function fired_employees()
    {
        $fired_employees = Employee::whereNull('position_id')->where('status', 3)->get();
        return view('admin.office.employees.fired_employees', compact('fired_employees'));
    }

    // Changed Position Employees List
    public function change_position_employees()
    {
        $employees = Employee::whereNull('position_id')->where('status', 4)->get();
        return view('admin.office.employees.change_position', compact('employees'));
    }

    // Suspended Employees
    public function suspended_employees()
    {
        $suspended_employees = Employee::whereNull('position_id')->where('status', 5)->get();
        return view('admin.office.employees.suspended_employees', compact('suspended_employees'));
    }

    // Custom ID Card
    public function custom_card($id)
    {
        $employee = Employee::find($id);
        return view('admin.office.employees.custom_card', compact('employee'));
    }
}
