@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Selecionar usuário</div>
                    <div class="panel-body text-center">
                        <ul>
                            <li><a href="{{ route('showLoginPaciente') }}">Paciente</a></li>
                            <li><a href="{{ route('showLoginUsuario') }}">Usuário</a></li>
                        </ul>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
