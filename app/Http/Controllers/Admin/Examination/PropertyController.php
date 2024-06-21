<?php

namespace App\Http\Controllers\Admin\Examination;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyRequest;
use App\Models\Examination\Property;
use App\Models\Office\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:examination_property_view', ['only' => ['index', 'show']]);
        $this->middleware('permission:examination_property_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:examination_property_edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:examination_property_delete', ['only' => ['destroy']]);
    }

    /**
     * Index Page to retrieve all of properties
     */
    public function index()
    {
        $properties = Property::all();

        return view('admin.examination.properties.index', compact('properties'));
    }

    /**
     * Create Page
     */
    public function create()
    {
        $companies = Company::all()->where('status', 1);
        return view('admin.examination.properties.create', compact('companies'));
    }

    /**
     * Store DATA
     */
    public function store(PropertyRequest $request)
    {
        $property               = new Property();
        $property->user_id      = Auth::user()->id;
        $property->company_id   = $request->company_id;
        $property->doc_number   = $request->doc_number;
        $property->doc_date     = $request->doc_date;
        $property->property_name    = $request->property_name;
        $property->property_code    = $request->property_code;
        $property->ts_code      = $request->ts_code;
        $property->weight       = $request->weight;
        $property->start_date   = $request->start_date;
        $property->end_date     = $request->end_date;
        $property->info         = $request->info;
        $property->save();

        //  Has File && Save Avatar Image
        if ($request->hasFile('photo')) {
            $avatar = $request->file('photo');
            $fileName = 'property-' . time() . rand(111, 99999) . '.' . $avatar->getClientOriginalExtension();
            $property->storeImage($avatar->storeAs('examination/properties', $fileName, 'public'));
        }

        return redirect()->route('admin.examination.properties.index')->with([
            'message'   => 'جایداد ثبت گردید!',
            'alertType' => 'success'
        ]);
    }

    /**
     * Show details of record
     */
    public function show(Property $property)
    {
        return view('admin.examination.properties.show', compact('property'));
    }

    /**
     * Edit details of record
     */
    public function edit(Property $property)
    {
        $companies = Company::all()->where('status', 1);
        return view('admin.examination.properties.edit', compact('property', 'companies'));
    }

    /**
     * Update DATA
     */
    public function update(PropertyRequest $request, Property $property)
    {
        $property->user_id      = Auth::user()->id;
        $property->company_id   = $request->company_id;
        $property->doc_number   = $request->doc_number;
        $property->doc_date     = $request->doc_date;
        $property->property_name    = $request->property_name;
        $property->property_code    = $request->property_code;
        $property->ts_code      = $request->ts_code;
        $property->weight       = $request->weight;
        $property->start_date   = $request->start_date;
        $property->end_date     = $request->end_date;
        $property->info         = $request->info;
        $property->save();

        //  Has File && Save Avatar Image
        if ($request->hasFile('photo')) {
            $avatar = $request->file('photo');
            $fileName = 'property-' . time() . rand(111, 99999) . '.' . $avatar->getClientOriginalExtension();
            $property->updateImage($avatar->storeAs('examination/properties', $fileName, 'public'));
        }

        return redirect()->route('admin.examination.properties.index')->with([
            'message'   => 'جایداد بروزرسانی گردید!',
            'alertType' => 'success'
        ]);
    }

    /**
     * Delete DATA
     */
    public function destroy(Property $property)
    {
        $property->delete();

        return redirect()->route('admin.examination.properties.index')->with([
            'message'   => 'جایداد حذف گردید!',
            'alertType' => 'success'
        ]);
    }
}
