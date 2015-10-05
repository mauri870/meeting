@extends('meeting::layouts.master')

@section('content')

    <h2>{{ $page_name }}</h2>

    {!! Form::model($post,['route'=>['home.posts.edit_post',$post->id],'files' => true,'class'=>'form-horizontal','role'=>'form']) !!}
    @include('meeting::forms.post')
    <div class="form-group">
        {!! Form::label('occupations[]','Escolha quem pode ver ',['class'=>'col-sm-2 control-label']) !!}

        <div class="col-sm-10">
            <input type="checkbox" onClick="toggle(this)" /> Marcar todos<br/>
            @foreach($occupations as $occupation)
                {!! Form::checkbox('occupations[]', $occupation->id, in_array($occupation->id, $allowed->toArray())) !!} {{ $occupation->name }} <br>
            @endforeach
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            <button type="submit" class="btn btn-info"><i
                        class="fa fa-paper-plane-o"></i> Enviar
            </button>
        </div>
    </div>
    {!! Form::close() !!}
@stop