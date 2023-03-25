<section class="slider_section slider_s_three mb-60 mt-20">
    <div class="slider_area slider3_carousel owl-carousel">
        @foreach($sliders as $slider)
        <a href="{{$slider->desc}}">
        <div class="single_slider d-flex align-items-center" data-bgimg="{{ asset('images/sliders/'. $slider->images) }}">
            {{-- <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="slider_content slider_c_three color_white">
                            {{-- <h3>new collection</h3>
                            <h1>new Arrivals <br> cellphone new model 2022</h1>
                                <p>discount <span> -30% off</span> this week</p> --}}
                                {{-- <a href="shop.html">DISCOVER NOW</a>
                        </div>
                    </div>
                </div>
            </div> --}} 

        </div>
        </a> 
        @endforeach
        
    </div>
</section>