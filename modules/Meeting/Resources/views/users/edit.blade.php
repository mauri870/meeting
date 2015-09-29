@extends('meeting::layouts.master')
@section('title', $page_name)
@section('content')
        <!-- content -->
<div class="row">
    <div class="col-md-12">
        <h1 class="text-center">
            Editar usuário
        </h1>
    </div>
    <div class="col-md-8 col-md-offset-2">
        {!! Form::model($edit_user, array('route' => array('admin.users.post_edit', $edit_user->id))) !!}
        @include('meeting::forms.users')
        {!! Form::submit('Editar',['class'=>'btn btn-warning']) !!}
        {!! Form::close() !!}
    </div>
</div><!--/row-->
@stop