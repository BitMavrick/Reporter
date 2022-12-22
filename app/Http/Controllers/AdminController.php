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


        View()->share('users', $users);
        View()->share('total_users', $total_users);
        View()->share('total_blogs', $total_blogs);
        View()->share('total_tags', $total_tags);
        View()->share('total_reacts', $total_reacts);

        return view('admin.index');
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }
}