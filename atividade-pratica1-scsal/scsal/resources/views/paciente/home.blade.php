@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">Área do Paciente</div>
                    <div class="panel-body">
                        <ul>
                            <li><a href="{{ route('showSolicitarExame') }}">Solicitar Exame</a></li>
                            <li><a href="{{ route('listarExamesPaciente') }}">Ver Exames</a></li>
                            <li><a href="{{ route('logout') }}">Sair</a></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
