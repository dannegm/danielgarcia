@extends('errors/template')
@section('content')
    <h1 class="font-s128 font-w300 text-city animated flipInX">404</h1>
    <h2 class="h3 font-w300 push-50 animated fadeInUp">{{$content}}</h2>

    <form class="form-horizontal push-50" action="#">
        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="input-group input-group-lg">
                    <input class="form-control" type="text" placeholder="Buscar...">
                    <div class="input-group-btn">
                        <button class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop