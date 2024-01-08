<?php

namespace App\Providers;

use App\Nova\Resources\Categories\Category;
use App\Nova\Resources\Categories\SubCategory;
use App\Nova\Resources\Languages\Locale;
use App\Nova\Resources\Products\Product;
use App\Nova\Resources\User;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Nova::mainMenu(static function () {
            return [
                MenuSection::make('Products', [
                    MenuItem::resource(Product::class)->name('Products'),
                ]),
                MenuSection::make('Product Categories', [
                    MenuItem::resource(Category::class)->name('Main Categories'),
                    MenuItem::resource(SubCategory::class)->name('Sub Categories'),
                ]),
                MenuSection::make('Languages', [
                    MenuItem::resource(Locale::class)->name('Country Codes'),
                ]),
                MenuSection::make('Admins', [
                    MenuItem::resource(User::class)->name('Users'),
                ])->icon('user'),
            ];
        });

    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                //
            ]);
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [
            new \App\Nova\Dashboards\Main,
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
