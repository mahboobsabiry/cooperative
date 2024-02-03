<?php

namespace App\Http\Controllers\Admin\Office;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAgentRequest;
use App\Models\Office\Agent;
use App\Models\Office\AgentColleague;
use App\Models\Office\Company;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;

class AgentController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:office_agent_view', ['only' => ['index', 'show', 'inactive']]);
        $this->middleware('permission:office_agent_create', ['only' => ['create','store', 'add_company', 'add_agent_company', 'add_colleague', 'add_agent_colleague']]);
        $this->middleware('permission:office_agent_edit', ['only' => ['edit','update', 'refresh_agent', 'refresh_colleague']]);
        $this->middleware('permission:office_agent_delete', ['only' => ['destroy']]);
    }

    // Fetch All Data
    public function index()
    {
        $agents = Agent::where('status', 1)->get();
        return view('admin.office.agents.index', compact('agents'));
    }

    // Create
    public function create()
    {
        return view('admin.office.agents.create');
    }

    // Store Data
    public function store(StoreAgentRequest $request)
    {
        $agent = Agent::create($request->all());

        //  Has File && Save Avatar Image
        if ($request->hasFile('photo')) {
            $avatar = $request->file('photo');
            $fileName = 'agent-' . time() . '.' . $avatar->getClientOriginalExtension();
            $agent->storeImage($avatar->storeAs('agents', $fileName, 'public'));
        }

        $message = 'ثبت شد!';
        return redirect()->route('admin.office.agents.index')->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }

    // Show
    public function show(Agent $agent)
    {
        return view('admin.office.agents.show', compact('agent'));
    }

    // Edit
    public function edit(Agent $agent)
    {
        return view('admin.office.agents.edit', compact('agent'));
    }

    // Update Data
    public function update(Request $request, Agent $agent)
    {
        // Validate
        $request->validate([
            'photo'     => 'nullable|image|mimes:jpg,png,jfif',
            'name'      => 'required|min:3|max:128',
            'phone'     => 'required|min:8|max:15|unique:agents,phone,' . $agent->id,
            'phone2'    => 'nullable|min:8|max:15',
            'address'   => 'nullable|min:3|max:128',
            'info'      => 'nullable'
        ]);

        // Save Record
        $agent->update($request->all());

        //  Has Photo
        if ($request->hasFile('photo')) {
            $avatar = $request->file('photo');
            $fileName = 'agent-' . time() . '.' . $avatar->getClientOriginalExtension();
            $agent->updateImage($avatar->storeAs('agents', $fileName, 'public'));
        }

        $message = 'بروزرسانی گردید!';
        return redirect()->route('admin.office.agents.index')->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }

    // Delete Data
    public function destroy(Agent $agent)
    {
        $agent->delete();

        $message = 'حذف گردید!';
        return redirect()->route('admin.office.agents.index')->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }

    // Add Company
    public function add_company($id)
    {
        $agent = Agent::find($id);
        if (!empty($agent->company_name) && !empty($agent->company_name2) && !empty($agent->company_name3)) {
            return redirect()->back()->with([
                'message'   => 'یک شخص نماینده بیشتر از یک شرکت بوده نمی تواند.',
                'alertType' => 'danger'
            ]);
        } else {
            return view('admin.office.agents.add_company', compact('agent'));
        }
    }

    // Add Agent Company
    public function add_agent_company(Request $request, $id)
    {
        $agent = Agent::find($id);
        $request->validate([
            'from_date'     => 'required',
            'to_date'       => 'required',
            'doc_number'    => 'required',
            'type'          => 'required',
            'company_name'  => 'required',
            'tin'           => 'required'
        ]);

        if ($agent->company_name == null) {
            $agent->from_date   = $request->from_date;
            $agent->to_date     = $request->to_date;
            $agent->doc_number  = $request->doc_number;
            $agent->company_name    = $request->company_name;
            $agent->company_tin     = $request->tin;
        } elseif ($agent->company_name2 == null) {
            $agent->from_date2   = $request->from_date;
            $agent->to_date2     = $request->to_date;
            $agent->doc_number2  = $request->doc_number;
            $agent->company_name2    = $request->company_name;
            $agent->company_tin2     = $request->tin;
        } elseif ($agent->company_name3 == null) {
            $agent->from_date3   = $request->from_date;
            $agent->to_date3     = $request->to_date;
            $agent->doc_number3  = $request->doc_number;
            $agent->company_name3    = $request->company_name;
            $agent->company_tin3     = $request->tin;
        } elseif(!empty($agent->company_name) && !empty($agent->company_name2) && !empty($agent->company_name3)) {
            return redirect()->back()->with([
                'message'   => 'یک شخص نماینده بیشتر از یک شرکت بوده نمی تواند.',
                'alertType' => 'danger'
            ]);
        }
        $agent->status = 1;
        $agent->save();
        $saved_company = Company::where('name', $request->company_name)->where('tin', $request->tin)->first();
        if ($saved_company) {
            $company = $saved_company;
            $company->agent_id  = $agent->id;
            $company->name      = $saved_company->name;
            $company->tin       = $saved_company->tin;
            $type = implode(',', $request->input('type'));
            $company->type      = $type;
            $company->status    = 1;
        } else {
            $company = new Company();
            $company->agent_id  = $agent->id;
            $company->name      = $request->company_name;
            $company->tin       = $request->tin;
            $type = implode(',', $request->input('type'));
            $company->type      = $type;
        }

        $company->save();

        return redirect()->route('admin.office.agents.show', $agent->id)->with([
            'message'   => 'شرکت موفقانه ثبت شد!',
            'alertType' => 'success'
        ]);
    }

    // Refresh Agent
    public function refresh_agent($id)
    {
        $agent = Agent::find($id);
        // $company = Company::where('agent_id', $agent->id)->first();
        foreach ($agent->companies as $company) {
            // First Company
            if ($company->name == $agent->company_name) {
                $to_date = Jalalian::fromFormat('Y-m-d', $agent->to_date)->toCarbon();

                // Do Refresh When The Time Is Over
                if ($to_date < today()) {
                    $company->update([
                        'background'    => $company->background . 'از تاریخ ' . $company->agent->from_date . ' الی تاریخ ' . $company->agent->to_date. '  نظر به مکتوب نمبر ' . $company->agent->doc_number . '، ' . $company->agent->name . " را منحیث نماینده معرفی نمود.<br>",
                        'agent_id'      => null,
                        'status'        => 0
                    ]);

                    $agent->update([
                        'background'    => $agent->background . 'از تاریخ ' . $agent->from_date . ' الی تاریخ ' . $agent->to_date . ' منحیث نماینده شرکت ' . $agent->company_name . '  نظر به مکتوب نمبر ' . $agent->doc_number . " معرفی گردید.<br>",
                        'from_date'     => null,
                        'to_date'       => null,
                        'doc_number'    => null,
                        'company_name'  => null,
                        'company_tin'   => null
                    ]);
                }
            }

            // Second Company
            if ($company->name == $agent->company_name2) {
                $to_date = Jalalian::fromFormat('Y-m-d', $agent->to_date2)->toCarbon();

                // Do Refresh When The Time Is Over
                if ($to_date < today()) {
                    $company->update([
                        'background'    => $company->background . 'از تاریخ ' . $company->agent->from_date2 . ' الی تاریخ ' . $company->agent->to_date2. '  نظر به مکتوب نمبر ' . $company->agent->doc_number2 . '، ' . $company->agent->name . " را منحیث نماینده معرفی نمود.<br>",
                        'agent_id'      => null,
                        'status'        => 0
                    ]);

                    $agent->update([
                        'background'    => $agent->background . 'از تاریخ ' . $agent->from_date2 . ' الی تاریخ ' . $agent->to_date2 . ' منحیث نماینده شرکت ' . $agent->company_name2 . '  نظر به مکتوب نمبر ' . $agent->doc_number2 . " معرفی گردید.<br>",
                        'from_date2'     => null,
                        'to_date2'       => null,
                        'doc_number2'    => null,
                        'company_name2'  => null,
                        'company_tin2'   => null
                    ]);
                }
            }

            // Third Company
            if ($company->name == $agent->company_name3) {
                $to_date = Jalalian::fromFormat('Y-m-d', $agent->to_date3)->toCarbon();

                // Do Refresh When The Time Is Over
                if ($to_date < today()) {
                    $company->update([
                        'background'    => $company->background . 'از تاریخ ' . $company->agent->from_date3 . ' الی تاریخ ' . $company->agent->to_date3. '  نظر به مکتوب نمبر ' . $company->agent->doc_number3 . '، ' . $company->agent->name . " را منحیث نماینده معرفی نمود.<br>",
                        'agent_id'      => null,
                        'status'        => 0
                    ]);

                    $agent->update([
                        'background'    => $agent->background . 'از تاریخ ' . $agent->from_date3 . ' الی تاریخ ' . $agent->to_date3 . ' منحیث نماینده شرکت ' . $agent->company_name3 . '  نظر به مکتوب نمبر ' . $agent->doc_number3 . " معرفی گردید.<br>",
                        'from_date3'     => null,
                        'to_date3'       => null,
                        'doc_number3'    => null,
                        'company_name3'  => null,
                        'company_tin3'   => null
                    ]);
                }
            }
        }

        // If agent does not have any company then should be inactive
        if ($agent->company_name == null && $agent->company_name2 == null && $agent->company_name3 == null) {
            $agent->update([
                'status' => 0
            ]);
        }

        return redirect()->back()->with([
            'message'   => 'تازه سازی انجام شد!',
            'alertType' => 'success'
        ]);
    }

    // Refresh Agent Colleague
    public function refresh_colleague($id)
    {
        $agent = Agent::find($id);
        foreach ($agent->colleagues as $colleague) {
            $to_date = Jalalian::fromFormat('Y-m-d', $colleague->to_date)->toCarbon();

            // Do Refresh When The Time Is Over
            if ($to_date < today()) {
                $agent->update([
                    'background'    => $agent->background . 'از تاریخ ' . $colleague->from_date . ' الی تاریخ ' . $colleague->to_date . '  نظر به مکتوب نمبر ' . $colleague->doc_number . ', ' . $colleague->name . " را منحیث همکار با خود داشت.<br>"
                ]);

                $colleague->update([
                    'background'    => $colleague->background . 'از تاریخ ' . $colleague->from_date . ' الی تاریخ ' . $colleague->to_date. '  نظر به مکتوب نمبر ' . $colleague->doc_number . '، منحیث همکار ' . $colleague->agent->name . " معرفی گردید.<br>",
                    'agent_id'      => null,
                    'from_date'     => null,
                    'to_date'       => null,
                    'doc_number'    => null,
                    'status'        => 0
                ]);
            }
        }

        return redirect()->back()->with([
            'message'   => 'تازه سازی انجام شد!',
            'alertType' => 'success'
        ]);
    }

    // Inactive Agents
    public function inactive()
    {
        $agents = Agent::where('status', 0)->get();
        return view('admin.office.agents.inactive', compact('agents'));
    }

    // Add Colleague
    public function add_colleague($id)
    {
        $agent = Agent::find($id);
        return view('admin.office.agents.add_colleague', compact('agent'));
    }

    // Add Agent Colleague
    public function add_agent_colleague(Request $request, $id)
    {
        $agent = Agent::find($id);
        $request->validate([
            'name'          => 'required|min:3|max:128',
            'phone'         => 'required|min:8|max:15',
            'address'       => 'required|min:3|max:128',
            'from_date'     => 'required',
            'to_date'       => 'required',
            'doc_number'    => 'required',
        ]);

        $colleague              = new AgentColleague();
        $colleague->agent_id    = $agent->id;
        $colleague->name        = $request->name;
        $colleague->phone       = $request->phone;
        $colleague->phone2      = $request->phone2;
        $colleague->from_date   = $request->from_date;
        $colleague->to_date     = $request->to_date;
        $colleague->doc_number  = $request->doc_number;
        $colleague->address     = $request->address;
        $colleague->info        = $request->info;
        $colleague->status = 1;
        $colleague->save();

        //  Has File && Save Avatar Image
        if ($request->hasFile('photo')) {
            $avatar = $request->file('photo');
            $fileName = 'agent-colleague-' . time() . '.' . $avatar->getClientOriginalExtension();
            $colleague->storeImage($avatar->storeAs('agent-colleagues', $fileName, 'public'));
        }

        return redirect()->route('admin.office.agents.show', $agent->id)->with([
            'message'   => 'همکار موفقانه ثبت شد!',
            'alertType' => 'success'
        ]);
    }
}
