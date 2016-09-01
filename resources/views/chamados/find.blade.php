@extends('layout._layout')
@section('content')
    <form action="/chamados/find" method="get" id="form1" name="form1" onSubmit="return verify(event);">
        <select name="tipo" id="tipo" class="form-control">
            <option value="">Todos</option>
            <option value="1" @if (isset($tipo) && (int)$tipo===1) {{' selected="selected"'}} @endif>Número do Pedido</option>
            <option value="2" @if (isset($tipo) && (int)$tipo===2) {{' selected="selected"'}} @endif>E-mail</option>
        </select>
        <div class="input-group" style="margin-top: 5px; margin-bottom: 15px">
            <input type="text" id="value" name="value" class="form-control" placeholder="Digite a pesquisa" value="{{isset($value) ? $value : ""}}">
            <div class="input-group-btn">
                <button type="submit" class="btn btn-info" value="Pesquisar">Pesquisar</button>
                <button type="button" id="btnClear" class="btn btn-default" value="Limpar">Limpar</button>
            </div>
        </div>
    </form>
    <table class="table table-condensed">
        <thead>
        <tr>
            <th style="width:10%;text-align:center;">Nº.</th>
            <th style="width:60%;text-align:center;">Cliente</th>
            <th style="width:60%;text-align:center;">Título</th>
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
                {{ $model->appends(['value' => $value, 'tipo' => $tipo])->links() }}
            </td>
        </tr>
        @endif
    </table>
<script type="text/javascript">
    $(document).ready(function()
    {
        $("#btnClear").on('click', function(){
            $("#tipo").val("");
            $("#value").val("");
            $("#form1").submit();
        });
    })
    function verify(e)
    {
        var tipo = $("#tipo").val();
        var num = parseInt(tipo) || 0;        
        var sts = false;
        var value = $("#value").val();
        if (num === 0) 
        {
            sts = true;
        } 
        else if (num === 1)
        {
            sts = isNumeric(value);
        }
        else if (num === 2)
        {
            sts = isEmail(value)
        }      
        if (!sts)
        {
            alert('Consulta inválida');
        }  
        return sts;
    }
    function isNumeric(str) {
        var er = /^[0-9]+$/;
        return (er.test(str));
    }
    function isEmail(email){
        var er = /^[a-zA-Z0-9][a-zA-Z0-9\._-]+@([a-zA-Z0-9\._-]+\.)[a-zA-Z-0-9]{2,3}/; 
        return er.test(email);
    }
</script>    
@stop