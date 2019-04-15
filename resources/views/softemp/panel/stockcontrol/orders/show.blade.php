@extends('softemp.panel.layouts.app')
@section('title')
    Ordens
    @parent
@stop

{{-- page level styles --}}
@section('page_styles')
    <link rel="stylesheet" href="{{ asset('softemp/panel/vendors/dataTables/css/dataTable.css') }}">
    <script type="text/javascript" src="{{asset('barcodegenerator/JsBarcode.all.min.js')}}"></script>
@stop

@section('content-header')

    <h1>
        {{$data->technicals->name}}
        <small>Tudo começa aqui</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('panel.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('panel.stockcontrol.order.index')}}">Ordens</a></li>
        <li class="active">Ordem#{{$data->id}}</li>
    </ol>
@endsection

@section('content')
    {{-- Default box --}}
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">
                <div class="fx">
                    Ordem #{{$data->id}}
                    <svg class="fx-barcode" onload="JsBarcode(this, '{{$data->id}}')"></svg>
                </div>
            </h3>
            <a class="btn btn-primary btn-xs pull-right" href="{{route('panel.stockcontrol.order.create')}}">Nova Ordem</a>
        </div>
        <div class="box-body">
            <table id="table1" class="display responsive nowrap dataTable no-footer dtr-inline collapsed" style="width: 100%;" role="grid">
                <thead>
                <tr>
                    <th>Status</th>
                    <th>Modelo</th>
                    <th>Mac</th>
                    <th>NS</th>
                    <th>Código de barras</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data->equipment as $equipment)
                    <tr>
                        <td>
                            @if($equipment->status == 1)
                                <span class="label label-success">Devolvido</span>
                            @elseif($equipment->status == 2)
                                <span class="label label-danger">Com técnico</span>
                            @elseif($equipment->status == 3)
                                <span class="label label-success">Destinado</span>
                            @endif
                        </td>
                        <td>{{$equipment->equipmentModel->name}}</td>
                        <td>{{$equipment->mac}}</td>
                        <td>{{$equipment->ns}}</td>
                        <td class="td-bar">
                            <div class="bar">
                                <svg class="barcode" onload="JsBarcode(this, '{{$equipment->ns}}')"></svg>
                            </div>
                        </td>
                        <td>
                            @if($equipment->status == 2)
                                <a href="#" onclick="putStock('{{$data->id}}', '{{$equipment->id}}')"
                                   title="Devolver ao estoque" class="btn btn-xs btn-success">
                                    <i class="fa fa-download"></i>
                                </a>
                                <a href="#" data-toggle="modal" data-target="#modal-show-columns"
                                   title="Destinar equipamento" class="btn btn-xs btn-warning"
                                   onclick="destiny('{{$data->id}}', '{{$equipment->id}}')">
                                    <i class="fa fa-upload"></i>
                                </a>
                            @endif
                            {{--<a href="{{route('panel.stockcontrol.equipment.edit', $equipment->id)}}" title="Destinar a um cliente" class="btn btn-xs btn-success"><i class="fa fa-upload"></i></a>--}}
                            {{--<a href="#"--}}
                            {{--onclick="destroy('{{route('panel.stockcontrol.equipment.destroy', $data->id)}}', '{{$data->id}}')" title="Deletar" class="btn btn-xs btn-danger">--}}
                            {{--<i class="fa fa-remove"></i>--}}
                            {{--</a>--}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @if($close)
                <a class="btn btn-success" href="{{route('panel.stockcontrol.order.close', $data->id)}}">Fechar ordem</a>
            @endif
        </div>
        {{-- /.box-body --}}
        <div class="box-footer">
            Floripa Server || Norte Server || Gbit Telecom
        </div>
        {{-- /.box-footer --}}
    </div>
    {{-- /.box --}}
    <input type="hidden" id="token" value="{{csrf_token()}}">


    <!-- modal show columns -->
    <div class="modal fade" id="modal-show-columns">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['route' => 'panel.stockcontrol.order.assignEquipment', 'method' => 'post', 'class'=>'form-group']) !!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Destinar equipamento</h4>
                </div>
                <div class="modal-body">
                    <div class="errors-msg alert alert-danger" style="display: none;"></div>
                    <div class="success-msg alert alert-success" style="display: none;"></div>
                            {!! Form::label('destination', null, ['class' => 'col-md-4 col-form-label text-md-right']) !!}
                                {!! Form::textarea('destination', null, ['class' => 'form-control', 'id'=>'destination', 'required', 'autofocus', 'placeholder'=>'Destino do equipamento']) !!}
                                {!! Form::hidden('equipment_id', null, ['id' => 'equipment_id']) !!}
                                {!! Form::hidden('order_out_id', null, ['id' => 'order_out_id']) !!}
                </div>
                <div class="modal-footer">
                    {!! Form::submit('Enviar', ['class' => 'btn btn-success pull-left']) !!}
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Fechar</button>
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal show columns -->
@endsection

{{-- page level scripts --}}
@section('page_scripts')
    <script src="{{ asset('softemp/panel/vendors/dataTables/js/dataTable.js') }}"></script>
    <!-- page script -->
    <script>
        $(document).ready(function() {
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
    <script>
        function destiny(orderId, equipmentId) {

            document.getElementById('equipment_id').value = equipmentId;
            document.getElementById('order_out_id').value = orderId;
        }

        function putStock(orderId, equipmentId)
        {
            var token = document.getElementById('token').value;

            $.ajax({
                url: "{{route('panel.stockcontrol.equipment.putStock')}}",
                type: "POST",
                data:{
                    "equipmentid" : equipmentId,
                    "orderid" : orderId,
                    "_token" : token
                },
                success: function(response) {
                    location.reload()
                }
            })
        }
    </script>
@stop
