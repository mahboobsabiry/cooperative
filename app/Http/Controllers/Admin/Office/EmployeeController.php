<?php

namespace App\Http\Controllers\Admin\Office;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Office\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Morilog\Jalali\CalendarUtils;
use Morilog\Jalali\Jalalian;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:office_employee_view', ['only' => ['index', 'show']]);
        $this->middleware('permission:office_employee_create', ['only' => ['create','store']]);
        $this->middleware('permission:office_employee_edit', ['only' => ['edit','update']]);
        $this->middleware('permission:office_employee_delete', ['only' => ['destroy']]);
    }

    // Index
    public function index()
    {
        $employees = Employee::orderBy('created_at', 'ASC')->get();

        return view('admin.office.employees.index', compact('employees'));
    }

    public function create()
    {
        return view('admin.office.employees.create');
    }

    // Store Record
    public function store(StoreEmployeeRequest $request)
    {
        $employee = new Employee();
        $employee->position     = $request->position;
        $employee->name         = $request->name;
        $employee->father_name  = $request->father_name;
        $employee->emp_code     = $request->emp_code;
        $employee->nid_number   = $request->nid_number;
        $employee->birth_date   = $request->birth_date;
        $employee->phone        = $request->phone;
        $employee->phone2       = $request->phone2;
        $employee->email        = $request->email;
        $employee->address      = $request->address;

        //  Has File && Save Signature Scan
        if ($request->hasFile('signature')) {
            $avatar = $request->file('signature');
            $fileName = 'employee-signature-' . time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->storeAs('signatures', $fileName, 'public');
            $employee->signature        = $fileName;
        }
        $employee->info     = $request->info;
        $employee->save();

        //  Has File && Save Avatar Image
        if ($request->hasFile('photo')) {
            $avatar = $request->file('photo');
            $fileName = 'employee-' . time() . rand(111, 99999) . '.' . $avatar->getClientOriginalExtension();
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
        return view('admin.office.employees.show', compact('employee'));
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
            'position'      => 'required|min:3|max:64',
            'name'          => 'required|min:3|max:64',
            'father_name'   => 'required|min:3|max:64',
            'emp_code'      => 'nullable|unique:employees,emp_code,' . $employee->id,
            'nid_number'    => 'required|unique:employees,nid_number,' . $employee->id,
            'birth_date'    => 'required',
            'phone'         => 'nullable|unique:employees,phone,' . $employee->id,
            'phone2'        => 'nullable',
            'email'         => 'nullable|unique:employees,email,' . $employee->id,
            'address'       => 'required|min:3|max:64',
            'info'              => 'nullable',
        ]);

        $employee->position     = $request->position;
        $employee->name         = $request->name;
        $employee->father_name  = $request->father_name;
        $employee->emp_code     = $request->emp_code;
        $employee->nid_number   = $request->nid_number;
        $employee->birth_date   = $request->birth_date;
        $employee->phone        = $request->phone;
        $employee->phone2       = $request->phone2;
        $employee->email        = $request->email;
        $employee->address      = $request->address;

        //  Has File && Save Signature Scan
        if ($request->hasFile('signature')) {
            if (file_exists(asset('storage/signatures/' . $employee->signature))) {
                unlink(asset('storage/signatures/' . $employee->signature));
            }
            $avatar = $request->file('signature');
            $fileName = 'employee-signature-' . time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->storeAs('signatures', $fileName, 'public');
            $employee->signature        = $fileName;
        }
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

        return redirect()->route('admin.office.employees.show', $employee->id)->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }

    // Delete Employee
    public function destroy(Employee $employee)
    {
        if (file_exists(asset('storage/signatures/' . $employee->signature))) {
            unlink(asset('storage/signatures/' . $employee->signature));
        }

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
            $employee = Employee::where('id', $data['employee_id'])->first();
            $employee->update(['status' => $status]);
            return response()->json(['status' => $status, 'employee_id' => $data['employee_id']]);
        }
    }
}
