@include('website.partials.head')

<div class="coming_soon_area js-ripples jquery-ripples">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="coming_soon_container">
                    <div class="coming_soon_logo text-center">
                        <a href="#"><img src="assets/img/logo/logo-white.png" alt=""></a>
                    </div>

                    <div class="coming_soon_title">
                        <h2>We are coming soon</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>
                    </div>
                    <div class="coming_soon_timing">
                        <div data-countdown="2022/12/15"><div class="countdown_area"><div class="single_countdown"><div class="countdown_number">00</div><div class="countdown_title">days</div></div><div class="single_countdown"><div class="countdown_number">00</div><div class="countdown_title">hours</div></div><div class="single_countdown"><div class="countdown_number">00</div><div class="countdown_title">mins</div></div><div class="single_countdown"><div class="countdown_number">00</div><div class="countdown_title">secs</div></div></div></div>
                    </div>


                    <div class="coming_soon_newsletter">
                        <h3>Subscribe for our next update</h3>
                        <div class="subscribe_form">
                            <form id="mc-form" class="mc-form footer-newsletter" novalidate="true">
                                <input id="mc-email" type="email" autocomplete="off" placeholder="Enter your e-mial..." name="EMAIL">
                                <button id="mc-submit">Subscribe</button>
                            </form>
                            <!-- mailchimp-alerts Start -->
                            <div class="mailchimp-alerts text-centre">
                                <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                            </div><!-- mailchimp-alerts end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<canvas width="811" height="657" style="position: absolute; inset: 0px; z-index: -1;"></canvas></div>
<script src="{{ asset('website/assets/js/plugins.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('website/assets/js/main.js') }}"></script>