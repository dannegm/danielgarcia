@extends('home/template')

@section('metas')
	<meta property="og:type" content="website" />
	<meta property="og:site_name" content="{{Settings::get('page.title')}}" />
	<meta property="og:image" content="{{URL::asset('/home/img/logo.png')}}" />

	<meta property="og:url" content="{{route('page.home')}}" />
	<meta property="og:title" content="{{Settings::get('page.title')}}" />
@stop

@section('styles')
	<style>
	{{$page->css}}
	</style>
@stop

@section('scripts')
	<script>
	{{$page->js}}
	</script>
@stop

@section('content')
	<div>
	{{$page->content}}
	</div>
@stop
