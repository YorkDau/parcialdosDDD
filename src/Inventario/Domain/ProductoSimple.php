<?php


namespace Restaurante\Inventario\Domain;
class ProductoSimple extends Producto
{
    private $tipo;

    public function __construct(string $nombre, float $costo, float $precio, int $cantidad, string $tipo,int $id=0)
    {
        parent::__construct($id,$nombre, $costo, $precio, $cantidad);
        $this->tipo = $tipo;
    }

    /**
     * @return string
     */
    public function getTipo(): string
    {
        return $this->tipo;
    }

    public function Entrada(int $cantidad): string
    {
        if ($cantidad <= 0) return 'Cantidad de productos que intenta registrar es incorrecta, bebe ser mayor que cero';
        if ($cantidad > 0) {
            $cantidadCalculada = $cantidad + $this->getCantidad();
            $this->setCantidad($cantidadCalculada);
            new Entrada($cantidad, $this->getNombre(), $this->getPrecio(), $this->getCosto());
            return sprintf("Se ha agregado %s unidades al producto %s en el stock hay:%s", $cantidad, $this->getNombre(), $this->getCantidad());
        }
    }

    public function Salida(int $cantidad)
    {
        if ($cantidad <= 0) return 'Cantidad Incorrecta, esta debe ser mayor a cero';
        if ($cantidad > 0) {
            $this->setCantidad($this->getCantidad() - $cantidad);
            new Salida($cantidad, $this->getNombre(), $this->getCosto(), $this->getPrecio());
            return sprintf("Se ha retirado con exito %s unidad del producto %s queda en el stock:%s", $cantidad, $this->getNombre(), $this->getCantidad());

        }
    }

    public function toArray(bool $updated = false): array
    {
        if ($updated) {
            return [
                'id' => $this->getId(),
                'nombre' => $this->getNombre(),
                'costo' => $this->getCosto(),
                'precio' => $this->getPrecio(),
                'cantidad' => $this->getCantidad(),
                'tipo' => $this->getTipo()
            ];
        } else {
            return [
                'nombre' => $this->getNombre(),
                'costo' => $this->getCosto(),
                'precio' => $this->getPrecio(),
                'cantidad' => $this->getCantidad(),
                'tipo' => $this->getTipo()
            ];
        }

    }

    static function formtArray(array $model): self
    {
        return new self($model['nombre'], $model['costo'], $model['precio'], $model['cantidad'], $model['tipo'],$model['id']);
    }

}
