@extends('softemp.panel.layouts.app')
@section('title')
    Ordens
    @parent
@stop

{{-- page level styles --}}
@section('page_styles')
    <link rel="stylesheet" href="{{ asset('softemp/panel/vendors/dataTables/css/dataTable.css') }}">
    <link href="{{asset('css/barCode.css')}}" rel="stylesheet">
    <script type="text/javascript" src="{{asset('barcodegenerator/JsBarcode.all.min.js')}}"></script>
@stop

@section('content-header')

    <h1>
        Ordem de Saída de equipamento
        <small>Dados</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('panel.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('panel.stockcontrol.order.index')}}">Ordens</a></li>
        <li class="active">Ordem#{{$data->id}}</li>
    </ol>
@endsection

@section('content')
    {{-- Default box --}}
    <div class="box col-lg-12" id="imprimir">
        <div class="box-header with-border">
            <h3 class="box-title">
                <div class="fx">
                    Ordem #{{$data->id}}
                </div>
            </h3>
        </div>
        <div class="box-body">
            <div class="form-group col-lg-3">
                <label for="Nome">
                    {!! Form::label('Técnico responsável', null, ['class' => 'control-label']) !!}
                </label>
                {!! Form::text('Nome',$data->technicals->name, ['class' => 'form-control', 'disabled']) !!}
            </div>
            <div class="form-group col-lg-2">
                <label for="Nome">
                    {!! Form::label('Usuário', null, ['class' => 'control-label']) !!}
                </label>
                {!! Form::text('Usuário',auth()->user()->user_name, ['class' => 'form-control', 'disabled']) !!}
            </div>
            <div class="form-group col-lg-2">
                <label for="Data">
                    {!! Form::label('Data de abertura', null, ['class' => 'control-label']) !!}
                </label>
                <input class="form-control" type="text" name="Data" value="{{$data->created_at->format('d/m/Y H:m')}}" disabled>
            </div>
            <table class="display responsive nowrap dataTable no-footer dtr-inline collapsed" style="width: 100%;">
                <thead>
                <tr>
                    <th>Modelo</th>
                    <th>Mac</th>
                    <th>NS</th>
                    <th>Código de barras</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data->equipment as $equipment)
                    <tr>
                        <td>{{$equipment->equipmentModel->name}}</td>
                        <td>{{$equipment->mac}}</td>
                        <td>{{$equipment->ns}}</td>
                        <td class="td-bar">
                            <div class="bar">
                                <svg class="barcode" onload="JsBarcode(this, '{{$equipment->ns}}')"></svg>
                            </div>
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

        <hr>
        <hr>
        <hr>


        <div class="box-header with-border">
            <h3 class="box-title">
                <div class="fx">
                    Ordem #{{$data->id}}
                </div>
            </h3>
        </div>
        <div class="box-body">
            <div class="form-group col-lg-3">
                <label for="Nome">
                    {!! Form::label('Técnico responsável', null, ['class' => 'control-label']) !!}
                </label>
                {!! Form::text('Nome',$data->technicals->name, ['class' => 'form-control', 'disabled']) !!}
            </div>
            <div class="form-group col-lg-2">
                <label for="Nome">
                    {!! Form::label('Usuário', null, ['class' => 'control-label']) !!}
                </label>
                {!! Form::text('Usuário',auth()->user()->user_name, ['class' => 'form-control', 'disabled']) !!}
            </div>
            <div class="form-group col-lg-2">
                <label for="Data">
                    {!! Form::label('Data de abertura', null, ['class' => 'control-label']) !!}
                </label>
                <input class="form-control" type="text" name="Data" value="{{$data->created_at->format('d/m/Y H:m')}}" disabled>
            </div>
            <table class="display responsive nowrap dataTable no-footer dtr-inline collapsed" style="width: 100%;">
                <thead>
                <tr>
                    <th>Modelo</th>
                    <th>Mac</th>
                    <th>NS</th>
                    <th>Código de barras</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data->equipment as $equipment)
                    <tr>
                        <td>{{$equipment->equipmentModel->name}}</td>
                        <td>{{$equipment->mac}}</td>
                        <td>{{$equipment->ns}}</td>
                        <td class="td-bar">
                            <div class="bar">
                                <svg class="barcode" onload="JsBarcode(this, '{{$equipment->ns}}')"></svg>
                            </div>
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
    <script>
         // $(function () {
         //     data = document.getElementById('imprimir');
         //     window.print(data);
         //     window.close()
         // })
    </script>
@stop
