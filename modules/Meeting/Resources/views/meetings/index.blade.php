@extends('meeting::layouts.master')
@section('title', $page_name)
@section('content')
    @foreach($meetings as $meeting)
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <div class="row">
                    <div class="col-md-12">
                        <h4><strong><a href="{{ route('home.posts.show',['id'=>$meeting->id]) }}">{{ $meeting->title }}</a></strong></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <a href="{{ route('home.posts.show',['id'=>$meeting->id]) }}" class="thumbnail">
                            <img src="{{ asset('images/posts/images/'.$meeting->id.'.'.$meeting->image) }}" width="300" height="200px" alt="">
                        </a>
                    </div>
                    <div class="col-md-8">
                        <p>
                            {!! $meeting->content !!}
                        </p>
                        <p><a class="btn btn-default" href="{{ route('home.posts.show',['id'=>$meeting->id]) }}"><i class="fa fa-link"></i> Leia mais</a></p>
                    </div>
                </div>
                <div class="row">
                    <div class="span8">
                        <p></p>
                        <p>
                            <i class="fa fa-user"></i>Postado por <a href="#">{{ $meeting->user->name }}</a>
                            | <i class="fa fa-calendar"></i> {{ $meeting->updated_at->format('d/m/Y H:m:s') }}
                            {{--| <i class="fa fa-comment"></i> <a href="#">3 Comentário(s)</a>--}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    @endforeach
    <div class="row text-center">
        {!! $meetings->render() !!}
    </div>
@stop