@extends('softemp.panel.layouts.app')

@section('title')
    Blank
    @parent
@stop

{{-- page level styles --}}
@section('page_styles')
    <link rel="stylesheet" href="{{ asset('softemp/panel/vendors/select2/css/select2.css') }}">
@stop

@section('content-header')
    <h1>
        Novo Equipamento
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
            <h3 class="box-title">Formulário de cadastro</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        @if ($errors->any())
            <div class="box-header">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        <div class="box-body">
            <div class="card-body">
                {{Form::open(['route' => 'panel.stockcontrol.equipment.store', 'method' => 'post'])}}
                <div class="form-group has-feedback {{ $errors->has('equipment_model_id') ? ' has-error has-danger' : '' }}">
                    <label for="equipment_model_id">Modelo do equipamento</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-asterisk"></i> </span>
                        <select class="form-control select2-container" name="equipment_model_id" id="equipment_model_id" required>
                            <option></option>
                            @foreach($data as $equipmentModel)
                                <option value="{{$equipmentModel->id}}">{{$equipmentModel->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @if ($errors->has('equipment_model_id'))
                        <div class="help-block">
                            <label class="error">{{ $errors->first('equipment_model_id') }}</label>
                        </div>
                    @endif
                </div>

                <div class="form-group row">
                    <label for="mac" class="col-md-4 col-form-label text-md-right">End. Mac</label>
                    <div class="col-md-6">
                        {{Form::text('mac', null, ['id' => 'mac', 'class' => 'form-control', 'placeholder' => 'Número MAC do equipamento'])}}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="ns" class="col-md-4 col-form-label text-md-right">Número de Série</label>
                    <div class="col-md-6">
                        {{Form::text('ns', null, ['class' => 'form-control', 'id' => 'ns', 'placeholder' => 'Número de série do equipamento'])}}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="purchase_date" class="col-md-4 col-form-label text-md-right">Data de Compra</label>
                    <div class="col-md-6">
                        {{Form::date('purchase_date', null, ['class' => 'form-control', 'id' => 'purchase_date'])}}
                    </div>
                </div>
                {{Form::hidden('status', '1', ['id' => 'status', 'name' => 'status'])}}
                {{Form::submit('Cadastrar', ['class' => 'btn btn-success'])}}

                {{--<input type="text" name="ns" value="{{$data->ns}}">--}}
                {{--<input type="date" name="purchase_date" value="{{$data->purchase_date}}">>--}}
                {{Form::close()}}
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


{{-- page level scripts --}}
@section('page_scripts')
    <!-- BootstrapValidators -->
    <script src="{{ asset('softemp/panel/vendors/select2/js/select2.js') }}"></script>
    <script src="{{ asset('softemp/panel/vendors/bootstrap-validator/js/validator.js') }}"></script>
    <!-- page script -->
    <script>
        $(document).ready(function() {
            $('#module').select2({
                placeholder: 'Selecione um Modulo',
                allowClear: true
            });
        });
        $('form').validator();
    </script>

@stop
