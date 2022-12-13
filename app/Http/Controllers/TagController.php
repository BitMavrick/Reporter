<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog_tag;

class TagController extends Controller
{
    public function tag($tag)
    {
        //dd($tag);
        $tag = Blog_tag::where('tag_name', $tag)->get();

        $total_tag = count($tag);

        dd($total_tag);


        return view('user.tag_filter');
    }
}