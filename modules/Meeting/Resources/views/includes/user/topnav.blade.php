<ul class="nav navbar-nav">
    <li>
        <a href="#"><i class="glyphicon glyphicon-home"></i> Home</a>
    </li>
    <li>
        <a href="#postModal" role="button" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> Post</a>
    </li>
    <li>
        <a href="#"><span class="badge">badge</span></a>
    </li>
</ul>
<ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i></a>
        <ul class="dropdown-menu">
            <li><a href="{{ route('auth.logout') }}"><i class="fa fa-power-off"></i> Logout</a></li>
        </ul>
    </li>
</ul>