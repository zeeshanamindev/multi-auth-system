<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    
    }

    public function boot(): void
    {
        // Register Blade directives safely
        try {
            Blade::if('role', function (string $role) {
                return auth()->check() && auth()->user()->hasRole($role);
            });

            Blade::if('permission', function (string $permission) {
                return auth()->check() && auth()->user()->hasPermission($permission);
            });

            Blade::if('admin', function () {
                return auth()->check() && auth()->user()->isAdmin();
            });
        } catch (\Exception $e) {
           
        }
    }
}