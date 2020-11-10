<?php


namespace Restaurante\Inventario\Domain;

class ProductoCompuesto extends Producto
{
    private $productos = [];

    public function __construct(string $nombre, float $costo = 0, float $precio, int $cantidad = 0, array $productos, int $id = 0)
    {
        foreach ($productos as $item) {
            $costo = $costo + ($item['ingrediente']->getCosto() * $item['cantidad']);
        }
        parent::__construct($id, $nombre, $costo, $precio, $cantidad);
        $this->productos = $productos;
    }

    /**
     * @return array
     */
    public function getProductos(): array
    {
        return $this->productos;
    }

    function Salida(int $cantidad)
    {

        if ($cantidad < 0) return 'Cantidad Incorrecta, esta debe ser mayor a cero';
        $response = 'Se ha retirado con exito ' . $cantidad . ' ' . $this->getNombre() . ' costo unitario ' . $this->getCosto() . ' precio unitario ' . $this->getPrecio() . '. En el estock quedan: ';
        foreach ($this->productos as $item) {
            $resultado = $item['ingrediente']->getCantidad() - ($item['cantidad'] * $cantidad);
            $item['ingrediente']->setCantidad($resultado);
            $response = $response . $item['ingrediente']->getNombre() . ' ' . $item['ingrediente']->getCantidad() . ', ';
        }
        $response = substr($response, 0, -2);
        return $response;


    }
}
