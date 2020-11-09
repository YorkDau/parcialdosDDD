<?php


namespace Restaurante\Inventario\Domain;


class Salida
{
    private $numero =0;
    private $cantidad;
    private $nombreProducto;
    private $costo;
    private $precio;

    public function __construct(int $cantidad, string $nombreProducto, float $precio, float $costo)
    {
        $this->cantidad = $cantidad;
        $this->precio = $precio;
        $this->costo = $costo;
        $this->nombreProducto = $nombreProducto;
        $this->numero++;
    }

    /**
     * @return int
     */
    public function getNumero(): int
    {
        return $this->numero;
    }

    /**
     * @return int
     */
    public function getCantidad(): int
    {
        return $this->cantidad;
    }

    /**
     * @return string
     */
    public function getNombreProducto(): string
    {
        return $this->nombreProducto;
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
}
