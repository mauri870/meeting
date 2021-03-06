<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>500</title>
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <!-- Google fonts -->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:400,500,700' rel='stylesheet' type='text/css'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        body {
            background-color: #E3E7E8;
            color: #FF6D6D;
            font-weight: bold;
        }

        a:link {
            text-decoration: none;
        }

        .social-icons ul li {
            display: inline-block;
        }
        
        .social i{
            color: #FF6D6D;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row text-center">
        <div class="col-sm-12">
            <h2 class="wow fadeInDown">Oops!</h2>

            <h3 class="wow fadeInUp" data-wow-delay="0.6s">Parece que nosso servidor apresentou um erro interno e não está funcionando corretamente.</h3>

            <div class="wow bounceIn" data-wow-delay="0.7s">
                <img src="{{ asset('images/errors/500.gif') }}" alt="server">
            </div>
            <h3 class="wow fadeInUp" data-wow-delay="0.6s">Tente novamente em instantes. Se o problema persistir envie um email para
                <a href="mailto:contato@digitalserra.com.br">contato@digitalserra.com.br</a>
            </h3> <br>
            <a href="{{ route('home.index') }}">
                <button class="btn btn-default" type="button" style="color:#FF6D6D"><i
                            class="fa fa-reply-all"></i> Voltar ao site
                </button>
            </a>
        </div>
    </div>
    <br><br>
    <div class="row text-center">
        <div class="col-md-12 col-sm-12 social">
            <!-- Social Links -->
            <a href="https://www.facebook.com/DigitalSerra" target="_blank"><i
                        class="fa fa-facebook-square fa-2x"></i></a>
            <a href="https://plus.google.com/106524022001500125103/about" target="_blank"><i
                        class="fa fa-google-plus-square fa-2x"></i></a>
            <a href="#" target="_blank"><i class="fa fa-linkedin-square fa-2x"></i></a>
            <a href="http://www.github.com/Digital-Serra" target="_blank"><i
                        class="fa fa-github-square fa-2x"></i></a>
            </ul>
        </div>
        <br>
        <div class="copyrights wow fadeIn" data-wow-delay="1.2s">
            <p class="copyright">Todos os direitos reservados ® Digital Serra {{ date('Y') }} <br>
                Desenvolvido com muito <i class="fa fa-heart" style="color: red;"></i> + <a
                        href="http://laravel.com/" target="_blank"><span class="label label-default"
                                                                         style="background-color: #F36562"> Laravel Framework</span></a>
                por <a href="https://br.linkedin.com/pub/mauri-de-souza-nunes/90/230/b2" target="_blank">@mauri870</a> na Digital Serra Tecnologia Digital
            </p>
        </div>
    </div>
</div>

</div>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/annyang.min.js') }}"></script>
<script src="{{ asset('js/jquery.spritely.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/wow.min.js') }}"></script>
<script src="{{ asset('js/prefixfree.min.js') }}"></script>
</body>
</html>