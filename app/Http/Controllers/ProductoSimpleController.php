<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Restaurante\Inventario\Aplicacion\CrearProductoSimpleRequest;
use Restaurante\Inventario\Aplicacion\CrearProductoSimpleService;

class ProductoSimpleController extends Controller
{

    private CrearProductoSimpleService $service;

    public function __construct(CrearProductoSimpleService $service)
    {
        $this->service = $service;
    }

    public function guardar(Request $request)
    {
        $requestProducto = new CrearProductoSimpleRequest(0, $request->nombre, $request->costo, $request->precio, $request->cantidad, $request->tipo);
        try {
            $this->service->__invoke($requestProducto);
            return response('',Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response($e->getMenssage(),Response::HTTP_BAD_REQUEST);
        }
    }
}
