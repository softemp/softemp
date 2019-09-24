<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @if(is_object($opt))
        {!! $opt->render() !!}
    @endif

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

{{--    <title>--}}
{{--        @section('title') | {{ config('app.name', 'SoftEmp') }}--}}
{{--        @show--}}
{{--    </title>--}}

<!-- global css Start -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="{{ asset('softemp/website/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('softemp/website/img/temp/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('softemp/website/img/temp/favicon.ico') }}" type="image/x-icon">
    <!-- //global css End -->
    <!-- page level css Start -->
@yield('styles_css')
<!-- //page level css End -->
</head>
<body>
<!-- Header Section Start -->
<header>
    <nav class="navbar navbar-expand-lg default-navbar">
        <div class="navbar-header">

            <a class="navbar-brand" href="{{ route('website.home.index') }}"><img
                    src="{{ asset('softemp/website/img/temp/logo_topo.png') }}"></a>

        </div>
        <button type="button" class="navbar-toggler collapsed button-outline" data-toggle="collapse"
                data-target="#collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapse">
            @include('softemp.website.layouts._menu_top')
        </div>
    </nav>
</header>
<!-- //Header Section Start -->
<!-- Carousel Section Start -->
@yield('banner')
<!-- //Carousel Section End -->
<!-- Container Section Start -->
@yield('content')

@yield('footer')
<!-- Footer Section Start -->
@include('softemp.website.layouts._footer')
<!-- //Footer Section End -->
<!-- Copy Right Section Start -->
@include('softemp.website.layouts._copyright')
<!-- //Copy Right Section End -->
<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top fa fa-hand-o-up" role="button" title=""
   data-toggle="tooltip" data-placement="left" data-original-title="Voltar ao topo">
</a>
<!-- global js Start -->
<script type="text/javascript" src="{{ asset('softemp/website/js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('softemp/website/js/style-switcher.js') }}"></script>
<!-- //global js End -->
<!-- page level js Start -->
@yield('scripts_js')
<!-- //page level js End -->
</body>
</html>
