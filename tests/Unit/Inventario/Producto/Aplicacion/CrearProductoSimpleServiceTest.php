<?php


namespace Tests\Unit\Inventario\Producto\Aplicacion;


use Restaurante\Inventario\Aplicacion\CrearProductoSimpleRequest;
use Restaurante\Inventario\Aplicacion\CrearProductoSimpleService;
use Restaurante\Inventario\Domain\IProductoSimpleRepository;
use Restaurante\Inventario\Domain\ProductoSimple;
use Restaurante\Inventario\Domain\ProductoSimpleExistente;
use Restaurante\Inventario\Shared\Domain\IUnidadTrabajo;

class CrearProductoSimpleServiceTest extends ProductoSimpleModuleTestCase
{
    private $service;

    public function setUp(): void
    {
        $this->service = $this->service ?: new CrearProductoSimpleService($this->repository(),$this->unitofwork());
        parent::setUp();
    }

    public function testCrearProductoSimpleCorrectamente():void{
        $request = new CrearProductoSimpleRequest(0,'GASEOSA', 2000, 5000, 2, 'VENTA DIRECTA');
        $producto = new ProductoSimple($request->getNombre(), $request->getCosto(), $request->getPrecio(), $request->getCantidad(),$request->getTipo(), 0);
        $repository = $this->createMock(IProductoSimpleRepository::class);
        $unidad = $this->createMock(IUnidadTrabajo::class);
        $service = new CrearProductoSimpleService($repository, $unidad);
        $repository->method('save')->with($producto);
        $service($request);
    }

    public function testCrearProductoSimpleDuplicado(){
        $this->expectException(ProductoSimpleExistente::class);
        $request = new CrearProductoSimpleRequest(0,'GASEOSA', 2000, 5000, 2, 'VENTA DIRECTA');
        $producto = new ProductoSimple($request->getNombre(), $request->getCosto(), $request->getPrecio(), $request->getCantidad(),$request->getTipo(), 0);
        $this->shouldSearch($request->getNombre(),$producto);
        $this->service->__invoke($request);
    }

}
