<?php


namespace Tests\Feature\Productos\Simple;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;

use Tests\TestCase;

final  class CrearProductosSimplesTest extends TestCase
{

    use RefreshDatabase;
    /**
     * @test
     */

    public function guardarProductoSimple()
    {
        $respose = $this->post('api/productoSimple', [
            'nombre' => 'gaseosa litro',
            'costo' => 2000,
            'precio' => 5000,
            'cantidad' => 2,
            'tipo' => 'VENTA DIRECTA'

        ]);

        $respose->assertStatus(Response::HTTP_CREATED);
    }


}
