<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function home()
    {
        $users = User::all();
        return view('admin.index', compact('users'));
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }
}