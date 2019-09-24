@extends('softemp.website.layouts.app')

{{-- Page title --}}
@section('title')
    Home
    @parent
@stop

{{-- page level styles --}}
@section('styles_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('softemp/website/vendors/owl.carousel/css/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('softemp/website/vendors/owl.carousel/css/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('softemp/website/vendors/ihover/ihover.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('softemp/website/vendors/animate/animate.min.css') }}"/>
    <style>
        .owl-carousel .item .item-caption {
            position: absolute;
            bottom: 10%;
            left: 5%;
            color: #ffffff;
            font-size: 16px;
            z-index: 0;
            background:rgba(0, 0, 0, 0.25);
        }

        .owl-carousel .item .item-caption h3.title{
            font-size: 36px;
            color: #000000;
            font-weight: bold;
            padding: 0px 10px;
        }

        .owl-carousel .item .item-caption a:hover{
            color: #00a65a;
        }

        .item h1 {
            font-size: 36px;
            line-height: 110%;
            font-weight: 900;
            letter-spacing: .05em;
            text-transform: uppercase;
            margin-bottom: 0;
            -webkit-transition: font 200ms ease-out;
            -moz-transition: font 200ms ease-out;
            -o-transition: font 200ms ease-out;
            transition: font 200ms ease-out;
        }
        .item p {
            font-size: 18px;
            line-height: 150%;
            font-weight: 400;
            letter-spacing: .015em;
            text-transform: none;
            margin-top: 20px;
            margin-bottom: 0;
            -webkit-transition: font 200ms ease-out, margin 200ms ease-out;
            -moz-transition: font 200ms ease-out, margin 200ms ease-out;
            -o-transition: font 200ms ease-out, margin 200ms ease-out;
            transition: font 200ms ease-out, margin 200ms ease-out;
        }
    </style>
@stop

