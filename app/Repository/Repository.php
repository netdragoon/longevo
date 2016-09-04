<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

abstract class Repository implements IRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create(array $data = array())
    {
        return $this->model->create($data);
    }

    public function edit(array $data = array(), $id)
    {
        $model = $this->find($id);
        $model->fill($data);
        if ($model->save()) return $model;
        return null;
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function delete($id)
    {
        $m = $this->find($id);
        if ($m)
        {
            return $m->delete();
        }
        return false;
    }

    public function all(array $order = null)
    {
        $model = $this->model->newQuery();

        if (!is_null($order) && count($order) > 0)
        {
            foreach ($order as $item)
            {
                $model = $model->orderBy($item[0], $item[1]);
            }
        }

        return $model->get();
    }

    public function query()
    {
        return $this->model->newQuery();
    }
}