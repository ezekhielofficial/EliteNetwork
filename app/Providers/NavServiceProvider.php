<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Page;
class NavServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
       view()->composer('*', function($view){
           $pages = Page::all();
           return $view->with('pages', $pages);
       });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
