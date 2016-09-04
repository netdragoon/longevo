<?php

namespace App\Repository;

use App\Models\Cliente;

class RepositoryCliente extends Repository implements IRepository
{
    public function __construct(Cliente $model)
    {
        parent::__construct($model);
    }
}