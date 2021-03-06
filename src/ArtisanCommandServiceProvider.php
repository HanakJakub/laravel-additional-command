<?php
namespace Hanak\ArtisanCommand;

use Illuminate\Support\ServiceProvider;

class ArtisanCommandServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Commands\Strings\Combinations::class,
            ]);
        }
    }
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
