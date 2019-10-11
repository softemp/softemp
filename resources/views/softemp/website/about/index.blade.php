@extends('softemp.website.layouts.app')

{{-- Page title --}}
@section('title')
    Sobre
    @parent
@stop

@section('styles_css')
    <link href="{{ asset('softemp/website/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.css') }}" rel="stylesheet">
    <link href="{{ asset('softemp/website/vendors/animate/animate.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('softemp/website/css/aboutus.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <!-- Container Section Start -->
    <div class="container">
        <!-- About Us Section Start -->
    <!-- image Section Start -->
        <div class="services">
            <h2 class="w-100">
                <label class="border-bottom">{{$about->title}}</label>
            </h2>
        </div>

        <div class="row">
            @if($about->img)
            <div class="col-md-6">
                <div class="item martop1 wow bounceInLeft" data-wow-duration="4s">
                    <img src="{{ asset($pathImg.$about->img) }}" alt="Sobre nós" class="img-fluid">
{{--                    <img src="{{ asset('softemp/website/img/temp/banner_index/b1.png') }}" alt="Sobre nós" class="img-fluid">--}}
                </div>
            </div>
            @endif
            <!-- //Image Section End -->
            <!-- About Us Section Start -->
            <div class="col-md-12 wow lightSpeedIn" data-wow-duration="5s">
                <div class="text-left">
                    <p class="pad-top7">
                        {!! $about->description !!}
                    </p>
                </div>
            </div>
        </div>
        <!-- //About Us Section End -->
        <!-- Testimonial Section Start -->
        <div class="row marg-btm10">
            <!-- Testimonial  Section Start -->
            <div class="col-md-6 wow fadeInLeft" data-wow-duration="4s">
                <h3 class="aboutus-testimonals">Testimonials</h3>
                <p class="para_text">"Squid cliche authentic cred disrupt gastropub. Odd Future fingerstache bitters
                    twee. Hella Wes Anderson seitan tofu beard mixtape occupy. Thundercats kogi Odd Future organic
                    Schlitz dreamcatcher. 90's salvia kitsch banjo. Try-hard master cleanse Neutra, roof party YOLO next
                    level Austin vinyl normcore +1 Banksy food truck asymmetrical Vice High Life. Letterpress Carles
                    Bushwick flannel bespoke.Locavore Truffaut meggings, master cleanse single-origin coffee salvia
                    tilde fixie cronut Portland Tumblr asymmetrical jean shorts Neutra. Odd Future farm-to-table deep v
                    mumblecore. Put a bird on it flexitarian tousled post-ironic lo-fi. "
                </p>
                <div class="test_image_left">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="{{ asset('softemp/website/img/temp/d3.jpg') }}" alt="image"
                                     style="border-radius:50%; width:100px; height:100px;">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><i>Lina Doe</i></h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //Testimonial  Section End -->
            <!-- Our Skills Section Start -->
            <div class="col-md-6">
                <h3 class="aboutus-ourskills">Nossas Qualificações</h3>
                <div class="task-item">
                    Atendimento ao Cliente
                    <div class="progress">
                        <div class="progress-bar six-sec-ease-in-out" role="progressbar" data-transitiongoal="70"></div>
                    </div>
                </div>
                Suporte Tecnico
                <div class="progress">
                    <div class="progress-bar bg-success six-sec-ease-in-out" role="progressbar"
                         data-transitiongoal="65"></div>
                </div>
                Indicação
                <div class="progress">
                    <div class="progress-bar bg-info six-sec-ease-in-out" role="progressbar"
                         data-transitiongoal="75"></div>
                </div>
                Agilidade no atendimento
                <div class="progress">
                    <div class="progress-bar  bg-warning six-sec-ease-in-out" role="progressbar"
                         data-transitiongoal="70"></div>
                </div>
                Banda Contratada
                <div class="progress">
                    <div class="progress-bar bg-danger six-sec-ease-in-out" role="progressbar"
                         data-transitiongoal="100"></div>
                </div>
            </div>
            <!-- //Our Skills Section End -->
        </div>
        <!-- //Testimonial Section End -->
    </div>
    <!-- //Container Section Start -->
