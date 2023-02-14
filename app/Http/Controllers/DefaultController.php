<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function error()
    {
        return view('user.404');
    }

    public function link($target, $link)
    {
        if (!windows_os()) {
            return symlink($target, $link);
        } else {
            dd('windows');
        }

        $mode = $this->isDirectory($target) ? 'J' : 'H';

        exec("mklink /{$mode} " . escapeshellarg($link) . ' ' . escapeshellarg($target));
    }
}