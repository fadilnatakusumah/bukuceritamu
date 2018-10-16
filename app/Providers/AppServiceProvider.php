<?php

namespace App\Providers;

use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
        // FOR HEROKU TO REDIRECT
        if(env('REDIRECT_HTTPS')) {
            $url->formatScheme('https');
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // For redirecting to public folder in WEBHOSTING
        // $this->app->bind('path.public', function(){
        //     return base_path('public_html');
        // });    

        // FOR HEROKU TO REDIRECT
        if(env('REDIRECT_HTTPS')) {
            $this->app['request']->server->set('HTTPS', true);
        }
    }
}
