<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sistema Administrativo</title>
    {{ Html::style('css/bootstrap.css') }}
    {{ Html::style('css/bootstrap-theme.min.css') }}
    {{ Html::style('css/navbar-fixed-top.css') }}
    {{ Html::style('css/jquery.fileupload.css') }}
    {{ Html::style('css/bootstrapValidator.css') }}
    {{ Html::style('css/bootstrap-datetimepicker.min.css') }}
    {{ Html::style('css/pagination-adm.css') }}
    {{ Html::style('css/multiple-select.css') }}
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>{{ Html::script('js/ie8-responsive-file-warning.js') }}<![endif]-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    {{ Html::script('js/html5shiv.js') }}
    {{ Html::script('js/respond.min.js') }}
    <![endif]-->
    {{ Html::script('js/jquery.v1.11.0.js') }}
    {{ Html::script('js/moment-with-locales.js') }}
    {{ Html::script('js/jquery.maskedinput.js') }}
    {{ Html::script('js/bootstrap.min.js') }}
    {{ Html::script('js/bootstrap-datetimepicker.min.js')}}
    <!-- Validation BootStrap -->
    {{ Html::script('js/bootstrapValidator.min.js') }}
    <!--http://bootstrapvalidator.com/validators/-->
    {{ Html::script('js/language/pt_BR.js') }}
    <!-- Validation BootStrap -->
    {{ Html::script('js/jquery.ui.widget.js') }}
    {{ Html::script('js/jquery.iframe-transport.js') }}
    {{ Html::script('js/jquery.fileupload.js') }}
    {{ Html::script('js/angular.min.js') }}
    {{ Html::script('js/jquery.maskMoney.min.js') }}
    {{ Html::script('js/jquery.multiple.select.js') }}
    @section('js')
        {{ Html::script('js/web.js') }}
    @show
    <style type="text/css">
        .has-feedback .form-control-feedback {
            top: 25px;
            right: 12px;
        }
    </style>
</head>
<body>
<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Sistema Gerenciador de Contéudo</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('chamados.index') }}">Cadastro de Chamados</a></li>
                <li><a href="{{ route('chamados.find.get') }}">Pesquisa de Chamados</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Opções <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-header">Complementos</li>
                        <li><a href="{{ route('chamados.index') }}">Cadastro de Chamados</a></li>
                        <li><a href="{{ route('chamados.find.get') }}">Pesquisa de Chamados</a></li>
                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
<div class="container">
    @yield('content')
</div>
</body>
</html>