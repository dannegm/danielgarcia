@extends('home/template')

@section('metas')
<meta property="og:type" content="website" />
<meta property="og:site_name" content="{{Settings::get('page.title')}}" />
<meta property="og:image" content="{{URL::asset('/home/img/logo.png')}}" />

<meta property="og:url" content="{{route('page.home')}}" />
<meta property="og:title" content="{{Settings::get('page.title')}}" />
@stop

@section('styles')
@stop

@section('scripts')
	<script>
	{{Fragment::get('contact.form')->js}}
	</script>
@stop

@section('content')
	<section id="aboutme">
		{{Fragment::get('me.about')->html}}
	</section>
	<section id="contact">
		{{Fragment::get('contact.description')->html}}
		{{Fragment::get('contact.form')->html}}
	</section>
@stop
