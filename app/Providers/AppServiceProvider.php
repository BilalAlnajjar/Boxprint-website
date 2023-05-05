<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\GeneralSetting;
use App\Models\SocialMedia;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        view()->composer('*', function ($view)
        {
            $countCart = Auth::user() ? count(Auth::user()->cart()->first()->products) : 0;

            $general = GeneralSetting::first();
            $categories = Category::get();
            $socials = SocialMedia::get();


            //...with this variable
            $view->with('countCart',$countCart);
            $view->with('general',$general);
            $view->with('categories',$categories);
            $view->with('socials',$socials);
        });

    }
}
