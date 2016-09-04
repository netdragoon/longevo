<?php
/**
 * Created by PhpStorm.
 * User: Fulvio
 * Date: 03/09/2016
 * Time: 20:06
 */

namespace App\Repository;


use App\Models\Pedido;

class RepositoryPedido extends Repository implements IRepository
{
    public function __construct(Pedido $model)
    {
        parent::__construct($model);
    }
}