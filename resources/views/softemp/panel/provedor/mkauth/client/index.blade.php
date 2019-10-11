@extends('softemp.panel.layouts.app')

@section('title')
    Clientes
    @parent
@stop

{{-- page level styles --}}
@section('page_styles')
    <link rel="stylesheet" href="{{ asset('softemp/panel/vendors/dataTables/css/dataTable.css') }}">
    <style>
        .pagination {
            margin: 0px 0;
        }
    </style>
@stop

@section('content-header')
    <h1>
        Clientes
        <small>Tudo começa aqui</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('panel.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('panel.provedor.index')}}">Provedor</a></li>
        <li><a href="{{route('panel.provedor.mkauth.cto.index')}}">MkAuth</a></li>
        <li class="active">Clientes</li>
    </ol>
@endsection

@section('content')
    {{-- Default box --}}
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Title</h3>
            @if(!Request::is('painel/provedor/mkauth/cliente/ativo'))
            <a class="btn btn-default btn-sm" href="{{ route('panel.provedor.mkauth.client.active') }}">Clientes Ativos</a>
            @endif
            @if(!Request::is('painel/provedor/mkauth/cliente/liberado'))
            <a class="btn btn-success btn-sm" href="{{ route('panel.provedor.mkauth.client.free') }}">Clientes Liberados</a>
            @endif
            @if(!Request::is('painel/provedor/mkauth/cliente/bloqueado'))
            <a class="btn btn-warning btn-sm" href="{{ route('panel.provedor.mkauth.client.blocked') }}">Clientes Bloqueados</a>
            @endif
            @if(!Request::is('painel/provedor/mkauth/cliente/desativado'))
            <a class="btn btn-danger btn-sm" href="{{ route('panel.provedor.mkauth.client.disabled') }}">Clientes Desativados</a>
            @endif
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            <table id="table1" class="display responsive nowrap dataTable no-footer dtr-inline collapsed" style="width: 100%;" role="grid">
                <thead>
                <tr>
                    <th>Clientes</th>
                    <th>Logins</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $client)
                <tr>
                    <td>{{ $client->nome }}</td>
                    <td>{{ $client->login }}</td>
                    <td>
                        {{--<a class="btn btn-primary btn-sm" href="{{ route('panel.provedor.mkauth.client.show',['table'=>$client->id]) }}">show</a>--}}
                        <button type="button" class="btn btn-default btn-xs" title="Detalhes"
                                onclick="showColumns('{{ route('panel.provedor.mkauth.client.show',['table'=>$client->id]) }}');">
                            <i class="fa fa-eye"></i>
                        </button>
                        @if(Request::is('painel/provedor/mkauth/cliente/bloqueado') || Request::is('painel/provedor/mkauth/cliente/liberado'))
                        <button type="button" class="btn btn-success btn-xs" title="Liberar"
                                onclick="unlockClient('{{ route('panel.provedor.mkblock.unlockClient',['login'=>$client->login]) }}');">
                            <i class="fa fa-play"></i>
                        </button>
                        @endif
                        @if(Request::is('painel/provedor/mkauth/cliente/liberado') || Request::is('painel/provedor/mkauth/cliente/bloqueado'))
                        <button type="button" class="btn btn-danger btn-xs" title="Bloquear"
                                onclick="blockClient('{{ route('panel.provedor.mkblock.blockClient',['login'=>$client->login]) }}');">
                            <i class="fa fa-power-off"></i>
                        </button>
                        @endif
                    </td>
                </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td>Mostrando de {{ $data->firstItem() }} até {{ $data->lastItem() }} de {{ $data->total() }} registros</td>
                    <td></td>
                    <td></td>
                </tr>
                </tfoot>
            </table>
        </div>
        {{-- /.box-body --}}
        <div class="box-footer">
{{--          Mostrando de {{ $data->firstItem() }} até {{ $data->lastItem() }} de {{ $data->total() }} registros <br> --}}
            {{ $data->links() }}
        </div>
        {{-- /.box-footer --}}
    </div>
    {{-- /.box --}}

    <!-- modal show columns -->
    <div class="modal fade" id="modal-show-columns">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">CTO-</h4>
                </div>
                <div class="modal-body">
                    <div class="errors-msg alert alert-danger" style="display: none;"></div>
                    <div class="success-msg alert alert-success" style="display: none;"></div>
                    <div>
                        <table class="table" >
                            <thead>
                            <tr>
                                <th>Quant</th>
                                <th>Colunas</th>
                                <th>Valores</th>
                            </tr>
                            </thead>
                            <tbody id="clientes"></tbody>
                        </table>
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
    <!-- /.modal show columns -->

    <!-- modal show unlockClient -->
    <div class="modal fade" id="modal-show-unlockClient">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Login: </h4>
                </div>
                <div class="modal-body">
                    <div class="errors-msg alert alert-danger" style="display: none;"></div>
                    <div class="success-msg alert alert-success" style="display: none;"></div>
                    <div>
                        <div id="loader"></div>
                        <!--Área que mostrará carregando-->
                        <h2></h2>
                        <!--Lista de Clientes-->
                        <ul id="listaClientes"></ul>
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
    <!-- /.modal show unlockClient -->

    <!-- modal show blockClient -->
    <div class="modal fade" id="modal-show-blockClient">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Login: </h4>
                </div>
                <div class="modal-body">
                    <div class="errors-msg alert alert-danger" style="display: none;"></div>
                    <div class="success-msg alert alert-success" style="display: none;"></div>
                    <div>
                        <div id="loaderd" class="callout">srvt r trvwtwe</div>
                        <!--Área que mostrará carregando-->
                        <h2></h2>
                        <!--Lista de Clientes-->
                        <ul id="listaClientes"></ul>
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
    <!-- /.modal show blockClient -->
