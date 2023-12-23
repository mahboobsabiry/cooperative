<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;

class ManagementController extends Controller
{
    // General Management
    public function index()
    {
        $management = Position::all()->where('position_number', 4);
        return view('admin.positions.management.index', compact('management'));
    }
}
