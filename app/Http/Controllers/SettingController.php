<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Session;

class SettingController extends Controller
{
    public function settings()
    {
        if (auth()->user()) {
            return view('user.settings');
        } else {
            Session::flash('dump', "Required login to perform this action!");
            return redirect()->route('404');
        }
    }

    public function saving(Request $request)
    {
        if (auth()->user()) {

            $setting = Setting::where('username', auth()->user()->username)->first();

            if (isset($request->hide_mail)) {
                $setting->hide_mail = true;
            } else {
                $setting->hide_mail = false;
            }

            if (isset($request->badge)) {
                $setting->apply_badge = true;
            }

            $setting->save();
            Session::flash('green', "Successfully save your changes!");
            return redirect()->route('settings');
        } else {
            Session::flash('dump', "Required login to perform this action!");
            return redirect()->route('404');
        }
    }
}