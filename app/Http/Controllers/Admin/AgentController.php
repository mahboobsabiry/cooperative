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
            'info'      => 'nullable',
            'from_date' => 'required',
            'to_date'   => 'required',
            'doc_number'=> 'required'
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
}
