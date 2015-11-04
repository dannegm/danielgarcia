<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>{{$page->title}} | Preview Pages</title>

	<link rel="stylesheet" href="{{URL::asset('/home/assets/css/main.css')}}" />
	<link rel="stylesheet" href="{{URL::asset('/home/css/font-awesome.min.css')}}">
	<style>
	body {
		background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAYAAACNMs+9AAAAIUlEQVQYV2NkwALevXv3H12YcSgoxOZwISEhDLczDgGFAPYSJviKriIMAAAAAElFTkSuQmCC);
		background-attachment: fixed;
	}
	main {
		padding: 1em;
	}
	{{$page->css}}
	</style>
</head>
<body>

	<main>
	{{$page->content}}
	</main>

	<script src="{{URL::asset('/home/assets/js/jquery.min.js')}}"></script>
	<script src="{{URL::asset('/home/assets/js/jquery.poptrox.min.js')}}"></script>
	<script src="{{URL::asset('/home/assets/js/skel.min.js')}}"></script>
	<script src="{{URL::asset('/home/assets/js/util.js')}}"></script>
	<script src="{{URL::asset('/home/assets/js/main.js')}}"></script>
	<script>
	{{$page->js}}
	</script>
</body>
</html>
