@extends('softemp.panel.layouts.app')

@section('title')
    Nova Ordem
    @parent
@stop

{{-- page level styles--}}
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
{{--     Default box--}}
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
        <div class="box-body">
            <div class="card-body">
                {!! Form::open(['route' => 'panel.stockcontrol.order.store', 'method' => 'post', 'class' => 'form-group']) !!}

                <div class="form-group row {{ $errors->has('equipment_model_id') ? ' has-error has-danger' : '' }}">
                    {!! Form::label('technical_id', 'Técnico responsável', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-group"></i> </span>
                            {!! Form::select('technical_id', $technicals, null, ['class'=>'form-control select2-container',
                             'id'=>'technical_id', 'placeholder'=>'', 'required']) !!}
                        </div>
                        @if ($errors->has('technical_id'))
                            <div class="help-block">
                                <label class="error">{{ $errors->first('technical_id') }}</label>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('equipment_id', 'Equipamentos', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
                    <div class="col-md-6">
                        {!! Form::select('equipment_id[]', $equipments , null ,['class' => 'form-control select2-container',
                        'id' => 'equipment_id', 'multiple' => 'multiple', 'required']) !!}
                    </div>
                </div>
                {!! Form::submit('Criar', ['class' => 'btn btn-success']) !!}
            </div>
            {!! Form::close() !!}
        </div>
{{--         /.box-body--}}
        <div class="box-footer">
            Floripa Server || Norte Server || Gbit Telecom
        </div>
{{--         /.box-footer--}}
    </div>
{{--     /.box--}}
@endsection

{{-- page level scripts --}}
@section('page_scripts')
    <script src="{{ asset('softemp/panel/vendors/select2/js/select2.js') }}"></script>
    <script src="{{ asset('softemp/panel/vendors/bootstrap-validator/js/validator.js') }}"></script>
{{--    page script--}}
    <script>
        $(document).ready(function() {
            $('#equipment_id').select2({
                placeholder: 'Selecione os equipamentos',
                multiple: true,
                allowClear: true
            });
        });
        $('form').validator();
    </script>

    <script>
        $(document).ready(function() {
            $('#technical_id').select2({
                placeholder: 'Selecione o técnico responsável',
                allowClear: true
            });
        });
        $('form').validator();
    </script>

@stop
