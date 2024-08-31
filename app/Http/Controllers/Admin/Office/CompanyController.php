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
        $this->middleware('permission:office_company_view', ['only' => ['index', 'inactive']]);
    }

    // Fetch All Data
    public function index()
    {
        $companies = Company::where('status', 1)->get();
        return view('admin.office.companies.index', compact('companies'));
    }

    // Fetch All Data
    public function inactive()
    {
        $companies = Company::where('status', 0)->get();
        return view('admin.office.companies.inactive', compact('companies'));
    }

    // Show
    public function show(Company $company)
    {
        return view('admin.office.companies.show', compact('company'));
    }

    // Edit
    public function edit(Company $company)
    {
        return view('admin.office.companies.edit', compact('company'));
    }

    // Update
    public function update(Request $request, Company $company)
    {
        $request->validate(['info' => 'required']);
        $company->info = $request->input('info');
        $company->save();
        return redirect()->route('admin.office.companies.show', $company->id)->with(['message' => 'موفقانه ویرایش شد!', 'alertType' => 'success']);
    }

    // Delete
    public function destroy(Company $company)
    {
        $company->delete();

        return back()->with(['message' => 'موفقانه حذف شد!', 'alertType' => 'success']);
    }
}
