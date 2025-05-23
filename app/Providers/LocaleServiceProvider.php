<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class LocaleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
   public function boot()
    {
        $locale = Session::get('locale', config('app.locale'));
        info('Service Provider: Attempting to set locale to: ' . $locale);
        if (in_array($locale, ['en', 'np'])) {
            App::setLocale($locale);
            info('Service Provider: Locale set to: ' . App::getLocale());
        } else {
            info('Service Provider: Invalid locale: ' . $locale);
        }
    }
}
