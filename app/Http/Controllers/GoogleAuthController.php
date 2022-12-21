<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Models\Profile;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Session;



class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->id)->first();

            if ($finduser) {
                Session::flash('green', "Welcome back, " . $user->name);
                auth()->login($finduser);
                return redirect('/');
            } else {

                $newUser = User::create(
                    [
                        'username' => $user->email,
                        'name' => $user->name,
                        'email' => $user->email,
                        'google_id' => $user->id,
                        'avatar' => $user->avatar,
                    ]
                );

                auth()->login($newUser);

                // All of this just to update the username
                $user = Auth::user();
                $username = 'reporter@010' . $user->id;

                $info = [
                    'username' => $username,
                ];

                $user->update($info);

                Profile::create([
                    'username' => $username,
                    'mail' => $user->email,
                    'cover_image' => 'cover.jpg',
                    'about_you' => 'Hello, This is ' . $user->name,
                ]);

                Setting::create([
                    'username' => $username,
                ]);

                Session::flash('congrates', "Hello, " . $user->name . ". We are so happy to see you as a member of our site. Now you can unleash your writting power here! We hope that it will be a really good journey for both of us. Thank you." . "");
                return redirect('/');
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}