<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\ChamadoRequest;
use App\Services\ChamadoServices;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Mail;

class ChamadosController extends Controller
{
    public function __construct(Request $r)
    {
        $r->getContent(true);
    }

    public function index(Request $request)
    {
        if ($request->session()->get('status')){        
            $this->setData('status', true);
            return view('chamados.index', $this->getData());
        }
        return view('chamados.index');
    }

    public function find(Request $request, ChamadoServices $services)
    {
        $tipo = (int)$request->get('tipo', 0);
        $value = $request->get('value');
        $model = $services->find($tipo, $value);
        $this->setData('model', $model)
             ->setData('pedido', ($tipo === 1) ? $value : '')
             ->setData('email', ($tipo === 2) ? $value : '')
             ->setData('tipo', $tipo)
             ->setData('value', ($tipo !== 0) ? $value: '');
        return view('chamados.find', $this->getData());
    }

    public function save(ChamadoRequest $request, ChamadoServices $services)
    {
        $services->save($request);
        $request->session()->flash('status', true);
        return redirect()->route('chamados.index');
    }
}
