<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function create()
    {
        if (auth()->user()) {
            return view('user.create');
        } else {
            return redirect()->route('404');
        }
    }

    public function creating(Request $request)
    {
        dd($request->all());
    }
}