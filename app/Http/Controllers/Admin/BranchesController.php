<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;

class BranchesController extends Controller
{
    // All Data
    public function index()
    {
        $branches = Position::all()->where('position_number', '>', 4);
        return view('admin.positions.branches.index', compact('branches'));
    }
}
