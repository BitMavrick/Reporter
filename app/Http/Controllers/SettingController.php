<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}