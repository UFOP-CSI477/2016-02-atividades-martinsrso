@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Lista de Produtos</div>

                     <div class="panel-body">
                        <table class="table table-responsive table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Preço</th>
                                <th>Imagem</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($produtos as $p)
                                <tr>
                                    <td>{!! $p->nome !!}</td>
                                    <td>R$ {!! $p->preco !!}</td>
                                    <td>{!! $p->imagem !!}</td>
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
