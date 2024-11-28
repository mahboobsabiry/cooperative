<?php

namespace App\Http\Controllers\Admin\Finance;

use App\Http\Controllers\Controller;
use App\Models\Admin\Finance\Budget;
use App\Models\Finance\Currency;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:finance_budget_view', ['only' => ['index', 'show']]);
        $this->middleware('permission:finance_budget_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:finance_budget_edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:finance_budget_delete', ['only' => ['destroy']]);
    }

    // Index
    public function index()
    {
        $budgets = Budget::all();
        return view('admin.finance.budgets.index', compact('budgets'));
    }

    // Create
    public function create()
    {
        $currencies = Currency::all();
        return view('admin.finance.budgets.create', compact('currencies'));
    }

    // Store
    public function store(Request $request)
    {
        // Validate
        $request->validate([
            'currency_id'   => 'required',
            'title'         => 'required|max:124',
            'code'          => 'required|max:48|unique:budgets,code',
            'amount'        => 'required',
            'info'          => 'nullable'
        ]);

        // Store DATA
        $budget = new Budget();
        $budget->currency_id = $request->currency_id;
        $budget->title  = $request->title;
        $budget->code   = $request->code;
        $budget->amount = $request->amount;
        $budget->info   = $request->info;
        $budget->save();

        // Redirect TO Details Page
        return redirect()->route('admin.finance.budgets.show', $budget->id)->with([
            'message'   => 'Added!',
            'alertType' => 'success'
        ]);
    }

    // Show
    public function show(Budget $budget)
    {
        return view('admin.finance.budgets.show', compact('budget'));
    }

    // Edit
    public function edit(Budget $budget)
    {
        $currencies = Currency::all();
        return view('admin.finance.budgets.edit', compact('budget', 'currencies'));
    }

    // Update
    public function update(Request $request, Budget $budget)
    {
        // Validate
        $request->validate([
            'currency_id'   => 'required',
            'title'         => 'required|max:124',
            'code'          => 'required|max:48|unique:budgets,code,' . $budget->id,
            'amount'        => 'required',
            'info'          => 'nullable'
        ]);

        // Update DATA
        $budget->currency_id = $request->currency_id;
        $budget->title  = $request->title;
        $budget->code   = $request->code;
        $budget->amount = $request->amount;
        $budget->info   = $request->info;
        $budget->save();

        // Redirect TO Details Page
        return redirect()->route('admin.finance.budgets.show', $budget->id)->with([
            'message'   => 'Updated!',
            'alertType' => 'success'
        ]);
    }

    // Delete
    public function destroy(Budget $budget)
    {
        $budget->delete();

        // Redirect TO Index Page
        return redirect()->route('admin.finance.budgets.index')->with([
            'message'   => 'Deleted!',
            'alertType' => 'success'
        ]);
    }
}
