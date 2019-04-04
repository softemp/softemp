@extends('softemp.panel.layouts.app')

@section('title')
    Blank
    @parent
@stop
@section('page_styles')
    <link rel="stylesheet" href="{{ asset('softemp/panel/vendors/dataTables/css/dataTable.css') }}">
@stop
@section('content-header')
    <script type="text/javascript" src="{{asset('barcodegenerator/JsBarcode.all.min.js')}}"></script>
    {{--<script--}}
        {{--src="https://code.jquery.com/jquery-3.3.1.js"--}}
        {{--integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="--}}
        {{--crossorigin="anonymous"></script>--}}
    <h1>
        Histórico
        <small>Tudo começa aqui</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('panel.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('panel.stockcontrol.equipment.index')}}"><i></i> Equipamentos</a></li>
        <li class="active">Ver</li>
    </ol>
@endsection

@section('content')
    {{-- Default box --}}
    {{--<div class="box">--}}
    {{--<div class="box-header with-border">--}}
    {{--<h3 class="box-title">{{$data->equipmentModel->name}}</h3>--}}

    {{--<div class="box-tools pull-right">--}}
    {{--<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"--}}
    {{--title="Collapse">--}}
    {{--<i class="fa fa-minus"></i></button>--}}
    {{--<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">--}}
    {{--<i class="fa fa-times"></i></button>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="box-body">--}}
    {{--<div class="barcode-container">--}}
    {{--<div class="barcode-align-center">--}}
    {{--<svg class="barcode" id="codns"></svg>--}}
    {{--<i>Número de série</i>--}}
    {{--</div>--}}
    {{--<div class="barcode-align-center">--}}
    {{--<div>--}}
    {{--<svg class="barcode" id="codmac"></svg>--}}
    {{--</div>--}}
    {{--<i>Endereço mac</i>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="barcode-container">--}}
    {{--<div class="barcode-align-center">--}}
    {{--<svg class="barcode" id="codmodel"></svg>--}}
    {{--<i>Modelo</i>--}}
    {{--</div>--}}
    {{--<div class="barcode-align-center">--}}
    {{--<svg class="barcode" id="codpurchasedate"></svg>--}}
    {{--<i>Data de compra</i>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{-- /.box-body --}}
    {{--<div class="box-footer">--}}
    {{--Footer--}}
    {{--</div>--}}
    {{-- /.box-footer --}}
    {{--</div>--}}
    <div class="box">
        <div class="box-header">
            <h2>Histórico de destinos</h2>
        </div>
        <div class="box-body">
            <table id="table1" class="display responsive nowrap dataTable no-footer dtr-inline collapsed" style="width: 100%;" role="grid">
                <thead>
                <tr>
                    <th>Data</th>
                    <th>Descrição</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($data->destinations as $destination)
                        <tr>
                        <td>{{date('d/m/Y h:m:s', time())}}</td>
                        <td>{{$destination->destination}}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="box-footer">
            {{count($data->destinations)}} Registro(s)
        </div>

        <div class="box-footer">
            Floripa Server || Norte Server || Gbit Telecom
        </div>
    </div>
    {{-- /.box-footer --}}

    {{-- /.box --}}
    <input type="hidden" id="datamac" value="{{$data->mac}}">
    <input type="hidden" id="datans" value="{{$data->ns}}">
    <input type="hidden" id="datamodel" value="{{$data->equipmentModel->name}}">
    <input type="hidden" id="datapurchase" value="{{$data->purchase_date}}">
@endsection
{{-- page level scripts --}}
@section('page_scripts')
    <script src="{{ asset('softemp/panel/vendors/dataTables/js/dataTable.js') }}"></script>
    <!-- page script -->
    <script>
        $(document).ready(function() {
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

    {{--Scripts do gerador de código de barras--}}
    <script type="text/javascript">
        $(document).ready(barCode());
        function barCode() {
            JsBarcode('#codmac', document.getElementById('datamac').value);
            JsBarcode('#codns', document.getElementById('datans').value);
            JsBarcode('#codmodel', document.getElementById('datamodel').value);
            JsBarcode('#codpurchasedate', document.getElementById('datapurchase').value);
        }
    </script>
    {{--End scripts do gerador de código de barras--}}
@stop
