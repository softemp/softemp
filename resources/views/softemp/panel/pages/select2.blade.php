@extends('softemp.panel.layouts.app')

@section('title')
    Select2
    @parent
@stop

{{-- page level styles --}}
@section('page_styles')
    <link rel="stylesheet" href="{{ asset('softemp/panel/vendors/select2/css/select2.css') }}">
@stop

@section('content-header')
    <h1>
        Select 2
        <small>Tudo começa aqui</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('panel.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('panel.pages.blank')}}">Blank</a></li>
        <li class="active">Select2</li>
    </ol>
@endsection

@section('content')
    {{-- Default box --}}
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Title</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <select class="form-control select2-container" name="occupation_id[]"
                    id="occupation" multiple="multiple" required>
                    <option value="1">Select 1</option>
                    <option value="2">Select 2</option>
                    <option value="3">Select 3</option>
                    <option value="4">Select 4</option>
            </select>
        </div>
        {{-- /.box-body --}}
        <div class="box-footer">
            Footer
        </div>
        {{-- /.box-footer --}}
    </div>
    {{-- /.box --}}
@endsection

{{-- page level scripts --}}
@section('page_scripts')
    <script src="{{ asset('softemp/panel/vendors/select2/js/select2.js') }}"></script>
    {{-- page script --}}
    <script>
        $(document).ready(function() {
            $('#occupation').select2({
                placeholder: 'Selecione uma Ocupação',
                multiple: true,
                allowClear: true
            });
        });
    </script>
@stop