<footer>
    <div class="container ftr-txt">
        <div class="row">
            <!-- About Us Section Start -->
            <div class="col-sm-3 col-xs-12">
                <a href="{{ route('website.about.index') }}"><h3>
{{--                        {{SoftEmp::about()->title}}--}}
                        Quem Somos
                    </h3></a>
                <p>
{{--                    {!! SoftEmp::about()->descriptions !!}--}}
                    Somos uma empresa de tecnologia
                </p>
            </div>
            <!-- //About Us Section End -->
            <!-- Recent post Section Start -->
            <div class="col-sm-3 col-xs-12 recen-post">
                <h3>Post Recentes</h3>
                <ul class="list-unstyled recen-post">
                    <li>
                        <a href="#">
                            <img src="{{ asset('softemp/website/img/temp/c2.jpg') }}" class="ftr-image-small" /> <span class="fotr-post">Lorem Ipsum is simply dummy text of the printing industry.
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{ asset('softemp/website/img/temp/c3.jpg') }}" class="ftr-image-small" /> <span class="fotr-post">Lorem Ipsum is simply dummy text of the printing industry.
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{ asset('softemp/website/img/temp/c4.jpg') }}" class="ftr-image-small" /> <span class="fotr-post">Lorem Ipsum is simply dummy text of the printing industry.
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- //Recent Post Section End -->
            <!-- GetIn Touch Section Start -->
            <div class="col-sm-3 col-xs-12">
                <h3>get in touch</h3>
                <p>
                    <i class="fa  fa-map-marker"></i>&nbsp;Gieringer Robert E MD 2751 Debarr Rd #320 Anchorage, AK(Alaska) 99508
                </p>
                <p>
                    <i class="fa fa-mobile-phone"></i> Phone:&nbsp;(907) 563-3232
                </p>
                <p>
                    <i class="fa fa-envelope-o"></i> E-mail:&nbsp; <a href="mailto:"><span class="text-white">info@domain.com</span></a>
                </p>
                <p>
                    <i class="fa fa-skype"></i> Skype:&nbsp;<a href="#"><span class="text-white">domain</span></a>
                </p>
            </div>
            <!-- //GetIn Touch Section End -->
            <!-- Subscribe Section Start -->
            <div class="col-sm-3 col-xs-12">
                <h3>Subscribe</h3>
                <p>
                    The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced.
                </p>
                <form class="ftr-form">
                    <div class="input-group">
                        <input type="email" class="form-control w-100" placeholder="E-mail" />
                        <a href="#">
                            <input type="button" class="btn btn-primary" value="Subscribe" />
                        </a>
                    </div>
                </form>
            </div>
            <!-- //Subscribe Section End -->
        </div>
    </div>
</footer>
