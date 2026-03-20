<?php

namespace App\Providers;

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
        Gate::define(
            "create_product",
            function ($user) {
                return $user->user_type == 'admin';
            }
        );
        Gate::define(
            "delete_product",
            function ($user,$product) {
                return $user->user_id == $product->created_by;
            }
        );
    }
}
