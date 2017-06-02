<?php

namespace WTG\Auth\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

/**
 * Auth service provider
 *
 * @package     WTG\Auth
 * @subpackage  Providers
 * @author      Thomas Wiringa <thomas.wiringa@gmail.com>
 */
class AuthServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        // $this->registerPolicies();

        $this->loadRoutesFrom(__DIR__.'/../routes.php');

        $this->loadViewsFrom(__DIR__.'/../Resources/views', 'auth');

        $this->loadTranslationsFrom(__DIR__.'/../Resources/lang', 'auth');
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
