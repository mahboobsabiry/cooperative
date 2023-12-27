<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmptyRequest;
use App\Models\EDEmpty;
use Illuminate\Http\Request;

class EDEmptyController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:exit_door', [
            'only' => ['index', 'create', 'store', 'show',  'edit', 'update', 'destroy']
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emptyVehicles = EDEmpty::orderBy('created_at', 'DESC')->get();
        return view('admin.exit-door.empty.index', compact('emptyVehicles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.exit-door.empty.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmptyRequest $request)
    {
        $item = EDEmpty::create($request->all());

        $message = trans('messages.exitDoor.addEmptyVMsg');

        return redirect()->route('admin.ed-empty.index')->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }

    // Show
    public function show($id)
    {
        $item = EDEmpty::findOrFail($id);
        return view('admin.exit-door.empty.show', compact('item'));
    }

    // Edit
    public function edit($id)
    {
        $item = EDEmpty::findOrFail($id);
        return view('admin.exit-door.empty.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $item = EDEmpty::findOrFail($id);

        $request->validate([
            'c_name'        => 'required|min:3|max:124',
            'vp_number'     => 'required|min:2|max:64',
            'vpt_number'    => 'nullable|min:2|max:64',
            'enex'          => 'required|unique:ed_empty,enex,' . $item->id,
            'desc'          => 'nullable'
        ]);

        $item->update($request->all());

        $message = trans('messages.exitDoor.updateEmptyVMsg');

        return redirect()->route('admin.ed-empty.show', $item->id)->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = EDEmpty::findOrFail($id);
        $item->delete();

        $message = trans('messages.exitDoor.deleteEmptyVMsg');

        return redirect()->route('admin.ed-empty.index')->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }
}
