<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Response;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:permission_access|permission_create|permission_edit|permission_delete', ['only' => ['index','store', 'update', 'destroy']]);
        $this->middleware('permission:permission_access', ['only' => ['index']]);
        $this->middleware('permission:permission_create', ['only' => ['store']]);
        $this->middleware('permission:permission_edit', ['only' => ['update']]);
        $this->middleware('permission:permission_delete', ['only' => ['destroy']]);
    }

    // Fetch All Data
    public function index()
    {
        abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $permissions = Permission::all();
        return view('admin.permissions.index', compact('permissions'));
    }

    // Store Data
    public function store(PermissionRequest $request)
    {
        Permission::create($request->all());
        $success = 'New permission has been added successfully!';
        return redirect()->route('admin.permissions.index')->with('success', $success);
    }

    // Update Data
    public function update(PermissionRequest $request, Permission $permission)
    {
        $permission->update($request->all());
        $success = 'Permission has been updated successfully!';
        return redirect()->route('admin.permissions.index')->with('success', $success);
    }

    // Delete Data
    public function destroy(Permission $permission)
    {
        abort_if(Gate::denies('permission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $permission->delete();
        $success = 'Permission has been deleted successfully!';
        return redirect()->route('admin.permissions.index')->with('success', $success);
    }
}
