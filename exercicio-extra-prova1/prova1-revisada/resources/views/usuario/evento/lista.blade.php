@extends('layouts.content')

@section('dash')
    <div class="panel-heading">
        <a class="btn btn-link" href="{{url('usuario/registro/create')}}">Criar Registro</a>
        <a class="btn btn-link" href="{{url('usuario/evento')}}">Eventos</a>
    </div>
    {{--<div class="panel-heading">Area Adm - Lista de Atletas</div>--}}
    <div class="panel-heading">Lista de Eventos</div>

    <div class="panel-body">
        <table class="table table-responsive table-bordered table-hover">

@if(session()->has('mensagem'))
    <div class="alert alert-info text-center">
        {!! session('mensagem') !!}
    </div>
    <br />
@endif
<table class="table table-responsive table-bordered table-hover">
    <thead>
    <tr>
        <th>Evento</th>
        <th>Preço</th>
        <th>Data</th>
    </tr>
    </thead>
    <tbody>
    @foreach($eventos as $evento)
        <tr>
            <td>{!! $evento->nome !!}</td>
            <td>R$ {!! $evento->preco !!}</td>
            <td>{!! $evento->data !!}</td>
            {{--<td><a class="btn btn-primary" href="{{ route('showEditarExame', $exame->id) }}"><i class="fa fa-pencil-square-o"></i> Editar</a> ou <a href="{{ route('excluirExame', $exame->id) }}" class="btn btn-danger"><i class="fa fa-times"></i> Excluir</a></td>--}}
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <td>{!! $qTotal !!} exame(s)</td>
        <td>Total R${!! $vTotal !!}</td>
        {{--<td>N/A</td>--}}
        {{--<td>N/A</td>--}}
    </tr>
    </tfoot>
</table>
@endsection
