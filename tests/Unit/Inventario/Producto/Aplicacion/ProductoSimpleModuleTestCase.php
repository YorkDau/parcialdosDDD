<?php


namespace Tests\Unit\Inventario\Producto\Aplicacion;


use PHPUnit\Framework\TestCase;
use Mockery\MockInterface;
use Mockery;
use Restaurante\Inventario\Domain\IProductoSimpleRepository;
use Restaurante\Inventario\Domain\ProductoSimple;
use Restaurante\Inventario\Shared\Domain\IUnidadTrabajo;
use Tests\Unit\Shared\Domain\TestUtils;

class ProductoSimpleModuleTestCase extends TestCase
{

    private $repository;
    private $unitofwork;

    /**
     * @return MockInterface|IProductoSimpleRepository
     */
    public function repository():MockInterface
    {
        return $this->repository = $this->repository ?: Mockery::mock(IProductoSimpleRepository::class);
    }

    /**
     * @return MockInterface|IUnidadTrabajo
     */
    public function unitofwork():MockInterface{
        return $this->unitofwork = $this->unitofwork ?: Mockery::mock(IUnidadTrabajo::class);
    }

    protected function shouldSave(ProductoSimple $producto): void
    {
        $this->repository()
            ->shouldReceive('save')
            ->with(TestUtils::similarTo($producto))
            ->once();
    }


    protected function shouldSearch(string $nombre, ?ProductoSimple $producto = null)
    {
        $this->repository()
            ->shouldReceive('search')
            ->with(TestUtils::similarTo($nombre))
            ->once()
            ->andReturn($producto);
    }


}
