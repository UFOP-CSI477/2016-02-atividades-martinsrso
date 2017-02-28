@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Atleta - Adicionar Registro</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/usuario/registro/store') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                                <label for="nome" class="col-md-4 control-label">Evento</label>

                                <select class="form" name="evento" id="evento">
                                    <option value="">Selecione o Evento</option>
                                    @foreach($registros as $registro)
                                        <option value="{{$registro->id}}">{!!  $registro->nome !!}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group{{ $errors->has('data') ? ' has-error' : '' }}">
                                <label for="Data" class="col-md-4 control-label">Data Prevista</label>

                                <div class="col-md-6">
                                    <input id="data" type="data" class="form-control" name="data" ) >
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('data') ? ' has-error' : '' }}">
                                <label for="Data" class="col-md-4 control-label">Data Pagamento</label>

                                <div class="col-md-6">
                                    <input id="data" type="data" class="form-control" name="pdata" ) >
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button class="btn btn-default" onclick="history.back()">
                                        <i class="fa fa-arrow-left"></i> Voltar
                                    </button>
                                    <button type="reset" class="btn btn-warning">
                                        <i class="fa fa-eraser"></i> Limpar
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-plus"></i> Adicionar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