{{-- Page content --}}
@section('content')
    <!-- Carousel Section Start -->
    <div id="owl-demo" class="owl-carousel owl-theme">
        {{--@foreach($bannersHome as $banner)--}}
            {{--<div class="item">--}}
                {{--<img src="{{ asset($pathImg.$banner->img_background) }}" alt="slider-image" class="img-fluid">--}}
                {{--<div class="item-caption">--}}
                    {{--<h3 class="title"> rtn yryrt ytr ybtry tryr </h3>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--@endforeach--}}
        <div class="item">
            <img src="{{ asset('softemp/website/img/temp/banner_index/b1.png') }}" alt="slider-image" class="img-fluid" width="" height="">
            <div class="item-caption">
                <h3 class="title"> rtn yryrt ytr ybtry tryr </h3>
            </div>
        </div>
        <div class="item">
            <img src="{{ asset('softemp/website/img/temp/banner_index/b2.png') }}" alt="slider-image" class="img-fluid">
            <div class="item-caption">
                <h2 class="subtitle"> Teste ddddddddd234 5234 5 25 23dddde </h2>
            </div>
        </div>
        <div class="item">
            <img src="{{ asset('softemp/website/img/temp/banner_index/b3.png') }}" alt="slider-image" class="img-fluid">
            <div class="container item-caption">
                <div class="caption vertical-center text-center">
                    <h1 class="">Made for Designers</h1>
                    <p class="">Create your online portfolio in minutes with the professionally and lovingly designed REEN website template. Customize your site with versatile and easy to use features.</p>
                    <div class="">
                        <a href="#" class="btn btn-danger">Get started now</a>
                    </div><!-- /.fadeIn -->
                </div><!-- /.caption -->
            </div><!-- /.container -->
        </div>
        <div class="item">
            <img src="{{ asset('softemp/website/img/temp/banner_index/b4.png') }}" alt="slider-image" class="img-fluid">
        </div>
        <div class="item">
            <img src="{{ asset('softemp/website/img/temp/banner_index/b5.png') }}" alt="slider-image" class="img-fluid">
        </div>
    </div>
    <!-- //Carousel Section End -->
    <!-- Container Section Start -->
    <div class="container">
        <!-- Recent works Section Start -->
        <div class="services">
            <h3>
                <label class="border-bottom">Trabalhos recentes</label>
            </h3>
            <div class="row rcnt-wrk">
                <div class="col-12 col-md-6 col-sm-12 col-lg-3 column-padding-remove">
                    <div class="ih-item square colored effect13 left_to_right">
                        <a href="#">
                            <div class="img wow bounceInLeft" data-wow-duration="3s"><img
                                        src="{{ asset('softemp/website/img/temp/recent_works/1.jpg') }}" class="img-fluid"></div>
                            <div class="info">
                                <h3>Macaroon jujubess</h3>
                                <p>consectetur adipiscing elit</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-sm-12 col-lg-3 column-padding-remove">
                    <div class="ih-item square colored effect13 left_to_right">
                        <a href="#">
                            <div class=" wow bounceInRight" data-wow-duration="3s" data-wow-delay="1.2s"><img
                                        src="{{ asset('softemp/website/img/temp/recent_works/2.jpg') }}" class="img-fluid"></div>
                            <div class="info">
                                <h3>Macaroon sweet roll </h3>
                                <p>consectetur adipiscing elit</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-sm-12 col-lg-3 column-padding-remove">
                    <div class="ih-item square colored effect13 left_to_right">
                        <a href="#">
                            <div class=" wow bounceInLeft" data-wow-duration="3s" data-wow-delay="1.2s"><img
                                        src="{{ asset('softemp/website/img/temp/recent_works/3.jpg') }}" class="img-fluid"></div>
                            <div class="info">
                                <h3>Explorations take root</h3>
                                <p>consectetur adipiscing elit</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-sm-12 col-lg-3 column-padding-remove">
                    <div class="ih-item square colored effect13 left_to_right">
                        <a href="#">
                            <div class="wow bounceInRight" data-wow-duration="3s" data-wow-delay="1.2s"><img
                                        src="{{ asset('softemp/website/img/temp/recent_works/4.jpg') }}" class="img-fluid"></div>
                            <div class="info">
                                <h3>Emerged consciousness </h3>
                                <p>consectetur adipiscing elit</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row rcnt-wrk">
                <div class="col-12 col-md-6 col-sm-12 col-lg-3 column-padding-remove">
                    <div class="ih-item square colored effect13 right_to_left">
                        <a href="#">
                            <div class=" wow  bounceInLeft" data-wow-duration="3s" data-wow-delay="1.2s"><img
                                        src="{{ asset('softemp/website/img/temp/recent_works/5.jpg') }}" class="img-fluid"></div>
                            <div class="info">
                                <h3>Finite but unbounded</h3>
                                <p>consectetur adipiscing elit</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-sm-12 col-lg-3 column-padding-remove">
                    <div class="ih-item square colored effect13 right_to_left">
                        <a href="#">
                            <div class=" wow  bounceInRight" data-wow-duration="3s" data-wow-delay="1.2s"><img
                                        src="{{ asset('softemp/website/img/temp/recent_works/6.jpg') }}" class="img-fluid"></div>
                            <div class="info">
                                <h3>Sea of Tranquility</h3>
                                <p>consectetur adipiscing elit</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-sm-12 col-lg-3 column-padding-remove">
                    <div class="ih-item square colored effect13 right_to_left">
                        <a href="#">
                            <div class=" wow  bounceInLeft" data-wow-duration="3s" data-wow-delay="1.2s"><img
                                        src="{{ asset('softemp/website/img/temp/recent_works/7.jpg') }}" class="img-fluid"></div>
                            <div class="info">
                                <h3>Might want to play</h3>
                                <p>consectetur adipiscing elit</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-sm-12 col-lg-3 column-padding-remove">
                    <div class="ih-item square colored effect13 right_to_left">
                        <a href="#">
                            <div class="wow  bounceInRight" data-wow-duration="3s" data-wow-delay="1.2s"><img
                                        src="{{ asset('softemp/website/img/temp/recent_works/8.jpg') }}" class="img-fluid"></div>
                            <div class="info">
                                <h3>How hard is it to</h3>
                                <p>consectetur adipiscing elit</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- //Recent works Section End -->
        <div class="row">
            <!-- Multipurpose Section Start -->
            <div class="col-sm-4 col-md-4 col-lg-4 col-12 wow bounceInLeft" data-wow-duration="5s">
                <div class="box">
                    <div class="info">
                        <h3 class="success">Multipurpose Template</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti atque, tenetur quam
                            aspernatur corporis at explicabo nulla dolore necessitatibus doloremque exercitationem sequi
                            dolorem architecto perferendis quas aperiam debitis dolor soluta!</p>
                        <div class="text-right primary"><a href="#">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //Multipurpose Section End -->
            <!-- Well Documented Section Start -->
            <div class="col-sm-4 col-md-4 col-lg-4 col-12 wow bounceIn" data-wow-duration="3s" data-wow-delay="2s">
                <div class="box">
                    <div class="info">
                        <h3 class="text-primary">Well Documented</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti atque, tenetur quam
                            aspernatur corporis at explicabo nulla dolore necessitatibus doloremque exercitationem sequi
                            dolorem architecto perferendis quas aperiam debitis dolor soluta!.</p>
                        <div class="text-right primary"><a href="#">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //Well Documented Section Start -->
            <!-- Responsive Design Section Start -->
            <div class="col-sm-4 col-md-4 col-lg-4 col-12 wow bounceInRight" data-wow-duration="5s">
                <div class="box">
                    <div class="info">
                        <h3 class="warning">Responsive Design</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti atque, tenetur quam
                            aspernatur corporis at explicabo nulla dolore necessitatibus doloremque exercitationem sequi
                            dolorem architecto perferendis quas aperiam debitis dolor soluta!</p>
                        <div class="text-right primary"><a href="#">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //Responsive Design Section End -->
        </div>
        <!-- Text-bg Section Start -->
        <div class="row">
            <div class="col-sm-12 col-12 col-lg-12 col-md-12 text-center">
                <div class="left_text_box wow bounceIn" data-wow-duration="5s">
                    <h3>Chandra-The Most Complete Popular Admin & Frontend Theme</h3> Lorem Ipsum is simply dummy text
                    of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text
                    ever since the 1500s.
                    <br/>
                    <div class="anim">
                        <div class="btn btn-primary btn-lg"><a href="#">PURCHASE NOW</a></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //TYxt-bg Section End -->
        <!-- Services Heading Section Start -->
        <div class="row services">
            <h3 class="w-100">
                <label class="border-bottom ">Services
                </label>
            </h3>
        </div>
        <!-- //Services Heading Section End -->
        <!-- Services Section Start -->
        <div class="row">
            <!-- Web Design Section Start -->
            <div class="col-md-4 col-lg-4 col-sm-12 col-12 wow bounceInLeft" data-wow-duration="5s">
                <h4 class="primary"><i class="fa fa-desktop"></i>&nbsp;&nbsp;Web Design</h4>
                <p class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                    Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took
                    a galley of type and scrambled it to make a type specimen book. It has survived not only five
                    centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
            </div>
            <!-- //Web Design Section End-->
            <!-- Graphic Design -->
            <div class="col-md-4 col-lg-4 col-sm-12 col-12 wow bounceInUp" data-wow-duration="3s" data-wow-delay="2s">
                <h4 class="primary"><i class="fa fa-pencil-square-o"></i>&nbsp;&nbsp;Graphic Design</h4>
                <p class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                    Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took
                    a galley of type and scrambled it to make a type specimen book. It has survived not only five
                    centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
            </div>
            <!-- //Graphic Design End -->
            <!-- Internet Marketing Section Start  -->
            <div class="col-md-4 col-lg-4 col-sm-12 col-12   wow bounceInRight" data-wow-duration="5s">
                <h4 class="primary"><i class="fa fa-briefcase"></i>&nbsp;&nbsp;Internet Marketing</h4>
                <p class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                    Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took
                    a galley of type and scrambled it to make a type specimen book. It has survived not only five
                    centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
            </div>
            <!-- //Internet Marketing Section End -->
        </div>
        <!-- //Services Section End -->
    </div>
    <!-- Features Section Start -->
    <div class="light-bg">
        <div class="container">
            <div class="row services">
                <h3 class="w-100">
                    <label class="border-bottom">Características
                    </label>
                </h3>
                <!-- Features Image Section Start -->
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 wow bounceInLeft" data-wow-duration="5s">
                            <div id="devices" data-position="left" class="notViewed animBlock">
                                <div class="c1_image">
                                    <img src="{{ asset('softemp/website/img/temp/c1.png') }}" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <!-- //Features Image Section End -->
                        <!-- Paragraph Text Section Start -->
                        <div class="col-md-6 col-sm-6 wow bounceInRight" data-wow-duration="5s">
                            <div id="devicesTxt" data-position="right" class="notViewed animBlock">
                                <div class="lorem_heading">
                                    <h4><b>Lorem ipsum</b></h4>
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown printer took a galley of type and scrambled it to make a type specimen
                                        book.
                                        It has survived not only five centuries, but also the leap into electronic
                                        typesetting, remaining essentially unchanged. It was popularised in the 1960s
                                        with
                                        the release of Letraset sheets containing Lorem Ipsum passages, and more
                                        recently
                                        with desktop publishing software like Aldus PageMaker including versions of
                                        Lorem
                                        Ipsum.</p>
                                    <span class="btn btn-primary button"><a href="#">Read more</a></span>
                                </div>
                            </div>
                        </div>
                        <!-- //Paragraph Text Section End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //Features Section End -->
