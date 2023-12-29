<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExitDoorRequest;
use App\Models\ExitDoor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExitDoorController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:exit_door', [
            'only' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy', 'transit', 'export', 'empty', 'rejected', 'tr_returned', 'ex_returned']
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $from = $request->from_date;
        $to = $request->to_date;

        if ($request->exit_type == "0") {         // Transit
            $items = ExitDoor::where('exit_type', 0)->where('is_returned', 0)->whereBetween('created_at', [$from, Carbon::parse($to)->endOfDay()])->orderBy('created_at', 'desc')->get();
        } elseif ($request->exit_type == "1") {   // Export
            $items = ExitDoor::where('exit_type', 1)->where('is_returned', 0)->whereBetween('created_at', [$from, Carbon::parse($to)->endOfDay()])->orderBy('created_at', 'desc')->get();
        } elseif ($request->exit_type == "2") {   // Empty Vehicles
            $items = ExitDoor::where('exit_type', 2)->whereBetween('created_at', [$from, Carbon::parse($to)->endOfDay()])->orderBy('created_at', 'desc')->get();
        } elseif($request->exit_type == "3") {    // Rejected Goods
            $items = ExitDoor::where('exit_type', 3)->whereBetween('created_at', [$from, Carbon::parse($to)->endOfDay()])->orderBy('created_at', 'desc')->get();
        } elseif ($request->exit_type == "4") {   // Returned Goods
            $items = ExitDoor::where('is_returned', 1)->whereBetween('created_at', [$from, Carbon::parse($to)->endOfDay()])->orderBy('created_at', 'desc')->get();
        } else {
            $items = ExitDoor::orderBy('created_at', 'desc')->get();
        }

        return view('admin.exit-door.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.exit-door.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExitDoorRequest $request)
    {
        $item = new ExitDoor;

        $item->exit_type      = $request->input('exit_type');
        $item->company_name   = $request->company_name;
        $item->vp_number      = $request->vp_number;
        $item->vpt_number     = $request->vpt_number;

        if ($request->input('exit_type') == 0 || $request->input('exit_type') == 1) {         // Transit/Export
            $item->good_name      = $request->good_name;
            $item->bx_total       = $request->bx_total;
            $item->bx_total_tx    = $request->bx_total_tx;
            $item->weight         = $request->weight;
            $item->enex           = $request->enex;
        } elseif ($request->input('exit_type') == 2) {   // Empty
            $item->good_name      = "";
            $item->bx_total       = null;
            $item->bx_total_tx    = "";
            $item->weight         = null;
            $item->enex           = $request->enex;
        } elseif ($request->input('exit_type') == 3) {   // Rejected
            $item->good_name = $request->good_name;
            $item->bx_total       = null;
            $item->bx_total_tx    = "";
            $item->weight         = null;
            $item->enex           = null;
        }

        $item->desc           = $request->desc;
        $item->save();

        $message = trans('messages.exitDoor.addedItemMsg');

        if ($request->exit_type == 0) {         // Transit
            return redirect()->route('admin.ed.transit')->with([
                'message'   => $message,
                'alertType' => 'success'
            ]);
        } elseif ($request->exit_type == 1) {   // Export
            return redirect()->route('admin.ed.export')->with([
                'message'   => $message,
                'alertType' => 'success'
            ]);
        } elseif ($request->exit_type == 2) {   // Empty
            return redirect()->route('admin.ed.empty')->with([
                'message'   => $message,
                'alertType' => 'success'
            ]);
        } elseif ($request->exit_type == 3) {   // Rejected
            return redirect()->route('admin.ed.rejected')->with([
                'message'   => $message,
                'alertType' => 'success'
            ]);
        }
    }

    // Show
    public function show($id)
    {
        $item = ExitDoor::findOrFail($id);
        return view('admin.exit-door.show', compact('item'));
    }

    // Edit
    public function edit($id)
    {
        $item = ExitDoor::findOrFail($id);
        return view('admin.exit-door.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $item = ExitDoor::findOrFail($id);

        $request->validate([
            'company_name'  => 'required|min:3|max:124',
            'vp_number'     => 'required|min:2|max:64',
            'vpt_number'    => 'nullable|min:2|max:64',
            'enex'          => 'nullable|unique:exit_doors,enex,' . $item->id,
            'good_name'     => 'nullable|min:3|max:248',
            'desc'          => 'nullable'
        ]);

        $item->exit_type      = $request->exit_type;
        $item->company_name   = $request->company_name;
        $item->vp_number      = $request->vp_number;
        $item->vpt_number     = $request->vpt_number;

        if ($request->exit_type == 0 || $request->exit_type == 1) {         // Transit/Export
            $item->good_name      = $request->good_name;
            $item->bx_total       = $request->bx_total;
            $item->bx_total_tx    = $request->bx_total_tx;
            $item->weight         = $request->weight;
            $item->enex           = $request->enex;
        } elseif ($request->exit_type == 2) {   // Empty
            $item->good_name = null;
            $item->bx_total       = null;
            $item->bx_total_tx    = null;
            $item->weight         = null;
            $item->enex           = $request->enex;
        } elseif ($request->exit_type == 3) {   // Rejected
            $item->good_name = $request->good_name;
            $item->bx_total       = null;
            $item->bx_total_tx    = null;
            $item->weight         = null;
            $item->enex           = null;
        }

        $item->desc           = $request->desc;
        $item->save();

        $message = trans('messages.exitDoor.updatedItemMsg');

        return redirect()->route('admin.exit-door.show', $item->id)->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = ExitDoor::findOrFail($id);
        $item->delete();

        $message = trans('messages.exitDoor.deletedItemMsg');

        return redirect()->route('admin.exit-door.index')->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }

    //================= Pages =================/
    // Transit
    public function transit()
    {
        $items = ExitDoor::where('exit_type', 0)->orderBy('created_at', 'DESC')->get();
        return view('admin.exit-door.transit', compact('items'));
    }

    // Export
    public function export(Request $request)
    {
        $items = ExitDoor::where('exit_type', 1)->orderBy('created_at', 'DESC')->get();
        return view('admin.exit-door.export', compact('items'));
    }

    // Empty
    public function empty(Request $request)
    {
        $items = ExitDoor::where('exit_type', 2)->orderBy('created_at', 'DESC')->get();
        return view('admin.exit-door.empty', compact('items'));
    }

    // Rejected
    public function rejected(Request $request)
    {
        $items = ExitDoor::where('exit_type', 3)->orderBy('created_at', 'DESC')->get();
        return view('admin.exit-door.rejected', compact('items'));
    }

    // Transit Returned
    public function tr_returned(Request $request)
    {
        $items = ExitDoor::where('exit_type', 0)->where('is_returned', 1)->orderBy('created_at', 'DESC')->get();
        return view('admin.exit-door.tr_returned', compact('items'));
    }

    // Export Returned
    public function ex_returned(Request $request)
    {
        $items = ExitDoor::where('exit_type', 1)->where('is_returned', 1)->orderBy('created_at', 'DESC')->get();
        return view('admin.exit-door.ex_returned', compact('items'));
    }

    // Is returned
    public function isReturned(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['is_returned'] == 'Yes') {
                $is_returned = 0;
                ExitDoor::where('id', $data['exit_type'])->update(['is_returned' => $is_returned, 'return_date' => null, 'exit_again' => 0, 'ea_date' => null]);
            } else {
                $is_returned = 1;
                ExitDoor::where('id', $data['exit_type'])->update(['is_returned' => $is_returned, 'return_date' => now()]);
            }
            return response()->json(['is_returned' => $is_returned, 'exit_type' => $data['exit_type']]);
        }
    }

    // Exit Again
    public function exitAgain(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['exit_again'] == 'Yes') {
                $exit_again = 0;
                ExitDoor::where('id', $data['exit_type'])->update(['exit_again' => $exit_again, 'ea_date' => null]);
            } else {
                $exit_again = 1;
                ExitDoor::where('id', $data['exit_type'])->update(['exit_again' => $exit_again, 'ea_date' => now()]);
            }
            return response()->json(['exit_again' => $exit_again, 'exit_type' => $data['exit_type']]);
        }
    }
}
