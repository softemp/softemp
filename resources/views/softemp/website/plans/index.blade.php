@extends('softemp.website.layouts.app')

@section('styles_css')
    <link href="{{ asset('softemp/website/vendors/animate/animate.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('softemp/website/css/price.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <!-- Container Section Start -->
    <div class="price-bg price">
        <div class="container ">
            <!-- Pricing Tabels Section Start -->
            <div class="row pad-btm20">
                <h2 class="text-center text-white w-100">Planos</h2>
                <!-- Best Package Section Start -->
                <div class="col-md-6 col-sm-6 col-lg-3 wow fadeInLeftBig" data-wow-duration="2s">
                    <div class="card panel-default text-center active">
                        <div class="card-header">
                            <h3 class="text-white">Best Package</h3>
                        </div>
                        <div class="card-body">
                            <div class="box_round_symboll">
                                <div class="box_round_symboll_text_1">
                                    G10
                                </div>
                            </div>
                            <h4 class="text-danger">10 Mega</h4>
                            <ul>
                                <li>
                                    Lorizzle ipsum dolizzle
                                </li>
                                <li>
                                    Lorizzle ipsum dolizzle
                                </li>
                                <li>
                                    Lorizzle ipsum dolizzle
                                </li>
                                <li>
                                    Lorizzle ipsum dolizzle
                                </li>
                            </ul>
                            <a class="btn btn-primary btn-block" href="#">
                                Eu quero
                            </a>
                        </div>
                    </div>
                </div>
                <!-- //Best Package Section End -->
                <!-- Habitasse Section Start -->
                <div class="col-md-6 col-sm-6 col-lg-3 wow fadeInDown" data-wow-duration="2s">
                    <div class="card panel-default text-center">
                        <div class="card-header">
                            <h3 class="text-white">Habitasse</h3>
                        </div>
                        <div class="card-body">
                            <div class="box_round_symboll">
                                <div class="box_round_symboll_text_1">
                                    G20
                                </div>
                            </div>
                            <h4 class="text-danger">20 Mega</h4>
                            <ul>
                                <li>
                                    Lorizzle ipsum dolizzle
                                </li>
                                <li>
                                    Lorizzle ipsum dolizzle
                                </li>
                                <li>
                                    Lorizzle ipsum dolizzle
                                </li>
                                <li>
                                    Lorizzle ipsum dolizzle
                                </li>
                            </ul>
                            <a class="btn btn-primary btn-block" href="#">
                                Eu quero
                            </a>
                        </div>
                    </div>
                </div>
                <!-- //Habitasse Section End -->
                <!-- Suscipizzle Section Start -->
                <div class="col-md-6 col-sm-6 col-lg-3 wow fadeInUp" data-wow-duration="2s">
                    <div class="card panel-default text-center">
                        <div class="card-header">
                            <h3 class="text-white">Suscipizzle</h3>
                        </div>
                        <div class="card-body">
                            <div class="box_round_symboll">
                                <div class="box_round_symboll_text_1">
                                    G30
                                </div>
                            </div>
                            <h4 class="text-danger">30 Mega</h4>
                            <ul>
                                <li>
                                    Lorizzle ipsum dolizzle
                                </li>
                                <li>
                                    Lorizzle ipsum dolizzle
                                </li>
                                <li>
                                    Lorizzle ipsum dolizzle
                                </li>
                                <li>
                                    Lorizzle ipsum dolizzle
                                </li>
                            </ul>
                            <a class="btn btn-primary btn-block" href="#">
                                Eu quero
                            </a>
                        </div>
                    </div>
                </div>
                <!-- //Suscipizzle Section End -->
                <!-- Pretium Section Start -->
                <div class="col-md-6 col-sm-6 col-lg-3 wow fadeInRightBig" data-wow-duration="2s">
                    <div class="card panel-default text-center">
                        <div class="card-header">
                            <h3 class="text-white">Pretium</h3>
                        </div>
                        <div class="card-body">
                            <div class="box_round_symboll">
                                <div class="box_round_symboll_text_1">
                                    G50
                                </div>
                            </div>
                            <h4 class="text-danger">50 Mega</h4>
                            <ul>
                                <li>
                                    Lorizzle ipsum dolizzle
                                </li>
                                <li>
                                    Lorizzle ipsum dolizzle
                                </li>
                                <li>
                                    Lorizzle ipsum dolizzle
                                </li>
                                <li>
                                    Lorizzle ipsum dolizzle
                                </li>
                            </ul>
                            <a class="btn btn-primary btn-block" href="#">
                                Eu quero
                            </a>
                        </div>
                    </div>
                </div>
                <!-- //Pretium Section End -->
            </div>
            <!-- //Pricing Tabels Section End -->
        </div>
    </div>
    <!-- //Container Section End -->
@endsection

@section('footer')
@endsection

@section('script_js')
@endsection
