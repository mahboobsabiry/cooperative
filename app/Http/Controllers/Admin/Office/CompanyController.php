<?php

namespace App\Http\Controllers\Admin\Office;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyRequest;
use App\Models\Office\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:company_mgmt', ['only' => ['index','store', 'update', 'destroy']]);
    }

    // Fetch All Data
    public function index()
    {
        $companies = Company::where('status', 1)->get();
        return view('admin.office.companies.index', compact('companies'));
    }

    // Store Data
    public function store(StoreCompanyRequest $request)
    {
        Company::create($request->all());

        $message = 'ثبت شد!';
        return redirect()->route('admin.office.companies.index')->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }

    // Update Data
    public function update(Request $request, Company $company)
    {
        // Validate
        $request->validate([
            'agent_id'  => 'nullable',
            'name'  => 'required|min:3|max:48|unique:companies,name,' . $company->id,
            'tin'   => 'required|unique:companies,tin,' . $company->id
        ]);

        // Save Record
        $company->update($request->all());

        $message = 'بروزرسانی گردید!';
        return redirect()->route('admin.office.companies.index')->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }

    // Delete Data
    public function destroy(Company $company)
    {
        $company->delete();

        $message = 'حذف گردید!';
        return redirect()->route('admin.office.companies.index')->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }

    // Fetch All Data
    public function inactive()
    {
        $companies = Company::where('status', 0)->get();
        return view('admin.office.companies.inactive', compact('companies'));
    }
}
