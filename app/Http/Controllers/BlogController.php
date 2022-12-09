<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

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
        // // image validation and handling first
        // $validate =  $request->validate([
        //     'primary_image' => 'image | mimes:jpeg,png,jpg | max:5120',
        //     'secondary_image' => 'image | mimes:jpeg,png,jpg | max:5120',

        // ]);

        // if (isset($validate['primary_image'])) {

        // } else {
        //     dd('no image');
        // }

        // REST Validation
        $request->validate([
            'title' => 'required | min:0 | max:100',
            'primary_image' => 'image | mimes:jpeg,png,jpg | max:5120',
            'introduction' => 'min:0 | max:1000',
            'secondary_image' => 'image | mimes:jpeg,png,jpg | max:5120',
        ]);




        // Tags Modification
        $all_string = strtolower($request->tags);
        $tags = explode(',', $all_string);

        for ($i = 0; $i < count($tags); $i++) {
            $the_tag = $tags[$i];
            $start = strpos($the_tag, ':') + 2;
            $mod_tag = substr($the_tag, $start);

            $tags[$i] = $mod_tag;
            $tags[$i] = str_replace(array('"', '}', ']', '{', '[', '(', ')', '*', '$', '/', '?', '+', '^', '%', ':', ';', '<', '>', '.'), '', $tags[$i]);
        }

        //dd($tags);
    }
}