<?php


namespace Restaurante\Inventario\Domain;

use PhpParser\Node\Scalar\String_;

abstract class Producto
{
    private $nombre;
    private $costo;
    private $precio;
    private $cantidad;

    public function __construct(string $nombre, float $costo=0, float $precio=0, int $cantidad=0)
    {
        $this->cantidad = $cantidad;
        $this->costo = $costo;
        $this->nombre = $nombre;
        $this->precio = $precio;
    }

    /**
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @return float
     */
    public function getCosto(): float
    {
        return $this->costo;
    }

    /**
     * @return float
     */
    public function getPrecio(): float
    {
        return $this->precio;
    }

    /**
     * @return int
     */
    public function getCantidad(): int
    {
        return $this->cantidad;
    }

    /**
     * @param int $cantidad
     */
    public function setCantidad(int $cantidad): void
    {
        $this->cantidad = $cantidad;
    }

    abstract  function Salida(int $cantidad);
}
