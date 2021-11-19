<?php

namespace App;
use Illuminate\Support\ServiceProvider;

class ZendeskApiServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton('ZendeskApi', function () {
            return new ZEndeskApi();
        });
        $this->app->alias('app\ZendeskApi', 'ZendeskApi');
    }
}
