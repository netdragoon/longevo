<?php

namespace App\Repository;

interface IRepository
{
    public function create(array $data = array());
    public function edit(array $data = array(), $id);
    public function find($id);
    public function delete($id);
    public function all(array $order = null);
    public function query();
}