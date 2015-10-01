<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>InMeeting::@yield('title')</title>
    <meta name="author" content="Digital Serra Tecnologia Digital">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sweetalert.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link href="{{ Module::asset('meeting:css/styles.css') }}" rel="stylesheet">
    @yield('head')
</head>
<body>
<div class="wrapper">
    <div class="box">
        <div class="row row-offcanvas row-offcanvas-left">

            {{--<!-- sidebar  -->
            <div class="column col-sm-2 col-xs-1 sidebar-offcanvas" id="sidebar">

                <ul class="nav">
                    <li><a href="#" data-toggle="offcanvas" class="visible-xs text-center"><i class="glyphicon glyphicon-chevron-right"></i></a></li>
                </ul>

                <ul class="nav hidden-xs" id="lg-menu">
                    <li class="active"><a href="#featured"><i class="glyphicon glyphicon-list-alt"></i> Featured</a></li>
                    <li><a href="#stories"><i class="glyphicon glyphicon-list"></i> Stories</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-paperclip"></i> Saved</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-refresh"></i> Refresh</a></li>
                </ul>
                <ul class="list-unstyled hidden-xs" id="sidebar-footer">
                    <li>
                        <a href="http://www.bootply.com"><h3>Bootstrap</h3> <i class="glyphicon glyphicon-heart-empty"></i> Bootply</a>
                    </li>
                </ul>

                <!-- tiny only nav-->
                <ul class="nav visible-xs" id="xs-menu">
                    <li><a href="#featured" class="text-center"><i class="glyphicon glyphicon-list-alt"></i></a></li>
                    <li><a href="#stories" class="text-center"><i class="glyphicon glyphicon-list"></i></a></li>
                    <li><a href="#" class="text-center"><i class="glyphicon glyphicon-paperclip"></i></a></li>
                    <li><a href="#" class="text-center"><i class="glyphicon glyphicon-refresh"></i></a></li>
                </ul>

            </div>
            <!-- /sidebar -->--}}

            <!-- main right col -->
            {{-- With Sidebar -> --}}
            {{--<div class="column col-sm-10 col-xs-11" id="main">--}}
            <div class="column col-sm-12 col-xs-12" id="main">

                <!-- top nav -->
                <div class="navbar navbar-blue navbar-static-top">
                    <div class="navbar-header">
                        <button class="navbar-toggle" type="button" data-toggle="collapse"
                                data-target=".navbar-collapse">
                            <span class="sr-only">Toggle</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="/"
                           class="navbar-brand logo">{{--<img src="{{ asset('images/favicon.png') }}" width="95%" height="auto" alt="">--}}
                            M</a>
                    </div>
                    <nav class="collapse navbar-collapse" role="navigation">
                        <form class="navbar-form navbar-left">
                            <div class="input-group input-group-sm" style="max-width:360px;">
                                <input type="text" class="form-control" placeholder="Pesquisar" name="srch-term"
                                       id="srch-term">

                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i
                                                class="glyphicon glyphicon-search"></i></button>
                                </div>
                            </div>
                        </form>

                        <ul class="nav navbar-nav">
                            <li>
                                <a href="{{ route('home.index') }}"><i class="glyphicon glyphicon-home"></i> Home</a>
                            </li>
                            @if(Auth::user()->hasRole('admin'))
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-users"></i>
                                        Usuários <span class="glyphicon glyphicon-chevron-down"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('admin.users') }}"><i class="fa fa-users"></i> Ver
                                                Usuários</a></li>
                                        <li><a href="{{ route('admin.users.add') }}"><i class="fa fa-user-plus"></i>
                                                Adicionar</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                                class="fa fa-suitcase"></i> Reuniões <span
                                                class="glyphicon glyphicon-chevron-down"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('admin.users') }}"><i class="fa fa-suitcase"></i> Ver Reuniões</a>
                                        </li>
                                        <li><a href="{{ route('admin.users.add') }}"><i class="fa fa-plus"></i>
                                                Adicionar</a></li>
                                    </ul>
                                </li>
                            @endif
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                            class="fa fa-comments"></i> Posts <span
                                            class="glyphicon glyphicon-chevron-down"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('home.posts') }}"><i class="fa fa-comments"></i> Ver Posts</a>
                                    </li>
                                    <li><a href="{{ route('home.posts.your') }}"><i class="fa fa-eye"></i>
                                            Seus Posts</a></li>
                                    <li><a href="{{ route('home.posts.add') }}"><i class="fa fa-plus"></i>
                                            Novo Post</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                            class="glyphicon glyphicon-user"></i> {{ $user->name }} <span
                                            class="glyphicon glyphicon-chevron-down"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('auth.logout') }}"><i class="fa fa-power-off"></i> Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                    </nav>
                </div>
                <!-- /top nav -->

                <div class="padding">
                    <div class="full col-sm-9">
                        {{-- Allerts --}}
                        @if(Session::has('success'))
                            <p class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert"
                                   aria-label="close">&times;</a>
                                {{ Session::get('success') }}
                            </p>
                        @endif
                        @if(Session::has('danger'))
                            <p class="alert alert-danger">
                                <a href="#" class="close" data-dismiss="alert"
                                   aria-label="close">&times;</a>
                                {{ Session::get('danger') }}
                            </p>
                        @endif
                        @unless($errors->isEmpty())
                            <ul style="list-style: none;">
                                @foreach($errors->getMessages() as $error)
                                    <li>
                                        <p class="alert alert-danger">
                                            <a href="#" class="close" data-dismiss="alert"
                                               aria-label="close">&times;</a>
                                            {{ $error[0] }}
                                        </p>
                                    </li>
                                @endforeach
                            </ul>
                        @endunless
                        @foreach (Alert::getMessages() as $type => $messages)
                            @foreach ($messages as $message)
                                <div class="alert alert-{{ ($type == 'error' ? 'danger' : $type) }}">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ $message }}
                                </div>
                                @endforeach
                                @endforeach

                                        <!-- content -->
                                @yield('content')

                                {{-- Footer --}}
                                {{--<div class="row">
                                    <div class="col-sm-6">
                                        <a href="#">Twitter</a> <small class="text-muted">|</small> <a href="#">Facebook</a> <small class="text-muted">|</small> <a href="#">Google+</a>
                                    </div>
                                </div>--}}

                                <div class="row" id="footer">
                                    <div class="col-sm-6">

                                    </div>
                                    <div class="col-sm-6">
                                        <p>
                                            <a href="{{ $client['url'] }}" target="_blank" class="pull-right"><i
                                                        class="fa fa-registered"></i> {{ $client['name'] or '' }}</a>
                                        </p>
                                    </div>
                                </div>

                                <hr>

                                <h4 class="text-center">
                                    Desenvolvido por <a href="http://digitalserra.com.br" target="_blank">Digital Serra
                                        Tecnologia Digital</a>
                                </h4>

                                <hr>


                    </div>
                    <!-- /col-9 -->
                </div>
                <!-- /padding -->
            </div>
            <!-- /main -->

        </div>
    </div>
</div>


<!--post modal-->
<div id="postModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                Update Status
            </div>
            <div class="modal-body">
                <form class="form center-block">
                    <div class="form-group">
                        <textarea class="form-control input-lg" autofocus=""
                                  placeholder="What do you want to share?"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div>
                    <button class="btn btn-primary btn-sm" data-dismiss="modal" aria-hidden="true">Post</button>
                    <ul class="pull-left list-inline">
                        <li><a href=""><i class="glyphicon glyphicon-upload"></i></a></li>
                        <li><a href=""><i class="glyphicon glyphicon-camera"></i></a></li>
                        <li><a href=""><i class="glyphicon glyphicon-map-marker"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- script references -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>

{{-- Other scripts --}}
<script src="//cdn.ckeditor.com/4.5.3/standard/ckeditor.js"></script>
@yield('scripts')

{{--Ckeditor--}}
<script type="text/javascript">
    CKEDITOR.replace( 'ckeditor_replace',
            {
                toolbar : 'simple'
            })
</script>
</body>
</html>