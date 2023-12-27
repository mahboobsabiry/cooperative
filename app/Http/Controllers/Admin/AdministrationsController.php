<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;

class AdministrationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:organization_mgmt', [
            'only' => ['index']
        ]);
    }

    // Administrations
    public function index()
    {
        $administrations = Position::all()->where('position_number', 3);
        return view('admin.positions.administrations.index', compact('administrations'));
    }
}
