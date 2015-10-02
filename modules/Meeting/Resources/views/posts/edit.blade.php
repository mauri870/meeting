@extends('meeting::layouts.master')

@section('content')

    <h2>{{ $page_name }}</h2>

    {!! Form::model($post,['route'=>['home.posts.edit_post',$post->id],'files' => true,'class'=>'form-horizontal','role'=>'form']) !!}
    @include('meeting::forms.post')
@stop