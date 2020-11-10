<?php


namespace Restaurante\Inventario\Infraestructura\Persistencia\Eloquent;


use Illuminate\Database\Eloquent\Model;

class ProductoSimpleModel extends Model
{
    protected $table = 'simples';
    protected $fillable = ['id', 'nombre', 'costo', 'precio', 'cantidad', 'tipo', 'created_at', 'updated_at'];

}
