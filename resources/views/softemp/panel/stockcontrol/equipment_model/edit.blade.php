@extends('softemp.panel.layouts.app')

@section('title')
    Blank
    @parent
@stop

@section('content-header')
    <h1>
        {{$data->name}}
        <small>Editando...</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('panel.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('panel.stockcontrol.model.index')}}"><i></i> Modelos de Equipamentos</a></li>
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
                <form action="{{route('panel.stockcontrol.model.update', $data->id)}}" method="post">
                    @csrf {{method_field('PUT')}}
                    <div class="form-group row">
                        <label for="mac" class="col-md-4 col-form-label text-md-right">Modelo do Equipamento</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" id="name" name="name" value="{{$data->name}}">
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
            Floripa Server || Norte Server || Gbit Telecom
        </div>
        {{-- /.box-footer --}}
    </div>
    {{-- /.box --}}
@endsection
