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
        $books = Deposit::all();
        return view('admin.deposits.index', compact('books'));
    }

    // Create
    public function create()
    {
        $subjects = Member::all();
        return view('admin.deposits.create', compact('subjects'));
    }

    // Store
    public function store(Request $request)
    {
        $request->validate([
            'subject_id'    => 'required',
            'img'           => 'nullable|image|mimes:png,jpg,jpeg',
            'name'          => 'required',
            'author_name'   => 'nullable',
            'closet_number' => 'nullable|numeric',
            'shelf_number'  => 'nullable|numeric'
        ]);

        // Books
        $book = new Deposit();
        $book->subject_id   = $request->subject_id;

        // If has Image
        if ($request->hasFile('img')) {
            $img = $request->file('img');
            if ($img->isValid()) {
                $extension = $img->getClientOriginalExtension();
                $imgName = rand(11111, 99999) . '.' . $extension;
                $imgPath = public_path('assets/images/deposits/') . $imgName;
                Image::make($img)->save($imgPath);
            }

            $book->img = $imgName;
        }

        $book->name         = $request->name;
        $book->author_name  = $request->author_name;
        $book->closet_number    = $request->closet_number;
        $book->shelf_number     = $request->shelf_number;
        $book->info             = $request->info;
        $book->save();

        return redirect()->route('admin.deposits.index')->with([
            'message'   => 'موفقانه ثبت شد',
            'alertType' => 'success'
        ]);
    }

    // Show
    public function show(Deposit $book)
    {
        return view('admin.deposits.show', compact('book'));
    }

    // Edit
    public function edit(Deposit $book)
    {
        $subjects = Member::all();
        return view('admin.deposits.edit', compact('book', 'subjects'));
    }

    // Update
    public function update(Request $request, Deposit $book)
    {
        $request->validate([
            'subject_id'    => 'required',
            'img'           => 'nullable|image|mimes:png,jpg,jpeg',
            'name'          => 'required',
            'author_name'   => 'nullable',
            'closet_number' => 'nullable|numeric',
            'shelf_number'  => 'nullable|numeric'
        ]);

        // Save Books
        $book->subject_id   = $request->subject_id;

        // If has Image
        if ($request->hasFile('img')) {
            $img = $request->file('img');
            if ($img->isValid()) {
                $extension = $img->getClientOriginalExtension();
                $imgName = rand(11111, 99999) . '.' . $extension;
                $path = public_path('assets/images/deposits/');
                $imgPath = $path . $imgName;

                // Delete from path and storage
                if ($book->img) {
                    if (file_exists($path.$book->img)) {
                        unlink($path.$book->img);
                    }
                }

                Image::make($img)->save($imgPath);
            }
            $image = $imgName;
        } else {
            $image = $book->img;
        }

        $book->img          = $image;
        $book->name         = $request->name;
        $book->author_name  = $request->author_name;
        $book->closet_number    = $request->closet_number;
        $book->shelf_number     = $request->shelf_number;
        $book->info             = $request->info;
        $book->save();

        return redirect()->route('admin.deposits.index')->with([
            'message'   => 'موفقانه ویرایش شد',
            'alertType' => 'success'
        ]);
    }

    // Delete
    public function destroy(Deposit $book)
    {
        // Get category Image path
        $imgPath = public_path('assets/images/deposits/');

        // Delete from path and storage
        if (file_exists($imgPath.$book->img)) {
            unlink($imgPath.$book->img);
        }

        $book->delete();

        return redirect()->route('admin.deposits.index')->with([
            'message'   => 'موفقانه حذف شد',
            'alertType' => 'success'
        ]);
    }
}
