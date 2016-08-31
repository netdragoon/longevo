@extends('layout._layout')
@section('content')
    <form action="/chamados/find" method="get">
        <select name="tipo" class="form-control">
            <option value="1" @if (isset($tipo) && (int)$tipo ===1) {{' selected="selected"'}} @endif>Número do Pedido</option>
            <option value="2" @if (isset($tipo) && (int)$tipo ===2) {{' selected="selected"'}} @endif>E-mail</option>
        </select>
        <div class="input-group" style="margin-top: 5px; margin-bottom: 15px">
            <input type="text" name="value" class="form-control" placeholder="Digite a pesquisa" value="{{isset($value) ? $value : ""}}">
            <div class="input-group-btn">
                <button type="submit" class="btn btn-info" value="Pesquisar">Pesquisar</button>
            </div>
        </div>
    </form>
    <table class="table table-condensed">
        <thead>
        <tr>
            <th>Nº. Pedido</th>
            <th>Cliente</th>
            <th>Título</th>
        </tr>
        </thead>
        @if(isset($model))
            <tbody>
            @foreach($model as $item)
                <tr>
                    <td>{{$item->pedidoid}}</td>
                    <td>
                        <div>{{$item->clientenome}}</div>
                        <div class="label label-default">{{$item->email}}</div>
                    </td>
                    <td>{{$item->titulo}}</td>
                </tr>
            @endforeach
            </tbody>
        @endif
        @if ($model->nextPageUrl() || $model->previousPageUrl())
        <tr>
            <td colspan="3" valign="center" align="center">
                {{ $model->appends(['email' => $email, 'pedido' => $pedido])->links() }}
            </td>
        </tr>
        @endif
    </table>
@stop