<!-- general form elements -->
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Alterar Dados da Empresa</h3>
    </div>
    <!-- /.box-header -->

    <!-- form start -->
{!! Form::model($data, ['route'=>['panel.configuration.company.updateData', $data->id],
'method'=>'put', 'role'=>'form', 'data-toggle'=>"validator"]) !!}
<!-- box-body -->
    <div class="box-body">
        <div class="form-group  has-feedback {{ $errors->has('fantasy_name') ? ' has-error has-danger' : '' }}">
            <label for="fantasy_name">Nome Fantasia</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-asterisk"></i> </span>
                {!! Form::text('fantasy_name', null, ['class'=>'form-control', 'data-minlength'=>'4', 'maxlength'=>'150',
                'placeholder'=>'Nome Fantasia','required']) !!}
            </div>
            @if ($errors->has('fantasy_name'))
                <div class="help-block">
                    <label class="error">{{ $errors->first('fantasy_name') }}</label>
                </div>
            @endif
        </div>
        <div class="form-group  has-feedback {{ $errors->has('business_name') ? ' has-error has-danger' : '' }}">
            <label for="business_name">Razão Social</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-asterisk"></i> </span>
                {!! Form::text('business_name', null, ['class'=>'form-control', 'data-minlength'=>'4', 'maxlength'=>'150',
                'placeholder'=>'Razão Social','required']) !!}
            </div>
            @if ($errors->has('business_name'))
                <div class="help-block">
                    <label class="error">{{ $errors->first('business_name') }}</label>
                </div>
            @endif
        </div>
        <div class="form-group  has-feedback {{ $errors->has('document') ? ' has-error has-danger' : '' }}">
            <label for="document">CNPJ</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-asterisk"></i> </span>
                {!! Form::text('document', null, ['class'=>'form-control', 'data-minlength'=>'13', 'maxlength'=>'13',
                'placeholder'=>'CNPJ','required']) !!}
            </div>
            @if ($errors->has('document'))
                <div class="help-block">
                    <label class="error">{{ $errors->first('document') }}</label>
                </div>
            @endif
        </div>
        <div class="form-group  has-feedback {{ $errors->has('document_2') ? ' has-error has-danger' : '' }}">
            <label for="document_2">IE</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-asterisk"></i> </span>
                {!! Form::text('document_2', null, ['class'=>'form-control', 'placeholder'=>'IE']) !!}
            </div>
            @if ($errors->has('document_2'))
                <div class="help-block">
                    <label class="error">{{ $errors->first('document_2') }}</label>
                </div>
            @endif
        </div>
        <div class="form-group  has-feedback {{ $errors->has('document_3') ? ' has-error has-danger' : '' }}">
            <label for="document_3">IM</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-asterisk"></i> </span>
                {!! Form::text('document_3', null, ['class'=>'form-control', 'placeholder'=>'IM']) !!}
            </div>
            @if ($errors->has('document_3'))
                <div class="help-block">
                    <label class="error">{{ $errors->first('document_3') }}</label>
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

