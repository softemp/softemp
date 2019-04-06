@extends('softemp.panel.layouts.app')

@section('title')
    Controle de estoque
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
        <li class="active">Equipamentos</li>
    </ol>
@endsection

@section('content')
    {{-- Default box --}}
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Equipamentos cadastrados</h3>
            <a class="btn btn-primary btn-xs pull-right" href="{{route('panel.stockcontrol.equipment.create')}}">Novo Equipamento</a>
        </div>
        <div class="box-body">
            <table id="table1" class="display responsive nowrap dataTable no-footer dtr-inline collapsed" style="width: 100%;" role="grid">
                <thead>
                <tr>
                    <th>Modelo</th>
                    <th>Numero de série</th>
                    <th>Numero Mac</th>
                    <th>Status</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $equipment)
                    <tr>
                        <td>{{$equipment->equipmentModel->name}}</td>
                        <td>{{$equipment->ns}}</td>
                        <td>{{$equipment->mac}}</td>
                        <td>
                            @if($equipment->status == 1)<span class="label label-success">Em estoque</span>
                            @elseif($equipment->status == 2)<span class="label label-warning">Está com </span>
                            @elseif($equipment->status == 3)<span class="label label-info">Com cliente</span>
                            @elseif($equipment->status == 4)<span class="label label-danger">Equipamento no lixo</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('panel.stockcontrol.equipment.show', $equipment->id)}}" title="Ver" class="btn btn-xs btn-default"><i class="fa fa-eye"></i></a>

{{--                        @if ($equipment->status == 1)--}}
{{--                                <a href="{{route('panel.stockcontrol.equipment.edit', $equipment->id)}}" title="Alterar" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>--}}
{{--                                <a href="#"--}}
{{--                                   onclick="putTrash({{$equipment->id}})" title="Mover para Lixeira" class="btn btn-xs btn-danger">--}}
{{--                                    <i class="fa fa-trash"></i>--}}
{{--                                </a>--}}

{{--                            @elseif($equipment->status == 2)--}}
{{--                                <a href="{{route('panel.stockcontrol.equipment.show', $equipment->id)}}" title="Ver" class="btn btn-xs btn-default"><i class="fa fa-eye"></i></a>--}}
{{--                                <a href="#" onclick="putStock({{$equipment->id}})"--}}
{{--                                   title="Devolver ao estoque" class="btn btn-xs btn-success">--}}
{{--                                    <i class="fa fa-download"></i>--}}
{{--                                </a>--}}

{{--                            @elseif ($equipment->status == 3)--}}
{{--                                <a href="#" onclick="putStock({{$equipment->id}})"--}}
{{--                                   title="Devolver ao estoque" class="btn btn-xs btn-success">--}}
{{--                                    <i class="fa fa-download"></i>--}}
{{--                                </a>--}}

{{--                            @elseif($equipment->status == 4)--}}
{{--                                <a href="{{route('panel.stockcontrol.equipment.edit', $equipment->id)}}" title="Alterar" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>--}}
{{--                                <a href="#" onclick="putStock({{$equipment->id}})"--}}
{{--                                   title="Devolver ao estoque" class="btn btn-xs btn-success">--}}
{{--                                    <i class="fa fa-download"></i>--}}
{{--                                </a>--}}
{{--                            @endif--}}
{{--                            <a href="#" title="Notas" class="btn btn-xs btn-facebook"><i class="fa fa-sticky-note"></i></a>--}}

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{-- /.box-body --}}
        <div class="box-footer">
            Floripa Server || Norte Server || Gbit Telecom
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

        var token = document.getElementById('token').value;


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

        function putStock(equipmentId)
        {

            $.ajax({
                url: "{{route('panel.stockcontrol.equipment.putStock')}}",
                type: "POST",
                data: {
                    "equipmentid" : equipmentId,
                    "_token" : token
                },
                success: function(response) {
                    location.reload()
                }
            })
        }

        function putTrash(equipmentId)
        {
            $.ajax({
                url: "{{route('panel.stockcontrol.equipment.putTrash')}}",
                type: "POST",
                data: {
                    "equipment_id" : equipmentId,
                    "_token" : token
                },
                success: function (response) {
                    location.reload()
                }
            })
        }
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
