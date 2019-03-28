<div class="form-group  has-feedback {{ $errors->has('name') ? ' has-error has-danger' : '' }}">
    <label for="name">Papél</label>
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-asterisk"></i> </span>
        {!! Form::text('name', null, ['class'=>'form-control', 'data-minlength'=>'4', 'maxlength'=>'150',
        'placeholder'=>'Papél','required']) !!}
    </div>
    @if ($errors->has('name'))
        <div class="help-block">
            <label class="error">{{ $errors->first('name') }}</label>
        </div>
    @endif
</div>
<div class="form-group  has-feedback {{ $errors->has('database') ? ' has-error has-danger' : '' }}">
    <label for="database">Base de Dados</label>
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-asterisk"></i> </span>
        {!! Form::text('database', null, ['class'=>'form-control', 'data-minlength'=>'4', 'maxlength'=>'150',
        'placeholder'=>'Bae de dados','required']) !!}
    </div>
    @if ($errors->has('database'))
        <div class="help-block">
            <label class="error">{{ $errors->first('database') }}</label>
        </div>
    @endif
</div>