@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Administrador - Adicionar Procedimento</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('adicionarProcedimento') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                                <label for="nome" class="col-md-4 control-label">Nome</label>

                                <div class="col-md-6">
                                    <input id="nome" class="form-control" name="nome" type="text" maxlength="60" required >
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('preco') ? ' has-error' : '' }}">
                                <label for="preco" class="col-md-4 control-label">Preço</label>

                                <div class="col-md-6">
                                    <input id="preco" type="number" step="0.01" class="form-control" min="0" name="preco" required >
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                         Adicionar
                                    </button>
                                    <button onclick="history.back()" class="btn btn-default">
                                         Voltar
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
