@extends('softemp.panel.layouts.app')

{{-- Page title --}}
@section('title')
    Papéis
    @parent
@stop

{{-- page level styles --}}
@section('page_styles')
    <link rel="stylesheet" href="{{ asset('softemp/panel/vendors/dataTables/css/dataTable.css') }}">
@stop

{{-- Page header --}}
@section('content-header')
    <h1>
        Papéis
        <small>tudo começa aqui</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('panel.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('panel.index') }}">Controle de Acesso</a></li>
        <li class="active">Papéis</li>
    </ol>
@stop

{{-- Page content --}}
@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>150</h3>

                    <p>Domínios</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">Listar <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>

                    <p>Pesquisas</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">Mais Informações <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>44</h3>

                    <p>Usuários</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>65</h3>

                    <p>Unique Visitors</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Listar Papéis</h3>
                    <div class="pull-right">
                        {{--@can('role-store')--}}
                            <a class="btn btn-primary btn-xs"
                               href="{{ route('panel.access.control.role.create') }}">Novo</a>
                        {{--@endcan--}}
                    </div>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <table id="table1" class="display responsive nowrap dataTable no-footer dtr-inline collapsed"
                           style="width: 100%;" role="grid">
                        <thead>
                        <tr>
                            {{--@can('root')--}}
                                <th>Nome Slug</th>
                            {{--@endcan--}}
                            <th>Papel</th>
                            <th>Descrição</th>
                            {{--@can('role-update','role-view-permissions','role-destroy')--}}
                            <th>Ação</th>
                            {{--@endcan--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $role)
                            <tr>
                                {{--@can('root')--}}
                                <td>{{$role->slug}}</td>
                                {{--@endcan--}}
                                <td>{{$role->name}}</td>
                                <td>{{$role->description}}</td>
                                {{--@can('role-update','role-view-permissions','role-destroy')--}}
                                <td>
                                    {{--@can('role-update')--}}
                                    <a href="{{ route('panel.access.control.role.edit',['id'=>$role->id]) }}"
                                       title="Alterar" class="btn btn-xs btn-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    {{--@endcan--}}
                                    @if($role->slug != "root" && $role->id != env('ROLES_EMPLOYEE_ID'))
                                        {{--@can('role-view-permissions')--}}
                                        {{--<a href="{{ route('panel.access.control.role.permissions.edit',['role_id'=>$role->id]) }}"--}}
                                        {{--title="Permissões" class="btn btn-xs btn-default">--}}
                                        {{--<i class="fa fa-key"></i>--}}
                                        {{--</a>--}}
                                        {{--@endcan--}}
                                        {{--@can('role-destroy')--}}
                                        <a href="#"
                                           onclick="destroy('{{route('panel.access.control.role.destroy',['id'=>$role->id])}}','{{$role->name}}');"
                                           title="Deletar" class="btn btn-xs btn-danger">
                                            <i class="fa fa-remove"></i>
                                        </a>
                                        {{--@endcan--}}
                                    @endif
                                </td>
                                {{--@endcan--}}
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

@stop

{{-- page level scripts --}}
@section('page_scripts')
    <script src="{{ asset('softemp/panel/vendors/dataTables/js/dataTable.js') }}"></script>
    <!-- page script -->
    <script>
        $(document).ready(function () {
            //$(function () {
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
            //});
        });
    </script>
@stop