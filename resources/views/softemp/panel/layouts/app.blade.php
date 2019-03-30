<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
{{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{-- Tell the browser to be responsive to screen width --}}
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--<title>{{ config('app.name', 'SoftEmp') }}</title>--}}
    <title>
        @section('title')
            {{ config('app.name', ' | SoftEmp') }}
        @show
    </title>

    {{-- Styles --}}
    <link href="{{ asset('softemp/panel/css/app.css') }}" rel="stylesheet">
    {{-- page level css --}}
    @yield('page_styles')
    {{-- end of page level css --}}

    {{-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries --}}
    {{-- WARNING: Respond.js doesn't work if you view the page via file:// --}}
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    {{-- Google Font --}}
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body class="hold-transition sidebar-mini skin-blue">
{{-- Site wrapper --}}
<div class="wrapper">
    <header class="main-header">
        {{-- Logo --}}
        <a href="{{route('panel.index')}}" class="logo">
            {{-- mini logo for sidebar mini 50x50 pixels --}}
            <span class="logo-mini"><b>S</b>E</span>
            {{-- logo for regular state and mobile devices --}}
            <span class="logo-lg"><b>Soft</b>Emp</span>
        </a>
        {{-- Header Navbar: style can be found in header.less --}}
        <nav class="navbar navbar-static-top">
            {{-- Sidebar toggle button --}}
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                @include('softemp.panel.layouts._menu_navbar_top')
            </div>
        </nav>
    </header>
    {{-- =============================================== --}}
    {{-- Left side column. contains the sidebar --}}
    <aside class="main-sidebar">
        {{-- sidebar: style can be found in sidebar.less --}}
        @include('softemp.panel.layouts._menu_sidebar')
        {{-- /.sidebar --}}
    </aside>
    {{-- =============================================== --}}
    {{-- Content Wrapper. Contains page content --}}
    <div class="content-wrapper">
        {{-- Content Header (Page header) --}}
        <section class="content-header">
            @yield('content-header')
        </section>
        {{-- Main content --}}
        <section class="content">
            @yield('content')
        </section>
        {{-- /.content --}}
    </div>
    {{-- /.content-wrapper --}}
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> {{ env('VERSION') }}
        </div>
        <strong>Copyright &copy; {{ env('COPYRIGHT') }} <a href="http://softemp.com.br">SoftEmp</a>.</strong> All rights reserved.
    </footer>
    {{-- Control Sidebar --}}
    <aside class="control-sidebar control-sidebar-dark">
        @include('softemp.panel.layouts._menu_config')
    </aside>
    {{-- /.control-sidebar --}}
    {{-- Add the sidebar's background. This div must be placed immediately after the control sidebar --}}
    <div class="control-sidebar-bg"></div>
</div>
{{-- ./wrapper --}}
{{-- Modal delete --}}
<div id="destroyModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="destroyModalLabel">Deletar</h4> </div>
            <div class="modal-body">

                <div class="errors-msg-destroy alert alert-danger" style="display: none;"></div>
                <div class="success-msg-destroy alert alert-success" style="display: none;"></div>

                Remover: <label id="name"></label>
                <input type="hidden" id="urlDestroy" value="">
                <input type="hidden" id="token" value="{{ csrf_token() }}">

            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-default waves-effect btn-close" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger waves-effect waves-light btn-confirm-destroy">Deletar</button>

                <div class="preloader-delete " style="display: none;">Enviando os dados...</div>

            </div>
        </div>
    </div>
</div>
{{-- End Modal delete --}}
{{--scripts--}}
<script src="{{ asset('softemp/panel/js/app.js') }}"></script>
<script>
    $(document).ready(function () {
        $('.sidebar-menu').tree()
    })
</script>
{{-- Caixa de notificações --}}
@include('softemp.panel.layouts.notification')
{{-- ./Caixa de notificações --}}
{{-- script delete --}}
<script>
    function destroy(urlDestroy, name) {

        $('#urlDestroy').val(urlDestroy);
        //alert(name);
        $('#destroyModal #name').html(name);

        //carrega o modal
        $('#destroyModal').modal();
    }
    $(".btn-close").click(function () {
        $('.errors-msg-destroy').hide();
    });
    $(".btn-confirm-destroy").click(function () {

        //recupera o valor do input
        var urlDestroy = $('#urlDestroy').val();

        //recupera o token
        var csrf = $('#token').val();

        $.ajax({
            url: urlDestroy,
            type: 'delete',
            data: {'_token': csrf},
            beforeSend: preloaderDestroy()

        }).done(function (data) {
            if (data == 1) {
                $('.errors-msg-destroy').hide();
                $('.success-msg-destroy').html('Deletado com sucesso');
                $('.success-msg-destroy').show();
                setTimeout('location.reload();', 1000);
            } else {
                $('.errors-msg-destroy').html(data);
                $('.errors-msg-destroy').show();
            }
        }).fail(function (data) {
            //console.log(data);

            $('.errors-msg-destroy').html('Falha ao deletar o registro, ação não autorizada, cód do erro '+ data.status);
            $('.errors-msg-destroy').show();
            //alert('falha ao enviar os dados'+ data);
            endPreloaderDesltroy();
        }).always(function () {
            endPreloaderDesltroy();
        });
        function preloaderDestroy() {
            $('.preloader-delete').show();
        }

        function endPreloaderDesltroy() {
            $('.preloader-delete').hide();
        }

    });
</script>
{{-- end script delete --}}
{{-- begin page level js --}}
@yield('page_scripts')
{{-- end page level js --}}
</body>
</html>
