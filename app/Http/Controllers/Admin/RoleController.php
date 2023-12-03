<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:role_access|role_create|role_update|role_delete', [
            'only' => ['index', 'create', 'store',  'edit', 'update', 'destroy']
        ]);
        $this->middleware('permission:role_access', ['only' => ['index']]);
        $this->middleware('permission:role_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:role_update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role_delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        abort_if(Gate::denies('role_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        abort_if(Gate::denies('role_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $permissions = Permission::all();
        return view('admin.roles.create', compact( 'permissions'));
    }

    public function store(RoleRequest $request)
    {
        abort_if(Gate::denies('role_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $role = Role::create($request->all());
        $role->permissions()->sync($request->input('permissions', []));
        $message = trans('messages.roles.addNewRoleMsg');
        return redirect()->route('admin.roles.index')->with('success', $message);
    }

    public function edit(Role $role)
    {
        abort_if(Gate::denies('role_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $permissions = Permission::all();
        $role->load('permissions');
        return view('admin.roles.edit', compact('permissions', 'role'));
    }

    public function update(Request $request, Role $role)
    {
        // Authorize
        abort_if(Gate::denies('role_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // Validate
        $request->validate([
            'name'          => 'required|regex:/^[\pL\s\-]+$/u||min:3|max:48|unique:roles,name,' . $role->id,
            'permissions'   => 'required'
        ]);

        // Update Record
        $role->update($request->all());
        $role->permissions()->sync($request->input('permissions', []));

        $message = trans('messages.roles.updateRoleMsg');
        return redirect()->route('admin.roles.index')->with('success', $message);
    }

    public function destroy(Role $role)
    {
        abort_if(Gate::denies('role_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $role->delete();

        $message = trans('messages.roles.deleteRoleMsg');
        return redirect()->route('admin.roles.index')->with('success', $message);
    }
}
