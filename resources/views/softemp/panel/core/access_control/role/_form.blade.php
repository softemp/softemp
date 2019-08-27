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
<div class="form-group  has-feedback {{ $errors->has('description') ? ' has-error has-danger' : '' }}">
    <label for="description">Descrição</label>
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-asterisk"></i> </span>
        {!! Form::text('description', null, ['class'=>'form-control', 'data-minlength'=>'4', 'maxlength'=>'191',
        'placeholder'=>'Descrição do Papél']) !!}
    </div>
    @if ($errors->has('description'))
        <div class="help-block">
            <label class="error">{{ $errors->first('description') }}</label>
        </div>
    @endif
</div>