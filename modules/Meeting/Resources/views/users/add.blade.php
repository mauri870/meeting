@extends('meeting::layouts.master')
@section('title', $page_name)
@section('content')
        <!-- content -->
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        {!! Form::open(['url'=>route('auth.post_register')]) !!}
        @include('meeting::forms.users')
    </div>
</div><!--/row-->
@stop