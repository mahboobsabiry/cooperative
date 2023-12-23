<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class SettingController extends Controller
{public function __construct()
{
    $this->middleware('permission:setting_access|setting_create|setting_update|setting_delete', [
        'only' => ['index', 'create', 'store',  'edit', 'update', 'destroy']
    ]);
    $this->middleware('permission:setting_access', ['only' => ['index']]);
    $this->middleware('permission:setting_create', ['only' => ['create', 'store']]);
    $this->middleware('permission:setting_update', ['only' => ['edit', 'update']]);
    $this->middleware('permission:setting_delete', ['only' => ['destroy']]);
}

    // Fetch All Data
    public function index()
    {
        abort_if(Gate::denies('setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $settings = Setting::all();
        return view('admin.settings.index', compact('settings'));
    }

    // Store Data
    public function store(Request $request)
    {
        abort_if(Gate::denies('setting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $request->validate([
            'key'   => 'required|regex:/^[\pL\s\-]+$/u||min:3|max:48|unique:settings,key',
            'value' => 'required|regex:/^[\pL\s\-]+$/u||min:3'
        ]);

        $setting = Setting::create($request->all());

        activity('added')
            ->causedBy(Auth::user())
            ->performedOn($setting)
            ->log(trans('messages.settings.addedSettingMsg'));

        $message = trans('messages.settings.addedSettingMsg');

        return redirect()->route('admin.settings.index')->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }

    // Update Data
    public function update(Request $request, Setting $setting)
    {
        // Authorize
        abort_if(Gate::denies('setting_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // Validate
        $request->validate([
            'key'   => 'required|regex:/^[\pL\s\-]+$/u||min:3|max:48|unique:settings,key,'.$setting->id,
            'value' => 'required|regex:/^[\pL\s\-]+$/u||min:3',
        ]);

        // Save Record
        $setting->update($request->all());

        activity('updated')
            ->causedBy(Auth::user())
            ->performedOn($setting)
            ->log(trans('messages.settings.updatedSettingMsg'));

        $message = trans('messages.settings.updatedSettingMsg');
        return redirect()->route('admin.settings.index')->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }

    // Delete Data
    public function destroy(Setting $setting)
    {
        abort_if(Gate::denies('setting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $setting->delete();

        activity('deleted')
            ->causedBy(Auth::user())
            ->performedOn($setting)
            ->log(trans('messages.settings.deletedSettingMsg'));

        $message = trans('messages.settings.deletedSettingMsg');
        return redirect()->route('admin.settings.index')->with([
            'message'   => $message,
            'alertType' => 'success'
        ]);
    }
}
