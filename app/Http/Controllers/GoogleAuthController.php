<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;



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
                    'about_you' => 'Hello, This is ' . $user->name,
                ]);

                return redirect('/');
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}