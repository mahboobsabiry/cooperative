<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Index
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    // Store
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'info'  => 'nullable'
        ]);

        $category = new Category();
        $category->title    = $request->title;
        $category->info     = $request->info;
        $category->save();

        return redirect()->back()->with([
            'message'   => 'موفقانه ثبت شد',
            'alertType' => 'success'
        ]);
    }

    // Update
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title' => 'required|max:255',
            'info'  => 'nullable'
        ]);

        $category->title    = $request->title;
        $category->info     = $request->info;
        $category->save();

        return redirect()->back()->with([
            'message'   => 'موفقانه ویرایش شد',
            'alertType' => 'success'
        ]);
    }

    // Delete
    public function destroy(Request $request, Category $category)
    {
        $category->delete();

        return redirect()->back()->with([
            'message'   => 'موفقانه حذف شد',
            'alertType' => 'success'
        ]);
    }
}
