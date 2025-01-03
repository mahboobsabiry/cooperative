<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:setting_mgmt', [
            'only' => ['index', 'store', 'update', 'destroy']
        ]);
    }

    // Fetch All Data
    public function index()
    {
        $settings = Setting::all();
        return view('admin.settings.index', compact('settings'));
    }

    // Store Data
    public function store(Request $request)
    {
        $request->validate([
            'key'   => 'required|regex:/^[\pL\s\-]+$/u|min:3|max:48|unique:settings,key',
            'value' => 'required|min:3'
        ]);

        $setting = new Setting();
        $setting->key   = $request->key;
        $setting->value = $request->value;

        $setting->save();

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
        // Validate
        $request->validate([
            'key'   => 'required|regex:/^[\pL\s\-]+$/u||min:3|max:48|unique:settings,key,'.$setting->id,
            'value' => 'required|min:3',
        ]);

        $setting->key   = $request->key;
        $setting->value = $request->value;
        $setting->save();

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
