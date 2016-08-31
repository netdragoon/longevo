<?php

namespace App\Http\Requests;

use App\Models\Pedido;
use Illuminate\Foundation\Http\FormRequest;

class ChamadoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pedido' => 'required|exists:pedido,id',
            'nome' => 'required',
            'email' => 'required|email',
            'titulo' => 'required',
            'observacao' => 'required'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'pedido.required' => 'O número do pedido é requerido',
            'pedido.exists' => 'O número do pedido não está registrado, número de pedido inválido',
            'nome.required' => 'O nome do cliente é requerido',
            'email.required' => 'O e-mail do cliente é requerido',
            'email.email' => 'O e-mail é inválido',
            'titulo.required' => 'O titulo é requerido',
            'observacao.required' => 'A observação é requerido',
        ];
    }
}
