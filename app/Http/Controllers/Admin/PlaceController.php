<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:place_view', ['only' => ['index', 'show']]);
        $this->middleware('permission:place_create', ['only' => ['create','store']]);
        $this->middleware('permission:place_edit', ['only' => ['edit','update']]);
        $this->middleware('permission:place_delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $places = Place::all();
        if (count($places) < 1) {
            $code = "P01";
        } else {
            $code = "P0" . Place::latest()->first()->id + 1;
        }
        return view('admin.places.index', compact('places', 'code'));
    }

    // Store
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'name'          => 'required',
            'custom_code'   => 'nullable',
            'info'          => 'nullable'
        ]);

        //
        $places = Place::all();
        if (count($places) < 1) {
            $code = "P01";
        } else {
            $code = "P0" . Place::latest()->first()->id + 1;
        }

        $place = new Place;
        $place->name    = $request->input('name');
        $place->code    = $code;
        $place->custom_code     = $request->input('custom_code');
        $place->info    = $request->input('info');
        $place->save();

        return redirect()->route('admin.places.index')->with([
            'message'   => 'موفقانه ثبت گردید.',
            'alertType' => 'success',
        ]);
    }

    // Show
    public function show(Place $place) {
        return view('admin.places.show', compact('place'));
    }

    // Update
    public function update(Request $request, Place $place)
    {
        // Validation
        $request->validate([
            'name'          => 'required',
            'custom_code'   => 'nullable',
            'info'          => 'nullable'
        ]);

        $place->name    = $request->input('name');
        $place->custom_code     = $request->input('custom_code');
        $place->info    = $request->input('info');
        $place->save();

        return redirect()->route('admin.places.index')->with([
            'message'   => 'موفقانه ویرایش گردید.',
            'alertType' => 'success',
        ]);
    }

    // Delete
    public function destroy(Place $place) {
        $place->delete();
        return redirect()->route('admin.places.index')->with([
            'message'   => 'موفقانه حذف شد.',
            'alertType' => 'success',
        ]);
    }
}
