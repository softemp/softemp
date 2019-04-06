<div class="form-group row">
    {{Form::label('name', 'Nome/Modelo do equipamento', ['class' => ['col-md-4', 'col-form-label', 'text-md-right']])}}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control', 'name' => 'name', 'required', 'minlength' => '5', 'maxlength'=> '50', 'placeholder' => 'Digite um modelo de equipamento']) !!}
    </div>
</div>
{!! Form::submit('Alterar', ['class' => 'btn btn-success']) !!}
