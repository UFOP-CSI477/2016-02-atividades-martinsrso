@extends('layouts.content')

@section('dash')
    <div class="panel-heading">
        <a class="btn btn-link" href="{{url('registro')}}">Registros</a>
        <a class="btn btn-link" href="{{url('atleta')}}">Atletas</a>
        <a class="btn btn-link" href="{{url('registro/atleta')}}">Total Atleta</a>
        <a class="btn btn-link" href="{{url('registro/evento')}}">Total Evento</a>
    </div>
    <div class="panel-heading">Area Adm - Lista de Atletas</div>

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
                <th>Nome</th>
                <th>Login</th>
            </tr>
            </thead>
            <tbody>
            @foreach($atletas as $atleta)
                <tr>
                    <td>{{ $atleta->id }}</td>
                    <td>{{ $atleta->nome }}</td>
                    <td>{{ $atleta->login }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>{{--<button class="btn btn-default" onclick="history.back()"><i class="fa fa-arrow-left"></i> Voltar</button>--}}
    </div>
@endsection