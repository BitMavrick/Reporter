<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Setting;
use App\Models\Profile;
use App\Models\User;
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
            $profile = Profile::where('username', auth()->user()->username)->first();
            $user = User::where('username', auth()->user()->username)->first();

            // managing avatar image

            if (isset($request->avatar)) {
                $request->validate([
                    'avatar' => 'image|mimes:jpeg,png,jpg|max:5120',
                ]);
            }

            if ($request->hasFile('avatar')) {

                $extension = $request->file('avatar')->getClientOriginalExtension();
                $filename = date('Y-m-d') . '_' . time() . '.' . $extension;

                if ($setting->default_avatar == 0) {
                    Storage::delete('public/avatar/' . $user->avatar);
                }

                $image = $request->file('avatar');
                $image_resize = Image::make($image->getRealPath());
                $image_resize->fit(96, 96, function ($constraint) {
                    $constraint->aspectRatio();
                });

                /* Tips:
                So I learned that if this method raised an error like cant save on that route,
                I just have you to create folder manually. EX. storage/app/public/blog_images
                thats it.
                */
                $image_resize->save(storage_path('app/public/avatar/' . $filename));
                $user->avatar = $filename;

                $setting->default_avatar = 0;
            }


            if (isset($request->hide_mail)) {
                $setting->hide_mail = true;
            } else {
                $setting->hide_mail = false;
            }

            if (isset($request->badge)) {
                $setting->apply_badge = true;
            }

            $request->validate([
                'mail' => 'required|email',
            ]);

            $profile->mail = $request->mail;

            $setting->save();
            $profile->save();
            $user->save();

            Session::flash('green', "Successfully save your changes!");
            return redirect()->route('settings');
        } else {
            Session::flash('dump', "Required login to perform this action!");
            return redirect()->route('404');
        }
    }
}