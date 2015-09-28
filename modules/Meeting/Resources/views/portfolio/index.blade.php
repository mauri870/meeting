@extends('admin::layouts.master')

@section('content')

    <h2>Projetos Cadastrados</h2>
    @if($projects->count() == 0)
        <h2 class="btn-lg label-warning">Você não tem nenhum projeto cadastrado!</h2>
        <a  href="{{ route('portfolio.new') }}"><button class="btn btn-info"><i class="fa fa-plus"></i> Novo Projeto</button></a>
    @endif
    @foreach($projects as $project)
        <div class="item  col-xs-4 col-lg-4">
            <div class="thumbnail">
                <img class="img-responsive" style="width: auto; height:300px !important" src="{{ asset('images/projects/'.$project->id.'.'.$project->image) }}"
                     alt=""/>

                <div class="caption" style="word-wrap: break-word;">
                    <h4 class="">
                        {{ $project->name }}</h4>
                        {{ $project->body }}
                    <br>
                    <div class="row">
                        <hr>
                        <div class="col-xs-12 col-md-12">
                            <p class="lead">
                                    @if($project->client)
                                        {{ $project->client }}
                                    @endif
                            </p>
                        </div>
                        <div class="col-xs-12 col-md-12 text-center">
                            <p class="lead">
                                @if($project->date)
                                    {{ $project->date }}
                                @endif
                            </p>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="btn-group">
                                <a href="{{ route('portfolio.edit',$project->id) }}"><button type="button" class="btn btn-default">Editar</button></a>
                                <a onclick="click_del('{{ route('portfolio.delete',$project->id) }}')"><button type="button" class="btn btn-danger">Excluir</button></a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@stop