@extends('softemp.panel.layouts.app')

@section('title')
    Nova Ordem
    @parent
@stop

{{-- page level styles --}}
@section('page_styles')
    <link rel="stylesheet" href="{{ asset('softemp/panel/vendors/select2/css/select2.css') }}">
@stop

@section('content-header')
    <h1>
        Ordem de saída de equipamentos
        <small>Tudo começa aqui</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('panel.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('panel.stockcontrol.order.index')}}">Ordens</a></li>
        <li class="active">Novo</li>
    </ol>
@endsection

@section('content')
    {{-- Default box --}}
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Nova Ordem</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <form class="form-group" method="post" action="{{route('panel.stockcontrol.order.store')}}">
            @csrf
            <div class="box-body">
                <div class="form-group row">
                    <label for="technical_id" class="col-md-4 col-form-label text-md-right">Técnico responsável</label>
                    <div class="col-md-6">
                        <select class="form-control select-container" name="technical_id" id="technical_id" required>
                            <option>Selecione o técnico responsável</option>
                            @foreach($technicals as $technical)
                                <option value="{{$technical->id}}">{{$technical->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="equipment_id" class="col-md-4 col-form-label text-md-right">Equipamentos</label>
                    <div class="col-md-6">
                        <select class="form-control select2-container" name="equipment_id[]"
                                id="equipment_id" multiple="multiple" required>
                            @foreach($equipments as $equipment)
                                <option value="{{$equipment->id}}">NS: {{$equipment->ns}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button class="btn btn-success">Criar</button>
            </div>
        </form>
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
    <script src="{{ asset('softemp/panel/vendors/select2/js/select2.js') }}"></script>
    {{-- page script --}}
    <script>
        $(document).ready(function() {
            $('#equipment_id').select2({
                placeholder: 'Selecione os equipamentos',
                multiple: true,
                allowClear: true
            });
        });
    </script>
@stop
