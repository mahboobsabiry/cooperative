<?php

namespace App\Http\Controllers\Admin\Finance;

use App\Http\Controllers\Controller;
use App\Models\Finance\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:finance_currency_view', ['only' => ['index']]);
        $this->middleware('permission:finance_currency_create', ['only' => ['store']]);
        $this->middleware('permission:finance_currency_edit', ['only' => ['update']]);
        $this->middleware('permission:finance_currency_delete', ['only' => ['destroy']]);
    }

    // Index
    public function index()
    {
        $currencies = Currency::all();

        return view('admin.finance.currencies.index', compact('currencies'));
    }

    // Store
    public function store(Request $request)
    {
        // Validate Form
        $request->validate([
            'name'      => 'required|min:2|max:124|unique:currencies,name',
            'code'      => 'required|min:2|max:10|unique:currencies,code',
            'symbol'    => 'required|unique:currencies,symbol'
        ]);

        // Save FORM
        $currency           = new Currency();
        $currency->name     = $request->name;
        $currency->code     = $request->code;
        $currency->symbol   = $request->symbol;
        $currency->info     = $request->info;
        $currency->save();

        // Redirect Back
        return redirect()->route('admin.finance.currencies.index')->with([
            'message'   => 'Added!',
            'alertType' => 'success'
        ]);
    }

    // Update
    public function update(Request $request, Currency $currency)
    {
        // Validate Form
        $request->validate([
            'name'      => 'required|min:2|max:124|unique:currencies,name,' . $currency->id,
            'code'      => 'required|min:2|max:10|unique:currencies,code,' . $currency->id,
            'symbol'    => 'required|unique:currencies,symbol,' . $currency->id
        ]);

        // Save DATA
        $currency->name     = $request->name;
        $currency->code     = $request->code;
        $currency->symbol   = $request->symbol;
        $currency->info     = $request->info;
        $currency->save();

        // Redirect Back
        return redirect()->route('admin.finance.currencies.index')->with([
            'message'   => 'Updated!',
            'alertType' => 'success'
        ]);
    }

    // Delete
    public function destroy(Currency $currency)
    {
        $currency->delete();

        // Redirect Back
        return redirect()->route('admin.finance.currencies.index')->with([
            'message'   => 'Deleted!',
            'alertType' => 'success'
        ]);
    }
}
