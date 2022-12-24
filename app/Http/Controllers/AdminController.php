<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blog;
use App\Models\Tag;
use App\Models\React;
use Illuminate\Contracts\View\View;

class AdminController extends Controller
{
    public function home()
    {
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
    }

    public function change_role(Request $request)
    {
        dd($request->all());
    }

    public function delete_user(Request $request)
    {
        $user = User::where('username', $request->username)->first();
        $user->delete();
        return redirect()->route('super.home');
    }

    public function articles()
    {
        $users = User::all();
        View()->share('side_val', 'articles');
        return view('admin.articles', compact('users'));
    }
}