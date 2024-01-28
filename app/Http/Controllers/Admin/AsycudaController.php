<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class AsycudaController extends Controller
{
    // Asycuda Users
    public function users()
    {
        $asy_users = Employee::all();
        return view('admin.asycuda.users', compact('asy_users'));
    }
}
