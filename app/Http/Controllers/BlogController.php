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
        $all_string = $request->tags;
        $tags = explode(',', $all_string);


        for ($i = 0; $i < count($tags); $i++) {
            $the_tag = $tags[$i];
            $start = strpos($the_tag, ':') + 2;
            $mod_tag = substr($the_tag, $start);

            $tags[$i] = $mod_tag;
            $tags[$i] = str_replace(array('"', '}', ']',), '', $tags[$i]);
        }

        dd($tags);


        // $validated = $request->validate([
        //     'title' => 'required | min:15 | max:100',
        //     'tags' => 'required | min:1',
        // ]);

        //dd($validated);
    }
}