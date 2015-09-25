<!DOCTYPE HTML>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Projeto</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>
<body>
<div class="container">
    <div class="portfolio-project">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 center section-title">
                <h4>{{ $project->name}}</h4>
            </div>
            <div class="col-md-5 project-photo">
                <img class="img-responsive" style="width: auto; height:300px !important" src="{{ asset('images/projects/'.$project->id.'.'.$project->image) }}" alt=""/>
            </div>
            <div class="col-md-3 project-details">
                <h5>Detalhes</h5>
                <ul class="details-list">
                    <li><i class="fa fa-calendar"></i> <strong class="strong">Conclusão: </strong> {{ $project->date  }}</li>
                    <li><i class="fa fa-group"></i> <strong class="strong">Cliente: </strong> {{ $project->client }}</li>
                    <li><i class="fa fa-link"></i> <strong class="strong">Site: </strong> <a target="_blank" href="{{ $project->url or '#' }}"><strong> {{ $project->name }}</strong></a></li>
                    <li><i class="fa fa-object-group"></i> <strong class="strong">Tecnologias utilizadas: </strong>
                        @foreach($techs as $tech)
                        <span class="label label-info"><i class="fa fa-tag"></i> {{ $tech }}</span>
                        @endforeach
                    </li>
                </ul>
            </div>
            <div class="col-md-4 project-info">
                <h5>Descrição</h5>
                <p>{{ $project->body }}</p>
            </div>
        </div>
    </div>
</div>



</body>
</html>