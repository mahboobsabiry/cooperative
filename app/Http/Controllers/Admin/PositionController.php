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
        $emptyPositions = Position::with('employees')->orderBy('position_number', 'ASC')->get();
        $organization = Position::tree();
        return view('admin.positions.index', compact('positions', 'emptyPositions', 'organization'));
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
        $position->code         = '20-27-01-' . $request->code;
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

        if ($position->position_number == 2) {
            // $posEmployees = $position->employees()->get();
            $posEmployees = Employee::all()->where('on_duty', 1);
            $onDutyPosEmp = Employee::all()->where('on_duty', 0);
            // $onDutyPosEmp = Employee::with('position')->where('position_id', $position->id)->where('on_duty', 0)->get();
            foreach ($position->children() as $admin) {
                $posEmployees = $admin->employees()->get();
                $onDutyPosEmp = Employee::with('position')->where('position_id', $admin->id)->where('on_duty', 0)->get();
                foreach ($admin->children() as $mgmt) {
                    $posEmployees = $mgmt->employees();
                    $onDutyPosEmp = Employee::with('position')->where('position_id', $mgmt->id)->where('on_duty', 0)->get();
                    foreach ($mgmt->children() as $mgr) {
                        $posEmployees = $mgr->employees();
                        $onDutyPosEmp = Employee::with('position')->where('position_id', $mgr->id)->where('on_duty', 0)->get();
                    }
                }
            }
        } elseif($position->position_number == 3) {
            $posEmployees = Employee::with('position')->where('position_id', $position->id)->get();
            $onDutyPosEmp = Employee::with('position')->where('position_id', $position->id)->where('on_duty', 0)->get();
            foreach ($position->children() as $mgmt) {
                $posEmployees = Employee::with('position')->where('position_id', $mgmt->id)->get();
                $onDutyPosEmp = Employee::with('position')->where('position_id', $mgmt->id)->where('on_duty', 0)->get();
                foreach ($mgmt->children() as $mgr) {
                    $posEmployees = Employee::with('position')->where('position_id', $mgr->id)->get();
                    $onDutyPosEmp = Employee::with('position')->where('position_id', $mgr->id)->where('on_duty', 0)->get();
                }
            }
        } elseif ($position->position_number == 4) {
            $posEmployees = Employee::with('position')->where('position_id', $position->id)->get();
            $onDutyPosEmp = Employee::with('position')->where('position_id', $position->id)->where('on_duty', 0)->get();
            foreach ($position->children() as $mgr) {
                $posEmployees = Employee::with('position')->where('position_id', $mgr->id)->get();
                $onDutyPosEmp = Employee::with('position')->where('position_id', $mgr->id)->where('on_duty', 0)->get();
            }
        } else {
            $posEmployees = Employee::with('position')->where('position_id', $position->id)->get();
            $onDutyPosEmp = Employee::with('position')->where('position_id', $position->id)->where('on_duty', 0)->get();
        }

        return view('admin.positions.show', compact('position', 'posEmployees', 'onDutyPosEmp'));
    }

    // Edit Info
    public function edit(Position $position)
    {
        $positions = Position::where('position_number', '<', 5)->get();
        return view('admin.positions.edit', compact('position', 'positions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePositionRequest $request, Position $position)
    {
        $request->validate([
            'title'     => 'required',
            'code'      => 'required',
            'position_number'   => 'required',
            'desc'      => 'nullable'
        ]);

        $position->parent_id    = $request->parent_id;
        $position->title        = $request->title;
        $position->code         = '20-27-01-' . $request->code;
        $position->position_number = $request->position_number;
        $position->num_of_pos   = $request->num_of_pos;
        $position->desc         = $request->desc;
        $position->save();

        activity('updated')
            ->causedBy(Auth::user())
            ->performedOn($position)
            ->log(trans('messages.positions.updatedPositionMsg'));

        $message = trans('messages.positions.updatedPositionMsg');
        return redirect()->route('admin.positions.index')->with([
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
}
