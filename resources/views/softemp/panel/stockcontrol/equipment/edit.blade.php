@extends('softemp.panel.layouts.app')

@section('title')
    Blank
    @parent
@stop

@section('content-header')
    <h1>
        {{$data->equipmentModel->name}}
        <small>Editando...</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('panel.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Formulário de edição</li>
    </ol>
@endsection

@section('content')
    {{-- Default box --}}
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Formulário de edição</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="card-body">
                <form action="{{route('panel.stockcontrol.equipment.update', $data->id)}}" method="post">
                    @csrf {{method_field('PUT')}}
                    <div class="form-group row">
                        <label for="mac" class="col-md-4 col-form-label text-md-right">End. Mac</label>
                        <div class="col-md-6">
                        <input class="form-control" type="text" id="mac" name="mac" value="{{$data->mac}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="ns" class="col-md-4 col-form-label text-md-right">Número de Série</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" id="ns" name="ns" value="{{$data->ns}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="purchase_date" class="col-md-4 col-form-label text-md-right">Data de Compra</label>
                        <div class="col-md-6">
                            <input class="form-control" type="date" id="purchase_date" name="purchase_date" value="{{$data->purchase_date}}">
                        </div>
                    </div>

                    <button class="btn btn-success">Editar</button>

                        {{--<input type="text" name="ns" value="{{$data->ns}}">--}}
                        {{--<input type="date" name="purchase_date" value="{{$data->purchase_date}}">>--}}
                </form>
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
