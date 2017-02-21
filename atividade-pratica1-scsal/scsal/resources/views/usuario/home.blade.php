@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Área do Usuário</div>
                    <div class="panel-body">
                        <ul>

                        @can('administrar')

                            <li><a href="{{ route('showAdicionarProcredimento') }}">Adicionar Procedimento</a></li>
                            <li><a href="{{ route('listarProcedimentos') }}">Listar Procedimentos</a></li>
                            <li><a href="{{ route('relatorioPacientes') }}">Relatório de Pacientes</a></li>
                            <li><a href="{{ route('relatorioProcedimento') }}">Relatório de Procedimentos</a></li>


                        @endcan
                        @can('operar')
                            <li><a href="{{ route('listarExames') }}">Listar Exames</a></li>
                        @endcan
                            <li><a href="{{ route('logout') }}">Sair</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
