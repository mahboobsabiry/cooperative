<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\AgentColleague;
use Illuminate\Http\Request;

class AgentColleagueController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:agent_mgmt', ['only' => ['index', 'create','store', 'show', 'edit', 'update', 'destroy']]);
    }

    // Index
    public function index()
    {
        $colleagues = AgentColleague::all();
        return view('admin.agent-colleagues.index', compact('colleagues'));
    }

    // Show
    public function show($id)
    {
        $colleague = AgentColleague::find($id);
        return view('admin.agent-colleagues.show', compact('colleague'));
    }

    // Edit
    public function edit($id)
    {
        $colleague = AgentColleague::find($id);
        return view('admin.agent-colleagues.edit', compact('colleague'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $colleague = AgentColleague::find($id);
        $request->validate([
            'name'      => 'required|min:3|max:128',
            'phone'     => 'required|min:8|max:15',
            'phone2'    => 'nullable|min:8|max:15',
            'address'   => 'required|min:3|max:128'
        ]);
        $colleague->name        = $request->name;
        $colleague->phone       = $request->phone;
        $colleague->phone2      = $request->phone2;
        $colleague->address     = $request->address;
        $colleague->info        = $request->info;
        $colleague->save();

        //  Has File && Save Avatar Image
        if ($request->hasFile('photo')) {
            $avatar = $request->file('photo');
            $fileName = 'agent-colleague-' . time() . '.' . $avatar->getClientOriginalExtension();
            $colleague->updateImage($avatar->storeAs('agent-colleagues', $fileName, 'public'));
        }

        return redirect()->route('admin.agent-colleagues.show', $colleague->id)->with([
            'message'   => 'معلومات همکار نماینده موفقانه ویرایش شد!',
            'alertType' => 'success'
        ]);
    }

    // Delete Data
    public function destroy($id)
    {
        $colleague = AgentColleague::find($id);
        $colleague->delete();

        $message = 'حذف گردید!';
        return redirect()->route('admin.agent-colleagues.index')->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }
}
