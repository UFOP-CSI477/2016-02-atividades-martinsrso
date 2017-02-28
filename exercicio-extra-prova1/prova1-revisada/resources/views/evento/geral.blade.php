@extends('layouts.content')

@section('dash')
    <div class="panel-heading">Lista de Eventos</div>

    <div class="panel-body">
        <table class="table table-responsive table-bordered table-hover">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Data</th>
                <th>Preço</th>
            </tr>
            </thead>
            <tbody>
            @foreach($eventos as $evento)
                <tr>
                    <td>{!! $evento->nome !!}</td>
                    <td>{!! $evento->data !!}</td>
                    <td>R$ {!! $evento->preco !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{--<button class="btn btn-default" onclick="history.back()"><i class="fa fa-arrow-left"></i> Voltar</button>--}}
    </div>
@endsection