<?php namespace CodeZero\Session;

use Illuminate\Support\ServiceProvider;

class LaravelSessionServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerSession();
    }

    /**
     * Register the session service binding
     *
     * @return void
     */
    private function registerSession()
    {
        $this->app->singleton(
            'CodeZero\Session\Session',
            'CodeZero\Session\LaravelSession'
        );
    }
}
