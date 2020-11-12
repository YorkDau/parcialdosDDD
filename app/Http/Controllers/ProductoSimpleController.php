<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Restaurante\Inventario\Aplicacion\CrearProductoSimpleRequest;
use Restaurante\Inventario\Aplicacion\CrearProductoSimpleService;
use Restaurante\Inventario\Domain\ProductoSimpleExistente;

class ProductoSimpleController extends Controller
{

    private CrearProductoSimpleService $service;

    public function __construct(CrearProductoSimpleService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Post(
     *     path="/api/productoSimple",
     *     summary="GuardarProductoSimple",
     *     @OA\Parameter(
     *          name="nombre",
     *          description="Nombre del Prodcuto Simple",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *         @OA\Parameter(
     *          name="costo",
     *          description="costo del producto simple",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="number"
     *          )
     *      ),
     *     @OA\Parameter(
     *          name="precio",
     *          description="precio del producto simple",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="number"
     *          )
     *      ),
     *     @OA\Parameter(
     *          name="cantidad",
     *          description="Cantidad del prdducto Simple",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="number"
     *          )
     *      ),
     *     @OA\Parameter(
     *          name="tipo",
     *          description="Venta Directa ó Preparacion",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\Response(
     *         response=201,
     *         description="Guardado Exitosamente."
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="Error al Guardar el Producto Simple"
     *     )
     * )
     */
    public function guardar(Request $request)
    {
        $requestProducto = new CrearProductoSimpleRequest(0, $request->nombre, $request->costo, $request->precio, $request->cantidad, $request->tipo);
        try {
            $this->service->__invoke($requestProducto);
            return response('', Response::HTTP_CREATED);
        } catch (ProductoSimpleExistente $e) {
            return response($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }
}
