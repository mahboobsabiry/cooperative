<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePositionRequest;
use App\Http\Requests\UpdatePositionRequest;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class PositionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:organization_mgmt', [
            'only' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy', 'updatePositionStatus']
        ]);
    }

    // Fetch All Data
    public function index()
    {
        $positions = Position::with('employees')->orderBy('created_at', 'desc')->get();
        $organization = Position::tree();
        return view('admin.positions.index', compact('positions', 'organization'));
    }

    // Create
    public function create()
    {
        $positions = Position::tree();
        return view('admin.positions.create', compact('positions'));
    }

    // Store
    public function store(StorePositionRequest $request)
    {
        $position           = new Position();
        $position->parent_id    = $request->parent_id;
        $position->title        = $request->title;
        $position->position_number = $request->position_number;
        $position->num_of_pos   = $request->num_of_pos;
        $position->desc         = $request->desc;
        $position->status       = 1;
        $position->save();

        activity('added')
            ->causedBy(Auth::user())
            ->performedOn($position)
            ->log(trans('messages.positions.addedPositionMsg'));

        $message = trans('messages.positions.addedPositionMsg');
        return redirect()->route('admin.positions.index')->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }

    // Show
    public function show(Position $position)
    {
        $position->load('employees');
        return view('admin.positions.show', compact('position'));
    }

    // Edit Info
    public function edit(Position $position)
    {
        $positions = Position::get();
        return view('admin.positions.edit', compact('position', 'positions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Position $position)
    {
        $request->validate([
            'title'     => 'required|min:3|max:255',
            'position_number'   => 'required',
            'desc'      => 'nullable'
        ]);

        $position->parent_id    = $request->parent_id;
        $position->title        = $request->title;
        $position->position_number = $request->position_number;
        $position->num_of_pos   = $request->num_of_pos;
        $position->desc         = $request->desc;
        $position->save();

        activity('updated')
            ->causedBy(Auth::user())
            ->performedOn($position)
            ->log(trans('messages.positions.updatedPositionMsg'));

        $message = trans('messages.positions.updatedPositionMsg');
        return redirect()->route('admin.positions.show', $position->id)->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Position $position)
    {
        $position->delete();

        activity('deleted')
            ->causedBy(Auth::user())
            ->performedOn($position)
            ->log(trans('messages.positions.deletedPositionMsg'));

        $message = trans('messages.positions.deletedPositionMsg');
        return redirect()->route('admin.positions.index')->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }

    // Update Status
    public function updatePositionStatus(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['status'] == 'Active') {
                $status = 0;
            } else {
                $status = 1;
            }
            Position::where('id', $data['position_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'position_id' => $data['position_id']]);
        }
    }

    // Appointment Positions
    public function appointment()
    {// Send appointment and empty positions count to dashboard
        // Sum number of positions
        $sum_appointment = Position::all()->sum('num_of_pos');
        // Count all employees
        $employees_count = Employee::all()->count();
        // Count all empty positions
        $empty_positions = $sum_appointment - $employees_count;
        // Count all appointment positions
        $appointment_positions = $sum_appointment - $empty_positions;
        $positions = Position::with('employees')->orderBy('created_at', 'desc')->get();
        return view('admin.positions.appointment', compact('positions', 'appointment_positions'));
    }

    // Empty Positions
    public function empty()
    {// Send appointment and empty positions count to dashboard
        // Sum number of positions
        $sum_appointment = Position::all()->sum('num_of_pos');
        // Count all employees
        $employees_count = Employee::all()->count();
        // Count all empty positions
        $empty_positions = $sum_appointment - $employees_count;
        $positions = Position::with('employees')->orderBy('created_at', 'desc')->get();
        return view('admin.positions.empty', compact('positions', 'empty_positions'));
    }

    // Fetch All Data
    public function inactive()
    {
        $positions = Position::with('employees')->where('status', 0)->orderBy('created_at', 'desc')->get();
        return view('admin.positions.inactive', compact('positions'));
    }
}
