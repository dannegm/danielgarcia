@extends('errors/template')
@section('content')
<div class="font-s64 text-gray push-30-t push-50">
    <i class="fa fa-cog fa-spin"></i>
</div>
<h1 class="h2 font-w400 push-15 animated fadeInLeftBig">{{$header}}</h1>
<h2 class="h3 font-w300 text-dark-op push-50 animated fadeInRightBig">{{$content}}</h2>
@stop