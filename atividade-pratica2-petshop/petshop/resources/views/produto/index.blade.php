@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Lista de Produtos @if(Auth::check()) @if(Auth::user()->type == 2)<a class="btn btn-xs btn-default pull-right" href="{{url('produtos/create')}}">Novo Produto</a>@endif @endif</div>

                    <div class="panel-body">
                        <table class="table table-responsive table-bordered table-hover">

                            @if(Session::has('flash_message'))
                                <div class="alert alert-success">
                                    {{ Session::get('flash_message') }}
                                </div>

                            @elseif(Session::has('message'))
                                    <div class="alert alert-success">
                                        {{ Session::get('message') }}
                                    </div>
                             @endif
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Preço</th>
                                <th>Imagem</th>
                                {{--@if(\Illuminate\Support\Facades\Auth::check())--}}
                                    <th>Ações</th>
                                {{--@endif--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($produtos as $p)
                                <tr>
                                    <td>{!! $p->nome !!}</td>
                                    <td>R$ {!! $p->preco !!}</td>
                                    <td>{!! $p->imagem !!}</td>

                                        <td>
                                            @if(\Illuminate\Support\Facades\Auth::check())
                                                @if(Auth::user()->type != 1)
                                                <a class="btn btn-xs btn-info" href="{{ url('produtos/' . $p->id . '/edit') }}">Editar</a>
                                                {{--<a class="btn btn-xs btn-info" href="{{ url('produtos/' . $p->id ) }}">Excluir</a>--}}
                                                    {!! Form::open(['method' => 'DELETE', 'route'=> ['produtos.destroy', $p->id]]) !!}
                                                    {{ Form::submit('Delete', ['class' => 'btn btn-xs btn-danger']) }}
                                                    {!! Form::close() !!}
                                                @elseif(Auth::user()->type == 1)
                                                <a class="btn btn-xs btn-info" href="{{ url('produtos/') }}">Add Carrinho</a>
                                                @endif
                                            @else
                                                <a class="btn btn-xs btn-info" href="{{ url('produtos/') }}">Add Carrinho</a>
                                            @endif
                                        </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{--<button class="btn btn-default" onclick="history.back()"><i class="fa fa-arrow-left"></i> Voltar</button>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
