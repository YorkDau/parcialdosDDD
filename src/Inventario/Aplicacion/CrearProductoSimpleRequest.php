<?php


namespace Restaurante\Inventario\Aplicacion;


use PhpParser\Node\Scalar\String_;

class CrearProductoSimpleRequest
{
    private $id;
    private $nombre;
    private $costo;
    private $precio;
    private $cantidad;
    private $tipo;

    public function __construct(string $id, string $nombre, float $costo, float $precio, int $cantidad, string $tipo)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->costo = $costo;
        $this->precio = $precio;
        $this->cantidad = $cantidad;
        $this->tipo = $tipo;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
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
     * @return string
     */
    public function getTipo(): string
    {
        return $this->tipo;
    }


}

