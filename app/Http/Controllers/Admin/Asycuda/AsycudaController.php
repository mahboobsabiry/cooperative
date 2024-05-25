<?php

namespace App\Http\Controllers\Admin\Asycuda;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\File;
use App\Models\Office\Employee;
use App\Models\Office\Position;
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
