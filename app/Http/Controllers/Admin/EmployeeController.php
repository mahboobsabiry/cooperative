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
        $this->middleware('permission:employee_access|employee_create|employee_update|employee_delete', [
            'only' => ['index', 'create', 'store',  'edit', 'update', 'destroy']
        ]);
        $this->middleware('permission:employee_access', ['only' => ['index']]);
        $this->middleware('permission:employee_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:employee_update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:employee_delete', ['only' => ['destroy']]);
    }

    // Index
    public function index()
    {
        abort_if(Gate::denies('employee_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $employees = Employee::all();

        return view('admin.employees.index', compact('employees'));
    }

    public function create()
    {
        abort_if(Gate::denies('employee_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $positions = Position::tree();
        return view('admin.employees.create', compact('positions'));
    }

    // Store Record
    public function store(StoreEmployeeRequest $request)
    {
        abort_if(Gate::denies('employee_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $employee = Employee::create($request->all());

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
        abort_if(Gate::denies('employee_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $admin = Auth::user()->roles->first()->name == 'Admin';

        return view('admin.employees.show', compact('employee', 'admin'));
    }

    // Edit Info
    public function edit(Employee $employee)
    {
        abort_if(Gate::denies('employee_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $positions = Position::tree();
        return view('admin.employees.edit', compact('employee', 'positions'));
    }

    public function update(Request $request, Employee $employee)
    {
        abort_if(Gate::denies('employee_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'info'          => 'nullable'
        ]);

        $employee->update($request->all());

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
        abort_if(Gate::denies('employee_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
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
