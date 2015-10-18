<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Если композер реализуется при помощи класса:
        view()->composer('*', 'App\Http\Composers\ActivePage');
        // Верхнее меню каталога продукции
        view()->composer('*', 'App\Http\Composers\GuestTopNavComposer');
        // Новые товары
        view()->composer('guest.templates.new_products', 'App\Http\Composers\ProductsNewCatalogComposer');
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
