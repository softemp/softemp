@extends('softemp.panel.layouts.app')

{{-- Page title --}}
@section('title')
    Novo Colaborador
    @parent
@stop

{{-- page level styles --}}
@section('page_styles')
    <link rel="stylesheet" href="{{ asset('softemp/panel/vendors/jquery-ui/css/jquery-ui.css') }}">
@stop

{{-- Page header --}}
@section('content-header')
    <h1>
        Novo Colaborador
        <small>Cadastrar novo Colaborador</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('panel.index') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('panel.people.index') }}">Pessoas</a></li>
        <li><a href="{{ route('panel.people.physical.index') }}">Pessoa Física</a></li>
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

                <!-- nav-tabs-custom -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li {{ (Request::is('painel/pessoa/colaborador/cadastrar') ? 'class=active' : '') }}>
                            <a href="#dados" data-toggle="tab">Dados</a>
                        </li>
                        <li {{ (Request::is('painel/empresa/confMail') ? 'class=active' : '') }}>
                            <a href="#contatos" data-toggle="tab">Contato</a>
                        </li>
                        <li {{ (Request::is('painel/empresa/responsavel') ? 'class=active' : '') }}>
                            <a href="#enderecos" data-toggle="tab">Autenticação</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane{{ (Request::is('painel/pessoa/colaborador/cadastrar') ? ' active' : '') }}" id="dados">
                            <!-- form start -->
                            {!! Form::open(['route'=>'panel.people.employee.store', 'role'=>'form', 'data-toggle'=>'validator']) !!}

                            <div class="box-body">

                                @include('softemp.panel.core.people.physical.employee._form')

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                                <a class="btn btn-default" href="{{ route('panel.people.employee.index') }}">Cancelar</a>
                            </div>

                            {!! Form::close() !!}
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane{{ (Request::is('painel/empresa/confMail') ? ' active' : '') }}" id="contatos">
                            Paulo teste

                        </div>
                        <div class="tab-pane{{ (Request::is('painel/empresa/responsavel') ? ' active' : '') }}" id="enderecos">
Paulo

                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
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
    <script src="{{ asset('softemp/panel/vendors/jquery-ui/js/jquery-ui.js') }}"></script>
    <!-- page script -->
    <script>
        //$('form').validator();

        $('input[name=name]').autocomplete({
            minLength: 2,
            autoFocus:true,
            source : function (request, response) {
                $.ajax({
                    url: "{{ route('panel.people.physical.autocomplete.name') }}",
                    dataType: "json",
                    data: {
                        acao: 'autocomplete',
                        term : request.term
                    },
                    success: function (data) {
                        response(data);
                    }
                });
            },
            // focus: function( event, ui ) {
            //         $('input[name=name]').val( ui.item.name );
            // },
            select: function( event, ui ) {
                // var url = "/painel/pessoa/colaborador/"+ui.item.id+"/define/employee";
                var url = "{{ route('panel.people.employee.define.employee','_id_') }}".replace('_id_', ui.item.id);
                var csrf = "{{ csrf_token() }}";
                $.ajax({
                    type: "put",
                    url: url,
                    dataType: 'json',
                    data: {_token: csrf},
                    async: true,
                    success: function (data) {
                        //window.location.href = "/painel/pessoa/colaborador/"+data+"/editar";
                        window.location.href = "{{ route('panel.people.employee.edit','_data_') }}".replace('_data_', data);
                    }
                });
            }
        }).autocomplete( "instance" )._renderItem = function( ul, item ) {
            return $( "<li>" )
                .append( "<a><b>CPF: </b>" + item.document + " - <b>Nome: </b>" + item.name + "</a><br>" )
                .appendTo( ul );
        };

        $('input[name=document]').autocomplete({
            minLength: 2,
            autoFocus:true,
            source : function (request, response) {
                $.ajax({
                    url: "{{ route('panel.people.physical.autocomplete.document') }}",
                    dataType: "json",
                    data: {
                        acao: 'autocomplete',
                        term : request.term
                    },
                    success: function (data) {
                        response(data);
                    }
                });
            },
            // focus: function( event, ui ) {
            //         $('input[name=name]').val( ui.item.name );
            // },
            select: function( event, ui ) {
                // var url = "/painel/pessoa/colaborador/"+ui.item.id+"/define/employee";
                var url = "{{ route('panel.people.employee.define.employee','_id_') }}".replace('_id_', ui.item.id);
                var csrf = "{{ csrf_token() }}";
                $.ajax({
                    type: "put",
                    url: url,
                    dataType: 'json',
                    data: {_token: csrf},
                    async: true,
                    success: function (data) {
                        // window.location.href = "/painel/pessoa/colaborador/"+data+"/editar";
                        window.location.href = "{{ route('panel.people.employee.edit','_data_') }}".replace('_data_', data);
                    }
                });
            }
        }).autocomplete( "instance" )._renderItem = function( ul, item ) {
            return $( "<li>" )
                .append( "<a><b>CPF: </b>" + item.document + " - <b>Nome: </b>" + item.name + "</a><br>" )
                .appendTo( ul );
        };

    </script>
@stop