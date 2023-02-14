<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\Blog_tag;
use App\Models\Blog;

class TagComposer
{

    public function compose(View $view)
    {
        $all_tags = Blog_tag::all();

        $the_tags = [];

        foreach ($all_tags as $tag) {
            $tag_counter = Blog_tag::where('tag_name', $tag->tag_name)->count();
            $the_tags[$tag->tag_name] = $tag_counter;
        }

        arsort($the_tags);

        // Article of the best top five tags
        $copy_tags = $the_tags;
        $rec_blogs = [];

        $blog_ids = [];
        foreach ($copy_tags as $name => $value) {
            $blog_id = Blog_tag::where('tag_name', $name)->orderBy('blog_id', 'DESC')->first()->blog_id;
            $blog_ids[] = $blog_id;
        }

        $blog_ids = array_unique($blog_ids);
        array_splice($blog_ids, 6);

        foreach ($blog_ids as $id) {
            $rec_blogs[] = Blog::find($id);
        }

        array_splice($the_tags, 12);

        $view->with('rec_blogs', $rec_blogs);
        $view->with('top_tags', $the_tags);
    }
}