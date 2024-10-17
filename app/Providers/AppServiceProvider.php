<?php

namespace App\Providers;

use App\Enums\Roles\RolesEnum;
use App\Models\Manga\Manga;
use App\Models\User\User;
use App\Observers\Manga\MangaObserver;
use Illuminate\Support\Facades\Gate;
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
        Gate::before(function(User $user, $ability) {
            if($user->hasRole(RolesEnum::FOUNDER->value)) {
                return true;
            }
        });
    }
}
