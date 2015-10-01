@extends('meeting::layouts.master')
@section('title', $page_name)
@section('content')
    @foreach($posts as $post)
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <div class="row">
                    <div class="col-md-12">
                        <h4><strong><a href="{{ route('home.posts.show',['id'=>$post->id]) }}">{{ $post->name }}</a></strong></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <a href="{{ route('home.posts.show',['id'=>$post->id]) }}" class="thumbnail">
                            <img src="http://placehold.it/260x180" alt="">
                        </a>
                    </div>
                    <div class="col-md-8">
                        <p>
                            {{ $post->content }}
                        </p>
                        <p><a class="btn btn-default" href="{{ route('home.posts.show',['id'=>$post->id]) }}"><i class="fa fa-link"></i> Leia mais</a></p>
                    </div>
                </div>
                <div class="row">
                    <div class="span8">
                        <p></p>
                        <p>
                            <i class="fa fa-user"></i> por <a href="#">{{ $post->user->name }}</a>
                            | <i class="fa fa-calendar"></i> {{ $post->updated_at->format('d/m/Y H:m:s') }}
                            | <i class="fa fa-comment"></i> <a href="#">3 Comentário(s)</a>
                            | <i class="fa fa-tags"></i> Tags : <a href="#"><span class="label label-info">Snipp</span></a>
                            <a href="#"><span class="label label-info">Bootstrap</span></a>
                            <a href="#"><span class="label label-info">UI</span></a>
                            <a href="#"><span class="label label-info">growth</span></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    @endforeach
@stop