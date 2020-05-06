<div class="form-group  has-feedback {{ $errors->has('fantasy_name') ? ' has-error has-danger' : '' }}">
    <label for="fantasy_name">Nome Fantasia</label>
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-asterisk"></i> </span>
        {!! Form::text('fantasy_name', null, ['class'=>'form-control', 'data-minlength'=>'4', 'maxlength'=>'190',
        'placeholder'=>'Nome fantasia','required']) !!}
    </div>
    @if ($errors->has('fantasy_name'))
        <div class="help-block">
            <label class="error">{{ $errors->first('fantasy_name') }}</label>
        </div>
    @endif
</div>
<div class="form-group  has-feedback {{ $errors->has('business_name') ? ' has-error has-danger' : '' }}">
    <label for="business_name">Rasão Social</label>
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-asterisk"></i> </span>
        {!! Form::text('business_name', null, ['class'=>'form-control', 'data-minlength'=>'4', 'maxlength'=>'190',
        'placeholder'=>'Rasão Social','required']) !!}
    </div>
    @if ($errors->has('business_name'))
        <div class="help-block">
            <label class="error">{{ $errors->first('business_name') }}</label>
        </div>
    @endif
</div>
<div class="form-group  has-feedback {{ $errors->has('document') ? ' has-error has-danger' : '' }}">
    <label for="document">CPF</label>
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-asterisk"></i> </span>
        {!! Form::text('document', null, ['class'=>'form-control mask-cpf', 'data-minlength'=>'11', 'maxlength'=>'14',
        'placeholder'=>'document','required']) !!}
    </div>
    @if ($errors->has('document'))
        <div class="help-block">
            <label class="error">{{ $errors->first('document') }}</label>
        </div>
    @endif
</div>
