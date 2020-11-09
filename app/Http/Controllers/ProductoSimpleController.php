<?php


namespace App\Http\Controllers;




use Illuminate\Http\Response;

final class ProductoSimpleController
{

    public function guardar(){

        return response('',Response::HTTP_CREATED);
    }
}
