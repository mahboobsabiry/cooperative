<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Response;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:permission_access|permission_create|permission_update|permission_delete', ['only' => ['index','store', 'update', 'destroy']]);
        $this->middleware('permission:permission_access', ['only' => ['index']]);
        $this->middleware('permission:permission_create', ['only' => ['store']]);
        $this->middleware('permission:permission_update', ['only' => ['update']]);
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
        abort_if(Gate::denies('permission_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $perm = Permission::create($request->all());

        activity('added')
            ->causedBy(Auth::user())
            ->performedOn($perm)
            ->log(trans('messages.permissions.addNewPermMsg'));

        $message = trans('messages.permissions.addNewPermMsg');
        return redirect()->route('admin.permissions.index')->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }

    // Update Data
    public function update(Request $request, Permission $permission)
    {
        // Authorize
        abort_if(Gate::denies('permission_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // Validate
        $request->validate([
            'name' => 'required|min:3|max:48|unique:permissions,name,'.$permission->id,
        ]);

        // Save Record
        $permission->update($request->all());

        activity('updated')
            ->causedBy(Auth::user())
            ->performedOn($permission)
            ->log(trans('messages.permissions.updatePermMsg'));

        $message = trans('messages.permissions.updatePermMsg');
        return redirect()->route('admin.permissions.index')->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }

    // Delete Data
    public function destroy(Permission $permission)
    {
        abort_if(Gate::denies('permission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $permission->delete();

        activity('deleted')
            ->causedBy(Auth::user())
            ->performedOn($permission)
            ->log(trans('messages.permissions.deletePermMsg'));

        $message = trans('messages.permissions.deletePermMsg');
        return redirect()->route('admin.permissions.index')->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }
}
