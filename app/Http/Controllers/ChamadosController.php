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
            $this->setData('status', true);
            return view('chamados.index', $this->getData());
        }

        return view('chamados.index');
    }

    public function find(Request $request)
    {

        $tipo = (int)$request->get('tipo', 0);        
        $value = $request->get('value');

        $result = Chamado::joinPedido()
                         ->joinCliente();

        if (isset($tipo) && $tipo !== 0 && isset($value))
        {
            $result = $result->where(($tipo === 2) ? 'cliente.email' : 'chamado.pedidoid', $value);
        }

        $this->setData('model', $result
            ->select('cliente.nome as clientenome', 'pedido.id as pedidoid', 'chamado.titulo', 'cliente.email')
            ->orderBy('chamado.pedidoid')
            ->paginate(5));

        $this->setData('pedido', ($tipo === 1) ? $value : '')
             ->setData('email', ($tipo === 2) ? $value : '')
             ->setData('tipo', $tipo)
             ->setData('value', ($tipo !== 0) ? $value: '');

        return view('chamados.find', $this->getData());
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
            $cliente = Cliente::create([
                'nome'=>$nome,
                'email'=>$email
            ]);
        }
        else
        {
            $cliente->nome = $nome;
            $cliente->save();
        }

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
