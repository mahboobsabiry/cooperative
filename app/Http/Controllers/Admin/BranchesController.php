<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;

class BranchesController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:organization_mgmt', [
            'only' => ['index']
        ]);
    }

    // All Data
    public function index()
    {
        $branches = Position::all()->where('position_number', '>', 4);
        return view('admin.positions.branches.index', compact('branches'));
    }
}
