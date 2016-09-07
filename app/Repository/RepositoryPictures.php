<?php

namespace App\Repository;

use App\Models\Pictures;

class RepositoryPictures extends Repository implements IRepository
{
    /**
     * RepositoryPictures constructor.
     * @param Pictures $model
     */
    public function __construct(Pictures $model)
    {
        parent::__construct($model);
    }
}