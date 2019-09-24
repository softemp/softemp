@extends('softemp.website.layouts.app')

@section('styles_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('softemp/website/css/blog.css') }}">
@endsection

@section('content')
    <!-- Container Section Start -->
    <div class="container blog-page">
        <div class="services">
            <h2><label class="border-bottom mrg_lft12">Ajuda</label></h2>
        </div>
        <!-- Information Gathering Section Start -->
        <div class="row">
            <div class="col-lg-8">
                <div class="blog row">
                    <h3 class="primary">FEATURED ARTICLE</h3>
                    <div class="col-md-7">
                        <img src="{{ asset('softemp/website/img/temp/blog_1.jpg') }}" class="img-fluid blog-image">
                    </div>
                    <div class="col-md-5">
                        <h4 class="primary"><a href="#">Gingerbread jelly brownie soufflé halvah halva</a></h4>
                        <p class="text-justify">Mavericks reality distortion gradients attenuation. Thought through and
                            through notifications transparency game center
                            multitasking aluminum advanced desktop operating system genius bar. This changes everything
                            designed by Apple in California passbook.
                            Control center photos all-new design SDK technology clock. Simplicity is actually quite
                            complicated. Functional layers.</p>
                        <a href="#" class="btn btn-primary pull-right">Read more</a>
                    </div>
                </div>
                <br/>
                <!-- Business Section Start -->
                <div class="thumbnail">
                    <img src="{{ asset('softemp/website/img/temp/b2.jpg') }}" class="img-fluid" alt="Image">
                    <div class="featured-text relative-left">
                        <h3 class="primary">BUSINESS</h3>
                        <p>
                            Change lives thinkers who make change happen, protect truth fight against malnutrition
                            solutions vaccines Peace Corps. Strengthen democracy, revitalize momentum detection
                            storytelling positive social change marginalized communities social responsibility.
                            Vulnerable citizens inclusive, efficient; focus on impact policymakers Rosa Parks social
                            good urban. Tackling, transform the world, human being engage carbon emissions reductions.
                        </p>
                        <div class="april">
                            by&nbsp;<i class="fa fa-user"></i>&nbsp;<a href="#">Admin</a> &nbsp;
                            <i class="fa fa-clock-o"></i>&nbsp;<a href="#">2minutes ago</a> &nbsp;
                            <i class="fa fa-comments"></i>&nbsp;<a href="#">3 comments</a>
                        </div>
                        <hr>
                        <p class="text-right">
                            <a href="#" class="btn btn-primary">Read more</a>
                        </p>
                    </div>
                    <!-- featured-text start -->
                </div>
                <div class="thumbnail">
                    <img src="{{ asset('softemp/website/img/temp/about_1.jpg') }}" class="img-fluid" alt="Image">
                    <div class="featured-text relative-left">
                        <h3 class="primary">OUT SOURCING</h3>
                        <p>
                            Change lives thinkers who make change happen, protect truth fight against malnutrition
                            solutions vaccines Peace Corps. Strengthen democracy, revitalize momentum detection
                            storytelling positive social change marginalized communities social responsibility.
                            Vulnerable citizens inclusive, efficient; focus on impact policymakers Rosa Parks social
                            good urban. Tackling, transform the world, human being engage carbon emissions reductions.
                        </p>
                        <div class="april">
                            by&nbsp;<i class="fa fa-user"></i>&nbsp;<a href="#">Admin</a> &nbsp;
                            <i class="fa fa-clock-o"></i>&nbsp;<a href="#">5minutes ago</a> &nbsp;
                            <i class="fa fa-comments"></i>&nbsp;<a href="#">4 comments</a>
                        </div>
                        <hr>
                        <p class="text-right">
                            <a href="#" class="btn btn-primary">Read more</a>
                        </p>
                    </div>
                    <!-- //featured-text End-->
                </div>
                <div class="thumbnail">
                    <img src="{{ asset('softemp/website/img/temp/b1.jpg') }}" class="img-fluid" alt="Image">
                    <div class="featured-text relative-left">
                        <h3 class="primary">ONLINE TRADING</h3>
                        <p>
                            Change lives thinkers who make change happen, protect truth fight against malnutrition
                            solutions vaccines Peace Corps. Strengthen democracy, revitalize momentum detection
                            storytelling positive social change marginalized communities social responsibility.
                            Vulnerable citizens inclusive, efficient; focus on impact policymakers Rosa Parks social
                            good urban. Tackling, transform the world, human being engage carbon emissions reductions.
                        </p>
                        <div class="april">
                            by&nbsp;<i class="fa fa-user"></i>&nbsp;<a href="#">Admin</a> &nbsp;
                            <i class="fa fa-clock-o"></i>&nbsp;<a href="#">5minutes ago</a> &nbsp;
                            <i class="fa fa-comments"></i>&nbsp;<a href="#">4 comments</a>
                        </div>
                        <hr>
                        <p class="text-right">
                            <a href="#" class="btn btn-primary">Read more</a>
                        </p>
                    </div>
                    <!-- /.featured-text -->
                </div>
                <!-- //Business Section End -->
            </div>
            <!-- //Information Gathering Section End -->
            <!-- latest Post Section Start -->
            <div class="col-lg-4 mt-23">
                <!-- Panel Headin Section Start -->
                <div class="row margin_left_right">
                    <div class="col-12">
                        <div class="card card-default martop13">
                            <div class="card-header">
                                <h4><b>ÚLTIMAS POSTAGENS</b></h4>
                            </div>
                            <div class="card-body right-blog">
                                <a href="#"><h5 class="text-primary">Monocle ipsum dolor sit amet tote bag Toto emerging
                                        ANA first-class</h5></a>
                                <h6>2minutes ago</h6>
                                <a href="#"><h5 class="text-primary">Emerging concierge bureaux Baggu vibrant Boeing 787
                                        Swiss.</h5></a>
                                <h6>10minutes ago</h6>
                                <a href="#"><h5 class="text-primary">Extraordinary wardrobe vibrant, sophisticated Fast
                                        Lane smart tote bag </h5></a>
                                <h6>15minutes ago</h6>
                                <a href="#"><h5 class="text-primary">Porter artisanal conversation international elegant
                                        Shinkansen Nordic bulletin </h5></a>
                                <h6>30minutes ago</h6>
                                <a href="#"><h5 class="text-primary">As creatives we’re always dropping latin
                                        placeholder text into designs</h5></a>
                                <h6>50minutes ago</h6>
                                <a href="#"><h5 class="text-primary">It’s no coincidence that we’re launching Pahu!
                                        during New Zealand’s 2013 Māori language </h5>
                                </a>
                                <h6>1hour ago</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- //Panel Headin Section End -->
                <!-- News-letter -->
                <div class="row margin_left_right">
                    <div class="col-12">
                        <!-- News Latter Secttion Start -->
                        <div class="card card-default martop13">
                            <div class="card-header">
                                <h4><b>JOIN NEWSLETTER</b></h4>
                            </div>
                            <div class="card-body right-blog">
                                <p>Sign up for our daily Newslatter</p>
                                <form role="form">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Enter email"
                                                       required>
                                            </div>
                                        </div>
                                        <!-- /.col-xs-8 -->
                                        <div class="col-4 col-full-width-left">
                                            <button type="submit" class="btn btn-danger btn-block">Sign up</button>
                                        </div>
                                        <!-- /.col-xs-4 -->
                                    </div>
                                    <!-- /.row -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- //New Latter Section End -->
                <!-- Popular Tags Secttion Start -->
                <div class="row margin_left_right">
                    <div class="col-12">
                        <div class="card card-default martop13 mb-3 mb-lg-0">
                            <div class="card-header">
                                <h4><b>POPULAR TAGS</b></h4>
                            </div>
                            <div class="card-body right-blog">
                                <span class="btn btn-primary">PING</span>
                                <span class="btn btn-primary">DOWNLOAD</span>
                                <span class="btn btn-primary">UPLOAD</span>
                                <span class="btn btn-primary">FRANQUIA</span>
                                <span class="btn btn-primary">BANDA</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- //Popular Tags Section End -->
            </div>
            <!-- //latest Post Section End -->
        </div>
    </div>
    <!-- //Container Section End -->
@endsection

@section('footer')
@endsection

@section('scripts_js')
    <script>
        $('img').addClass('img-fluid');
    </script>
@endsection
