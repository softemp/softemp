@extends('softemp.panel.layouts.app')

{{-- Page title --}}
@section('title')
    Estados
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('softemp/panel/vendors/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('softemp/panel/vendors/DataTables/Responsive-2.2.2/css/responsive.dataTables.min.css') }}">
@stop

{{-- Page header --}}
@section('content-header')
    <h1>
        Chamados
        <small>listando os Chamados</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('panel.index') }}">
                <i class="fa fa-dashboard"></i> {{ trans('panel/panel.link_header_home') }}
            </a>
        </li>
        <li class="active">Chamados</li>
    </ol>
@stop


{{-- Page content --}}
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de Chamados</h3>
                    <div class="pull-right">
                        <a class="btn btn-primary btn-xs" href="{{ route('panel.address.states.create') }}">Novo
                            Cadastro</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="table1" class="display responsive nowrap dataTable no-footer dtr-inline collapsed" style="width: 100%;" role="grid">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Login</th>
                            @can('address.states-update','address.states-destroy')
                                <th>{{ trans('panel/panel.label_index_action') }}</th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $chamado)
                            <tr>
                                <td>{{$chamado->nome}}</td>
                                <td>
                                    {{$chamado->login}}
                                    {{--@if(is_object($chamado->msg))--}}
                                    {{--{{ $chamado->msg->msg }}--}}
                                    {{--@endif--}}
                                </td>
                                @can('address.states-update','address.states-destroy')
                                    <td>
                                        <button type="button" class="btn btn-default btn-xs"
                                                onclick="supportShow('{{route('panel.supports.show',['id'=>$chamado->id])}}');">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                        @can('address.states-update')
                                            <button type="button" class="btn btn-warning btn-xs"
                                                    onclick="supportEdit('{{route('panel.supports.edit',['id'=>$chamado->id])}}');">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        @endcan
                                        @can('address.states-destroy')
                                            <a href="#"
                                               onclick="destroy('{{route('panel.address.states.destroy',['id'=>$chamado->id])}}');"
                                               title="{{ trans('panel/person/physical.btn_destroy') }}"
                                               class="btn btn-xs btn-danger">
                                                <i class="fa fa-remove"></i>
                                            </a>
                                        @endcan
                                    </td>
                                @endcan

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

    <!-- modal support edit-->
    <div class="modal fade" id="modal-edit-support">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Default Modal</h4>
                </div>
                <form name="edit" data-toggle="validator" role="form" id="form-edit">
                    <div class="modal-body">
                        <div class="errors-msg alert alert-danger" style="display: none;"></div>
                        <div class="success-msg alert alert-success" style="display: none;"></div>
                        <p>Tarefa:</p>
                        <textarea name="msg" class="form-control"></textarea>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="msg_id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                        <button type="submit" id="update" class="btn btn-primary">Alterar</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal support edit-->

    <!-- modal support show-->
    <div class="modal fade" id="modal-show-support">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Default Modal</h4>
                </div>
                <div class="modal-body">
                    <div class="errors-msg alert alert-danger" style="display: none;"></div>
                    <div class="success-msg alert alert-success" style="display: none;"></div>
                    <div>
                        <label>Atendente: </label> <span id="atendente"></span>
                    </div>
                    <div>
                        <label>Aberto: </label> <span id="abertura"></span>
                    </div>
                    <div>
                        <label>Assunto: </label> <span id="assunto"></span>
                    </div>
                    <div>
                        <label>Ramal: </label> <span id="ramal"></span>
                    </div>
                    <div>
                        <label>Mensage: </label> <span id="msg"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal support show-->
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <!-- DataTables -->
    <script src="{{ asset('softemp/panel/vendors/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('softemp/panel/vendors/DataTables/Responsive-2.2.2/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('softemp/vendors/bootstrap-validator/dist/validator.min.js') }}"></script>
    <!-- page script -->
    <script>
        function supportEdit(url) {
            $.ajax({
                type: 'get',
                dataType: 'json',
                url: url,
                success: function (data) {
                    //console.log(data);
                    $('#modal-edit-support .modal-title').html(data['support'].nome + ' - ' + data['support'].login);
                    $('#modal-edit-support textarea[name=msg]').val(data['msg'].msg);
                    $('#modal-edit-support input[name=msg_id]').val(data['msg'].id);
                }
                // error:function(msg){
                //     console.log(msg);
                // }
            });
            $('#modal-edit-support').modal('show');
        }

        function supportShow(url) {
            $.ajax({
                type: 'get',
                dataType: 'json',
                url: url,
                success: function (data) {
                    console.log(data);
                    $('#modal-show-support .modal-title').html(data['support'].nome + ' - ' + data['support'].login);
                    $('#modal-show-support #atendente').html(data['support'].atendente);
                    $('#modal-show-support #abertura').html(data['support'].abertura);
                    $('#modal-show-support #assunto').html(data['support'].assunto);
                    $('#modal-show-support #ramal').html(data['support'].ramal);
                    $('#modal-show-support #msg').html(data['msg'].msg);
                },
                error: function (msg) {
                    console.log(msg);
                }
            });
            $('#modal-show-support').modal('show');
        }

        $('#form-edit').validator().on('submit', function (e) {
            if (e.isDefaultPrevented()) {
                // handle the invalid form...
            } else {
                // everything looks good!
                var csrf = $('#modal-edit-support input[name=_token]').val();
                var msg = $('#modal-edit-support textarea[name=msg]').val();
                var id = $('#modal-edit-support input[name=msg_id]').val();
                var url = '/panel/supports/' + id;

                $.ajax({
                    type: "put",
                    url: url,
                    dataType: 'json',
                    data: {msg: msg, _token: csrf},
                    async: true,
                    success: function (data) {
                        //$('button#store').attr('disabled', true);
                        $('#modal-edit-support .success-msg').html('Alterado com sucesso');
                        $('#modal-edit-support .success-msg').show();
                        setTimeout('location.reload();', 3000);
                        //console.log(data);
                    }
                });
            }
            e.preventDefault();
        });

        $(function () {
            $('#table1').DataTable({
                'paging': true,
                'lengthChange': true,
                'searching': true,
                'ordering': true,
                'info': true,
                'autoWidth': true,
                'responsive': true,
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
        })
    </script>
@stop