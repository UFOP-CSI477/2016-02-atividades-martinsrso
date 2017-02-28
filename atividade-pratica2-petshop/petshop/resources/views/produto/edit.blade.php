@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar produto</div>

                    <div class="panel-body">

                        {!! Form::model($produtos, ['method' => 'PATCH', 'route'=> ['produtos.update', $produtos->id]]) !!}

{{--                        {{ method_field('PATCH') }}--}}
                        {{ Form::token() }}

                        <div class="form-group">

                            {{Form::label('nome', 'Nome')}}
                            @if(Auth::check())
                                @if(Auth::user()->type == 3)
                                    {{Form::text('nome', $produtos->nome,  ['disabled' => 'disabled'] )}}
                                @elseif(Auth::user()->type == 2)
                                    {{Form::text('nome', $produtos->nome )}}
                                @endif
                            @endif
                        </div>

                        <div class="form-group">
                            {{Form::label('preco', 'Preço')}}
                            {{Form::number('preco', $produtos->preco )}}
                        </div>

                        <div class="form-group">
                            {{Form::label('imagem', 'Imagem')}}
                            {{Form::text('imagem', $produtos->imagem )}}
                        </div>

                        <div class="form-group" >
                            {{ Form::submit('Salvar') }}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
