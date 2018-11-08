<?php

namespace Mdcass\RouteDoc\Providers;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

/**
 * Service provider
 */
class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if (!$this->shouldBootInEnvironment()) {
            return;
        }

        $this->publishes([
            __DIR__.'/../views' => resource_path('views/mdcass/route-doc'),
            __DIR__.'/../../config/route-doc.php' => config('route-doc.php'),
        ]);

        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'route-doc');

        if ($this->app['config']->get('route-doc.uri') !== 'false') {
            $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/route-doc.php', 'route-doc');

        if (!$this->shouldBootInEnvironment()) {
            return;
        }
    }

    /**
     * @return boolean
     */
    protected function shouldBootInEnvironment()
    {
        $envParts = explode(',', $this->app['config']->get('route-doc.environment'));

        return $this->app->environment($envParts);
    }
}
