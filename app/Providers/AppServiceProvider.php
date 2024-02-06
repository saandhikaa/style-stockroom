<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
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
    
    public function boot(): void
    {
        Gate::define('admin', function(User $user) {
            return $user->level === 'administrator';
        });
    }
}
