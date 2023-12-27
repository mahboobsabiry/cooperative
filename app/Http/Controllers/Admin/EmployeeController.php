<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\Employee;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:employee_mgmt', [
            'only' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy', 'updateEmployeeStatus']
        ]);
    }

    // Index
    public function index()
    {
        $employees = Employee::orderBy('created_at', 'desc')->get();
        $mpEmp = Employee::where('on_duty', 1)->orderBy('created_at', 'desc')->get();
        $onDuty = Employee::where('on_duty', 0)->orderBy('created_at', 'desc')->get();

        return view('admin.employees.index', compact('employees', 'mpEmp', 'onDuty'));
    }

    public function create()
    {
        $positions = Position::tree();
        return view('admin.employees.create', compact('positions'));
    }

    // Store Record
    public function store(StoreEmployeeRequest $request)
    {
        // $employee = Employee::create($request->all());
        $employee = new Employee();
        $employee->position_id  = $request->position_id;
        $employee->name         = $request->name;
        $employee->last_name    = $request->last_name;
        $employee->father_name  = $request->father_name;
        $employee->grand_f_name = $request->grand_f_name;
        $employee->p2number     = $request->p2number;
        $employee->emp_number   = $request->emp_number;
        $employee->dob          = $request->dob;
        $employee->phone        = $request->phone;
        $employee->phone2       = $request->phone2;
        $employee->email        = $request->email;
        $employee->province     = $request->province;
        $employee->info         = $request->info;
        // Save On Duty
        if ($request->has('on_duty')) {
            $on_duty = 0;
        } else {
            $on_duty = 1;
        }
        $employee->on_duty          = $on_duty;
        $employee->main_position    = $request->main_position;

        // Get Position && Save Responsible
        $position = Position::where('id', $request->position_id)->first();
        if (count($position->employees) > 0) {
            $is_responsible = 0;
        } else {
            $is_responsible = 1;
        }
        $employee->is_responsible   = $is_responsible;
        $employee->save();

        //  Has File && Save Avatar Image
        if ($request->hasFile('photo')) {
            $avatar = $request->file('photo');
            $fileName = 'employee-' . time() . '.' . $avatar->getClientOriginalExtension();
            $employee->storeImage($avatar->storeAs('employees', $fileName, 'public'));
        }

        //  Has File && Save Tazkira Image
        if ($request->hasFile('tazkira')) {
            $tazkira = $request->file('tazkira');
            $fileName = 'employeeIdCard-' . time() . '.' . $tazkira->getClientOriginalExtension();
            $employee->storeTaz($tazkira->storeAs('employees/tazkiras', $fileName, 'public'));
        }

        activity('added')
            ->causedBy(Auth::user())
            ->performedOn($employee)
            ->log(trans('messages.employees.addNewEmployeeMsg'));

        $message = trans('messages.employees.addNewEmployeeMsg');
        return redirect()->route('admin.employees.index')->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }

    // Show Info
    public function show(Employee $employee)
    {
        $admin = Auth::user()->roles->first()->name == 'Admin';
        $organization = Position::with('children')->where('id', $employee->id)->first();
        return view('admin.employees.show', compact('employee', 'admin', 'organization'));
    }

    // Edit Info
    public function edit(Employee $employee)
    {
        $positions = Position::tree();
        return view('admin.employees.edit', compact('employee', 'positions'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'photo'         => 'image|mimes:jpg,png,jfif',
            'name'          => 'required',
            'last_name'     => 'nullable',
            'father_name'   => 'required',
            'grand_f_name'  => 'required',
            'p2number'      => 'required|unique:employees,p2number,' . $employee->id,
            'emp_number'    => 'required|unique:employees,emp_number,' . $employee->id,
            'dob'           => 'required',
            'phone'         => 'required|min:8|max:15|unique:employees,phone,' . $employee->id,
            'phone2'        => 'nullable|min:8|max:15',
            'email'         => 'required|min:10|max:64|unique:employees,email,' . $employee->id,
            'province'      => 'required|min:3|max:128',
            'main_position' => 'nullable|min:3|max:224',
            'info'          => 'nullable'
        ]);

        $employee->position_id  = $request->position_id;
        $employee->name         = $request->name;
        $employee->last_name    = $request->last_name;
        $employee->father_name  = $request->father_name;
        $employee->grand_f_name = $request->grand_f_name;
        $employee->p2number     = $request->p2number;
        $employee->emp_number   = $request->emp_number;
        $employee->dob          = $request->dob;
        $employee->phone        = $request->phone;
        $employee->phone2       = $request->phone2;
        $employee->email        = $request->email;
        $employee->province     = $request->province;
        $employee->info         = $request->info;
        // Save On Duty
        if ($request->has('on_duty')) {
            $on_duty = 0;
        } else {
            $on_duty = 1;
        }
        $employee->on_duty          = $on_duty;
        $employee->main_position    = $request->main_position;

        // Get Position && Save Responsible
        $position = Position::where('id', $request->position_id)->first();
        if (count($position->employees) > 0) {
            $is_responsible = 0;
        } else {
            $is_responsible = 1;
        }
        $employee->is_responsible   = $is_responsible;
        $employee->save();

        //  Has File
        if ($request->hasFile('photo')) {
            $avatar = $request->file('photo');
            $fileName = 'employee-' . time() . '.' . $avatar->getClientOriginalExtension();
            $employee->updateImage($avatar->storeAs('employees', $fileName, 'public'));
        }

        //  Has Tazkira
        if ($request->hasFile('tazkira')) {
            $tazkira = $request->file('tazkira');
            $fileName = 'employeeIdCard-' . time() . '.' . $tazkira->getClientOriginalExtension();
            $employee->updateTaz($tazkira->storeAs('employees/tazkiras', $fileName, 'public'));
        }

        activity('updated')
            ->causedBy(Auth::user())
            ->log(trans('messages.employees.updateEmployeeMsg'));

        $message = trans('messages.employees.updateEmployeeMsg');

        return redirect()->route('admin.employees.index')->with([
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
}
