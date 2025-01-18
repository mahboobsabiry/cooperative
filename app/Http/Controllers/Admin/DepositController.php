<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Deposit;
use App\Models\Admin\Member;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class DepositController extends Controller
{
    // Index
    public function index()
    {
        $deposits = Deposit::with('member')->get();
        return view('admin.deposits.index', compact('deposits'));
    }

    // Show
    public function show(Deposit $deposit)
    {
        return view('admin.deposits.show', compact('deposit'));
    }

    // Delete
    public function destroy(Deposit $deposit)
    {
        $deposit->delete();

        return redirect()->route('admin.deposits.index')->with([
            'message'   => 'موفقانه حذف شد',
            'alertType' => 'success'
        ]);
    }
}
