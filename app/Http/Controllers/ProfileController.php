<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile($username)
    {
        $user = User::where('username', $username)->first();

        if (!$user) {
            return redirect()->route('404');
        }

        View()->share('profile_data', $user);
        return view('user.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::where('username', auth()->user()->username)->first();
        $profile = Profile::where('username', auth()->user()->username)->first();
        $user->name = $request->name;
        $profile->address = $request->address;
        $profile->occupation = $request->occupation;
        $profile->twitter_handle = $request->twitter_handle;

        $user->save();
        $profile->save();

        return redirect()->route('profile', auth()->user()->username);
    }
}