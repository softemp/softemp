<!-- general form elements -->
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Alterar Endereço</h3>
    </div>
    <!-- /.box-header -->

    <!-- form start -->
{!! Form::model($data, ['route'=>['panel.configuration.company.updateAddress', $data->id],
'method'=>'put', 'role'=>'form', 'data-toggle'=>"validator"]) !!}
<!-- box-body -->
    <div class="box-body">
        <div class="form-group  has-feedback {{ $errors->has('states') ? ' has-error has-danger' : '' }}">
            <label for="states">Estado</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-asterisk"></i> </span>
                {!! Form::select('states', $address->addressStreets->neighboarhoods->cities->states->pluck('name','id') , $address->addressStreets->neighboarhoods->cities->state_id,['class' => 'form-control select2-container',
                        'id' => 'states', 'required']) !!}
            </div>
            @if ($errors->has('states'))
                <div class="help-block">
                    <label class="error">{{ $errors->first('states') }}</label>
                </div>
            @endif
        </div>
        <div class="form-group  has-feedback {{ $errors->has('cities') ? ' has-error has-danger' : '' }}">
            <label for="cities">Cidade</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-asterisk"></i> </span>
                {!! Form::select('cities', $address->addressStreets->neighboarhoods->cities->pluck('name','id') , $address->addressStreets->neighboarhoods->city_id,['class' => 'form-control select2-container',
                        'id' => 'cities', 'required']) !!}
            </div>
            @if ($errors->has('cities'))
                <div class="help-block">
                    <label class="error">{{ $errors->first('cities') }}</label>
                </div>
            @endif
        </div>
        <div class="form-group  has-feedback {{ $errors->has('neighboarhoods') ? ' has-error has-danger' : '' }}">
            <label for="neighboarhoods">Bairro</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-asterisk"></i> </span>
                {!! Form::select('neighboarhoods', $address->addressStreets->neighboarhoods->pluck('name','id') , $address->addressStreets->neighboarhood_id ,['class' => 'form-control select2-container',
                        'id' => 'neighboarhoods', 'required']) !!}
            </div>
            @if ($errors->has('neighboarhoods'))
                <div class="help-block">
                    <label class="error">{{ $errors->first('neighboarhoods') }}</label>
                </div>
            @endif
        </div>
        <div class="form-group  has-feedback {{ $errors->has('streets') ? ' has-error has-danger' : '' }}">
            <label for="streets">Logradouro</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-asterisk"></i> </span>
                {!! Form::select('streets', $address->addressStreets->pluck('name','id') , $address->street_id ,['class' => 'form-control select2-container',
                        'id' => 'streets', 'required']) !!}
            </div>
            @if ($errors->has('streets'))
                <div class="help-block">
                    <label class="error">{{ $errors->first('streets') }}</label>
                </div>
            @endif
        </div>
        <div class="form-group  has-feedback {{ $errors->has('number') ? ' has-error has-danger' : '' }}">
            <label for="number">Numero</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-asterisk"></i> </span>
                {!! Form::text('number', $address->number, ['class'=>'form-control', 'placeholder'=>'IM']) !!}
            </div>
            @if ($errors->has('number'))
                <div class="help-block">
                    <label class="error">{{ $errors->first('number') }}</label>
                </div>
            @endif
        </div>
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a class="btn btn-default"
           href="{{ route('panel.contact.type.index') }}">Cancelar</a>
    </div>

    {!! Form::close() !!}
</div>
<!-- general form elements -->

