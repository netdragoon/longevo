<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\ChamadoRequest;
use App\Models\Chamado;
use App\Models\Cliente;

class ChamadosController extends Controller
{

    public function index()
    {
        return view('chamados.index');
    }

    public function save(ChamadoRequest $request)
    {
        $pedido = $request->get('pedido');
        $nome = $request->get('nome');
        $email = $request->get('email');
        $titulo = $request->get('titulo');
        $observacao = $request->get('observacao');

        $cliente = Cliente::where('email', $email)->first();

        if (!$cliente)
        {
            $cliente = Cliente::create(['nome'=>$nome, 'email'=>$email]);
        }

        $cliente->nome = $nome;
        $cliente->save();

        $chamado = Chamado::create([
            'titulo' => $titulo,
            'observacao' => $observacao,
            'clienteid' => (int)$cliente->id,
            'pedidoid' => (int)$pedido
        ]);

        return redirect()->route('chamados.index');
    }
}
