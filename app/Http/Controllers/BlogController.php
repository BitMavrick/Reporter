<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Blog;
use App\Models\Blog_tag;
use App\Models\User_blog;
use App\Models\User;
use App\Models\Tag;

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
        // REST Validation
        $request->validate([
            'title' => 'required | min:2 | max:100',
            'primary_image' => 'required | image | mimes:jpeg,png,jpg | max:5120',
            'introduction' => 'required | min:2 | max:100',
            'description' => 'required | min:2 | max:1000',
            'secondary_image' => 'required | image | mimes:jpeg,png,jpg | max:5120',
            'secondary_image' => 'image | mimes:jpeg,png,jpg | max:5120',
        ]);

        // Creating the blog
        $blog = new Blog;


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

        // Working with image first
        if ($request->hasFile('primary_image')) {
            $extension = $request->file('primary_image')->getClientOriginalExtension();
            $filename = date('Y-m-d') . '_' . time() . '.' . $extension;

            $image = $request->file('primary_image');
            $image_resize = Image::make($image->getRealPath());
            $image_resize->fit(1280, 720, function ($constraint) {
                $constraint->aspectRatio();
            });

            /* Tips:
            So I learned that if this method raised an error like cant save on that route,
            I just have you to create folder manually. EX. storage/app/public/blog_images
            thats it.
            */
            $image_resize->save(storage_path('app/public/blog_images/' . $filename));
            $blog->main_image = $filename;
        }

        if ($request->hasFile('secondary_image')) {
            $extension = $request->file('secondary_image')->getClientOriginalExtension();
            $filename = date('Y-m-d') . '_' . time() . '.' . $extension;

            $image = $request->file('secondary_image');
            $image_resize = Image::make($image->getRealPath());
            $image_resize->fit(1280, 720, function ($constraint) {
                $constraint->aspectRatio();
            });

            /* Tips:
            So I learned that if this method raised an error like cant save on that route,
            I just have you to create folder manually. EX. storage/app/public/blog_images
            thats it.
            */
            $image_resize->save(storage_path('app/public/blog_images/' . $filename));
            $blog->secondary_image = $filename;
        }


        // create & Saving the blog
        $blog->title = $request->title;
        $blog->introduction = $request->introduction;
        $blog->description = $request->description;
        $blog->owner = auth()->user()->username;
        $blog->save();




        // create & Saving the tags
        for ($i = 0; $i < count($tags); $i++) {
            $tag = new Tag;
            $tag->name = $tags[$i];
            $tag->save();
        }

        dd($blog->id);
    }
}