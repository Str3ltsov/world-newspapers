<?php

namespace App\Providers;

use App\Models\Menu;
use Illuminate\Support\ServiceProvider;

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
        view()->composer('*', function ($view) {
            $view
                ->with([
                    'headerLinks' => Menu::find(Menu::HEADER)->links,
                    'mainMenuLinks' => Menu::find(Menu::MAIN_MENU)->links
                ]);
        });
    }
}
