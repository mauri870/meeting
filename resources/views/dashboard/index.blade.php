@extends('layouts.auth-master')
@section('title','Dashboard')
@section('body')
    <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center">
            {{ dump(Auth::user()) }}
            <a href="{{ url('auth/logout') }}"><button class="btn btn-warning">Logoff</button></a>
        </div>
    </div>
@stop