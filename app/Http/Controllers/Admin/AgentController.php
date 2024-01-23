<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAgentRequest;
use App\Http\Requests\StoreCompanyRequest;
use App\Models\Agent;
use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;

class AgentController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:agent_mgmt', ['only' => ['index', 'create','store', 'show', 'edit', 'update', 'destroy']]);
    }

    // Fetch All Data
    public function index()
    {
        $agents = Agent::get();
        return view('admin.agents.index', compact('agents'));
    }

    // Create
    public function create()
    {
        return view('admin.agents.create');
    }

    // Store Data
    public function store(StoreAgentRequest $request)
    {
        Agent::create($request->all());

        $message = 'ثبت شد!';
        return redirect()->route('admin.agents.index')->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }

    // Show
    public function show(Agent $agent)
    {
        return view('admin.agents.show', compact('agent'));
    }

    // Edit
    public function edit(Agent $agent)
    {
        return view('admin.agents.edit', compact('agent'));
    }

    // Update Data
    public function update(Request $request, Agent $agent)
    {
        // Validate
        $request->validate([
            'name'      => 'required|min:3|max:128',
            'phone'     => 'required|min:8|max:15|unique:agents,phone,' . $agent->id,
            'phone2'    => 'nullable|min:8|max:15',
            'address'   => 'nullable|min:3|max:128',
            'info'      => 'nullable'
        ]);

        // Save Record
        $agent->update($request->all());

        $message = 'بروزرسانی گردید!';
        return redirect()->route('admin.agents.index')->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }

    // Delete Data
    public function destroy(Agent $agent)
    {
        $agent->delete();

        $message = 'حذف گردید!';
        return redirect()->route('admin.agents.index')->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }

    // Add Company
    public function add_company($id)
    {
        $agent = Agent::find($id);
        $companies = Company::all();
        return view('admin.agents.add_company', compact('agent', 'companies'));
    }

    // Add Agent Company
    public function add_agent_company(Request $request, $id)
    {
        $agent = Agent::find($id);
        $request->validate([
            'from_date'     => 'required',
            'to_date'       => 'required',
            'doc_number'    => 'required',
            'company_name'  => 'required',
            'tin'           => 'required'
        ]);

        if (empty($agent->from_date)) {
            $agent->from_date   = $request->from_date;
            $agent->to_date     = $request->to_date;
            $agent->doc_number  = $request->doc_number;
        } elseif (!empty($agent->from_date) && empty($agent->from_date2)) {
            $agent->from_date2   = $request->from_date2;
            $agent->to_date2     = $request->to_date2;
            $agent->doc_number2  = $request->doc_number2;
            $agent->save();
        } elseif (!empty($agent->from_date) && !empty($agent->from_date2) && empty($agent->from_date3)) {
            $agent->from_date3   = $request->from_date3;
            $agent->to_date3     = $request->to_date3;
            $agent->doc_number3  = $request->doc_number3;
            $agent->save();
        } else {
            return redirect()->back()->with([
                'message'   => 'نماینده بیشتر از سه شرکت نمیتواند بگیرد.',
                'alertType' => 'danger'
            ]);
        }
        $agent->save();
        $company = new Company();
        $company->agent_id  = $agent->id;
        $company->name      = $request->company_name;
        $company->tin       = $request->tin;
        $company->type      = $request->type;
        $company->save();

        return redirect()->route('admin.agents.show', $agent->id)->with([
            'message'   => 'شرکت موفقانه ثبت شد!',
            'alertType' => 'success'
        ]);
    }
}
