@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Paciente - Lista de Exames</div>
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
                                <th>Procedimento</th>
                                <th>Preço</th>
                                <th>Data</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($exames as $exame)
                                <tr>
                                    <td>{{ $exame->id }}</td>
                                    <td>{!! $exame->procedimento->nome !!}</td>
                                    <td>R$ {!! $exame->procedimento->preco !!}</td>
                                    <td>{!! $exame->data !!}</td>
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
