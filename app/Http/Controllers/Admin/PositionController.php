<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class PositionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:position_access|position_create|position_update|position_delete', [
            'only' => ['index', 'create', 'store',  'edit', 'update', 'destroy']
        ]);
        $this->middleware('permission:position_access', ['only' => ['index']]);
        $this->middleware('permission:position_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:position_update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:position_delete', ['only' => ['destroy']]);
    }

    // Fetch All Data
    public function index()
    {
        $positions = Position::with('employees')->orderBy('created_at', 'desc')->get();
        // dd($positions);
        $emptyPositions = Position::doesntHave('employees')->orderBy('position_number', 'ASC')->get();
        return view('admin.positions.index', compact('positions', 'emptyPositions'));
    }

    // Create
    public function create()
    {
        $positions = Position::tree();
        return view('admin.positions.create', compact('positions'));
    }

    // Store
    public function store(Request $request)
    {
        abort_if(Gate::denies('position_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $request->validate([
            'title'     => 'required',
            'code'      => 'required',
            'position_number'   => 'required',
            'desc'      => 'nullable'
        ]);

        $position           = new Position();
        $position->parent_id    = $request->parent_id;
        $position->title        = $request->title;
        $position->code         = $request->code;
        $position->position_number = $request->position_number;
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
        $positions = Position::where('position_number', '<', 5)->get();
        return view('admin.positions.edit', compact('position', 'positions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Position $position)
    {
        abort_if(Gate::denies('position_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $request->validate([
            'title'     => 'required',
            'code'      => 'required',
            'position_number'   => 'required',
            'desc'      => 'nullable'
        ]);

        $position->parent_id    = $request->parent_id;
        $position->title        = $request->title;
        $position->code         = $request->code;
        $position->position_number = $request->position_number;
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
        abort_if(Gate::denies('position_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
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
