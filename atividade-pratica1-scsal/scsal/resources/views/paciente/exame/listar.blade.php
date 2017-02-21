@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Paciente - Lista de Exames</div>
                    <div class="panel-body">

                        <table class="table table-responsive table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Procedimento</th>
                                <th>Preço</th>
                                <th>Data</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($exames as $exame)
                                <tr>
                                    <td>{!! $exame->procedimento->nome !!}</td>
                                    <td>R$ {!! $exame->procedimento->preco !!}</td>
                                    <td>{!! $exame->data !!}</td>
                            @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>{!! $quantidadeExames !!} exame(s)</td>
                                    <td>R${!! $precoTotal !!}</td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                        <button class="btn btn-default" onclick="history.back()">Voltar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
