@extends('softemp.panel.layouts.app')

{{-- Page title --}}
@section('title')
    Tipo de Contato
    @parent
@stop

{{-- page level styles --}}
@section('page_styles')
    <link rel="stylesheet" href="{{ asset('softemp/panel/vendors/dataTables/css/dataTable.css') }}">
@stop

{{-- Page header --}}
@section('content-header')
    <h1>
        Tipo de Contato
        <small>Gerenciar Tipo de Contato</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('panel.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('panel.people.index') }}">Contato</a></li>
        <li class="active">Tipo de Contato</li>
    </ol>
@stop

{{-- Page content --}}
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Listar Tipo de Contato</h3>
                    <div class="pull-right">
{{--                        @can('contact-type-create')--}}
                        <a class="btn btn-primary btn-xs" href="{{ route('panel.contact.type.create') }}">Novo</a>
{{--                        @endcan--}}
                    </div>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <table id="table1" class="display responsive nowrap dataTable no-footer dtr-inline collapsed" style="width: 100%;" role="grid">
                        <thead>
                        <tr>
                            <th>Tipo do Contato</th>
{{--                            @can('contact-type-update','contact-type-destroy')--}}
                                <th>Ação</th>
{{--                            @endcan--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $contact_type)
                            <tr>
                                <td>{{$contact_type->name}}</td>
{{--                                @can('contact-type-update','contact-type-destroy')--}}
                                    <td>
{{--                                        @can('contact-type-update')--}}
                                            <a href="{{ route('panel.contact.type.edit',['id'=>$contact_type->id]) }}"
                                               title="Alterar" class="btn btn-xs btn-warning">
                                                <i class="fa fa-edit"></i>
                                            </a>
{{--                                        @endcan--}}
{{--                                        @can('contact-type-destroy')--}}
                                            <a href="#" onclick="destroy('{{route('panel.contact.type.destroy',['id'=>$contact_type->id])}}');"
                                               title="Deletar" class="btn btn-xs btn-danger">
                                                <i class="fa fa-remove"></i>
                                            </a>
{{--                                        @endcan--}}
                                    </td>
{{--                                @endcan--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

@stop

{{-- page level scripts --}}
@section('page_scripts')
    <script src="{{ asset('softemp/panel/vendors/dataTables/js/dataTable.js') }}"></script>
    {{-- page script --}}
    <script>
        $(document).ready(function () {
            $('#table1').DataTable({
                "language": {
                    "sEmptyTable": "Nenhum registro encontrado",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ resultados por página",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sSearch": "Pesquisar",
                    "oPaginate": {
                        "sNext": "Próximo",
                        "sPrevious": "Anterior",
                        "sFirst": "Primeiro",
                        "sLast": "Último"
                    },
                    "oAria": {
                        "sSortAscending": ": Ordenar colunas de forma ascendente",
                        "sSortDescending": ": Ordenar colunas de forma descendente"
                    }
                }
            })
        });
    </script>
@stop