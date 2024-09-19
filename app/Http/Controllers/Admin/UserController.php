<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Office\Employee;
use App\Models\Place;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;
use function PHPUnit\Framework\fileExists;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:user_view', ['only' => ['activeUsers', 'inactiveUsers', 'index', 'show']]);
        $this->middleware('permission:user_mgmt', [
            'only' => ['activities', 'create', 'store', 'edit', 'update', 'destroy', 'updateUserStatus']
        ]);
    }

    // Index
    public function activeUsers()
    {
        if (Auth::user()->place_id == null) {
            $users = User::all()->where('status', 1);
        } else {
            $users = User::all()->where('place_id', Auth::user()->place->id)->where('status', 1);
        }

        return view('admin.users.active', compact('users'));
    }

    public function inactiveUsers()
    {
        if (Auth::user()->place_id == null) {
            $users = User::all()->where('status', 0);
        } else {
            $users = User::all()->where('place_id', Auth::user()->place->id)->where('status', 0);
        }

        return view('admin.users.inactive', compact('users'));
    }
    public function activities($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.activities', compact('user'));
    }

    public function index()
    {
        if (Auth::user()->place_id == null) {
            $users = User::all();
        } else {
            $users = User::all()->where('place_id', Auth::user()->place->id);
        }

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $places = Place::all();
        $employees = Employee::whereDoesntHave('user')->get();
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.users.create', compact('places', 'employees', 'roles', 'permissions'));
    }

    // Select Employee
    public function select_employee(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();

            // Query the database to get the relevant data
            $employee = Employee::find($data['employee_id']);

            if ($employee) {
                // Assuming 'employee_name' is the field you want to retrieve
                $employee_name = $employee->name . ' ' . $employee->last_name;
                $employee_username = $employee->username;
                $employee_emp_number = $employee->emp_number;
                $employee_phone = $employee->phone;
                $employee_email = $employee->email;

                // Return the data as a JSON response
                return response()->json([
                    'employee_name' => $employee_name,
                    'employee_username' => $employee_username,
                    'employee_emp_number' => $employee_emp_number,
                    'employee_phone' => $employee_phone,
                    'employee_email' => $employee_email
                ]);
            } else {
                // Handle the case when the aircraft ID is not found
                return response()->json(['error' => 'Aircraft not found'], 404);
            }
        }
    }

    // Store User Information
    public function store(StoreUserRequest $request)
    {
        // Store into users table
        $user = new User();
        $user->place_id     = $request->place_id;
        $user->employee_id  = $request->employee_id;
        $user->name         = $request->name;
        $user->username     = $request->username;
        $user->phone        = $request->phone;
        $user->email        = $request->email;
        $user->password     = $request->password;

        $user->info         = $request->info;
        $user->save();

        //  Has File && Save Avatar Image
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $fileName = 'user-' . time() . rand(111, 99999) . '.' . $avatar->getClientOriginalExtension();
            $user->storeImage($avatar->storeAs('users', $fileName, 'public'));
        }

        $user->roles()->sync($request->input('roles', []));
        $user->permissions()->sync($request->input('permissions', []));

        activity('added')
            ->causedBy(Auth::user())
            ->performedOn($user)
            ->log(trans('messages.users.addNewUserMsg'));

        $message = trans('messages.users.addNewUserMsg');
        return redirect()->route('admin.users.show', encrypt($user->id))->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }

    public function show($id)
    {
        $ID = decrypt($id);
        $user = User::find($ID);

        $user->load('roles');
        return view('admin.users.show', compact('user'));
    }

    public function edit($id)
    {
        $ID = decrypt($id);
        $user = User::find($ID);

        $places = Place::all();
        $roles = Role::all();
        $permissions = Permission::all();
        $user->load('roles');
        return view('admin.users.edit', compact('places', 'roles', 'permissions', 'user'));
    }

    public function update(Request $request, $id)
    {
        $ID = decrypt($id);
        $user = User::find($ID);

        if ($user->employee_id == null) {
            $request->validate([
                'avatar'    => 'image|mimes:jpg,png',
                'name'      => 'required',
                'username'  => 'required|unique:users,username,' . $user->id,
                'phone'     => 'nullable|min:8|max:15|unique:users,phone,' . $user->id,
                'email'     => 'nullable|min:8|max:64|unique:users,email,' . $user->id,
                'roles.*'   => 'integer',
                'roles'     => 'nullable|array',
                'permissions.*'   => 'integer',
                'permissions'     => 'nullable|array',
                'info'      => 'nullable'
            ]);
        } else {
            $request->validate([
                'roles.*'   => 'integer',
                'roles'     => 'nullable|array',
                'permissions.*'   => 'integer',
                'permissions'     => 'nullable|array',
                'info'      => 'nullable'
            ]);
        }

        // Get Employee
        $employee   = $user->employee;
        $user->place_id     = $request->place_id;
        if ($employee) {
            $user->employee_id  = $employee->id;
            $user->name         = $employee->name;
            $user->username     = $employee->emp_number;
            $user->phone        = $employee->phone;
            $user->email        = $employee->email;
        } else {
            $user->employee_id  = null;
            $user->name         = $request->name;
            $user->username     = $request->username;
            $user->phone        = $request->phone;
            $user->email        = $request->email;
            $user->is_admin = 0;
        }

        $user->info         = $request->info;
        $user->save();

        $user->roles()->sync($request->input('roles', []));
        $user->permissions()->sync($request->input('permissions', []));
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

        return redirect()->route('admin.users.show', encrypt($user->id))->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }

    public function destroy($id)
    {
        /** @var  $ID
         * Decrypt the id
         * Find specified user then delete it
         */
        $ID = decrypt($id);
        $user = User::find($ID);

        $user->delete();

        /**
         * Get activity log
         */
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
        /**
         * Request from ajax
         */
        if ($request->ajax()) {
            $data = $request->all();

            /**
             * Assign status based on end-user selection
             */
            if ($data['status'] == 'Active') {
                $status = 0;
            } else {
                $status = 1;
            }
            $user = User::where('id', $data['user_id'])->first();
            $user->update(['status' => $status]);

            return response()->json(['status' => $status, 'user_id' => $data['user_id']]);
        }
    }

    // Reset Password
    public function reset_pswd($id)
    {
        /** @var  $user */
        $user = User::find($id);
        /**
         * Update user password
         */
        $user->update(['password' => Hash::make('14021403')]);
        return back()->with([
            'message'   => 'رمز عبور موفقانه بازیابی شد.',
            'alertType' => 'success'
        ]);
    }
}
