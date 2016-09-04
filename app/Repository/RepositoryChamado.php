<?php

namespace App\Repository;

use App\Models\Chamado;

class RepositoryChamado extends Repository implements IRepository
{
    public function __construct(Chamado $model)
    {
        parent::__construct($model);
    }
}