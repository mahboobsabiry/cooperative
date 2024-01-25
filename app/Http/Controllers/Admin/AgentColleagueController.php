<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AgentColleague;
use Illuminate\Http\Request;

class AgentColleagueController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:agent_mgmt', ['only' => ['index', 'create','store', 'show', 'edit', 'update', 'destroy']]);
    }

    // Index
    public function index()
    {
        $colleagues = AgentColleague::all();
        return view('admin.agent-colleagues.index', compact('colleagues'));
    }

    // Show
    public function show(AgentColleague $colleague)
    {
        return view('admin.agent-colleagues.show', compact('colleague'));
    }
}
