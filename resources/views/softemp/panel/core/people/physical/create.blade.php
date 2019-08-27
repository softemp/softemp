@extends('softemp.panel.layouts.app')

{{-- Page title --}}
@section('title')
    Novo Papél
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
@stop

{{-- Page header --}}
@section('content-header')
    <h1>
        Novo Usuário
        <small>Cadastrar novo Usuário</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('panel.index') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('panel.index') }}">Pessoas</a></li>
        <li><a href="{{ route('panel.person.employee.index') }}">Pessoas</a></li>
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
                    <h3 class="box-title">Novo Funcionário</h3>
                </div>
                <!-- /.box-header -->

                <!-- form start -->
                {!! Form::open(['route'=>'panel.person.employee.store', 'role'=>'form', 'data-toggle'=>'validator']) !!}

                <div class="box-body">

                    @include('softemp.panel.core.person.employee._form')

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a class="btn btn-default" href="{{ route('panel.person.employee.index') }}">Cancelar</a>
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
@section('footer_scripts')
    <!-- BootstrapValidators -->
    <script src="{{ asset('softemp/vendors/bootstrap-validator/dist/validator.min.js') }}"></script>
    <!-- page script -->
    <script>
        $('form').validator();
    </script>
@stop