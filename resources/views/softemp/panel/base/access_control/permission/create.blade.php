@extends('softemp.panel.layouts.app')

{{-- Page title --}}
@section('title')
    Nova Permissão
    @parent
@stop

{{-- page level styles --}}
@section('page_styles')
    <link rel="stylesheet" href="{{ asset('softemp/panel/vendors/select2/css/select2.css') }}">
@stop

{{-- Page header --}}
@section('content-header')
    <h1>
        Nova Permissão
        <small>Cadastrar nova Permissão</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('panel.index') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('panel.access.control.permission.index') }}">Permissão</a></li>
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
                    <h3 class="box-title">Nova Permissão</h3>
                </div>
                <!-- /.box-header -->

                <!-- form start -->
                {!! Form::open(['route'=>'panel.access.control.permission.store', 'role'=>'form', 'data-toggle'=>'validator']) !!}

                <div class="box-body">
                    <!-- modules -->
                    <div class="form-group has-feedback {{ $errors->has('module_id') ? ' has-error has-danger' : '' }}">
                        <label for="module_id">Modulos</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-asterisk"></i> </span>
                            <select class="form-control select2-container" name="module_id" id="module" required>
                                <option></option>
                                @foreach($modules as $module)
                                    <option value="{{$module->id}}">{{$module->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @if ($errors->has('module_id'))
                            <div class="help-block">
                                <label class="error">{{ $errors->first('module_id') }}</label>
                            </div>
                        @endif
                    </div>
                    <!-- /.modules -->

                    @include('softemp.panel.base.access_control.permission._form')

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a class="btn btn-default" href="{{ route('panel.access.control.permission.index') }}">Cancelar</a>
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
    <script src="{{ asset('softemp/panel/vendors/select2/js/select2.js') }}"></script>
    <script src="{{ asset('softemp/panel/vendors/bootstrap-validator/js/validator.js') }}"></script>
    <!-- page script -->
    <script>
        $(document).ready(function() {
            $('#module').select2({
                placeholder: 'Selecione um Modulo',
                allowClear: true
            });
        });
        $('form').validator();
    </script>

@stop