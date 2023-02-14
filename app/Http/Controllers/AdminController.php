<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blog;
use App\Models\Tag;
use App\Models\React;
use Illuminate\Contracts\View\View;
use Session;

class AdminController extends Controller
{
    public function home()
    {
        if (isset(auth()->user()->role) and auth()->user()->role == 2) {
            $users = User::all();
            $blogs = Blog::all();
            $tags = Tag::all();
            $reacts = React::all();

            $total_users = count($users);
            $total_blogs = count($blogs);
            $total_tags = count($tags);
            $total_reacts = count($reacts);
            $all_users = User::paginate(15);


            View()->share('users', $all_users);
            View()->share('total_users', $total_users);
            View()->share('total_blogs', $total_blogs);
            View()->share('total_tags', $total_tags);
            View()->share('total_reacts', $total_reacts);
            View()->share('side_val', 'users');


            return view('admin.index');
        } else {
            Session::flash('dump', "Url not valid!");
            return redirect()->route('404');
        }
    }

    public function change_role(Request $request)
    {
        $user = User::where('username', $request->username)->first();
        $user->role = $request->role;
        $user->save();
        return redirect()->route('super.home');
    }

    public function delete_user(Request $request)
    {
        if (isset(auth()->user()->role) and auth()->user()->role == 2) {
            $user = User::where('username', $request->username)->first();
            $user->delete();
            return redirect()->route('super.home');
        } else {
            Session::flash('dump', "Url not valid!");
            return redirect()->route('404');
        }
    }

    public function articles()
    {
        if (isset(auth()->user()->role) and auth()->user()->role == 2) {
            $users = User::all();
            $blogs = Blog::paginate(20);
            View()->share('side_val', 'articles');
            View()->share('articles', $blogs);
            return view('admin.articles', compact('users'));
        } else {
            Session::flash('dump', "Url not valid!");
            return redirect()->route('404');
        }
    }

    public function delete_blog(Request $request)
    {
        if (isset(auth()->user()->role) and auth()->user()->role == 2) {
            $blog = Blog::where('id', $request->blog_id)->first();
            $blog->delete();
            return redirect()->route('super.articles');
        } else {
            Session::flash('dump', "Url not valid!");
            return redirect()->route('404');
        }
    }
}