<!--table phone-->
<div class="form-group">
    <button class="btn btn-sm btn-default" onclick="AddTableRowPhone(this)" type="button">
        Adicionar Telefone
    </button>
    <div class="box-body table-responsive no-padding"></div>
    <table id="table_phone" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>DDD</th>
            <th>Telefone</th>
            <th>Tipo Contato</th>
            <th>{{ trans('panel/panel.label_index_action') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data->people->contPhones as $phone)
            <tr>
                <td class="col-xs-3">
                    <div class="has-feedback {{ $errors->has('ddd') ? ' has-error has-danger' : '' }}">
                        <input class="form-control input-sm" type="text" name="ddd[]"
                               value="{{$phone->ddd}}" minlength="2" maxlength="2" required>
                    </div>
                </td>
                <td>
                    <div class="has-feedback {{ $errors->has('phone') ? ' has-error has-danger' : '' }}">
                        <input class="form-control input-sm" type="text" name="phone[]"
                               value="{{$phone->phone}}" minlength="8" maxlength="9"
                               required>
                    </div>
                </td>
                <td>
                    <select class="form-control input-sm" name="phone_type_id[]" id="phone_type_id">
                        @foreach($contTypes as $types)
                            <option value="{{$types->id}}">{{$types->name}}</option>
                        @endforeach
                    </select>
                </td>
                <td class="col-xs-1">
                    <input type="hidden" name="phone_id[]" value="{{$phone->id}}"/>
                    <input type="hidden" name="phone_person_id[]" value="{{$data->people->id}}"/>
                    <button class="btn btn-sm btn-danger"
                            onclick="RemoveTableRow(this);destroy('{{route('panel.people.employee.destroy.phone',['id'=>$phone->id])}}');"
                            type="button" title="Excluir">
                        <i class="fa fa-remove"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<!--/.phone-->

<!--table email-->
<div class="form-group">
    <button class="btn btn-sm btn-default" onclick="AddTableRowEmail(this)" type="button">
        Adicionar Email
    </button>
    <div class="box-body table-responsive no-padding"></div>
    <table id="table_email" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Email</th>
            <th>Tipo Contato</th>
            <th>{{ trans('panel/panel.label_index_action') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data->people->contEmails as $email)
            <tr>
                <td>
                    <div class="has-feedback {{ $errors->has('email') ? ' has-error has-danger' : '' }}">
                        <input class="form-control input-sm" type="email" name="email[]"
                               value="{{$email->email}}" minlength="8" maxlength="190" required>
                    </div>
                </td>
                <td>
                    <select class="form-control input-sm" name="email_type_id[]"
                            id="email_type_id{!! $email->id !!}">
                        @foreach($contTypes as $types)
                            <option value="{{$types->id}}" {!! $email->contTypes->id==$types->id?'selected':'' !!}>{{$types->name}} </option>
                        @endforeach
                    </select>
                </td>
                <td class="col-xs-1">
                    <input type="hidden" name="email_id[]" value="{{$email->id}}"/>
                    <input type="hidden" name="email_person_id[]" value="{{$data->people->id}}"/>
                    <button class="btn btn-sm btn-danger"
                            onclick="RemoveTableRow(this);destroy('{{route('panel.people.employee.destroy.email',['id'=>$email->id])}}');"
                            type="button" title="Excluir">
                        <i class="fa fa-remove"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<!--/.email-->