@endsection

@section('footer')
    <!-- Meet Our Team Section Start -->
    <div class="team-bg">
        <div class="container">
            <div class="about-headings">
                <h3>Meet Our Team</h3>
                <h5 class="">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </h5>
            </div>
            <!-- //Meet Our Team Section End -->
            <!-- Team Images Section Start -->
            <div class="team">
                <!-- Ceo Section Start -->
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-sm-6 wow slideInUp" data-wow-duration="4s">
                        <div data-position="left" data-offset="100" class="notViewed animBlock">
                            <img src="{{ asset('softemp/website/img/temp/profile1.jpg') }}" class="img-fluid">
                            <h4><b>Lina Doe</b></h4>
                            <h5><b class="ceo-text">Chief Executive Officer / CEO</b></h5>
                            <br/>
                            <p>Dark single shot fair trade coffee single origin iced, americano cortado pumpkin spice
                                cortado crema chicory. In, affogato variety coffee cultivar aged filter. </p>
                        </div>
                    </div>
                    <!-- //Ceo Section End -->
                    <!-- Director Section Start -->
                    <div class="col-md-3 col-sm-6 col-sm-6 wow zoomIn" data-wow-duration="4s">
                        <div data-position="right" data-offset="50" class="notViewed animBlock">
                            <img src="{{ asset('softemp/website/img/temp/profile2.jpg') }}" class="img-fluid">
                            <h4><b>Carles Puyol</b></h4>
                            <h5><b>Managing Director</b></h5>
                            <br/>
                            <p>Dark single shot fair trade coffee single origin iced, americano cortado pumpkin spice
                                cortado crema chicory. In, affogato variety coffee cultivar aged filter. </p>
                        </div>
                    </div>
                    <!-- //Director Section End -->
                    <!-- Designer Section Start -->
                    <div class="col-md-3 col-sm-6 col-sm-6 wow zoomIn" data-wow-duration="4s">
                        <div data-position="left" data-offset="50" class="notViewed animBlock">
                            <img src="{{ asset('softemp/website/img/temp/profile3.jpg') }}" class="img-fluid">
                            <h4><b>Jonathan Smith</b></h4>
                            <h5><b>Web Designer</b></h5>
                            <br/>
                            <p>Dark single shot fair trade coffee single origin iced, americano cortado pumpkin spice
                                cortado crema chicory. In, affogato variety coffee cultivar aged filter. </p>
                        </div>
                    </div>
                    <!-- //Designer Section End -->
                    <!-- Developer Section Start -->
                    <div class="col-md-3 col-sm-6 col-sm-6 wow slideInUp" data-wow-duration="4s">
                        <div data-position="right" data-offset="100" class="notViewed animBlock">
                            <img src="{{ asset('softemp/website/img/temp/profile4.jpg') }}" class="img-fluid">
                            <h4><b>Ericson Reagan</b></h4>
                            <h5><b>Web Developer</b></h5>
                            <br/>
                            <p>Dark single shot fair trade coffee single origin iced, americano cortado pumpkin spice
                                cortado crema chicory. In, affogato variety coffee cultivar aged filter. </p>
                        </div>
                    </div>
                    <!-- //Developer Section End -->
                </div>
            </div>
        </div>
    </div>
    <!-- //Meet Our Team Section End -->
@endsection

@section('scripts_js')
    <script src="{{ asset('softemp/website/vendors/bootstrap-progressbar/js/bootstrap-progressbar.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('softemp/website/vendors/wow/js/wow.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('softemp/website/js/scrollview.js') }}" type="text/javascript"></script>
    <script src="{{ asset('softemp/website/js/aboutus.js') }}" type="text/javascript"></script>
@endsection
