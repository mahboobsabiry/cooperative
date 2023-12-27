<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:organization_mgmt', [
            'only' => ['index']
        ]);
    }

    public function index()
    {
        $department = Position::all()->where('position_number', 2);
        // $organization = Position::with(['children'])->where('parent_id', 0)->get();
        $organization = Position::tree();
        // dd($organization);
        return view('admin.positions.department.index', compact('department', 'organization'));
    }
}
