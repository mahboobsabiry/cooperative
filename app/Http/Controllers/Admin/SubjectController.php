<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Book;
use App\Models\Admin\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    // Index
    public function index()
    {
        $subjects = Subject::all();
        return view('admin.subjects.index', compact('subjects'));
    }

    // Store
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'info'  => 'nullable'
        ]);

        $subject = new Subject();
        $subject->title    = $request->title;
        $subject->info     = $request->info;
        $subject->save();

        return redirect()->route('admin.subjects.index')->with([
            'message'   => 'موفقانه ثبت شد',
            'alertType' => 'success'
        ]);
    }

    // Show
    public function show(Subject $subject)
    {
        return view('admin.subjects.show', compact('subject'));
    }

    // Update
    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'title' => 'required|max:255',
            'info'  => 'nullable'
        ]);

        $subject->title    = $request->title;
        $subject->info     = $request->info;
        $subject->save();

        return redirect()->route('admin.subjects.index')->with([
            'message'   => 'موفقانه ویرایش شد',
            'alertType' => 'success'
        ]);
    }

    // Delete
    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()->back()->with([
            'message'   => 'موفقانه حذف شد',
            'alertType' => 'success'
        ]);
    }
}
