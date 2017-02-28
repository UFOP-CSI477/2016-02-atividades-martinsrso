@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Adicionar produto</div>

                    <div class="panel-body">

                        {!! Form::open(['url' => '/produtos', 'method' => 'post']) !!}

                        {{ Form::token() }}

                        <div class="form-group">
                            {{Form::label('nome', 'Nome')}}
                            {{Form::text('nome')}}

                        </div>

                        <div class="form-group">
                            {{Form::label('preco', 'Preço')}}
                            {{Form::number('preco')}}
                        </div>

                        <div class="form-group">
                            {{Form::label('imagem', 'Imagem')}}
                            {{Form::text('imagem')}}
                        </div>

                        <div class="form-group" >
                            {{ Form::submit('Enviar') }}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
