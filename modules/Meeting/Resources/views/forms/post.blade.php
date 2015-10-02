<div class="form-group">
    {!! Form::label('title','Título do post:',['class'=>'col-sm-2 control-label']) !!}

    <div class="col-sm-10">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-text-height"></i></span>
            {!! Form::text('title',null,['placeholder'=>'Título do post','class'=>'form-control']) !!}
        </div>
    </div>
</div>
<div class="form-group">
    {!! Form::label('image','Imagem para o post (opcional)',['class'=>'col-sm-2 control-label']) !!}

    <div class="col-sm-10">
        {!! Form::file('image',null,['class'=>'form-control']) !!}
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
