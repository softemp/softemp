{{--<div class="form-group  has-feedback {{ $errors->has('name') ? ' has-error has-danger' : '' }}">--}}
{{--    <label for="name">Permissão</label>--}}
{{--    <div class="input-group">--}}
{{--        <span class="input-group-addon"><i class="fa fa-asterisk"></i> </span>--}}
{{--        {!! Form::text('mac', null, ['class'=>'form-control', 'data-minlength'=>'4', 'maxlength'=>'150',--}}
{{--        'placeholder'=>'Permissão','required']) !!}--}}
{{--    </div>--}}
{{--    @if ($errors->has('name'))--}}
{{--        <div class="help-block">--}}
{{--            <label class="error">{{ $errors->first('name') }}</label>--}}
{{--        </div>--}}
{{--    @endif--}}
{{--</div>--}}

<div class="form-group row {{ $errors->has('mac') ? ' has-error has-danger' : '' }}">
    {{Form::label('mac', 'Endereço MAC', ['class' => ['col-md-4', 'col-form-label', 'text-md-right']])}}
    <div class="col-md-6">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-barcode"></i> </span>
            {{Form::text('mac', null,
            [
                'id' => 'mac',
                'class' => 'form-control',
                'placeholder' => 'Número MAC do equipamento',
                'minlength' => '10',
                'maxlength' => '20',
                'required'
            ])}}
        </div>
        @if ($errors->has('mac'))
            <div class="help-block">
                <label class="error">{{ $errors->first('mac') }}</label>
            </div>
        @endif
    </div>
</div>

<div class="form-group row {{ $errors->has('ns') ? ' has-error has-danger' : '' }}">
    <label for="ns" class="col-md-4 col-form-label text-md-right">Número de Série</label>
    <div class="col-md-6">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-barcode"></i> </span>
            {{Form::text('ns', null,
            ['
                class' => 'form-control',
                'id' => 'ns',
                'placeholder' => 'Número de série do equipamento',
                'minlength' => '10',
                'maxlength' => '20'
            ])}}
        </div>
        @if ($errors->has('ns'))
            <div class="help-block">
                <label class="error">{{ $errors->first('ns') }}</label>
            </div>
        @endif
    </div>
</div>

<div class="form-group row {{ $errors->has('purchase_date') ? ' has-error has-danger' : '' }}">
    <label for="purchase_date" class="col-md-4 col-form-label text-md-right">Data de Compra</label>
    <div class="col-md-6">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-calendar"></i> </span>
            {{Form::date('purchase_date', null,
            [
                'class' => 'form-control',
                'id' => 'purchase_date',
                'required'
            ])}}
        </div>
        @if ($errors->has('purchase_date'))
            <div class="help-block">
                <label class="error">{{ $errors->first('purchase_date') }}</label>
            </div>
        @endif
    </div>
</div>
{{Form::submit('Cadastrar', ['class' => 'btn btn-success'])}}

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
