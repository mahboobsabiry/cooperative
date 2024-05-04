<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Employee;
use App\Models\Office\Hostel;
use App\Models\Office\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $employees = Employee::all();
        return view('admin.employees.index', compact('employees'));
    }

    public function create()
    {
        return view('admin.employees.create');
    }

    // Store Record
    public function store(StoreEmployeeRequest $request)
    {
        $employee = new Employee();
        $employee->position     = $request->position;
        $employee->name         = $request->name;
        $employee->username     = $request->username;
        $employee->father_name  = $request->father_name;
        $employee->gender       = $request->gender;
        $employee->birth_year       = $request->birth_year;
        $employee->education        = $request->education;
        $employee->phone            = $request->phone;
        $employee->phone2           = $request->phone2;
        $employee->email            = $request->email;
        $employee->main_address     = $request->main_address;
        $employee->current_address  = $request->current_address;
        $employee->status           = 0;
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
        return redirect()->route('admin.employees.show', $employee->id)->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }

    // Show Info
    public function show(Employee $employee)
    {
        return view('admin.employees.show', compact('employee'));
    }

    // Edit Info
    public function edit(Employee $employee)
    {
        return view('admin.office.employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'photo'         => 'nullable|image|mimes:jpg,png,jfif',
            'name'          => 'required|min:3|max:64',
            'username'      => 'nullable|min:3|max:64,unique:employees,username,' . $employee->id,
            'father_name'   => 'required|min:3|max:64',
            'birth_year'    => 'required',
            'education'     => 'nullable',
            'phone'         => 'nullable|unique:employees,phone,' . $employee->id,
            'phone2'        => 'nullable',
            'email'         => 'nullable|unique:employees,email,' . $employee->id,
            'main_address'      => 'required|min:3|max:64',
            'current_address'   => 'required|min:3|max:64',
            'info'              => 'nullable'
        ]);

        $employee->position     = $request->position;
        $employee->name         = $request->name;
        $employee->username     = $request->username;
        $employee->father_name  = $request->father_name;
        $employee->gender       = $request->gender;
        $employee->birth_year       = $request->birth_year;
        $employee->education        = $request->education;
        $employee->phone            = $request->phone;
        $employee->phone2           = $request->phone2;
        $employee->email            = $request->email;
        $employee->main_address     = $request->main_address;
        $employee->current_address  = $request->current_address;
        $employee->status           = 0;
        $employee->info             = $request->info;
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

        return redirect()->route('admin.employees.show', $employee->id)->with([
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

        return redirect()->route('admin.employees.index')->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }
}
