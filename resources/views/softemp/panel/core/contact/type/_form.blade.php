<div class="form-group  has-feedback {{ $errors->has('name') ? ' has-error has-danger' : '' }}">
    <label for="name">Tipo de Contato</label>
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-asterisk"></i> </span>
        {!! Form::text('name', null, ['class'=>'form-control', 'data-minlength'=>'4', 'maxlength'=>'150',
        'placeholder'=>'Tipo do Contato','required']) !!}
    </div>
    @if ($errors->has('name'))
        <div class="help-block">
            <label class="error">{{ $errors->first('name') }}</label>
        </div>
    @endif
</div>