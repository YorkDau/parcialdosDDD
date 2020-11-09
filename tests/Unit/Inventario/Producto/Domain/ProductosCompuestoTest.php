<?php


namespace test;

use App\Inventario\Domain\ProductoCompuesto;
use App\Inventario\Domain\ProductoSimple;
use PHPUnit\Framework\TestCase;


class ProductosCompuestoTest extends TestCase
{
    /**
     *
     * Escenario: Salida correcta de productos compuestos
     * HU 1. COMO USUARIO QUIERO REGISTRAR LA SALIDA PRODUCTOS
     * Criterio de Aceptación:
     * La cantidad de la de debe ser mayor a 0.
     * Cada salida debe registrar el costo del producto y el precio de la venta
     * En caso de un producto compuesto la cantidad de la salida se le disminuirá a la     cantidad existente de cada uno de su ingrediente.
     * El costo de los productos compuestos corresponden al costo de sus ingredientes por la cantidad de estos
     *
     * Dado
     * el usuario tiene registrado los siguiente porductos.
     * Producto 2: nombre “salchicha”, costo “1000”, cantidad “6”, tipo“PREPARACION”.
     * Producto 3:nombre “lamina de queso”, costo “1000”, cantidad “3”, tipo“PREPARACION”.
     * Producto 4:nombre “pan perro”, costo “1000”, cantidad “3”, tipo“PREPARACION”.
     * Producto 5:nombre”perro sencillo”, precio “5000”.
     * Cuando
     * va a registrar una salida con la cantida = 2;
     * Entonces
     * El sistema de informacion registrara la salidad y mostrara un mensaje de exito como: “Se ha retirado con exito “2” perro sencillo costo unitario:”3000”, precio unitario:”5000”. En el estock quedan: Salchicha:”4”,lamina de queso:”1”, pan perro:”1”.
     * @test
     */
    public function testSalidaCorrectaProductosCompuesto(): void
    {
        $producto[] = new ProductoSimple('salchicha', 1000, 0, 6, 'PREPARACION');
        $producto[] = new ProductoSimple('lamina de queso', 1000, 0, 3, 'PREPARACION');
        $producto[] = new ProductoSimple('pan perro', 1000, 0, 3, 'PREPARACION');

        $productosRegistrados = array();
        foreach ($producto as $item) {
            $productosRegistrados[] = ['ingrediente' => $item, 'cantidad'=>1];
        }
        $productoCompuesto = new ProductoCompuesto('perro sencillo',0,5000,0,$productosRegistrados);
        $resultado = $productoCompuesto->Salida(2);
        $this->assertEquals('Se ha retirado con exito 2 perro sencillo costo unitario 3000 precio unitario 5000. En el estock quedan: salchicha 4, lamina de queso 1, pan perro 1', $resultado);

    }
}