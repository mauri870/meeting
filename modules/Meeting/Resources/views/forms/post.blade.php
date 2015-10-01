<div class="form-group">
    {!! Form::label('title','Título do post:',['class'=>'col-sm-2 control-label']) !!}

    <div class="col-sm-10">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-commenting-o"></i></span>
            {!! Form::text('title',null,['placeholder'=>'Título do post','class'=>'form-control']) !!}
        </div>
    </div>
</div>
<div class="form-group">
    {!! Form::label('image_url','Imagem para o post (opcional)',['class'=>'col-sm-2 control-label']) !!}

    <div class="col-sm-10">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-link"></i></span>
            {!! Form::text('image_url',null,['placeholder'=>'http://imageurl.com/image.png','class'=>'form-control']) !!}
        </div>
    </div>
</div>
<div class="form-group">
    {!! Form::label('published','Publicar?',['class'=>'col-sm-2 control-label']) !!}

    <div class="col-sm-10">
            {!! Form::radio('published', 0, false) !!} Não <br>
            {!! Form::radio('published', 1, false) !!} Sim
    </div>
</div>
<div class="form-group">
    {!! Form::label('tags','Tags para o post (opcional)',['class'=>'col-sm-2 control-label']) !!}

    <div class="col-sm-10">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-tags"></i></span>
            {!! Form::text('tags',null,['placeholder'=>'tag1,tag2,tag3','class'=>'form-control']) !!}
        </div>
    </div>
</div>
<div class="form-group">
    {!! Form::label('content','Conteúdo',['class'=>'col-sm-2 control-label']) !!}

    <div class="col-sm-10">
            {!! Form::textarea('content',null,['placeholder'=>'Conteúdo do Post','class'=>'form-control','id'=>'ckeditor_replace']) !!}
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