<?php

namespace App\Http\Controllers\Admin\Office;

use App\Http\Controllers\Controller;
use App\Models\Office\AgentColleague;
use Illuminate\Http\Request;

class AgentColleagueController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:office_agent_view', ['only' => ['index', 'inactive', 'show']]);
        $this->middleware('permission:office_agent_edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:office_agent_delete', ['only' => ['destroy']]);
    }

    // Index
    public function index()
    {
        $colleagues = AgentColleague::all()->where('status', 1);
        return view('admin.office.agent-colleagues.index', compact('colleagues'));
    }

    // Index
    public function inactive()
    {
        $colleagues = AgentColleague::all()->where('status', 0);
        return view('admin.office.agent-colleagues.inactive', compact('colleagues'));
    }

    // Show
    public function show($id)
    {
        $colleague = AgentColleague::find($id);
        return view('admin.office.agent-colleagues.show', compact('colleague'));
    }

    // Edit
    public function edit($id)
    {
        $colleague = AgentColleague::find($id);
        return view('admin.office.agent-colleagues.edit', compact('colleague'));
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
        //  Has File && Save Signature Scan
        if ($request->hasFile('signature')) {
            $avatar = $request->file('signature');
            $fileName = 'agent-colleague-signature-' . time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->storeAs('agent-colleagues/signatures', $fileName, 'public');
            $colleague->signature        = $fileName;
        }

        $colleague->save();

        //  Has File && Save Avatar Image
        if ($request->hasFile('photo')) {
            $avatar = $request->file('photo');
            $fileName = 'agent-colleague-' . time() . '.' . $avatar->getClientOriginalExtension();
            $colleague->updateImage($avatar->storeAs('agent-colleagues', $fileName, 'public'));
        }

        return redirect()->route('admin.office.agent-colleagues.show', $colleague->id)->with([
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
        return redirect()->route('admin.office.agent-colleagues.index')->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }
}
