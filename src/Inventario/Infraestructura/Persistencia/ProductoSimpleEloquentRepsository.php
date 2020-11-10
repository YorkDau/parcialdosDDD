<?php


namespace Restaurante\Inventario\Infraestructura\Persistencia;


use Restaurante\Inventario\Domain\IProductoSimpleRepository;
use Restaurante\Inventario\Domain\Producto;
use Restaurante\Inventario\Domain\ProductoSimple;
use Restaurante\Inventario\Infraestructura\Persistencia\Eloquent\ProductoSimpleModel;

class ProductoSimpleEloquentRepsository implements IProductoSimpleRepository
{
    private $model;

    public function __construct()
    {
        $this->model = new ProductoSimpleModel();
    }

    public function save(ProductoSimple $productoSimple): void
    {
        $this->model->fill($productoSimple->toArray());
        $this->model->save();
    }

    public function search(string $nombre): ?ProductoSimple
    {
        $producto = ProductoSimpleModel::where('nombre', $nombre)->first();
        return $producto != null ? ProductoSimple::formtArray($producto->attributesToArray()) : null;
    }
}
