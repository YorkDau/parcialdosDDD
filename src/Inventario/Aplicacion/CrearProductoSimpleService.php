<?php


namespace Restaurante\Inventario\Aplicacion;


use Restaurante\Inventario\Domain\IProductoSimpleRepository;
use Restaurante\Inventario\Domain\ProductoSimple;
use Restaurante\Inventario\Domain\ProductoSimpleExistente;
use Restaurante\Inventario\Shared\Domain\IUnidadTrabajo;

class CrearProductoSimpleService
{
    private IProductoSimpleRepository $repository;
    private IUnidadTrabajo $unidad;

    public function __construct(IProductoSimpleRepository $repository, IUnidadTrabajo $unidad)
    {
        $this->repository = $repository;
        $this->unidad = $unidad;
    }

    public function __invoke(CrearProductoSimpleRequest $request)
    {
        $productoSimple = $this->repository->search($request->getNombre());
        if ($productoSimple != null)
            throw new ProductoSimpleExistente($request->getNombre());

        $productoSimple = new ProductoSimple($request->getNombre(), $request->getCosto(), $request->getPrecio(), $request->getCantidad(), $request->getTipo(),0);

        try {
            $this->unidad->beginTransaction();
            $this->repository->save($productoSimple);
            $this->unidad->commint();
        } catch (\Exception $e) {
            $this->unidad->rollback();
            return $e;
        }
    }
}
