<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;
use function PHPUnit\Framework\fileExists;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:user_mgmt', [
            'only' => ['activeUsers', 'inactiveUsers', 'activities', 'index', 'create', 'store', 'show', 'edit', 'update', 'destroy', 'updateUserStatus']
        ]);
    }

    // Index
    public function activeUsers()
    {
        $users = User::where('status', 1)->get();
        return view('admin.users.active', compact('users'));
    }

    public function inactiveUsers()
    {
        $users = User::where('status', 0)->get();
        return view('admin.users.inactive', compact('users'));
    }
    public function activities($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.activities', compact('user'));
    }

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles', []));

        //  Has File && Save Avatar Image
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $fileName = 'user-' . time() . '.' . $avatar->getClientOriginalExtension();
            $user->storeImage($avatar->storeAs('users', $fileName, 'public'));
        }

        activity('added')
            ->causedBy(Auth::user())
            ->performedOn($user)
            ->log(trans('messages.users.addNewUserMsg'));

        $message = trans('messages.users.addNewUserMsg');
        return redirect()->route('admin.users.index')->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }

    public function show(User $user)
    {
        $user->load('roles');
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        $user->load('roles');
        return view('admin.users.edit', compact('roles', 'user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'avatar'    => 'image|mimes:jpg,png',
            'name'      => 'required',
            'username'  => 'required|unique:users,username,' . $user->id,
            'phone'     => 'nullable|min:8|max:15|unique:users,phone,' . $user->id,
            'email'     => 'nullable|min:8|max:64|unique:users,email,' . $user->id,
            'roles.*'   => 'integer',
            'roles'     => 'required|array',
            'info'      => 'nullable'
        ]);
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));
        //  Has File
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $fileName = 'user-' . time() . '.' . $avatar->getClientOriginalExtension();
            $user->updateImage($avatar->storeAs('users', $fileName, 'public'));
        }

        activity('updated')
            ->causedBy(Auth::user())
            ->performedOn($user)
            ->log(trans('messages.users.updateUserMsg'));

        $message = trans('messages.users.updateUserMsg');

        return redirect()->route('admin.users.index')->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }

    public function destroy(User $user)
    {
        $user->delete();

        activity('deleted')
            ->causedBy(Auth::user())
            ->performedOn($user)
            ->log(trans('messages.users.deleteUserMsg'));

        $message = trans('messages.users.deleteUserMsg');

        return redirect()->route('admin.users.index')->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }

    // Update Status
    public function updateUserStatus(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['status'] == 'Active') {
                $status = 0;
            } else {
                $status = 1;
            }
            User::where('id', $data['user_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'user_id' => $data['user_id']]);
        }
    }
}
