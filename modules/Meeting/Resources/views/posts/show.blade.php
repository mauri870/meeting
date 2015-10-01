@extends('meeting::layouts.master')
@section('title', $page_name)
@section('content')
        <div class="row">
            <div class="text-left">
                <a href="{{ URL::previous() }}">
                    <button class="btn btn-primary"><i class="fa fa-reply"></i> Voltar</button>
                </a>
            </div>
            <div class="col-lg-8">
                <!-- the actual blog post: title/author/date/content -->
                <h1><a href="">{{ $post->title }}</a></h1>

                <p class="lead"><i class="fa fa-user"></i> por <a href="">{{ $post->user->name }}</a>
                </p>
                <hr>
                <p><i class="fa fa-calendar"></i> {{ $post->updated_at->format('d/m/Y H:m:s') }}</p>
                <hr>
                {!! $post->content !!}
        </div>
        <hr>
@stop