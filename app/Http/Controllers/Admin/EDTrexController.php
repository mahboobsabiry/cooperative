<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTrexRequest;
use App\Models\EDTrex;
use Illuminate\Http\Request;

class EDTrexController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:exit_door', [
            'only' => ['index', 'create', 'store',  'edit', 'update', 'destroy']
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transit = EDTrex::all()->where('is_tr', 1);
        return view('admin.exit-door.trex.index', compact('transit'));
    }

    // Export Goods
    public function exportGoods()
    {
        $export = EDTrex::all()->where('is_tr', 0);
        return view('admin.exit-door.trex.export', compact('export'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.exit-door.trex.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTrexRequest $request)
    {
        $item = EDTrex::create($request->all());

        $message = trans('messages.exitDoor.addTrexMsg');

        return redirect()->route('admin.ed-trex.index')->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }

    // Show
    public function show($id)
    {
        $item = EDTrex::findOrFail($id);
        return view('admin.exit-door.trex.show', compact('item'));
    }

    // Edit
    public function edit($id)
    {
        $item = EDTrex::findOrFail($id);
        return view('admin.exit-door.trex.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $item = EDTrex::findOrFail($id);

        $request->validate([
            'c_name'        => 'required|min:3|max:124',
            'vp_number'     => 'required|min:2|max:64',
            'vpt_number'    => 'nullable|min:2|max:64',
            'enex'          => 'required|unique:ed_trex,enex,' . $item->id,
            'good_name'     => 'required|min:3|max:248',
            'weight'        => 'required',
            'bx_total'      => 'required',
            'bx_total_tx'   => 'required',
            'desc'          => 'nullable'
        ]);

        $item->update($request->all());

        $message = trans('messages.exitDoor.updateTrexMsg');

        return redirect()->route('admin.ed-trex.show', $item->id)->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = EDTrex::findOrFail($id);
        $item->delete();

        $message = trans('messages.exitDoor.deleteTrexMsg');

        return redirect()->route('admin.ed-trex.index')->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }

    // Is returned
    public function isReturned(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['is_returned'] == 'Yes') {
                $is_returned = 0;
                EDTrex::where('id', $data['trex_id'])->update(['is_returned' => $is_returned, 'return_date' => null, 'exit_again' => 0, 'ea_date' => null]);
            } else {
                $is_returned = 1;
                EDTrex::where('id', $data['trex_id'])->update(['is_returned' => $is_returned, 'return_date' => now()]);
            }
            return response()->json(['is_returned' => $is_returned, 'trex_id' => $data['trex_id']]);
        }
    }

    // Exit Again
    public function exitAgain(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['exit_again'] == 'Yes') {
                $exit_again = 0;
                EDTrex::where('id', $data['trex_id'])->update(['exit_again' => $exit_again, 'ea_date' => null]);
            } else {
                $exit_again = 1;
                EDTrex::where('id', $data['trex_id'])->update(['exit_again' => $exit_again, 'ea_date' => now()]);
            }
            return response()->json(['exit_again' => $exit_again, 'trex_id' => $data['trex_id']]);
        }
    }

    // Transit Returned Vehicles
    public function trReturned()
    {
        $tr_returned = EDTrex::all()->where('is_returned', 1)->where('is_tr', 1);

        return view('admin.exit-door.trex.tr_returned', compact('tr_returned'));
    }

    // Export Returned Vehicles
    public function exReturned()
    {
        $ex_returned = EDTrex::all()->where('is_returned', 1)->where('is_tr', 0);

        return view('admin.exit-door.trex.ex_returned', compact('ex_returned'));
    }
}
