<div class="form-group  has-feedback {{ $errors->has('name') ? ' has-error has-danger' : '' }}">
    <label for="fantasy_name">Nome</label>
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-asterisk"></i> </span>
        {!! Form::text('name', null, ['class'=>'form-control', 'data-minlength'=>'4', 'maxlength'=>'190',
        'placeholder'=>'Nome','required']) !!}
    </div>
    @if ($errors->has('name'))
        <div class="help-block">
            <label class="error">{{ $errors->first('name') }}</label>
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
