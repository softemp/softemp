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
        <div class="box-body">
            <div class="card-body">
                {{Form::open(['route' => 'panel.stockcontrol.equipment.store', 'method' => 'post'])}}
                <div class="form-group row {{ $errors->has('equipment_model_id') ? ' has-error has-danger' : '' }}">
                    {!! Form::label('equipment_model_id', 'Modelo do equipamento', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-asterisk"></i> </span>
                            {!! Form::select('equipment_model_id', $equipmentModels , null , ['class' => 'form-control select2-container', 'id' => 'equipment_model_id', 'placeholder'=>'', 'required']) !!}
                        </div>
                        @if ($errors->has('equipment_model_id'))
                            <div class="help-block">
                                <label class="error">{{ $errors->first('equipment_model_id') }}</label>
                            </div>
                        @endif
                    </div>
                </div>
                @include('softemp.panel.stockcontrol.equipment._form')
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
            $('#equipment_model_id').select2({
                placeholder: 'Selecione o modelo do equipamento',
                allowClear: true
            });
        });
        $('form').validator();
    </script>

@stop
