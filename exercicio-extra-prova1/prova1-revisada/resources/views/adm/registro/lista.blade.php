@extends('layouts.content')

@section('dash')
    <div class="panel-heading">
        <a class="btn btn-link" href="{{url('registro')}}">Registros</a>
        <a class="btn btn-link" href="{{url('atleta')}}">Atletas</a>
        <a class="btn btn-link" href="{{url('registro/atleta')}}">Total Atleta</a>
        <a class="btn btn-link" href="{{url('registro/evento')}}">Total Evento</a>
    </div>
    {{--<div class="panel-heading">Area Adm - Lista de Atletas</div>--}}
    <div class="panel-heading">Area Adm - Lista de Registro</div>

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
                <th>Atleta</th>
                <th>Evento</th>
                <th>Data</th>
                <th>Pago</th>
            </tr>
            </thead>
            <tbody>
            @foreach($registros as $registro)
                <tr>
                    <td>{{ $registro->id }}</td>
                    <td>{!! $registro->atleta->nome !!}</td>
                    <td>R$ {!! $registro->evento->nome!!}</td>
                    <td>{!! $registro->data !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>{{--<button class="btn btn-default" onclick="history.back()"><i class="fa fa-arrow-left"></i> Voltar</button>--}}
    </div>
@endsection