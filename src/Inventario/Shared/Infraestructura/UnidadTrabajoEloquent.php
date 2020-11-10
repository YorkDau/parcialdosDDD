<?php


namespace Restaurante\Inventario\Shared\Infraestructura;


use Illuminate\Support\Facades\DB;
use Restaurante\Inventario\Shared\Domain\IUnidadTrabajo;

class UnidadTrabajoEloquent implements IUnidadTrabajo
{

    public function beginTransaction(): void
    {
        DB::beginTransaction();
    }

    public function commint(): void
    {
        DB::commit();
    }

    public function rollback(): void
    {
        DB::rollBack();
    }
}
