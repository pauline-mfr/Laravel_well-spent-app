<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Façade View avec la méthode composer
        // chaque fois que la vue index ou create est appelée -> on renvoie la variable qui contient les catégories
      /*   View::composer(['create'], function ($view) {
            $view->with('categories', Category::all());
        });*/
    } 
}
