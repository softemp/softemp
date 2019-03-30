@extends('softemp.panel.layouts.app')

@section('title')
    Blank
    @parent
@stop

@section('content-header')
    <h1>
        Histórico
        <small>Tudo começa aqui</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('panel.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Blank page</li>
    </ol>
@endsection

@section('content')
    {{-- Default box --}}
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">{{$data->equipmentModel->name}}</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="box box-warning">
                <h4><strong>Mac: </strong><i>{{$data->mac}}</i></h4>
                <h4><strong>Série: </strong><i>{{$data->ns}}</i></h4>
                <h4><strong>Data de compra: </strong><i>{{$data->purchase_date}}</i></h4>
            </div>
            <div class="box">
                <div class="box-header">
                    <h2>Histórico de destinos</h2>
                </div>
                <div class="box-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Data</th>
                        <th>Descrição</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        @foreach($data->destinations as $destination)
                            <td>{{$destination->created_at}}</td>
                            <td>{{$destination->destination}}</td>
                        @endforeach
                    </tr>
                    </tbody>
                </table>
                </div>
                <div class="box-footer">
                    {{count($data->destinations)}} Registro(s)
                </div>
            </div>

        </div>
        {{-- /.box-body --}}
        <div class="box-footer">
            Footer
        </div>
        {{-- /.box-footer --}}
    </div>

    {{-- /.box --}}
@endsection
