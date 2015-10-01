@extends('meeting::layouts.master')

@section('content')

    <h2>{{ $page_name }}</h2>

    {!! Form::open(['route'=>'home.posts.add_post','files' => true,'class'=>'form-horizontal','role'=>'form']) !!}
    @include('meeting::forms.post')
@stop