<?php

namespace App\Providers;

use App\Models\Locale;
use Illuminate\Support\ServiceProvider;
use Spatie\NovaTranslatable\Translatable;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $locales = Locale::all()->pluck('code')->toArray();
        Translatable::defaultLocales($locales);
    }
}
