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

        View()->share('user', $user);
        return view('user.profile', compact('user'));
    }
}