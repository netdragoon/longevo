<?php

namespace App\Repository;

use App\Models\User;

class RepositoryUser extends Repository implements IRepository
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
}