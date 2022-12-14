<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\User_blog;

class TagComposer
{

    public function compose(View $view)
    {
        //dd('Hello This is a test 2');
        echo "Hello This is a test 2";
        $view->with('the_value', "mehedi hasan");
    }
}