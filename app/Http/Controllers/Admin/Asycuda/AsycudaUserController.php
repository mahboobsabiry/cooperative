<?php

namespace App\Http\Controllers\Admin\Asycuda;

use App\Http\Controllers\Controller;
use App\Models\Asycuda\AsycudaUser;
use App\Models\Employee;
use Illuminate\Http\Request;

class AsycudaUserController extends Controller
{
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
        $employees = Employee::all();
        return view('admin.asycuda.users.create', compact('employees'));
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
        $asycuda_user = AsycudaUser::find($id);
        return view('admin.asycuda.users.show', compact('asycuda_user'));
    }

    // Edit
    public function edit($id)
    {
        $asycuda_user = AsycudaUser::find($id);
        $employees = Employee::all();
        return view('admin.asycuda.users.edit', compact('asycuda_user', 'employees'));
    }
    // Store
    public function update(Request $request, $id)
    {
        $request->validate([
            'employee_id'   => 'required',
            'user'          => 'required',
            'password'      => 'required',
            'roles'         => 'required'
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
}
