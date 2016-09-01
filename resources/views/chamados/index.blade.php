@extends('layout._layout')
@section('content')
    <h3>Cadastro de Chamados</h3>
    @if (isset($status))
        @include('save_ok')
    @endif
    @include('errors',['errors'=>$errors])
    <hr />
    {{ Form::open(array('route' => 'chamados.save', 'role'=>'form', 'id' =>'form1','name' =>'form1' )) }}
    {{ Form::hidden('id', '0') }}
    <div class="form-group has-feedback">
        {{ Form::label('pedido', 'Número do pedido:', array('class' => 'awesome')) }}
        {{ Form::text('pedido', old('pedido'), array('class'=>'form-control','placeholder'=>'Número do Pedido','maxlength' => '10', 'autofocus'=>'autofocus')) }}
        <?php echo $errors->first('pedido'); ?>
    </div>
    <hr />
    <div class="form-group has-feedback">
        {{ Form::label('email', 'E-mail do cliente:', array('class' => 'awesome')) }}
        {{ Form::text('email', old('email'), array('class'=>'form-control','placeholder'=>'E-mail do cliente', 'maxlength' => '70')) }}
        <?php echo $errors->first('email'); ?>
    </div>
    <div class="form-group has-feedback">
        {{ Form::label('nome', 'Nome do cliente:', array('class' => 'awesome')) }}
        {{ Form::text('nome', old('nome'), array('class'=>'form-control','placeholder'=>'Nome do cliente','maxlength'=>'50')) }}
        <?php echo $errors->first('nome'); ?>
    </div>
    <hr />
    <div class="form-group has-feedback">
        {{ Form::label('titulo', 'Título do chamado:', array('class' => 'awesome')) }}
        {{ Form::text('titulo', old('titulo'), array('class'=>'form-control','placeholder'=>'Título','maxlength'=>'100')) }}
        <?php echo $errors->first('titulo'); ?>
    </div>
    <div class="form-group has-feedback">
        {{ Form::label('observacao', 'Observação do chamado:', array('class'=>'awesome')) }}
        {{ Form::textarea('observacao', old('observacao'), array('class'=>'form-control','placeholder'=>'Observação')) }}
        <?php $errors->first('observacao'); ?>
    </div>
    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span> Salvar</button>
    {{ Form::close() }}
@stop