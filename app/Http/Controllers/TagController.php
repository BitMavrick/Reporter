<?php

namespace App\Http\Controllers;


use App\Models\Blog_tag;
use App\Models\Blog;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

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

        $the_blogs = $this->paginate($blogs);
        $the_blogs = $the_blogs->withPath($tag->tag_name);

        View()->share('total_tag',  $total_tag);
        View()->share('blogs',  $the_blogs);

        return view('user.tag_filter');
    }

    public function paginate($items, $perPage = 4, $page = null)
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $total = count($items);
        $currentpage = $page;
        $offset = ($currentpage * $perPage) - $perPage;
        $itemstoshow = array_slice($items, $offset, $perPage);
        return new LengthAwarePaginator($itemstoshow, $total, $perPage);
    }
}