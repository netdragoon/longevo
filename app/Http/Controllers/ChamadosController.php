<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\ChamadoRequest;
use App\Models\Chamado;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ChamadosController extends Controller
{

    public function index(Request $request)
    {
        if ($request->session()->get('status')){
            return view('chamados.index', array('status' => true));
        }
        return view('chamados.index');
    }

    public function find(Request $request, Chamado $chamado)
    {
        $tipo = (int)$request->get('tipo', 0);
        $value = $request->get('value');

        $result = $chamado->join('pedido', 'pedido.id', '=', 'chamado.pedidoid')
                          ->join('cliente', 'cliente.id', '=', 'chamado.clienteid');

        if (isset($tipo) && $tipo !== 0 && isset($value))
        {
            $result = $result->where(($tipo === 2) ? 'cliente.email' : 'chamado.pedidoid', $value);
        }

        $data['model'] = $result
            ->select('cliente.nome as clientenome', 'pedido.id as pedidoid', 'chamado.titulo', 'cliente.email')
            ->orderBy('chamado.pedidoid')
            ->paginate(5);

        $data['pedido'] = ($tipo === 1) ? $value : '';
        $data['email'] = ($tipo === 2) ? $value : '';
        $data['tipo'] = $tipo;
        $data['value'] = $value;

        //return $data;

        return view('chamados.find', $data);
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

        Chamado::create([
            'titulo' => $titulo,
            'observacao' => $observacao,
            'clienteid' => (int)$cliente->id,
            'pedidoid' => (int)$pedido
        ]);

        $request->session()->flash('status', true);
        return redirect()->route('chamados.index');
    }
}
