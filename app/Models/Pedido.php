<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedido';

    protected $fillable = array(
        'descricao'
    );

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function chamados()
    {
        return $this->hasMany(Chamado::class , 'pedidoid', 'id');
    }
}
