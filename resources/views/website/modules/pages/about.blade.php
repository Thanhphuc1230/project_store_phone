@include('website.partials.head')
@include('website.partials.header')
<div class="about_bg_area">
    <div class="container">
        <!--about section area -->
        <section class="about_section mb-60">
            <div class="row align-items-center">
                <div class="col-12">
                    <figure>
                        <div class="about_thumb">
                            <img src="{{ asset('website/assets/img/about/about1.jpg') }}"alt="">
                        </div>
                        <figcaption class="about_content">
                            <h1>We are a digital agency focused on delivering content and utility user-experiences.</h1>
                            <p>Adipiscing lacus ut elementum, nec duis, tempor litora turpis dapibus. Imperdiet cursus odio tortor in elementum. Egestas nunc eleifend feugiat lectus laoreet, vel nunc taciti integer cras. Hac pede dis, praesent nibh ac dui mauris sit. Pellentesque mi, facilisi mauris, elit sociis leo sodales accumsan. Iaculis ac fringilla torquent lorem consectetuer, sociosqu phasellus risus urna aliquam, ornare.</p>
                            <div class="about_signature">
                                <img src="{{ asset('website/assets/img/about/about-us-signature.png ') }}" alt="">
                            </div>
                        </figcaption>
                    </figure>
                </div>
            </div>
        </section>
        <!--about section end-->

        <!--chose us area start-->
        <div class="choseus_area" data-bgimg="{{ asset('website/assets/img/about/about-us-policy-bg.jpg') }}"style="background-image: url(&quot;assets/img/about/about-us-policy-bg.jpg&quot;);">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="single_chose">
                        <div class="chose_icone">
                            <img src="{{ asset('website/assets/img/about/About_icon1.png ') }}" alt="">
                        </div>
                        <div class="chose_content">
                            <h3>Creative Design</h3>
                            <p>Erat metus sodales eget dolor consectetuer, porta ut purus at et alias, nulla ornare velit amet</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="single_chose">
                        <div class="chose_icone">
                            <img src="{{ asset('website/assets/img/about/About_icon2.png ') }}" alt="">
                        </div>
                        <div class="chose_content">
                            <h3>100% Money Back Guarantee</h3>
                            <p>Erat metus sodales eget dolor consectetuer, porta ut purus at et alias, nulla ornare velit amet</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="single_chose">
                        <div class="chose_icone">
                            <img src="{{ asset('website/assets/img/about/About_icon3.png ') }}" alt="">
                        </div>
                        <div class="chose_content">
                            <h3>Online Support 24/7</h3>
                            <p>Erat metus sodales eget dolor consectetuer, porta ut purus at et alias, nulla ornare velit amet</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--chose us area end-->

        <!--services img area-->
        <div class="about_gallery_section mb-55">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <article class="single_gallery_section">
                        <figure>
                            <div class="gallery_thumb">
                                <img src="{{ asset('website/assets/img/about/about2.jpg') }}"alt="">
                            </div>
                            <figcaption class="about_gallery_content">
                                <h3>What do we do?</h3>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto</p>
                            </figcaption>
                        </figure>
                    </article>
                </div>
                <div class="col-lg-4 col-md-4">
                    <article class="single_gallery_section">
                        <figure>
                            <div class="gallery_thumb">
                                <img src="{{ asset('website/assets/img/about/about3.jpg') }}"alt="">
                            </div>
                            <figcaption class="about_gallery_content">
                                <h3>Our Mission</h3>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto</p>
                            </figcaption>
                        </figure>
                    </article>
                </div>
                <div class="col-lg-4 col-md-4">
                    <article class="single_gallery_section">
                        <figure>
                            <div class="gallery_thumb">
                                <img src="{{ asset('website/assets/img/about/about4.jpg') }}"alt="">
                            </div>
                            <figcaption class="about_gallery_content">
                                <h3>History Of Us</h3>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto</p>
                            </figcaption>
                        </figure>
                    </article>
                </div>
            </div>
        </div>
        <!--services img end-->

        <!--testimonial area start-->
        <div class="faq-client-say-area">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="section_title">
                        <h2>What can we do for you ?</h2>
                    </div>
                    <div class="faq-style-wrap" id="faq-five">
                        <!-- Panel-default -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title">
                                <a id="octagon" class="collapsed" role="button" data-bs-toggle="collapse" href="#faq-collapse1" aria-expanded="true" aria-controls="faq-collapse1"> <span class="button-faq"></span>Fast Free Delivery</a>
                            </h5>
                        </div>
                        <div id="faq-collapse1" class="collapse show" aria-expanded="true" role="tabpanel" data-parent="#faq-five">
                            <div class="panel-body">
                                <p>Nam liber tempor cum soluta nobis eleifend option.</p>
                                <p>Congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me.
                                </p>
                                <p> Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.</p>
                            </div>
                        </div>
                    </div>
                    <!--// Panel-default -->

                    <!-- Panel-default -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title">
                                <a class="collapsed" role="button" data-bs-toggle="collapse" href="#faq-collapse2" aria-expanded="false" aria-controls="faq-collapse2"> <span class="button-faq"></span>More Than 30 Years In The Business</a>
                            </h5>
                        </div>
                        <div id="faq-collapse2" class="collapse" aria-expanded="false" role="tabpanel" data-parent="#faq-five">
                            <div class="panel-body">
                                <p>Nam liber tempor cum soluta nobis eleifend option.</p>
                                <p>Congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me.
                                </p>
                                <p> Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.</p>
                            </div>
                        </div>
                    </div>
                    <!--// Panel-default -->

                    <!-- Panel-default -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title">
                                <a class="collapsed" role="button" data-bs-toggle="collapse" href="#faq-collapse3" aria-expanded="false" aria-controls="faq-collapse3"> <span class="button-faq"></span>100% Organic Foods</a>
                            </h5>
                        </div>
                        <div id="faq-collapse3" class="collapse" role="tabpanel" data-parent="#faq-five">
                            <div class="panel-body">
                                <p>Nam liber tempor cum soluta nobis eleifend option.</p>
                                <p>Congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me.
                                </p>
                                <p> Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.</p>
                            </div>
                        </div>
                    </div>
                    <!--// Panel-default -->

                    <!-- Panel-default -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title">
                                <a class="collapsed" role="button" data-bs-toggle="collapse" href="#faq-collapse4" aria-expanded="false" aria-controls="faq-collapse4"> <span class="button-faq"></span>Best Shopping Strategies</a>
                            </h5>
                        </div>
                        <div id="faq-collapse4" class="collapse" role="tabpanel" data-parent="#faq-five">
                            <div class="panel-body">
                                <p>Nam liber tempor cum soluta nobis eleifend option.</p>
                                <p>Congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me.
                                </p>
                                <p> Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.</p>
                            </div>
                        </div>
                    </div>
                    <!--// Panel-default -->
                    </div>

                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="testimonials-area">
                        <div class="section_title">
                            <h2>What Our Customers Says ?</h2>
                        </div>
                        <div class="testimonial-two owl-carousel owl-loaded owl-drag">
                            
                            
                            
                        <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(-1202px, 0px, 0px); transition: all 0s ease 0s; width: 4207px;"><div class="owl-item cloned" style="width: 601px;"><div class="testimonial-wrap-two text-center">
                                <div class="quote-container">
                                    <div class="quote-image">
                                        <img src="{{ asset('website/assets/img/about/testimonial2.jpg') }}"alt="">
                                    </div>
                                    <div class="testimonials-text">
                                        <p>Support and response has been amazing, helping me with several issues I came across and got them solved almost the same day. A pleasure to work with them!</p>
                                    </div>
                                    <div class="author">
                                        <h6>Kathy Young</h6>
                                        <p>CEO of SunPark</p>
                                    </div>
                                </div>
                            </div></div><div class="owl-item cloned" style="width: 601px;"><div class="testimonial-wrap-two text-center">
                                <div class="quote-container">
                                    <div class="quote-image">
                                        <img src="{{ asset('website/assets/img/about/testimonial3.jpg') }}"alt="">
                                    </div>
                                    <div class="testimonials-text">
                                        <p>Support and response has been amazing, helping me with several issues I came across and got them solved almost the same day. A pleasure to work with them!</p>
                                    </div>
                                    <div class="author">
                                        <h6>Kathy Young</h6>
                                        <p>CEO of SunPark</p>
                                    </div>
                                </div>
                            </div></div><div class="owl-item active" style="width: 601px;"><div class="testimonial-wrap-two text-center">
                                <div class="quote-container">
                                    <div class="quote-image">
                                        <img src="{{ asset('website/assets/img/about/testimonial1.jpg') }}"alt="">
                                    </div>
                                    <div class="testimonials-text">
                                        <p>Support and response has been amazing, helping me with several issues I came across and got them solved almost the same day. A pleasure to work with them!</p>
                                    </div>
                                    <div class="author">
                                        <h6>Kathy Young</h6>
                                        <p>CEO of SunPark</p>
                                    </div>

                                </div>
                            </div></div><div class="owl-item" style="width: 601px;"><div class="testimonial-wrap-two text-center">
                                <div class="quote-container">
                                    <div class="quote-image">
                                        <img src="{{ asset('website/assets/img/about/testimonial2.jpg') }}"alt="">
                                    </div>
                                    <div class="testimonials-text">
                                        <p>Support and response has been amazing, helping me with several issues I came across and got them solved almost the same day. A pleasure to work with them!</p>
                                    </div>
                                    <div class="author">
                                        <h6>Kathy Young</h6>
                                        <p>CEO of SunPark</p>
                                    </div>
                                </div>
                            </div></div><div class="owl-item" style="width: 601px;"><div class="testimonial-wrap-two text-center">
                                <div class="quote-container">
                                    <div class="quote-image">
                                        <img src="{{ asset('website/assets/img/about/testimonial3.jpg') }}"alt="">
                                    </div>
                                    <div class="testimonials-text">
                                        <p>Support and response has been amazing, helping me with several issues I came across and got them solved almost the same day. A pleasure to work with them!</p>
                                    </div>
                                    <div class="author">
                                        <h6>Kathy Young</h6>
                                        <p>CEO of SunPark</p>
                                    </div>
                                </div>
                            </div></div><div class="owl-item cloned" style="width: 601px;"><div class="testimonial-wrap-two text-center">
                                <div class="quote-container">
                                    <div class="quote-image">
                                        <img src="{{ asset('website/assets/img/about/testimonial1.jpg') }}"alt="">
                                    </div>
                                    <div class="testimonials-text">
                                        <p>Support and response has been amazing, helping me with several issues I came across and got them solved almost the same day. A pleasure to work with them!</p>
                                    </div>
                                    <div class="author">
                                        <h6>Kathy Young</h6>
                                        <p>CEO of SunPark</p>
                                    </div>

                                </div>
                            </div></div><div class="owl-item cloned" style="width: 601px;"><div class="testimonial-wrap-two text-center">
                                <div class="quote-container">
                                    <div class="quote-image">
                                        <img src="{{ asset('website/assets/img/about/testimonial2.jpg') }}"alt="">
                                    </div>
                                    <div class="testimonials-text">
                                        <p>Support and response has been amazing, helping me with several issues I came across and got them solved almost the same day. A pleasure to work with them!</p>
                                    </div>
                                    <div class="author">
                                        <h6>Kathy Young</h6>
                                        <p>CEO of SunPark</p>
                                    </div>
                                </div>
                            </div></div></div></div><div class="owl-nav disabled"><div class="owl-prev">prev</div><div class="owl-next">next</div></div><div class="owl-dots"><div class="owl-dot active"><span></span></div><div class="owl-dot"><span></span></div><div class="owl-dot"><span></span></div></div></div>
                    </div>
                </div>
            </div>
        </div>
        <!--testimonial area end-->
    </div>
</div>
@include('website.partials.footer')