@extends('softemp.website.layouts.app')

@section('styles_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('softemp/website/css/contact.css') }}">
@endsection

@section('content')
    <!-- Map Section Start -->
    <div class="container">
        <div class="services">
            <h2>
                <label class="border-bottom">Entre em contato</label>
            </h2>
        </div>
    </div>
    <div class="" style="margin-top:2px;">
        <div id="map" style="width:100%; height:500px;"></div>
    </div>
    <!-- //Map Section Start -->
@endsection

@section('footer')
    <!--  Container Form Section Start -->
    <div class="container contactspage">
        <!-- Row Section Start -->
        <div class="row">
            <!-- Contact Form Section Start -->
            <div class="col-md-9">
                <h3>Formulário de Contato</h3>
                <!-- Notifications -->
                @include('softemp.website.notifications')

                <form id="contact" action="{{ route('website.contact.index') }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="input-group">
                        <label>Nome</label>
                        <input type="text" name="contact-name" class="form-control" required>
                    </div>
                    <div class="input-group">
                        <label>E-mail:</label>
                        <input type="email" name="contact-email" class="form-control" required>
                    </div>
                    <div class="input-group">
                        <label>Mensagem:</label>
                        <textarea name="contact-msg" class="form-control" rows="5" required></textarea>
                    </div>
                    <div class="input-group">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                        <button type="reset" class="btn btn-danger">Limpar</button>

                    </div>
                </form>
            </div>
            <!-- //Contact Form Section End -->
            <!-- Address Section Start -->
            <div class="col-md-3 addr">
                <h3>Nosso Endereço</h3>
                <h5><b>Loop, Inc.</b></h5>
                <p> Gieringer Robert E MD 2751 Debarr Rd #320 Anchorage, AK(Alaska) 99508
                    <br>P:  (907) 563-3232 </p>
                <h5><b>E-mail:</b> <a href="mailto:">Info@domain.com</a></h5>
                <h3>About Us</h3>
                <h5>I'm talking about something more substantial.</h5>
                <ul>
                    <li><i class="fa fa-arrow-right"></i>&nbsp;Lorem ipsum dolor sit amet</li>
                    <li><i class="fa fa-arrow-right"></i>&nbsp;Lorem ipsum dolor sit amet</li>
                    <li><i class="fa fa-arrow-right"></i>&nbsp;Lorem ipsum dolor sit amet</li>
                    <li><i class="fa fa-arrow-right"></i>&nbsp;Lorem ipsum dolor sit amet</li>
                </ul>
            </div>
            <!-- //Address Section End -->
        </div>
        <!-- //Row Section End -->
    </div>
    <!-- //Container Section End -->
@endsection

@section('scripts_js')
    <script>
        var map;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -34.397, lng: 150.644},
                zoom: 8
            });
        }
    </script>
{{--    <script src="http://maps.google.com/maps/api/js?key=AIzaSyBERTtkj-XSQv-GSukC1fozzTfk7h7LO0c"></script>--}}
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBERTtkj-XSQv-GSukC1fozzTfk7h7LO0c&callback=initMap" async defer></script>
{{--    <script src="{{ asset('softemp/website/js/gmap.js') }}" type="text/javascript"></script>--}}
@endsection
