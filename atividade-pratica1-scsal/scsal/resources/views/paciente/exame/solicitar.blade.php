@extends('layouts.app')

@push('extra-css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css">
@endpush

@push('extra-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.pt-BR.min.js"></script>
<script>
    $('.datepicker').datepicker({
        language: 'pt-BR',
        startDate: "'" + new Date().getDate() + "'"
    });
</script>
@endpush

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Novo Exame</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('solicitarExame') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('procedimento') ? ' has-error' : '' }}">
                                <label for="procedimento" class="col-md-4 control-label">Procedimento</label>

                                <div class="col-md-6">
                                    <select id="procedimento" class="form-control" name="procedimento" required autofocus>
                                        <option value="">Selecione o procedimento</option>
                                        @foreach($procedimentos as $procedimento)
                                            <option value="{!! $procedimento->id !!}">{!! $procedimento->nome !!} - R${!! $procedimento->preco !!}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('procedimento'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('procedimento') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('data') ? ' has-error' : '' }}">
                                <label for="data" class="col-md-4 control-label">Data</label>

                                <div class="col-md-6">
                                    <input id="data" type="text" data-date-format="dd/mm/yyyy" class="datepicker form-control" maxlength="10" name="data" required @if($errors->has('data')) autofocus @endif>

                                    @if ($errors->has('data') || session()->has('erro'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('data') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-groupr">
                                <div class="col-md-8 col-md-offset-4 text-cente">

                                    <button type="submit" class="btn btn-primary">
                                        Solicitar
                                    </button>
                                    <button class="btn btn-default" onclick="history.back()">
                                        Voltar
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
