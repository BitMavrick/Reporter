<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

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

    public function update_cover(Request $request)
    {
        $user = User::where('username', auth()->user()->username)->first();
        $profile = Profile::where('username', auth()->user()->username)->first();

        if ($request->hasFile('cover')) {
            $extension = $request->file('cover')->getClientOriginalExtension();
            $filename = date('Y-m-d') . '_' . time() . '.' . $extension;
            $image = $request->file('cover');


            if ($profile->cover_image != 'cover.jpg') {
                Storage::delete('public/cover_images/' . $profile->cover_image);
            }

            $request->file('cover')->storeAs('public/cover_images', $filename);
            $profile->cover_image = $filename;
        }

        if ($request->about_you) {
            $profile->about_you = $request->about_you;
        }


        $user->save();
        $profile->save();

        return redirect()->route('profile', auth()->user()->username);
    }
}