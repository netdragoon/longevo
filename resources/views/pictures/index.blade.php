@extends('layout._layout')
@section('content')
    <h3>Cadastro de Fotos</h3>
    @if (isset($status))
        @include('save_ok')
    @endif
    @include('errors',['errors'=>$errors])
    <hr />
    {{ Form::open(array('route' => 'pictures.store', 'role'=>'form', 'id' =>'form1','name' =>'form1', 'files' => true )) }}
    {{ Form::hidden('id', '0') }}
    <div class="form-group has-feedback">
        {{ Form::label('description', 'Descrição da foto:', array('class' => 'awesome')) }}
        {{ Form::text('description', old('description'), array('class'=>'form-control','placeholder'=>'Descrição da foto','maxlength' => '50', 'autofocus'=>'autofocus')) }}
        <?php echo $errors->first('description'); ?>
    </div>
    <hr />
    <div class="form-group has-feedback">
        {{ Form::label('pic', 'Foto:', array('class' => 'awesome')) }}
        {{ Form::file('pic', array('class'=>'form-control')) }}
        <?php echo $errors->first('file'); ?>
    </div>
    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span> Salvar</button>
    {{ Form::close() }}

    <table class="table" style="margin-top: 20px">
        <tr>
            <th>Descrição</th>
            <th>Foto</th>
            <th>Tipo</th>
        </tr>
        @foreach($model as $m)
        <tr>
            <td width="40%">{{$m->description}}</td>
            <td width="55%"><img src="{{route('pictures.picture', ['id' => $m->id])}}" border="0" width="150px" height="150px" /></td>
            <td width="5%">{{$m->content_type}}</td>
        </tr>
        @endforeach
    </table>
@stop