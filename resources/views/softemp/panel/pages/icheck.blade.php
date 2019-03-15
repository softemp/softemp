@extends('softemp.panel.layouts.app')

@section('title')
    Icheck
    @parent
@stop

{{-- page level styles --}}
@section('page_styles')
    <link rel="stylesheet" href="{{ asset('softemp/panel/vendors/icheck/skins/all.css') }}">
@stop

@section('content-header')
    <h1>
        Icheck
        <small>Tudo começa aqui</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('panel.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('panel.pages.blank')}}">Blank</a></li>
        <li class="active">Icheck</li>
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
            <div class="form-group">
            <label for="icheck1">Icheck</label>
            <input type="checkbox" id="icheck1">
            </div>
            <div class="form-group">
            <label for="icheck2">Icheck</label>
            <input type="checkbox" id="icheck2">
            </div>
            <div class="form-group">
            <label for="icheck3">Icheck</label>
            <input type="checkbox" id="icheck3">
            </div>
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
    <script src="{{ asset('softemp/panel/vendors/icheck/icheck.js') }}"></script>
    {{-- page script --}}
    <script>
        $(document).ready(function() {
            $('input[type="checkbox"]#icheck1').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
            $('input[type="checkbox"]#icheck2').iCheck({
                checkboxClass: 'icheckbox_minimal-red',
                radioClass   : 'iradio_minimal-red',
                increaseArea: '20%' // optional
            });
            $('input[type="checkbox"]#icheck3').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass   : 'iradio_flat-green',
                increaseArea: '20%' // optional
            });
        });
    </script>
@stop