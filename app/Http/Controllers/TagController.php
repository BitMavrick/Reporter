<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog_tag;
use App\Models\Blog;

class TagController extends Controller
{
    public function tag($tag)
    {
        //dd($tag);
        $tags = Blog_tag::where('tag_name', $tag)->latest()->get();

        $total_tag = count($tags);

        $blogs = array();
        foreach ($tags as $tag) {
            $blog_id = $tag->blog_id;
            $blog = Blog::where('id', $blog_id)->latest()->first();

            array_push($blogs, $blog);
        }

        View()->share('total_tag',  $total_tag);
        View()->share('blogs',  $blogs);

        return view('user.tag_filter');
    }
}