@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Início</div>
                    <div class="panel-body">
                        <ul>
                            <li><a href="{{ route('procedimentosAreaGeral') }}">Ver Procedimentos</a></li>
                            <li><a href="{{ route('showLoginPaciente') }}">Área do Paciente</a></li>
                            <li><a href="{{ route('showLoginUsuario') }}">Área do Usuário</a></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
