<div class="form-group">
    {!! Form::label('name','Nome:',['class'=>'col-sm-2 control-label']) !!}

    <div class="col-sm-10">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-commenting-o"></i></span>
            {!! Form::text('name',null,['placeholder'=>'Nome do projeto','class'=>'form-control']) !!}
        </div>
    </div>
</div>
<div class="form-group">
    {!! Form::label('client','Cliente',['class'=>'col-sm-2 control-label']) !!}

    <div class="col-sm-10">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            {!! Form::text('client',null,['placeholder'=>'Nome do cliente','class'=>'form-control']) !!}
        </div>
    </div>
</div>
<div class="form-group">
    {!! Form::label('date','Data de conclusão',['class'=>'col-sm-2 control-label']) !!}

    <div class="col-sm-10">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            {!! Form::date('date',null,['placeholder'=> \Carbon\Carbon::now()->format('d/m/Y'),'class'=>'form-control']) !!}
        </div>
    </div>
</div>
<div class="form-group">
    {!! Form::label('url','Url do projeto (opcional)',['class'=>'col-sm-2 control-label']) !!}

    <div class="col-sm-10">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-link"></i></span>
            {!! Form::text('url',null,['placeholder'=>'http://example.com.br','class'=>'form-control']) !!}
        </div>
    </div>
</div>
<div class="form-group">
    {!! Form::label('techs','Tecnologias utilizadas (opcional)',['class'=>'col-sm-2 control-label']) !!}

    <div class="col-sm-10">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-object-group"></i></span>
            {!! Form::text('techs',null,['placeholder'=>'tecnologia1,tecnologia2,tecnologia3','class'=>'form-control']) !!}
        </div>
    </div>
</div>
<div class="form-group">
    {!! Form::label('body','Descrição do Projeto',['class'=>'col-sm-2 control-label']) !!}

    <div class="col-sm-10">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-newspaper-o"></i></span>
            {!! Form::textarea('body',null,['placeholder'=>'Descrição do Projeto','class'=>'form-control']) !!}
        </div>
    </div>
</div>
<div class="form-group">
    {!! Form::label('image','Imagem do projeto',['class'=>'col-sm-2 control-label']) !!}

    <div class="col-sm-10">
        {!! Form::file('image',null,['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
        <button type="submit" class="btn btn-blue btn-effect text-light-blue"><i
                    class="fa fa-paper-plane-o"></i> Enviar
        </button>
    </div>
</div>
{!! Form::close() !!}