<div class="form-group row">
    {!! Form::label('name', 'Nome Completo', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control','id' => 'name' ,'required']) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('fone', 'Telefone', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
    <div class="col-md-6">
        {!! Form::text('fone', null, ['class' => 'form-control', 'id' => 'fone', 'onkeyup' => 'mascara(this, mtel)', 'required','maxlength' => '15', 'minlength' => '14']) !!}
    </div>
</div>
{!! Form::submit('Cadastrar', ['class' => 'btn btn-success']) !!}
