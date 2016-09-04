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
        return $this->belongsTo(Cliente::class, 'clienteid', 'id');
    }

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'pedidoid', 'id');
    }

    public function scopeJoinPedido($query)
    {
        return $query->join('pedido', 'pedido.id', '=', 'chamado.pedidoid');
    }

    public function scopeJoinCliente($query)
    {
        return $query->join('cliente', 'cliente.id', '=', 'chamado.clienteid');
    }

    public function scopeJoinPedidoAndCliente($query)
    {
        return $query->join('pedido', 'pedido.id', '=', 'chamado.pedidoid')
                     ->join('cliente', 'cliente.id', '=', 'chamado.clienteid');

    }
}
