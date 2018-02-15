<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
//use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Contracts\Routing\UrlGenerator;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot( UrlGenerator $url )
    {
        //
        Schema::defaultStringLength(191);
        //Resource::withoutWrapping();
        if(env('REDIRECT_HTTPS'))
        {
            //\URL::forceScheme('https');
            $url->forceScheme('https');
        }


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        if(env('REDIRECT_HTTPS'))
        {
            //\URL::forceScheme('https');
            $this->app['request']->server->set('HTTPS',true);
        }
    }
}
