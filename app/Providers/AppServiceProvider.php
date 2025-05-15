<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Models\Bike;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;

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
        Paginator::defaultView('pagination::default');

        // Gate для удаления дорогих велосипедов (>500) только админам
        Gate::define('delete-expensive-bike', function (User $user, Bike $bike) {
            return $user->is_admin && $bike->price_per_hour > 500;
        });

        // Gate для удаления доступных велосипедов только админам
        Gate::define('delete-available-bike', function (User $user, Bike $bike) {
            return $user->is_admin && $bike->is_available;
        });
    }
}
