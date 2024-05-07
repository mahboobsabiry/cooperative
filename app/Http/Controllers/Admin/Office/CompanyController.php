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
}
