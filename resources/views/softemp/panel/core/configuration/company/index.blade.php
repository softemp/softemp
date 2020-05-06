@extends('softemp.panel.layouts.app')

{{-- Page title --}}
@section('title')
    Dados da Empresa
    @parent
@stop

{{-- page level styles --}}
@section('page_styles')
    <link rel="stylesheet" href="{{ asset('softemp/panel/vendors/select2/css/select2.css') }}">
@stop

{{-- Page header --}}
@section('content-header')
    <h1>
        Dados da Empresa
        <small>tudo começa aqui</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('panel.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('panel.people.index') }}">Pessoas</a></li>
        <li class="active">Company</li>
    </ol>
@stop

{{-- Page content --}}
@section('content')
    {{-- Small boxes (Stat box) --}}
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            {{-- small box --}}
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>150</h3>

                    <p>Domínios</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">Listar <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        {{--<!-- ./col --}}
        <div class="col-lg-3 col-xs-6">
            {{-- small box --}}
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>

                    <p>Pesquisas</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">Mais Informações <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        {{-- ./col --}}
        <div class="col-lg-3 col-xs-6">
            {{-- small box --}}
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>44</h3>

                    <p>Colaborador</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        {{-- ./col --}}
        <div class="col-lg-3 col-xs-6">
            {{-- small box --}}
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>65</h3>

                    <p>Unique Visitors</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        {{-- ./col --}}
    </div>
    {{-- /.row --}}

    <!-- .row -->
    <div class="row">
        <!-- left column -->
        <div class="col-md-4">
    @include('softemp.panel.core.configuration.company._editCompanyData')
        </div>
        <div class="col-md-4">
    @include('softemp.panel.core.configuration.company._editCompanyAddress')
        </div>
        <!-- /.left column -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-xs-4">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Dados da Empresa</h3>
                    <div class="pull-right">
{{--                        @can('user-store')--}}
                            <a class="btn btn-primary btn-xs"
                               href="{{ route('panel.people.company.create') }}">Novo</a>
{{--                        @endcan--}}
                    </div>
                </div>

                {{-- /.box-header --}}
                <div class="box-body">
                    {{ $data->business_name }}
{{--
                </div>
                {{-- /.box-body --}}
            </div>
            {{-- /.box --}}
        </div>
        {{-- /.col --}}
    </div>

@stop

{{-- page level scripts --}}
@section('page_scripts')
            <!-- BootstrapValidators -->
            <script src="{{ asset('softemp/panel/vendors/bootstrap-validator/js/validator.js') }}"></script>
            <script src="{{ asset('softemp/panel/vendors/select2/js/select2.js') }}"></script>
            <script src="{{ asset('softemp/panel/vendors/select2/js/i18n/pt-BR.js') }}"></script>
            <!-- page script -->
            <script>
                $('form').validator();

                $(document).ready(function () {
                    $('form').validator();
                    var country = $('#country');
                    var state = $('#state');
                    var city = $('#city');
                    var neighboarhood = $('#neighboarhood');
                    var street = $('#street');
                    state.prop("disabled", true);//desabilitar o select dos estados
                    city.prop("disabled", true);//desabilitar o select das cidades
                    neighboarhood.prop("disabled", true);//desabilitar o select dos bairros
                    street.prop("disabled", true);//desabilitar o select das ruas

                    //select dos paises
                    country.select2({
                        language: "pt-BR",
                        placeholder: 'Selecione um País',
                        allowClear: true,
                        minimumInputLength: 2,
                        //templateResult: newCountrie,
                        ajax: {
                            type: 'get',
                            dataType: 'json',
                            url: '{{ route('panel.address.country.getCountry')}}',
                            delay: 400,
                            data: function(params){
                                return {
                                    country : params.term
                                }
                            },
                            processResults: function(data){
                                state.html('').prop("disabled", true);
                                city.html('').prop("disabled", true);
                                neighboarhood.html('').prop("disabled", true);
                                street.html('').prop("disabled", true);

                                return{
                                    //newOption = new Option('cadastrar', newCountrie(), true, true);
                                    //countries.append(newOption).trigger('change');

                                    results: data.map(function(country){
                                        return {id: country.id, text: country.iso2 + ' - '+ country.name};
                                    })
                                }
                            },
                            cache: true
                        }
                    });

                    //abilitar o select dos estados
                    country.on('select2:select', function (e) {
                        state.prop("disabled", false).select2('open');
                        //state.select2('open');
                    });
                    //select dos estados
                    state.select2({
                        placeholder: 'Selecione um Estado',
                        allowClear: true,
                        minimumInputLength: 2,
                        language: "pt-BR",
                        tags: true,
                        ajax: {
                            dataType: 'json',
                            url: '{{ route('panel.address.state.getState')}}',
                            delay: 400,
                            data: function (params) {
                                return {
                                    country: country.val(),
                                    state: params.term
                                }
                            },
                            processResults: function (data) {
                                city.html('').prop("disabled", true);
                                neighboarhood.html('').prop("disabled", true);
                                street.html('').prop("disabled", true);
                                return {
                                    results: data.map(function (state) {
                                        return {id: state.id, text: state.initials + ' - '+ state.name};
                                    })
                                }
                            },
                            cache: true
                        }
                    });
                    //abilitar o select das cidades
                    state.on('select2:select', function (e) {
                        city.prop("disabled", false).select2('open');
                    });
                    //select das codades
                    city.select2({
                        placeholder: 'Selecione uma Cidade',
                        allowClear: true,
                        minimumInputLength: 2,
                        language: "pt-BR",
                        tags: true,
                        ajax: {
                            dataType: 'json',
                            url: '{{ route('panel.address.city.getCity')}}',
                            delay: 400,
                            data: function (params) {
                                return {
                                    state: state.val(),
                                    city: params.term
                                }
                            },
                            processResults: function (data) {
                                neighboarhood.html('').prop("disabled", true);
                                street.html('').prop("disabled", true);
                                return {
                                    results: data.map(function (city) {
                                        return {id: city.id, text: city.name};
                                    })
                                }
                            },
                            cache: true
                        }
                    });
                    //abilitar o select dos bairros
                    city.on('select2:select', function (e) {
                        neighboarhood.prop("disabled", false).select2('open');
                    });
                    //select dos bairros
                    neighboarhood.select2({
                        placeholder: 'Selecione um Bairro',
                        allowClear: true,
                        minimumInputLength: 2,
                        language: "pt-BR",
                        tags: true,
                        ajax: {
                            dataType: 'json',
                            url: '{{ route('panel.address.neighborhood.getNeighboarhood')}}',
                            delay: 400,
                            data: function (params) {
                                return {
                                    city: city.val(),
                                    neighboarhood: params.term
                                }
                            },
                            processResults: function (data) {
                                street.html('').prop("disabled", true);//limpa o select das ruas quando for alterado um bairro ou acima
                                return {
                                    results: data.map(function (neighboarhood) {
                                        return {id: neighboarhood.id, text: neighboarhood.name};
                                    })
                                }
                            },
                            cache: true
                        }
                    });
                    //abilitar o select das ruas
                    neighboarhood.on('select2:select', function (e) {
                        street.prop("disabled", false).select2('open');//remove o disabled e depois seleciona o select
                    });
                    //select das ruas
                    street.select2({
                        placeholder: 'Selecione uma Rua',
                        allowClear: true,
                        minimumInputLength: 2,
                        language: "pt-BR",
                        tags: true,
                        ajax: {
                            dataType: 'json',
                            url: '{{ route('panel.address.street.getStreet')}}',
                            delay: 400,
                            data: function (params) {
                                return {
                                    neighboarhood: neighboarhood.val(),
                                    street: params.term
                                }
                            },
                            processResults: function (data) {
                                return {
                                    results: data.map(function (street) {
                                        return {id: street.id, text: street.name};
                                    })
                                }
                            },
                            cache: true
                        }
                    });
                });

            </script>
    {{-- page script --}}
@stop
