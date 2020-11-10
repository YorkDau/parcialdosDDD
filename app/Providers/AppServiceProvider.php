<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Restaurante\Inventario\Domain\IProductoSimpleRepository;
use Restaurante\Inventario\Infraestructura\Persistencia\ProductoSimpleEloquentRepsository;
use Restaurante\Inventario\Shared\Domain\IUnidadTrabajo;
use Restaurante\Inventario\Shared\Infraestructura\UnidadTrabajoEloquent;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IProductoSimpleRepository::class, ProductoSimpleEloquentRepsository::class);
        $this->app->bind(IUnidadTrabajo::class,UnidadTrabajoEloquent::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