@endsection

{{-- page level scripts --}}
@section('page_scripts')
    <script src="{{ asset('softemp/panel/vendors/dataTables/js/dataTable.js') }}"></script>
    <!-- page script -->
    <script>

        function sendingProcessingQueue() {
            toastr.info('Enviando para a fila de processamento', "{{ trans('panel/notification.info') }}",{timeOut: 2000})
        }
        function unlockClient(url) {
            $.ajax({
                type: "GET",
                url: url,
                // timeout: 3000,
                datatype: 'JSON',
                contentType: "application/json; charset=utf-8",
                cache: false,
                async: true,
                beforeSend: sendingProcessingQueue(),
                error: function() {
                    toastr.error("O servidor não conseguiu processar o pedido", "{{ trans('panel/notification.error') }}",{timeOut: 5000});
                },
                success: function(retorno) {
                    // console.log(retorno);

                    var obj = retorno.message;

                    if(obj.success) {
                        toastr.success(obj.success, "{{ trans('panel/notification.success') }}");
                    } else if (obj.warning){
                        toastr.warning(obj.warning, "{{ trans('panel/notification.warning') }}");
                    } else if (obj.error){
                        toastr.error(obj.error, "{{ trans('panel/notification.error') }}",{timeOut: 5000});
                    }
                }
            });
        };

        function blockClient(url) {
            $.ajax({
                type: "GET",
                url: url,
                // timeout: 3000,
                datatype: 'JSON',
                contentType: "application/json; charset=utf-8",
                cache: false,
                async: true,
                beforeSend: sendingProcessingQueue(),
                error: function() {
                    toastr.error("O servidor não conseguiu processar o pedido", "{{ trans('panel/notification.error') }}",{timeOut: 5000});
                },
                success: function(retorno) {
                    // console.log(retorno);

                    var obj = retorno.message;

                    if(obj.success) {
                        toastr.success(obj.success, "{{ trans('panel/notification.success') }}");
                    } else if (obj.warning){
                        toastr.warning(obj.warning, "{{ trans('panel/notification.warning') }}");
                    } else if (obj.error){
                        toastr.error(obj.error, "{{ trans('panel/notification.error') }}",{timeOut: 5000});
                    }
                }
            });
        };

        function preloaderDestroy() {
            var div = '<tr><td colspan="5" align="center"><img src="{{ asset('softemp/panel/img/loading.gif') }}" width="100" alt="Carregando..." title="Carregando..." /></td></tr>'
            $('.modal-show-columns #clientes').html(div);
        };
        function showColumns(url) {

            $.ajax({
                type: 'get',
                dataType: 'json',
                url: url,
                async: true,
                beforeSend: preloaderDestroy(),
                success: function (data) {
                   // console.log(data);

                    var text,count = 0;

                    Object.keys(data).forEach(function(k, v){
                        count++;
                        text += "<tr><td>"+count+"</td><td>" + k + "</td><td>" + data[k] + "</td></tr>";
                    });

                    $('#modal-show-columns .modal-title').html('CTO-'+data['nome']);
                    $('#modal-show-columns #clientes').html(text);
                },
                error: function (msg) {
                    console.log(msg);
                }
            });
            $('#modal-show-columns').modal('show');
        };

        $(document).ready(function() {

            $('#table1').DataTable({
                "paginate": false,
                "info": false,
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
