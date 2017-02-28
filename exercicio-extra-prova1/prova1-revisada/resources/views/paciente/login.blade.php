@extends('layouts.content')

@section('dash')

    {!! Form::open(['action' => 'Auth\LoginController@loginPaciente']) !!}
        @include('paciente.form')
    {!! Form::close() !!}

@endsection