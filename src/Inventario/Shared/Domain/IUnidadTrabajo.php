<?php


namespace Restaurante\Inventario\Shared\Domain;


interface IUnidadTrabajo
{
    public function beginTransaction(): void;

    public function commint(): void;

    public function rollback(): void;

}
