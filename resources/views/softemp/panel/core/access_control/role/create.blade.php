@extends('softemp.panel.layouts.app')

{{-- Page title --}}
@section('title')
    Novo Papél
    @parent
@stop

{{-- page level styles --}}
@section('page_styles')
@stop

{{-- Page header --}}
@section('content-header')
    <h1>
        Novo Papél
        <small>Cadastrar novo Papél</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('panel.index') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('panel.access.control.role.index') }}">Roles</a></li>
        <li class="active">Cadastrar</li>
    </ol>
@stop


{{-- Page content --}}
@section('content')
    <!-- .row -->
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Novo Papél</h3>
                </div>
                <!-- /.box-header -->

                <!-- form start -->
                {!! Form::open(['route'=>'panel.access.control.role.store', 'role'=>'form', 'data-toggle'=>'validator']) !!}

                <div class="box-body">

                    @include('softemp.panel.base.access_control.role._form')

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a class="btn btn-default" href="{{ route('panel.access.control.role.index') }}">Cancelar</a>
                </div>

                {!! Form::close() !!}
            </div>
            <!-- /.box -->
        </div>
        <!-- /.left column -->
    </div>
    <!-- /.row -->
@stop

{{-- page level scripts --}}
@section('page_scripts')
    <!-- BootstrapValidators -->
    <script src="{{ asset('softemp/panel/vendors/bootstrap-validator/js/validator.js') }}"></script>
    <!-- page script -->
    <script>
        $('form').validator();
    </script>

@stop