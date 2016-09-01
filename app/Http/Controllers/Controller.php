<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $data = array();

    public function setData($key, $value)
    {
        $this->data[$key] = $value;
        return $this;
    }

    public function getData($key = null)
    {
        if (is_null($key)) {
            return $this->data;
        }
        return $this->data[$key];
    }
}
