<?php

namespace App\Providers;

use App\Models\Menu;
use Illuminate\Support\Facades\URL;
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
        if (config('app.env') == 'production') {
            URL::forceScheme('https');
        }

        view()->composer('*', function ($view) {
            $view
                ->with([
                    'headerLinks' => Menu::find(Menu::HEADER)->links->sortBy(['left', 'right']),
                    'mainMenuLinks' => Menu::find(Menu::MAIN_MENU)->links->sortBy(['left', 'right']),
                    'magazineLinks' => Menu::find(Menu::MAGAZINE)
                        ->links
                        ->where('parent_id', null)
                        ->sortBy(['left', 'right']),
                    'newsLinks' => Menu::find(Menu::NEWS)->links->where('parent_id', null)
                ]);
        });
    }
}
