@extends('softemp.panel.layouts.app')

{{-- Page title --}}
@section('title')
    Editar Fornecedor
    @parent
@stop

{{-- page level styles --}}
@section('page_styles')
    <link rel="stylesheet" href="{{ asset('softemp/panel/vendors/select2/css/select2.css') }}">
@stop

{{-- Page header --}}
@section('content-header')
    <h1>Alterar Fornecedor
        <small>alterar os dados</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('panel.index') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('panel.people.index') }}">Pessoas</a></li>
        <li><a href="{{ route('panel.people.legal.index') }}">Pessoa Jurídica</a></li>
        <li><a href="{{ route('panel.people.caterer.index') }}">Fornecedor</a></li>
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
                    <h3 class="box-title">Alterar Fornecedor</h3>
                </div>
                <!-- /.box-header -->

                <!-- form start -->
            {!! Form::model($data, ['route'=>['panel.people.caterer.update', $data->id],
        'method'=>'put', 'role'=>'form', 'data-toggle'=>"validator"]) !!}

                <!-- nav-tabs-custom -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        {{-- dd(Request::is('panel/empresa/confMail')) --}}
                        <li {{ (Request::is('painel/pessoa/fornecedor/*/editar') ? 'class=active' : '') }}>
                            <a href="#dados" data-toggle="tab">Dados</a>
                        </li>
                        <li {{ (Request::is('panel/empresa/confMail') ? 'class=active' : '') }}>
                            <a href="#contatos" data-toggle="tab">Contatos</a>
                        </li>
                        <li {{ (Request::is('panel/empresa/responsavel') ? 'class=active' : '') }}>
                            <a href="#enderecos" data-toggle="tab">Endereços</a>
                        </li>
                        <li {{ (Request::is('painel/pessoa/Fornecedor/*/authentication') ? 'class=active' : '') }}>
                            <a href="#authentication" data-toggle="tab">Autenticação</a>
                        </li>
                    </ul>
                    <div class="tab-content">

                        <div class="tab-pane{{ (Request::is('painel/pessoa/fornecedor/*/editar') ? ' active' : '') }}"
                             id="dados">
                            <!-- box-body -->
                            <div class="box-body">
                                @if($data->people->peopleType->id === 1)
                                    @include('softemp.panel.core.people.caterer._form_physical')
                                @elseif($data->people->peopleType->id === 2)
                                    @include('softemp.panel.core.people.caterer._form_company')
                                @endif
                            </div>

                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane{{ (Request::is('panel/empresa/confMail') ? ' active' : '') }}"
                             id="contatos">
                            <div class="box-body">
                                @include('softemp.panel.core.people.caterer._form_contato')
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane{{ (Request::is('panel/empresa/responsavel') ? ' active' : '') }}"
                             id="enderecos">


                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane{{ (Request::is('painel/pessoa/Fornecedor/*/authentication') ? ' active' : '') }}"
                             id="authentication">

                            <div class="box-body">
{{--                                @include('softemp.panel.core.people.physical.employee._form_authentication')--}}
                            </div>

                        </div>
                        <!-- /.tab-pane -->

                    </div>
                    <!-- /.tab-content -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a class="btn btn-default"
                           href="{{ route('panel.people.caterer.index') }}">Cancelar</a>
                    </div>


                </div>
                <!-- /.nav-tabs-custom -->
                {!! Form::close() !!}
            </div>
            <!-- general form elements -->
        </div>
        <!-- /.left column -->
    </div>
    <!-- /.row -->
@stop

{{-- page level scripts --}}
@section('page_scripts')
    <!-- Select2 -->
    <script src="{{ asset('softemp/panel/vendors/select2/js/select2.js') }}"></script>
    <script src="{{ asset('softemp/panel/vendors/jquery-mask-plugin/js/jquery.mask.js') }}"></script>
    <script src="{{ asset('softemp/panel/js/script-mask.js') }}"></script>
    <!-- page script -->
    <script>
        $('#occupation').select2({
            placeholder: 'Selecione uma Ocupação',
            multiple: true,
            allowClear: true
        });

        RemoveTableRow = function (handler) {
            var tr = $(handler).closest('tr');
            tr.fadeOut(400, function () {
                tr.remove();
            });
        };

        AddTableRowEmail = function () {
            var newRow = $("<tr>");
            var cols = "";
            cols += '<td><div class="has-feedback">';
            cols += '<input class="form-control input-sm" type="email" name="email[]" minlength="8" maxlength="190" required></div></td>';
            cols += '<td><select class="form-control input-sm" name="email_type_id[]">';
            @foreach($contTypes as $types)
                cols += '<option value="{{$types->id}}">{{$types->name}}</option>';
            @endforeach
                cols += '</td>';
            cols += '<td class="actions">';
            cols += '<input type="hidden" name="email_id[]"/>';
            cols += '<input type="hidden" name="email_person_id[]" value="{{$data->people->id}}"/>';
            cols += '<button class="btn btn-sm btn-danger" onclick="RemoveTableRow(this)" type="button" title="Excluir"><i class="fa fa-remove"></i></button>';
            cols += '</td>';
            newRow.append(cols);
            $("#table_email").append(newRow);
        };

        AddTableRowPhone = function () {
            var newRow = $("<tr>");
            var cols = "";
            cols += '<td class="col-xs-3"><input class="form-control input-sm" type="text" name="ddd[]" minlength="2" maxlength="2" required></td>';
            cols += '<td><div class="has-feedback">';
            cols += '<input class="form-control input-sm" type="text" name="phone[]" minlength="8" maxlength="9" required></div></td>';
            cols += '<td><select class="form-control input-sm" name="phone_type_id[]">';
            @foreach($contTypes as $types)
                cols += '<option value="{{$types->id}}">{{$types->name}}</option>';
            @endforeach
                cols += '</td>';
            cols += '<td class="actions">';
            cols += '<input type="hidden" name="phone_id[]"/>';
            cols += '<input type="hidden" name="phone_person_id[]" value="{{$data->people->id}}"/>';
            cols += '<button class="btn btn-sm btn-danger" onclick="RemoveTableRow(this)" type="button" title="Excluir"><i class="fa fa-remove"></i></button>';
            cols += '</td>';
            newRow.append(cols);
            $("#table_phone").append(newRow);
        };
    </script>

@stop
