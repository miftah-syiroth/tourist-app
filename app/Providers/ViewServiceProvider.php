<?php

namespace App\Providers;

use App\Models\Headline;
use App\Models\HeroImage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        /**cara jelek dan berantakan */
        View::composer('components.layouts.frontpage', function ($view) {
            $view->with('heroImage', HeroImage::where('status', true)->orderBy('updated_at', 'desc')->first());
        });

        View::composer('components.layouts.frontpage', function ($view) {
            $view->with('headline', Headline::find(1));
        });
    }
}
