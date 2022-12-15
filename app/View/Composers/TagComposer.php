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

        array_splice($the_tags, 12);

        // Article of the best top five tags
        $copy_tags = $the_tags;

        array_splice($copy_tags, 6);

        $rec_blogs = [];

        foreach ($copy_tags as $name => $value) {
            $blod_id = Blog_tag::where('tag_name', $name)->orderBy('blog_id', 'DESC')->first()->blog_id;
            $rec_blogs[] = Blog::where('id', $blod_id)->first();
        }

        $view->with('rec_blogs', $rec_blogs);
        $view->with('top_tags', $the_tags);
    }
}