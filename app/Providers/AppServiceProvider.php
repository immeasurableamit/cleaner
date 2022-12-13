<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \Stripe\StripeClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind( StripeClient::class, function ( $app ) {
            return new StripeClient(config('services.stripe.secret'));
        });
    }
}
