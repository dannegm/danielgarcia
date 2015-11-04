<!DOCTYPE html>
<!--[if IE 9]>         <html class="ie9 no-focus"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-focus"> <!--<![endif]-->
<head>
    <meta charset="utf-8">

    <title>{{$title}}</title>

    <meta name="author" content="@dannegm">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

    <!-- Icons -->
    <link rel="shortcut icon" href="{{URL::asset('/oneui/img/favicons/favicon.png')}}">

    <link rel="icon" type="image/png" href="{{URL::asset('/oneui/img/favicons/favicon-16x16.png')}}" sizes="16x16">
    <link rel="icon" type="image/png" href="{{URL::asset('/oneui/img/favicons/favicon-32x32.png')}}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{URL::asset('/oneui/img/favicons/favicon-96x96.png')}}" sizes="96x96">
    <link rel="icon" type="image/png" href="{{URL::asset('/oneui/img/favicons/favicon-160x160.png')}}" sizes="160x160">
    <link rel="icon" type="image/png" href="{{URL::asset('/oneui/img/favicons/favicon-192x192.png')}}" sizes="192x192">

    <link rel="apple-touch-icon" sizes="57x57" href="{{URL::asset('/oneui/img/favicons/apple-touch-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{URL::asset('/oneui/img/favicons/apple-touch-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{URL::asset('/oneui/img/favicons/apple-touch-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{URL::asset('/oneui/img/favicons/apple-touch-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{URL::asset('/oneui/img/favicons/apple-touch-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{URL::asset('/oneui/img/favicons/apple-touch-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{URL::asset('/oneui/img/favicons/apple-touch-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{URL::asset('/oneui/img/favicons/apple-touch-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{URL::asset('/oneui/img/favicons/apple-touch-icon-180x180.png')}}">

    @section('styles-oneui')
    @show

    <!-- Stylesheets -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
    <link rel="stylesheet" href="{{URL::asset('/oneui/css/bootstrap.min.css')}}">
    <link rel="stylesheet" id="css-main" href="{{URL::asset('/oneui/css/oneui.min.css')}}">
    @section('styles')
    @show

</head>
<body>
    <div class="content bg-white text-center pulldown overflow-hidden">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">

                @section('content')
                @show

            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="{{URL::asset('/oneui/js/oneui.min.js')}}"></script>
    @section('scripts')
    @show
</body>
</html>