@endsection

@section('footer')
    <!-- Meet Our Team Section Start -->
    <div class="team-bg">
        <div class="container">
            <div class="about-headings">
                <h3>Conheça nosso time</h3>
                <h5 class="">São esta pessoas que fazem com que o nosso serviço seja o mais bem qualificado da
                    região. </h5>
            </div>
            <!-- //Meet Our Team Section End -->
            <!-- Team Images Section Start -->
            <div class="team">
                <!-- Ceo Section Start -->
                <div class="row">
                    <div class="col-12 col-md-6  col-sm-6 col-lg-3 wow slideInUp" data-wow-duration="1s">
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
                    <div class="col-12 col-md-6  col-sm-6 col-lg-3 wow zoomIn" data-wow-duration="1s">
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
                    <div class="col-12 col-md-6  col-sm-6 col-lg-3 wow zoomIn" data-wow-duration="1s">
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
                    <div class="col-12 col-md-6  col-sm-6 col-lg-3 wow slideInUp" data-wow-duration="1s">
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
    <!-- //Meet our Team Section End -->
    <!-- Testimonial Section Start -->
    <div class="container services marg-btm10">
        <h3>
            <label class="border-bottom">Depoimentos</label>
        </h3>
        <!-- John Deo Section Start -->
        <div class="row">
            <div class="col-sm-6 wow rollIn" data-wow-duration="3s">
                <div data-position="left" class="notViewed animBlock">
                    <div class="testimonial">
                        <p>Everybody dance NOW. I hear the jury's still out on science. Mission Accomplished. Buster's
                            in what we like to call a light to no coma. In laymans terms, it might be considered a very
                            heavy nap. But where did the lighter fluid come from? I should be in this Poof.Coo coo ca
                            chaw. Coo coo ca chaw. Coo coo ca chaw. No, no, it's pronounced a-nal-ra-pist. It wasn't
                            really the pronunciation that bothered me. I believe you will find the dessert to be both
                            engrossing and high-grossing! So we don't get dessert? Touché, Pandora. A Colombian cartel
                            that WON'T kidnap and kill you.
                        </p>
                    </div>
                </div>
                <div class="media testimonal-media">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object" src="{{ asset('softemp/website/img/temp/d2.jpg') }}" alt="image"
                                 style="border-radius:50%; width:100px; height:100px;">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><i>John Doe</i></h4>
                    </div>
                </div>
            </div>

            <!-- //John Deo Section End -->
            <!-- Ericson Reagan Section Start -->
            <div class="col-sm-6 wow rollIn" data-wow-duration="3s">
                <div data-position="right" class="notViewed animBlock">
                    <div class="testimonial1">
                        <p>
                            Everybody dance NOW. I hear the jury's still out on science. Mission Accomplished. Buster's
                            in what we like to call a light to no coma. In laymans terms, it might be considered a very
                            heavy nap. But where did the lighter fluid come from? I should be in this Poof.Coo coo ca
                            chaw. Coo coo ca chaw. Coo coo ca chaw. No, no, it's pronounced a-nal-ra-pist. It wasn't
                            really the pronunciation that bothered me. I believe you will find the dessert to be both
                            engrossing and high-grossing! So we don't get dessert? Touché, Pandora. A Colombian cartel
                            that WON'T kidnap and kill you.
                        </p>
                    </div>
                </div>
                <div class="media testimonal-media" dir="rtl">
                    <div class="media-right">
                        <a href="#">
                            <img class="media-object profile-right-img" src="{{ asset('softemp/website/img/temp/d1.jpg') }}"
                                 alt="image" style="border-radius:50%; width:100px; height:100px;">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading profile-right-text"><i>Ericson Reagan</i></h4>
                    </div>


                </div>
            </div>
            <!-- //Ericson Reagan Section End -->
        </div>
    </div>

    <!-- //Testimonial Section End -->
@stop

{{-- page level scripts --}}
@section('scripts_js')
    <script src="{{ asset('softemp/website/vendors/owl.carousel/js/owl.carousel.js') }}" type="text/javascript"></script>
    <script src="{{ asset('softemp/website/vendors/wow/js/wow.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('softemp/website/js/scrollview.js') }}" type="text/javascript"></script>
    <script src="{{ asset('softemp/website/js/index.js') }}" type="text/javascript"></script>

@stop
