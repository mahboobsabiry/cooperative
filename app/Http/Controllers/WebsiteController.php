<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    // Index
    public function index()
    {
        if (app()->getLocale() == 'tr') {
            $setting = Setting::pluck('value_tr', 'key');
        } elseif (app()->getLocale() == 'fa') {
            $setting = Setting::pluck('value_fa', 'key');
        }
        elseif (app()->getLocale() == 'ar') {
            $setting = Setting::pluck('value_ar', 'key');
        } else {
            $setting = Setting::pluck('value_en', 'key');
        }

        return view('website.index', compact('setting'));
    }

    // About
    public function about()
    {
        if (app()->getLocale() == 'tr') {
            $setting = Setting::pluck('value_tr', 'key');
        } elseif (app()->getLocale() == 'fa') {
            $setting = Setting::pluck('value_fa', 'key');
        }
        elseif (app()->getLocale() == 'ar') {
            $setting = Setting::pluck('value_ar', 'key');
        } else {
            $setting = Setting::pluck('value_en', 'key');
        }

        return view('website.about', compact('setting'));
    }

    // About
    public function contact()
    {
        if (app()->getLocale() == 'tr') {
            $setting = Setting::pluck('value_tr', 'key');
        } elseif (app()->getLocale() == 'fa') {
            $setting = Setting::pluck('value_fa', 'key');
        }
        elseif (app()->getLocale() == 'ar') {
            $setting = Setting::pluck('value_ar', 'key');
        } else {
            $setting = Setting::pluck('value_en', 'key');
        }

        return view('website.contact', compact('setting'));
    }
}
