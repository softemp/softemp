@extends('softemp.panel.layouts.app')

{{-- Page title --}}
@section('title')
    Provedor
    @parent
@stop

{{-- page level styles --}}
@section('page_styles')
    <link rel="stylesheet" href="{{ asset('softemp/panel/vendors/select2/css/select2.css') }}">
    <style>
        div .inner {
            height: 400px;
        }
    </style>
@stop

{{-- Page header --}}
@section('content-header')
    <h1>
        Rotas
        <small>Sistema de geolocalização para atendimento tecnico</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('panel.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('panel.provedor.index') }}"> Provedor</a></li>
        <li><a href="{{ route('panel.index') }}"> Rede</a></li>
        <li> Rota</li>
    </ol>
@stop

{{-- Page content --}}
@section('content')

    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner" id="map">
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{route('panel.provedor.mkauth.client.index')}}" class="small-box-footer">Listar <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Selecione os clientes</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">

            <div id="panel">
                <div class="form-group">
                    {!! Form::select('coordenadas[]', $clients , null ,['class' => 'form-control select2-container',
                         'nome' => 'coordenadas', 'multiple' => 'multiple','id'=>'setSelect', 'onchange'=>'initMap(this)']) !!}
                </div>
                <label>
                    <input class="" type="checkbox" id="suppressPolylines" onclick="changeOption(this)"> Remover Trajeto
                </label>
                <br>
                <label>
                    <input type="checkbox" id="draggable" onclick="changeOption(this)"> Mover Marcador
                </label>
                <br>
                <label>
                    <input type="checkbox" id="suppressMarkers" onclick="changeOption(this)"> Remover Marcador
                </label>
                <br>
                <p>Total Distance: <span id="total"></span></p>
            </div>

        </div>
        <!-- /.box-body -->
        <div class="box-footer" id="right-panel">
            Dados da para navegação
        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->

@stop

{{-- page level scripts --}}
@section('page_scripts')
    <!-- Select2 -->
    <script src="{{ asset('softemp/panel/vendors/select2/js/select2.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAn_BXBGgcA_CCj7wp2T9_ff7l9xwXS0KA"></script>
    <script>
        $("#setSelect").select2({
            placeholder: 'Selecione um cliente',
            multiple: true,
        });

        var directionsDisplay;
        var directionsService = new google.maps.DirectionsService;
        var map;
        var time;
        var pointA = new google.maps.LatLng(-28.102934, -48.671696);
        var pointB = new google.maps.LatLng(-28.102830, -48.671439);

        function initMap(destination = null) {

            var waypts = [];
            var checkboxArray;
            if (destination) {
                checkboxArray = destination;
            } else {
                checkboxArray = []
            }

            for (var i = 0; i < checkboxArray.length; i++) {
                if (checkboxArray.options[i].selected) {
                    waypts.push({
                        location: checkboxArray[i].value,
                        stopover: true
                    });
                }
            }

            var rendererOptions = {
                map: map,
                draggable: false,
                panel: document.getElementById('right-panel'),
            };
            directionsDisplay = new google.maps.DirectionsRenderer(rendererOptions);

            // Create a map and center it on pointA.
            var mapOptions = {
                panControl: true,
                zoomControl: true,
                mapTypeControl: true,
                scaleControl: true,
                streetViewControl: true,
                overviewMapControl: true,
                rotateControl: true,
                zoom: 12,
                center: pointA  // GBit.
            };
            map = new google.maps.Map(document.getElementById('map'), mapOptions);
            directionsDisplay.setMap(map);

            if (destination) {
                displayRoute(destination.value, waypts);
            }
            directionsDisplay.addListener('directions_changed', function () {
                computeTotalDistance(directionsDisplay.getDirections());
            });
        }

        function displayRoute(destination, waypts) {
            var request = {
                origin: pointA,
                waypoints: waypts,
                destination: pointB,
                optimizeWaypoints: true,
                travelMode: google.maps.TravelMode['DRIVING'],
                avoidTolls: true
            };
            directionsService.route(request, function (response, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    directionsDisplay.setDirections(response);
                } else {
                    console.log("algo deu errado: " + status);
                }
            });
        }

        function changeOption(el) {
            var options = {};
            options[el.id] = el.checked;
            directionsDisplay.setOptions(options);
            directionsDisplay.setMap(map);
        }

        function makeDraggable() {
            directionsDisplay.setOptions({
                draggable: false
            });
            // this "refreshes" the renderer
            directionsDisplay.setMap(map);
        }

        /**
         * imprime as distancias e as rotas
         *
         * @param result
         */
        function computeTotalDistance(result) {
            var total = 0;
            var myroute = result.routes[0];
            for (var i = 0; i < myroute.legs.length; i++) {
                total += myroute.legs[i].distance.value;
            }
            total = total / 1000;
            document.getElementById('total').innerHTML = total + ' km';
        }
       initMap();
    </script>
@stop
