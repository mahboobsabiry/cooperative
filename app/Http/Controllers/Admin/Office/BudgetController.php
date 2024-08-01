<?php

namespace App\Http\Controllers\Admin\Office;

use App\Http\Controllers\Controller;
use App\Models\Office\Budget;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function index()
    {
        $budgets = Budget::all();
        return 'There is no page yet. ';
    }

    public function create()
    {
        return view('admin.office.budgets.create');
    }
}
