<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHostelRequest;
use App\Models\Hostel;
use Illuminate\Http\Request;

class HostelController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:hostel_mgmt', ['only' => ['index', 'create','store', 'show', 'edit', 'update', 'destroy']]);
    }

    // Fetch All Data
    public function index()
    {
        $hostels = Hostel::all();
        return view('admin.hostel.index', compact('hostels'));
    }

    // Create
    public function create()
    {
        return view('admin.hostel.create');
    }

    // Store Data
    public function store(StoreHostelRequest $request)
    {
        Hostel::create($request->all());

        $message = 'ثبت شد!';
        return redirect()->route('admin.hostel.index')->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }

    // Show
    public function show(Hostel $hostel)
    {
        return view('admin.hostel.show', compact('hostel'));
    }

    // Edit
    public function edit(Hostel $hostel)
    {
        return view('admin.hostel.edit', compact('hostel'));
    }

    // Update Data
    public function update(Request $request, Hostel $hostel)
    {
        // Validate
        $request->validate([
            'number'    => 'required',
            'section'   => 'required'
        ]);

        // Save Record
        $hostel->update($request->all());

        $message = 'بروزرسانی گردید!';
        return redirect()->route('admin.hostel.index')->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }

    // Delete Data
    public function destroy(Hostel $hostel)
    {
        $hostel->delete();

        $message = 'حذف گردید!';
        return redirect()->route('admin.hostel.index')->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }
}
