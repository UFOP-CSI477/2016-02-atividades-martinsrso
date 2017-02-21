@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Administrador - Listar Procedimentos</div>
                    <div class="panel-body">
                        <table class="table table-responsive table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Preço</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($procedimentos as $procedimento)
                                <tr>
                                    <td>{!! $procedimento->nome !!}</td>
                                    <td>R$ {!! $procedimento->preco !!}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <button class="btn btn-default" onclick="history.back()">Voltar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
