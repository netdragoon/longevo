<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chamado extends Model
{
    protected $table = 'chamado';

    protected $fillable = array(
        'clienteid', 'pedidoid', 'titulo', 'observacao'
    );

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function cliente()
    {
        return $this->belongsTo(App\Models\Cliente::class, 'clienteid', 'id');
    }

    public function pedido()
    {
        return $this->belongsTo(App\Models\Pedido::class, 'pedidoid', 'id');
    }
}
