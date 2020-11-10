<?php


namespace Restaurante\Inventario\Domain;


use Restaurante\Inventario\Shared\Domain\DomainError;

class ProductoSimpleExistente extends DomainError
{

    private string $nombre;

    /**
     * ProductoDuplicado constructor.
     * @param string $nombre
     */
    public function __construct(string $nombre)
    {
        $this->nombre = $nombre;
        parent::__construct();
    }


    public function errorCode(): string
    {
        return 'producto_duplicado';
    }

    protected function errorMessage(): string
    {
        return sprintf('El producto con el nombre <%s> ya se encuentra registrado.', $this->nombre);
    }

}
