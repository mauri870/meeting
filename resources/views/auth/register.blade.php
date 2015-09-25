@extends('layouts.auth-master')
@section('title','Registro')
@section('body')
    <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center">
            {!! Form::open(['url'=>route('auth.post_register')]) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nome') !!}

                {!! Form::text('name', old('name'),['class'=>'form-control','placeholder'=>'Preencha seu nome']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Email') !!}

                {!! Form::email('email', old('email'),['class'=>'form-control','placeholder'=>'email@example.com']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password', 'Senha') !!}

                {!! Form::password('password',['class'=>'form-control','id'=>'password','placeholder'=>'***********']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password_confirmation', 'Repita a Senha') !!}

                {!! Form::password('password_confirmation',['class'=>'form-control','id'=>'password','placeholder'=>'***********']) !!}
            </div>
            {!! Form::submit('Registrar',['class'=>'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop