@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Administrador - Relatório Exames/Procedimento</div>
                    <div class="panel-body">
                        <table class="table table-responsive table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Quantidade</th>
                                <th>Preço</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($procedimentos as $procedimento)
                                <tr>
                                    <td>{!! $procedimento->id !!}</td>
                                    <td>{!! $procedimento->nome !!}</td>
                                    <td>{!! $procedimento->exames->count() !!}</td>
                                    <td>{!! $procedimento->preco !!}</td>
                                    <td>{{ $procedimento->exames->count() * $procedimento->preco }}</td>
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
