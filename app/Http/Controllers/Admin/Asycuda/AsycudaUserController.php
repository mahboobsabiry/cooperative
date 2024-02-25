<?php

namespace App\Http\Controllers\Admin\Asycuda;

use App\Http\Controllers\Controller;
use App\Models\Asycuda\AsycudaUser;
use App\Models\Office\Employee;
use Illuminate\Http\Request;

class AsycudaUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:asy_user_view', ['only' => ['index', 'inactive', 'show']]);
        $this->middleware('permission:asy_user_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:asy_user_edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:asy_user_delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $asycuda_users = AsycudaUser::all()->where('status', 1);
        return view('admin.asycuda.users.index', compact('asycuda_users'));
    }

    public function inactive()
    {
        $asycuda_users = AsycudaUser::all()->where('status', 0);
        return view('admin.asycuda.users.inactive', compact('asycuda_users'));
    }

    // Create
    public function create()
    {
        $employees = Employee::doesntHave('asycuda_user')->whereBetween('status', [0,1])->get();
        return view('admin.asycuda.users.create', compact('employees'));
    }

    // Select Employee
    public function select_employee(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();

            // Query the database to get the relevant data
            $employee = Employee::find($data['employee_id']);

            if ($employee) {
                $employee_emp_number = $employee->emp_number;

                // Return the data as a JSON response
                return response()->json([
                    'employee_emp_number' => $employee_emp_number
                ]);
            } else {
                // Handle the case when the aircraft ID is not found
                return response()->json(['error' => 'Aircraft not found'], 404);
            }
        }
    }

    // Store
    public function store(Request $request)
    {
        $request->validate([
            'employee_id'   => 'required|unique:asycuda_users,employee_id',
            'user'          => 'required|unique:asycuda_users,user',
            'password'      => 'required',
            'roles'         => 'required'
        ]);

        $user = AsycudaUser::create($request->all());

        return redirect()->route('admin.asycuda.users.show', $user->id)->with([
            'message'   => 'یوزر اسیکودا ثبت شد',
            'alertType' => 'success'
        ]);
    }

    // Show
    public function show($id)
    {
        $asycuda_user = AsycudaUser::findOrFail($id);
        return view('admin.asycuda.users.show', compact('asycuda_user'));
    }

    // Edit
    public function edit($id)
    {
        $asycuda_user = AsycudaUser::findOrFail($id);
        $employees = Employee::whereBetween('status', [0,1])->get();
        return view('admin.asycuda.users.edit', compact('asycuda_user', 'employees'));
    }
    // Store
    public function update(Request $request, $id)
    {
        $request->validate([
            'roles' => 'required',
            'info'  => 'nullable'
        ]);

        $user = AsycudaUser::find($id);

        $user->update($request->all());

        return redirect()->route('admin.asycuda.users.show', $user->id)->with([
            'message'   => 'یوزر اسیکودا بروزرسانی شد',
            'alertType' => 'success'
        ]);
    }

    // Delete
    public function destroy($id)
    {
        $user = AsycudaUser::find($id);

        $user->delete();

        return redirect()->route('admin.asycuda.users.index')->with([
            'message'   => 'یوزر اسیکودا حذف گردید',
            'alertType' => 'success'
        ]);
    }

    // Update Status
    public function updateAsyUserStatus(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['status'] == 'Active') {
                $status = 0;
            } else {
                $status = 1;
            }
            $asycuda_user = AsycudaUser::where('id', $data['asy_user_id'])->first();
            $asycuda_user->update(['status' => $status]);
            $exp = $asycuda_user->employee->experiences()->latest()->first();
            if ($exp) {
                $exp->update(['asy_user_status' => $status]);
            }
            return response()->json(['status' => $status, 'asy_user_id' => $data['asy_user_id']]);
        }
    }
}
