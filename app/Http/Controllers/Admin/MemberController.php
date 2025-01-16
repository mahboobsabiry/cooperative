<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Deposit;
use App\Models\Admin\Member;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class MemberController extends Controller
{
    // Index
    public function index()
    {
        $members = Member::all();
        return view('admin.members.index', compact('members'));
    }

    // Create
    public function create()
    {
        return view('admin.members.create');
    }

    // Store
    public function store(Request $request)
    {
        $request->validate([
            'avatar'    => 'nullable|image|mimes:png,jpg,jpeg',
            'name'      => 'required|max:255',
            'father_name'   => 'required|max:255',
            'phone'         => 'required|max:255|unique:members,phone',
            'phone2'        => 'nullable|max:255',
            'email'         => 'nullable|max:255|unique:members,email',
            'info'          => 'nullable'
        ]);

        $member = new Member();

        // If has Avatar Image
        if ($request->hasFile('avatar')) {
            $img = $request->file('avatar');
            if ($img->isValid()) {
                $extension = $img->getClientOriginalExtension();
                $imgName = rand(11111, 99999) . '.' . $extension;
                $path = public_path('assets/images/members/');
                $imgPath = $path . $imgName;
                Image::make($img)->save($imgPath);
            }

            $member->avatar = $imgName;
        }

        $member->name           = $request->name;
        $member->father_name    = $request->father_name;
        $member->position       = $request->position;
        $member->phone          = $request->phone;
        $member->phone2         = $request->phone2;
        $member->email          = $request->email;
        $member->address        = $request->address;
        $member->info           = $request->info;
        $member->save();

        return redirect()->route('admin.members.show', $member->id)->with([
            'message'   => 'موفقانه ثبت شد',
            'alertType' => 'success'
        ]);
    }

    // Show
    public function show(Member $member)
    {
        return view('admin.members.show', compact('member'));
    }

    // Edit
    public function edit(Member $member)
    {
        return view('admin.members.edit', compact('member'));
    }

    // Update
    public function update(Request $request, Member $member)
    {
        $request->validate([
            'avatar'    => 'nullable|image|mimes:png,jpg,jpeg',
            'name'      => 'required|max:255',
            'father_name'   => 'required|max:255',
            'phone'         => 'required|max:255|unique:members,phone,' . $member->id,
            'phone2'        => 'nullable|max:255',
            'email'         => 'nullable|max:255|unique:members,email,' . $member->id,
            'info'          => 'nullable'
        ]);

        // If has Avatar Image
        if ($request->hasFile('avatar')) {
            $img = $request->file('avatar');
            if ($img->isValid()) {
                $extension = $img->getClientOriginalExtension();
                $imgName = rand(11111, 99999) . '.' . $extension;
                $path = public_path('assets/images/members/');
                $imgPath = $path . $imgName;

                // Delete from path and storage
                if ($member->avatar) {
                    if (file_exists($path.$member->avatar)) {
                        unlink($path.$member->avatar);
                    }
                }

                Image::make($img)->save($imgPath);
            }

            $avatar = $imgName;
        } else {
            $avatar = $member->avatar;
        }

        $member->avatar         = $avatar;
        $member->name           = $request->name;
        $member->father_name    = $request->father_name;
        $member->position       = $request->position;
        $member->phone          = $request->phone;
        $member->phone2         = $request->phone2;
        $member->email          = $request->email;
        $member->address        = $request->address;
        $member->info           = $request->info;
        $member->save();

        return redirect()->route('admin.members.show', $member->id)->with([
            'message'   => 'موفقانه ویرایش شد',
            'alertType' => 'success'
        ]);
    }

    // Delete Member Avatar
    public function deleteMemberAvatar($id)
    {
        $member = Member::find($id);
        if ($member->avatar) {
            $img = asset('assets/images/members/' . $member->avatar);
            // Delete from path and storage
            if (file_exists($img)) {
                unlink($img);
            }
        }

        $member->update([
            'avatar'    => null,
        ]);

        return back()->with([
            'message'   => 'تصویر موفقانه حذف شد',
            'alertType' => 'success'
        ]);
    }

    // Delete
    public function destroy(Member $member)
    {
        $path = public_path('assets/images/members/');

        // Delete from path and storage
        if ($member->avatar) {
            if (file_exists($path.$member->avatar)) {
                unlink($path.$member->avatar);
            }
        }

        $member->delete();

        return redirect()->back()->with([
            'message'   => 'موفقانه حذف شد',
            'alertType' => 'success'
        ]);
    }
}
