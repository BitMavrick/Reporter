<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use Session;
use App\Models\Blog;
use App\Models\Blog_tag;
use App\Models\User_blog;
use App\Models\User;
use App\Models\Tag;
use App\Models\profile;

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

    public function blog(Request $request)
    {
        if (Blog::where('id', $request->id)->exists()) {
            $blog = Blog::where('id', $request->id)->first();
            $tags = Blog_tag::where('blog_id', $blog->id)->get();
            $user = User::where('username', $blog->owner)->first();
            $profile = profile::where('username', $blog->owner)->first();

            // Calculate reading time (In minutes)
            $total_word = (strlen($blog->description) + strlen($blog->introduction) + strlen($blog->title)) / 5;
            $reading_time = intval(round($total_word / 183));

            View()->share('writter', $user);
            View()->share('profile', $profile);
            View()->share('blog', $blog);
            View()->share('tags', $tags);
            View()->share('reading_time', $reading_time);

            return view('user.article');
        } else {
            Session::flash('dump', "Article does not exist!");
            return redirect()->route('404');
        }
    }

    public function creating(Request $request)
    {
        $request->validate([
            'title' => 'required | min:2 | max:150',
            'primary_image' => 'required | image | mimes:jpeg,png,jpg | max:5120',
            'introduction' => 'required | min:10 | max:1200',
            'description' => 'required | min:10 | max:4000',
            'secondary_image' => 'image | mimes:jpeg,png,jpg | max:5120',
        ]);


        // Getting the video link
        $link = $request->video_link;
        $init = strpos($link, '.be/') + 4;
        $link_value = substr($link, $init);

        // Creating a instance of the blog
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

        if ($request->video_link != null) {
            $blog->video_link = $link_value;
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
            if ($tag->where('name', $tags[$i])->exists()) {
            } else {
                $tag->name = $tags[$i];
                $tag->save();
            }

            $blog_tag = new Blog_tag;
            $blog_tag->blog_id = $blog->id;
            $blog_tag->tag_name = $tags[$i];
            $blog_tag->save();
        }

        // create & Saving the user_blog
        $user_blog = new User_blog;
        $user_blog->blog_id = $blog->id;
        $user_blog->user_username = auth()->user()->username;
        $user_blog->save();

        Session::flash('new', "Your article has been published successfully! If you need any modification in your article, you can do it. Just scroll down to the bottom of the article.");
        return redirect()->route('blog', $blog->id);
    }

    public function updating(Request $request)
    {
        $blog = Blog::where('id', $request->id)->first();


        if ($blog->owner != auth()->user()->username) {
            Session::flash('dump', "You are not authorized to perform this action!");
            return redirect()->route('404');
        }

        $request->validate([
            'title' => 'required | min:2 | max:150',
            'introduction' => 'required | min:10 | max:1200',
            'description' => 'required | min:10 | max:4000',
            'secondary_image' => 'image | mimes:jpeg,png,jpg | max:5120',
        ]);

        // Delete all Tags first
        $tags = Blog_tag::where('blog_id', $request->id)->delete();

        // Updating Tag
        $tags = Blog_tag::where('blog_id', $blog->id)->get();

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

        // create & Saving the tags
        for ($i = 0; $i < count($tags); $i++) {
            $tag = new Tag;
            if ($tag->where('name', $tags[$i])->exists()) {
            } else {
                $tag->name = $tags[$i];
                $tag->save();
            }

            $blog_tag = new Blog_tag;
            $blog_tag->blog_id = $blog->id;
            $blog_tag->tag_name = $tags[$i];
            $blog_tag->save();
        }

        // Secondary Image Modification
        if ($request->hasFile('secondary_image')) {

            if ($blog->secondary_image != null) {
                Storage::delete('public/blog_images/' . $blog->secondary_image);
            }


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


        // Video Link Modification
        if ($request->video_link != null) {
            $link = $request->video_link;
            $init = strpos($link, '.be/') + 4;
            $link_value = substr($link, $init);

            $blog->video_link = $link_value;
        }


        $blog->title = $request->title;
        $blog->introduction = $request->introduction;
        $blog->description = $request->description;
        $blog->save();

        Session::flash('green', "Your article has been modified successfully!");
        return redirect()->route('blog', $blog->id);
    }

    public function updateMainImage(Request $request)
    {

        $request->validate([
            'primary_image' => 'required | image | mimes:jpeg,png,jpg | max:5120',
        ]);

        $blog = Blog::where('id', $request->id)->first();

        if ($blog->owner != auth()->user()->username) {
            return redirect()->route('404');
        }

        Storage::delete('public/blog_images/' . $blog->main_image);

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
        $blog->save();

        Session::flash('green', "Your article's primary image has been updated successfully!");
        return redirect()->route('blog', $blog->id);
    }

    public function deleteSecondaryImage(Request $request)
    {
        $blog = Blog::where('id', $request->id)->first();

        if ($blog->owner != auth()->user()->username) {
            return redirect()->route('404');
        }

        Storage::delete('public/blog_images/' . $blog->secondary_image);
        $blog->secondary_image = null;
        $blog->save();

        Session::flash('red', "Your article's secondary image has been removed. You can set it again from re-write arcticle section.");
        return redirect()->route('blog', $blog->id);
    }

    public function blogUpdate($id)
    {
        $blog = Blog::where('id', $id)->first();
        $tags = Blog_tag::where('blog_id', $id)->get();

        if (isset(auth()->user()->username)) {
            if ($blog->owner != auth()->user()->username) {
                Session::flash('dump', "You are not authorized to access this page!");
                return redirect()->route('404');
            }
        } else {
            Session::flash('dump', "You are not authorized to access this page!");
            return redirect()->route('404');
        }

        $all_tag = '';
        foreach ($tags as $tag) {
            $all_tag .=  $tag->tag_name . ',';
        }

        View()->share('blog', $blog);
        View()->share('all_tag', $all_tag);
        return view('user.blog_update');
    }



    public function remove(Request $request)
    {
        $blog = Blog::where('id', $request->id)->first();

        Storage::delete('public/blog_images/' . $blog->main_image);
        if ($blog->secondary_image != null) {
            Storage::delete('public/blog_images/' . $blog->secondary_image);
        }

        $blog->delete();
        Session::flash('red', "Your article has been removed successfully!");
        return redirect()->route('home');
    }
}