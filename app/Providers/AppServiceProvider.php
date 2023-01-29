<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // cek petugas
        Gate::define('is_petugas', function(User $user) {
            return $user->is_petugas;
        });
        // cek admin
        Gate::define('is_admin', function(User $user) {
            return $user->is_admin;
        });
    }
}
