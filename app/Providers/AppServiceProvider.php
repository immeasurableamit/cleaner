<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use \Stripe\StripeClient;

use Illuminate\Support\Facades\Config;
use Schema;
// use Config;

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
        $this->app->bind(StripeClient::class, function ($app) {
            return new StripeClient(config('services.stripe.secret'));
        });


		$settingsTableExists = Schema::hasTable('settings');
		if ( $settingsTableExists ) {
			$this->loadSmtpSettingsFromTable();
		}
    }

	protected function loadSmtpSettingsFromTable()
	{
        $mailSetting = Setting::first();
		if ( ! $mailSetting ) {
			return false;		
		}

        $smtpDetails = Config::get('mail.mailers.smtp');

        $smtpDetails = [
            'transport' => 'smtp',
            'host' => $mailSetting->smtp_host,
            'port' => $mailSetting->smtp_port,
            'username' => $mailSetting->smtp_username,
            'password' => $mailSetting->smtp_password,
            'encryption' => 'tls',
            'from' => [
                'address' => 'me@example.com',
                'name' => 'cleaner'
            ]
        ];

        Config::set('mail.mailers.smtp', $smtpDetails);
		return true;
	}
}
