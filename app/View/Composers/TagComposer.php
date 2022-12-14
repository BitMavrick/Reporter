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
        $counter = 1;
        foreach ($all_tags as $tag) {
            $tag_counter = Blog_tag::where('tag_name', $tag->tag_name)->count();
            $the_tags[$tag->tag_name] = $tag_counter;

            if ($counter == 12) {
                break;
            }
            $counter++;
        }

        arsort($the_tags);

        $view->with('top_tags', $the_tags);
    }
}