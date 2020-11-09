<?php


namespace Tests\Feature\Productos\Simple;
use Illuminate\Http\Response;

use Tests\TestCase;

final  class CrearProductosSimplesTest  extends TestCase
{
    /**
     * @test
     */

    public function guardarProductoSimple(){
        $respose = $this->post('api/productoSimple',[
            'id' => '1ad6784f-a836-48dc-9c30-ebc0535c7cb9',
            'nombre' => 'GASEOSA LITRO',
            'costo' => 2000,
            'precio' => 5000,
            'cantidad'=> 2,
            'tipo'=> 'VENTA DIRECTA'

        ]);

        $respose->assertStatus(Response::HTTP_CREATED);
    }
}
