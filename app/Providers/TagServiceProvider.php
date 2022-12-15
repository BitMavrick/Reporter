<?php

namespace App\Providers;

use App\View\Composers\TagComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class TagServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer([
            'components.user.partials.sidebar',
            '*',
        ], TagComposer::class);
    }
}