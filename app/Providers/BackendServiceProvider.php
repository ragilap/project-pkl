<?php

namespace App\Providers;

use App\Http\Controllers\ContactFooterController;
use App\Models\contact;
use App\Models\footercontact;
use App\Models\logo;
use App\Models\social;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class BackendServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('components.byte-craft.footer', function ($view) {
            $no = contact::find(2);
            $email = contact::find(3);
            $tempat = contact::find(1);
            $logos = logo::first();
            $socials = social::all();
            $view->with(compact('logos','socials','no','tempat','email'));
        });
        View::composer('components.byte-craft.navbar', function ($view) {
            $logos = logo::first();
            $view->with('logos', $logos);
        });
        View::composer('components.byte-craft.favicon', function ($view) {
            $logo = logo::first();
            $view->with('logo', $logo);
        });
    }
}
