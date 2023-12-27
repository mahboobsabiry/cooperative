<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRejectRequest;
use App\Models\EDRejected;
use Illuminate\Http\Request;

class EDRejectedController extends Controller
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
        $rejectedGoods = EDRejected::orderBy('created_at', 'DESC')->get();
        return view('admin.exit-door.rejected.index', compact('rejectedGoods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.exit-door.rejected.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRejectRequest $request)
    {
        $item = EDRejected::create($request->all());

        $message = trans('messages.exitDoor.addRejVMsg');

        return redirect()->route('admin.ed-rejected.index')->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }

    // Show
    public function show($id)
    {
        $item = EDRejected::findOrFail($id);
        return view('admin.exit-door.rejected.show', compact('item'));
    }

    // Edit
    public function edit($id)
    {
        $item = EDRejected::findOrFail($id);
        return view('admin.exit-door.rejected.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $item = EDRejected::findOrFail($id);

        $request->validate([
            'c_name'        => 'required|min:3|max:124',
            'good_name'     => 'required|min:2|max:248',
            'vp_number'     => 'required|min:2|max:64',
            'vpt_number'    => 'nullable|min:2|max:64',
            'desc'          => 'nullable'
        ]);

        $item->update($request->all());

        $message = trans('messages.exitDoor.updateRejVMsg');

        return redirect()->route('admin.ed-rejected.show', $item->id)->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = EDRejected::findOrFail($id);
        $item->delete();

        $message = trans('messages.exitDoor.deleteRejVMsg');

        return redirect()->route('admin.ed-rejected.index')->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }
}
