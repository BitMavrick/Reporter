<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TagController extends Controller
{
    public function tag($tag)
    {
        return view('user.tag_filter');
    }
}