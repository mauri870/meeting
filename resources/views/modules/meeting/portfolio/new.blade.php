@extends('admin::layouts.master')

@section('content')

    <h2>Cadastro de Projetos</h2>

    {!! Form::open(['route'=>'portfolio.post_add','files' => true,'class'=>'form-horizontal','role'=>'form']) !!}
    @include('admin::forms.portfolio')
@stop