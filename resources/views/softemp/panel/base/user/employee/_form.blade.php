<div class="form-group  has-feedback {{ $errors->has('name') ? ' has-error has-danger' : '' }}">
    <label for="name">Nome</label>
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-asterisk"></i> </span>
        {!! Form::text('name', null, ['class'=>'form-control', 'data-minlength'=>'4', 'maxlength'=>'190',
        'placeholder'=>'Nome completo','required']) !!}
    </div>
    @if ($errors->has('name'))
        <div class="help-block">
            <label class="error">{{ $errors->first('name') }}</label>
        </div>
    @endif
</div>
<div class="form-group  has-feedback {{ $errors->has('cpf') ? ' has-error has-danger' : '' }}">
    <label for="cpf">CPF</label>
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-asterisk"></i> </span>
        {!! Form::text('cpf', null, ['class'=>'form-control', 'data-minlength'=>'11', 'maxlength'=>'11',
        'placeholder'=>'CPF','required']) !!}
    </div>
    @if ($errors->has('cpf'))
        <div class="help-block">
            <label class="error">{{ $errors->first('cpf') }}</label>
        </div>
    @endif
</div>
<div class="form-group  has-feedback {{ $errors->has('email') ? ' has-error has-danger' : '' }}">
    <label for="email">Email</label>
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-asterisk"></i> </span>
        {!! Form::text('email', null, ['class'=>'form-control', 'data-minlength'=>'5',
        'placeholder'=>'email','required']) !!}
    </div>
    @if ($errors->has('email'))
        <div class="help-block">
            <label class="error">{{ $errors->first('email') }}</label>
        </div>
    @endif
</div>