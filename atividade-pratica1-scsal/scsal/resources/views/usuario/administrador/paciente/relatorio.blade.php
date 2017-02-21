@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Administrador - Relatório de Exames/Pacientes</div>
                    <div class="panel-body">
                        @if(session()->has('mensagem'))
                            <div class="alert alert-info text-center">
                                {!! session('mensagem') !!}
                            </div>
                            <br />
                        @endif
                        <table class="table table-responsive table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Login</th>
                                <th>Nome</th>
                                <th>Exames</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pacientes as $paciente)
                                <tr>
                                    <td>{!! $paciente->id !!}</td>
                                    <td>{!! $paciente->login !!}</td>
                                    <td>{!! $paciente->nome !!}</td>
                                    <td>{!! $paciente->exames->count() !!}</td>
                                    <td>
                                        @php
                                            $total = 0;
                                            foreach ($paciente->exames as $exame) $total += $exame->procedimento->preco;
                                            echo 'R$' . $total;
                                        @endphp
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <button class="btn btn-default" onclick="history.back()"><i class="fa fa-arrow-left"></i> Voltar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
