@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Novo Paciente</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('cadastroPaciente') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="login" class="col-md-4 control-label">Nome</label>

                                <div class="col-md-6">
                                    <input id="nome" type="text" class="form-control" maxlength="45" name="nome" value="{{ old('nome') }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="login" class="col-md-4 control-label">Login</label>

                                <div class="col-md-6">
                                    <input id="login" type="text" class="form-control" maxlength="20" name="login" value="{{ old('login') }}" required >
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="senha" class="col-md-4 control-label">Senha</label>

                                <div class="col-md-6">
                                        <input id="senha" type="password" class="form-control" name="senha" maxlength="10" required>
                                </div>
                            </div>

                            <div class="form-groupr">
                                <div class="col-md-8 col-md-offset-4 ">
                                    <button class="btn btn-default" onclick="history.back()">
                                        Voltar
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        Cadastrar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
