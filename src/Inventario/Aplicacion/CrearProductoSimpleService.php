<?php


namespace Restaurante\Inventario\Aplicacion;


use Restaurante\Inventario\Domain\IProductoSimpleRepository;
use Restaurante\Inventario\Domain\ProductoSimple;

class CrearProductoSimpleService
{
    private IProductoSimpleRepository $repository;

    public function __construct(IProductoSimpleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CrearProductoSimpleRequest $request)
    {
        
        $productoSimple = new ProductoSimple();
    }
}
