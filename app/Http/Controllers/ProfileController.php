<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Session;
use App\Models\Blog;
use App\Models\Blog_tag;

class ProfileController extends Controller
{
    public function profile($username)
    {
        $user = User::where('username', $username)->first();

        // fetching the latest blog posts
        $last_blog = Blog::where('owner', $username)->latest()->first();

        if ($last_blog) {
            $last_blog_tags = Blog_tag::where('blog_id', $last_blog->id)->get();
            View()->share('last_blog',  $last_blog);
            View()->share('last_blog_tags',  $last_blog_tags);
        }


        if (!$user) {
            return redirect()->route('404');
        }

        View()->share('profile_data', $user);


        return view('user.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::where('username', auth()->user()->username)->first();
        $profile = Profile::where('username', auth()->user()->username)->first();
        $user->name = $request->name;
        $profile->address = $request->address;
        $profile->occupation = $request->occupation;
        $profile->twitter_handle = $request->twitter_handle;

        $user->save();
        $profile->save();

        Session::flash('green', "Profile updated successfully!");
        return redirect()->route('profile', auth()->user()->username);
    }

    public function update_cover(Request $request)
    {
        $user = User::where('username', auth()->user()->username)->first();
        $profile = Profile::where('username', auth()->user()->username)->first();

        if ($request->hasFile('cover')) {
            $extension = $request->file('cover')->getClientOriginalExtension();
            $filename = date('Y-m-d') . '_' . time() . '.' . $extension;

            if ($profile->cover_image != 'cover.jpg') {
                Storage::delete('public/cover_images/' . $profile->cover_image);
            }

            $image = $request->file('cover');
            $image_resize = Image::make($image->getRealPath());
            $image_resize->fit(1280, 720, function ($constraint) {
                $constraint->aspectRatio();
            });

            /* Tips:
            So I learned that if this method raised an error like cant save on that route,
            I just have you to create folder manually. EX. storage/app/public/blog_images
            thats it.
            */
            $image_resize->save(storage_path('app/public/cover_images/' . $filename));
            $profile->cover_image = $filename;
        }

        if ($request->about_you) {
            $profile->about_you = $request->about_you;
        }


        $user->save();
        $profile->save();

        Session::flash('green', "Cover updated successfully!");
        return redirect()->route('profile', auth()->user()->username);
    }
}