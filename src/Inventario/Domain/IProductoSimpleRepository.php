<?php


namespace Restaurante\Inventario\Domain;


interface IProductoSimpleRepository
{

    public function save(ProductoSimple $productoSimple):void;

    public function search(string $nombre): ?ProductoSimple;

}
