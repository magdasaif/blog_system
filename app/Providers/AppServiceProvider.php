<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;

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
    public function boot(): void{
        //==============================================================
        //use bootstrap 4 as global for pagination
        Paginator::useBootstrapFour();
        //==============================================================
        //define macreo for whereLike 
        Builder::macro('whereLike', function($column, $search) {
            return $this->where($column, 'LIKE', "%{$search}%");
        });
        //==============================================================
        //define macreo for orWhereLike 
        Builder::macro('orWhereLike', function($column, $search) {
            return $this->orWhere($column, 'LIKE', "%{$search}%");
        });
        //==============================================================
    }
}