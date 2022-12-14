<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\Blog_tag;

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

        //dd($the_tags);

        $view->with('top_tags', $the_tags);
    }
}