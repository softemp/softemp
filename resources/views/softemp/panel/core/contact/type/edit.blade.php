@extends('softemp.panel.layouts.app')

{{-- Page title --}}
@section('title')
    Alterar Tipo de Contato
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
@stop

{{-- Page header --}}
@section('content-header')
    <h1>Alterar Tipo de Contato
        <small>alterar o registro</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('panel.index') }}"><i
                        class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('panel.contact.type.index') }}">Tipo de Contato</a></li>
        <li class="active">Alterar</li>
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
                    <h3 class="box-title">Alterar Tipo de Contato</h3>
                </div>
                <!-- /.box-header -->

                <!-- form start -->
            {!! Form::model($data, ['route'=>['panel.contact.type.update', $data->id],
        'method'=>'put', 'role'=>'form', 'data-toggle'=>"validator"]) !!}
            <!-- box-body -->
                <div class="box-body">

                    @include('softemp.panel.core.contact.type._form')

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a class="btn btn-default"
                       href="{{ route('panel.contact.type.index') }}">Cancelar</a>
                </div>

                {!! Form::close() !!}
            </div>
            <!-- general form elements -->
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
