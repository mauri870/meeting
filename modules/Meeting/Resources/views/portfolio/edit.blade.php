@extends('admin::layouts.master')

@section('content')

    <h2>Editar Projeto</h2>

    {!! Form::model($project, ['route' => ['portfolio.post_edit', $project->id],'files' => true,'class'=>'form-horizontal','role'=>'form']) !!}
    @include('admin::forms.portfolio')
@stop