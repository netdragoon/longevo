<?php

namespace App\Services;

use App\Repository\RepositoryChamado;
use App\Repository\RepositoryCliente;
use Illuminate\Http\Request;

class ChamadoServices
{
    private $repCliente;
    private $repChamado;

    public function __construct(RepositoryCliente $repCliente, RepositoryChamado $repChamado)
    {
        $this->repCliente = $repCliente;
        $this->repChamado = $repChamado;
    }

    public function find($tipo, $value)
    {
        $result = $this->repChamado->query()->joinPedidoAndCliente();

        if (isset($tipo) && $tipo !== 0 && isset($value))
        {
            $result = $result->where(($tipo === 2) ? 'cliente.email' : 'chamado.pedidoid', $value);
        }

        $model = $result->select('cliente.nome as clientenome', 'pedido.id as pedidoid', 'chamado.titulo', 'cliente.email')
            ->orderBy('chamado.pedidoid')
            ->paginate(5);

        return $model;
    }

    public function save(Request $request)
    {
        $pedido = $request->get('pedido');
        $nome = $request->get('nome');
        $email = $request->get('email');
        $titulo = $request->get('titulo');
        $observacao = $request->get('observacao');

        $cliente = $this->repCliente
            ->query()
            ->where('email', $email)->first();

        if (!$cliente)
        {
            $cliente = $this->repCliente->create([
                'nome'=> $nome,
                'email'=> $email
            ]);
        }
        else
        {
            $cliente->nome = $nome;
            $cliente->save();
        }

        $chamado = $this->repChamado->create([
            'titulo' => $titulo,
            'observacao' => $observacao,
            'clienteid' => (int)$cliente->id,
            'pedidoid' => (int)$pedido
        ]);

        return $chamado;
    }
    
}