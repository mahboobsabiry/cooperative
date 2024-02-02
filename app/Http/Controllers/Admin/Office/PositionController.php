<?php

namespace App\Http\Controllers\Admin\Office;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePositionRequest;
use App\Models\Office\Employee;
use App\Models\Office\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PositionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:office_position_view', ['only' => ['index', 'show', 'appointment', 'empty', 'inactive']]);
        $this->middleware('permission:office_position_create', ['only' => ['create','store']]);
        $this->middleware('permission:office_position_edit', ['only' => ['edit','update', 'updatePositionStatus']]);
        $this->middleware('permission:office_position_delete', ['only' => ['destroy']]);
    }

    // Fetch All Data
    public function index()
    {
        $positions = Position::with('employees')->orderBy('created_at', 'desc')->get();
        $organization = Position::tree();
        return view('admin.office.positions.index', compact('positions', 'organization'));
    }

    // Create
    public function create()
    {
        $positions = Position::tree();
        return view('admin.office.positions.create', compact('positions'));
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
        return redirect()->route('admin.office.positions.index')->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }

    // Show
    public function show(Position $position)
    {
        $position->load('employees');
        return view('admin.office.positions.show', compact('position'));
    }

    // Edit Info
    public function edit(Position $position)
    {
        $positions = Position::get();
        return view('admin.office.positions.edit', compact('position', 'positions'));
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
        return redirect()->route('admin.office.positions.show', $position->id)->with([
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
        return redirect()->route('admin.office.positions.index')->with([
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
        return view('admin.office.positions.appointment', compact('positions', 'appointment_positions'));
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
        return view('admin.office.positions.empty', compact('positions', 'empty_positions'));
    }

    // Fetch All Data
    public function inactive()
    {
        $positions = Position::with('employees')->where('status', 0)->orderBy('created_at', 'desc')->get();
        return view('admin.office.positions.inactive', compact('positions'));
    }
}
