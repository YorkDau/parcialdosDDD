<?php


namespace Tests\Feature\Productos\Simple;

use Illuminate\Http\Response;

use Tests\TestCase;

final  class CrearProductosSimplesTest extends TestCase
{
    /**
     * @test
     */

    public function guardarProductoSimple()
    {
        $respose = $this->post('api/productoSimple', [
            'id' => '61574b42-4e40-48fb-bb43-044909ba40cb',
            'nombre' => 'gaseosa litro',
            'costo' => 2000,
            'precio' => 5000,
            'cantidad' => 2,
            'tipo' => 'VENTA DIRECTA'

        ]);

        $respose->assertStatus(Response::HTTP_CREATED);
    }
}
