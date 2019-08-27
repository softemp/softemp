<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SoftEmp') }}</title>

    <!-- Styles -->
    <link href="{{ asset('softemp/panel/css/app.css') }}" rel="stylesheet">
    {{--<link href="{{ asset('softemp/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">--}}
    <!--page level css-->
@yield('header_styles')
<!--end of page level css-->
</head>
<body>

        @yield('content')

    <!-- Scripts -->
    <script src="{{ asset('softemp/panel/js/app.js') }}"></script>
    {{--<script src="{{ asset('softemp/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>--}}
        <!-- begin page level js -->
        @yield('footer_scripts')
        <!-- end page level js -->
</body>
</html>
