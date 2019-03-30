{{--@foreach($data as $equipment)--}}
{{--{{dd($equipment->lastDestination($equipment)->destination)}}--}}
{{--@endforeach--}}
@extends('softemp.panel.layouts.app')

@section('title')
    Blank
    @parent
@stop

{{-- page level styles --}}
@section('page_styles')
    <link rel="stylesheet" href="{{ asset('softemp/panel/vendors/dataTables/css/dataTable.css') }}">
@stop

@section('content-header')
    <h1>
        Controle de Estoque
        <small>Tudo começa aqui</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('panel.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('panel.pages.blank')}}">ControlerEstoque</a></li>
        <li class="active">Equipamentos</li>
    </ol>
@endsection

@section('content')
    {{-- Default box --}}
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Equipamentos cadastrados</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body float-left">
            <a class="btn btn-primary" href="{{route('panel.stockcontrol.equipment.create')}}">Cadastrar Equipamento</a>
            {{--<a class="btn btn-primary" href="{{route('panel.stockcontrol.equipment.create')}}">Cadastrar Equipamento</a>--}}
        </div>
        <div class="box-body">
            <table id="table1" class="display responsive nowrap dataTable no-footer dtr-inline collapsed" style="width: 100%;" role="grid">
                <thead>
                <tr>
                    <th>Modelo</th>
                    <th>Data de compra</th>
                    <th>Numero de série</th>
                    <th>Numero Mac</th>
                    <th>Destino</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $equipment)
                    <tr>
                        <td>{{$equipment->equipmentModel->name}}</td>
                        <td>{{$equipment->purchase_date}}</td>
                        <td>{{$equipment->ns}}</td>
                        <td>{{$equipment->mac}}</td>
                        <td>
                            @if($equipment->status == 1)Em estoque
                            @elseif($equipment->status == 2)Equipamento com técnico
                            @elseif($equipment->status == 3){{mb_strimwidth($equipment->lastDestination($equipment)->destination, 0, 20, "...")}}
                            @elseif($equipment->status == 4)Equipamento no lixo
                            @endif
                        </td>
                        <td>
                            <a href="{{route('panel.stockcontrol.equipment.show', $equipment->id)}}" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-eye-open"></i></a>

                            @if($equipment->status == 4)
                                <a href="{{route('panel.stockcontrol.equipment.edit', $equipment->id)}}" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-pencil"></i> Editar</a>
                                <a href="{{route('panel.stockcontrol.equipment.putstock', $equipment->id)}}" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon glyphicon-open"></i> Mover para estoque</a>
                            @else
                                <a href="{{route('panel.stockcontrol.equipment.edit', $equipment->id)}}" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-pencil"></i> Editar</a>
                                <a href="{{route('panel.stockcontrol.equipment.puttrash', $equipment->id)}}" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i> Mover para lixeira</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{-- /.box-body --}}
        <div class="box-footer">
            Footer
        </div>
        {{-- /.box-footer --}}
    </div>
    {{-- /.box --}}
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
    {{--<script>--}}
        {{--$(function () {--}}
            {{--$("td").dblclick(function () {--}}
                {{--var conteudoOriginal = $(this).text();--}}

                {{--$(this).addClass("celulaEmEdicao");--}}
                {{--$(this).html("<input type='text' value='" + conteudoOriginal + "' />");--}}
                {{--$(this).children().first().focus();--}}

                {{--$(this).children().first().keypress(function (e) {--}}
                    {{--if (e.which == 13) {--}}
                        {{--var novoConteudo = $(this).val();--}}
                        {{--$(this).parent().text(novoConteudo);--}}
                        {{--$(this).parent().removeClass("celulaEmEdicao");--}}
                    {{--}--}}
                {{--});--}}

                {{--$(this).children().first().blur(function(){--}}
                    {{--$(this).parent().text(conteudoOriginal);--}}
                    {{--$(this).parent().removeClass("celulaEmEdicao");--}}
                {{--});--}}
            {{--});--}}
        {{--});--}}
    {{--</script>--}}
@stop
