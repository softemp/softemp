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
        <!-- countries -->
        <div class="form-group has-feedback {{ $errors->has('country_id') ? ' has-error has-danger' : '' }}">
            <label for="country">Paises</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-asterisk"></i> </span>
                <select class="form-control select2-container" name="country_id" id="country" required>
                    @if($address->addressStreet->neighboarhood->city->state->country)
                        <option value="{{$address->addressStreet->neighboarhood->city->state->country->id}}" selected>{{$address->addressStreet->neighboarhood->city->state->country->name}}</option>
                    @endif
                </select>
            </div>
            @if ($errors->has('country_id'))
                <div class="help-block">
                    <label class="error">{{ $errors->first('country_id') }}</label>
                </div>
            @endif
        </div>
        <!-- /.countries -->
        <!-- states -->
        <div class="form-group has-feedback {{ $errors->has('state_id') ? ' has-error has-danger' : '' }}">
            <label for="state">Estados</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-asterisk"></i> </span>
                <select class="form-control select2-container" name="state_id" id="state" required>
                    @if($address->addressStreet->neighboarhood->city->state)
                        <option value="{{$address->addressStreet->neighboarhood->city->state->id}}" selected>{{$address->addressStreet->neighboarhood->city->state->name}}</option>
                    @endif
                </select>
            </div>
            @if ($errors->has('state_id'))
                <div class="help-block">
                    <label class="error">{{ $errors->first('state_id') }}</label>
                </div>
            @endif
        </div>
        <!-- /.states -->
        <!-- cities -->
        <div class="form-group has-feedback {{ $errors->has('city_id') ? ' has-error has-danger' : '' }}">
            <label for="city">Cidades</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-asterisk"></i> </span>
                <select class="form-control select2-container" name="city_id" id="city" required>
                    @if($address->addressStreet->neighboarhood->city)
                        <option value="{{$address->addressStreet->neighboarhood->city->id}}" selected>{{$address->addressStreet->neighboarhood->city->name}}</option>
                    @endif
                </select>
            </div>
            @if ($errors->has('city_id'))
                <div class="help-block">
                    <label class="error">{{ $errors->first('city_id') }}</label>
                </div>
            @endif
        </div>
        <!-- /.cities -->
        <!-- neighboarhoods -->
        <div class="form-group has-feedback {{ $errors->has('neighboarhood_id') ? ' has-error has-danger' : '' }}">
            <label for="neighboarhood">Bairros</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-asterisk"></i> </span>
                <select class="form-control select2-container" name="neighboarhood_id" id="neighboarhood" required>
                    @if($address->addressStreet->neighboarhood)
                        <option value="{{$address->addressStreet->neighboarhood->id}}" selected>{{$address->addressStreet->neighboarhood->name}}</option>
                    @endif
                </select>
            </div>
            @if ($errors->has('neighboarhood_id'))
                <div class="help-block">
                    <label class="error">{{ $errors->first('neighboarhood_id') }}</label>
                </div>
            @endif
        </div>
        <!-- /.neighboarhoods -->
        <!-- streets -->
        <div class="form-group has-feedback {{ $errors->has('street_id') ? ' has-error has-danger' : '' }}">
            <label for="street">Logradouros</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-asterisk"></i> </span>
                <select class="form-control select2-container" name="street_id" id="street" required>
                    @if($address->addressStreet)
                    <option value="{{$address->addressStreet->id}}" selected>{{$address->addressStreet->name}}</option>
                    @endif
{{--                    <option></option>--}}
{{--                    <option id="cad">Cadastrar Logradouro</option>--}}
                </select>
            </div>
            @if ($errors->has('street_id'))
                <div class="help-block">
                    <label class="error">{{ $errors->first('street_id') }}</label>
                </div>
            @endif
        </div>
        <!-- /.streets -->
{{--        <div class="form-group  has-feedback {{ $errors->has('street') ? ' has-error has-danger' : '' }}">--}}
{{--            <label for="street">Logradouro</label>--}}
{{--            <div class="input-group">--}}
{{--                <span class="input-group-addon"><i class="fa fa-asterisk"></i> </span>--}}
{{--                {!! Form::select('street', $address->addressStreet->pluck('name','id') , $address->street_id ,['class' => 'form-control select2-container',--}}
{{--                        'id' => 'street', 'required']) !!}--}}
{{--            </div>--}}
{{--            @if ($errors->has('street'))--}}
{{--                <div class="help-block">--}}
{{--                    <label class="error">{{ $errors->first('street') }}</label>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--        </div>--}}
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

