{{ Form::token() }}

<div class="form-group">
    {{Form::label('login', 'Login')}}
    {{Form::text('login')}}

</div>

<div class="form-group">
    {{Form::label('senha', 'Senha')}}
    {{Form::password('senha')}}
</div>

<div class="form-group" >
    {{ Form::submit('Enviar') }}
</div>