@extends('meeting::layouts.master')
@section('title', $page_name)
@section('content')
        <!-- content -->
<div class="row">
    <div class="col-md-12">
        <h1 class="text-center">
            Cadastrar usuário
        </h1>
    </div>
    <div class="col-md-8 col-md-offset-2">
        {!! Form::open(['url'=>route('admin.users.add_post'),'files'=>'true']) !!}
        @include('meeting::forms.users')
        {!! Form::submit('Cadastrar',['class'=>'btn btn-success']) !!}
        {!! Form::close() !!}
    </div>
</div><!--/row-->
@stop