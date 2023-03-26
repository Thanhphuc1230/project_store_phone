@include('website.partials.head')
@include('website.partials.header')

@include('website.partials.slider')

<div class="home_section_bg">

    <div class="product_area deals_product">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_header">
                        <div class="section_title">
                            <h2>Deals Of The Month</h2>

                        </div>
                        {{-- <div class="product_tab_btn">
                            <ul class="nav" >
                                @foreach ($categories_featured as $cate)
                                <li>
                                    <a href="{{route('website.category',['id' =>$cate->id] ) }}"   data-filter=".{{ Str::of($cate->name_cate)->slug("-") }}">
                                        {{ $cate->name_cate }}
                                    </a>
                                </li>
                                @endforeach
                                
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </div>

            <div class="tab-content">
                <div class="tab-pane fade show active">
                    <div class="product_carousel product_style product_column5 owl-carousel">
                        @foreach($products_random5 as $product5)
                        <article class="single_product">
                            <figure>

                                <div class="product_thumb">
                                    <a class="primary_img" href="{{ route('website.product_countdown', ['id' => $product5->id]) }}"><img src="{{ asset('images/products/'. $product5->images) }}" alt=""></a>
                                    <a class="secondary_img" href="{{ route('website.product_countdown', ['id' => $product5->id]) }}"><img src="{{ asset('images/products/'. $product5->images) }}" alt=""></a>
                                    @php  if($product5->old_price == NULL){

                                        @endphp
                                        @php
                                        }else{
                                        @endphp
                                        <div class="label_product">
                                            <span class="label_sale">Sale</span>
                                        </div>
                                        @php    
                                            }
                                        @endphp
                                      
                                    <div class="action_links">
                                        <ul>
                                            {{-- @if(Auth::user()){ --}}
                                                <li class="wishlist"><a href="{{route('website.addToWishList', ['id'=>$product5->id])}}" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true" data-tippy="Add to Wishlist"><i class="fa-regular fa-heart"></i></a></li>
                                            {{-- }
                                            @endif --}}
                                            {{-- @if(!Auth::user()){
                                                <li class="wishlist"><a href="{{route('website.check')}}" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true" data-tippy="Add to Wishlist"><i class="fa-regular fa-heart"></i></a></li>
                                            }
                                            @endif
                                             --}}
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <div class="product_content_inner">
                                        <h4 class="product_name"><a href="{{ route('website.product_countdown', ['id' => $product5->id]) }}">{{$product5->name}}</a></h4>
                                        <div class="price_box">
                                            
                                            <span class="current_price">{{ number_format($product5->price,0,"", "." ) }} VND</span>
                                        </div>
                                        <div class="countdown_text">
                                            <p><span>Hurry Up!</span> Offers ends in: </p>
                                        </div>
                                        <div class="product_timing">
                                            <div data-countdown="{{$product5->countdown}}"></div>
                                        </div>
                                    </div>
                                    {{-- <div class="add_to_cart">
                                        <a href="{{route('website.addToCart', ['id'=>$product5->id])}}" title="Add to cart">Add to cart</a>
                                    </div> --}}

                                </div>
                            </figure>
                        </article>
                        @endforeach
                     
                    </div>
                </div>
                
            </div>

        </div>
    </div>
    <!--product area end-->

    <!--banner area start-->
    <div class="banner_area mb-55">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <figure class="single_banner">
                        <div class="banner_thumb">
                            <a href="{{route('website.blog')}}"><img src="{{ asset('website/assets/img/bg/720-220-720x220-223.png') }}" alt=""></a>
                        </div>
                    </figure>
                </div>
                <div class="col-lg-6 col-md-6">
                    <figure class="single_banner">
                        <div class="banner_thumb">
                            <a href="{{route('website.blog')}}"><img src="{{ asset('website/assets/img/bg/tl-oppo-720-220-720x220.png') }}" alt=""></a>
                        </div>
                    </figure>
                </div>
            </div>
        </div>
    </div>
    <!--banner area end-->

    <!--product area start-->
    <div class="product_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_header">
                        <div class="section_title">
                            <h2>Featured Products</h2>

                        </div>
                        <div class="product_tab_btn">
                            <ul class="nav">
                                @foreach ($categories_featured as $cate)
                                <li>
                                    <a href="{{route('website.category',['id' =>$cate->name_cate] ) }}"   data-filter=".{{ Str::of($cate->name_cate)->slug("-") }}">
                                        {{ $cate->name_cate }}
                                    </a>
                                </li>
                                @endforeach
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="Computer" role="tabpanel">
                    <div class="product_carousel product_style product_column5 owl-carousel">
                        @foreach ($products_random as $product)
                        <div class="product_items {{ Str::of($product->name_cate)->slug("-") }}">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="{{ route('website.detail', ['id' => $product->name]) }}"><img src="{{ asset('images/products/'. $product->images) }}" alt=""></a>
                                        <a class="secondary_img" href="{{ route('website.detail', ['id' => $product->name]) }}"><img src="{{ asset('images/products/'. $product->images) }}" alt=""></a>
                                        @php  if($product->old_price == NULL){

                                            @endphp
                                            @php
                                            }else{
                                            @endphp
                                            <div class="label_product">
                                                <span class="label_sale">Sale</span>
                                            </div>
                                            @php    
                                                }
                                            @endphp
                                        <div class="action_links">
                                            <ul>
                                                <li class="wishlist"><a href="{{route('website.addToWishList', ['id'=>$product->id])}}" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true" data-tippy="Add to Wishlist"><i class="fa-regular fa-heart"></i></a></li>
                                                </ul>
                                        </div>
                                    </div>
                                    <div class="product_rating home">
                                        @php $count_rating =number_format($product->average_rating); @endphp
                               
                                         @if( $count_rating == 0)                                      
                                            @for($i=1;$i<=5;$i++)
                                                <span class="fa fa-star "></span>
                                            @endfor
                                       
                                        @else
                                            @for($i=1;$i<=$count_rating;$i++)
                                                <span class="fa fa-star checked"></span>
                                            @endfor
                                            @for($j=$count_rating+1;$j<=5;$j++)
                                                <span class="fa fa-star "></span>
                                            @endfor
                                        
                                        @endif
                                   
                                        
                                    </div>
                                    <div class="product_content">
                                        <div class="product_content_inner">
                                            <h4 class="product_name"><a href="{{ route('website.detail', ['id' => $product->name]) }}">{{ $product->name }}</a></h4>
                                            <div class="price_box">
                                                @php  if($product->old_price == NULL){

                                                    @endphp
                                                        @php
                                                            }else{
                                                        @endphp
                                                        <span class="old_price">{{ number_format($product->old_price,0,"","." )}} VND</span>       
                                                    @php    
                                                    }
                                                    @endphp
                                                <span class="current_price">{{ number_format($product->price,0,"", ".") }} VND</span>
                                            </div>
                                        </div>
                                        <div class="add_to_cart">
                                            <a href="{{route('website.addToCart', ['id'=>$product->id])}}" title="Add to cart">Thêm vào giỏ hàng</a>
                                        </div>
                                    </div>
                                </figure>
                            </article>
                    
                         
                        </div>
                        @endforeach
                        
                    </div>
                    <div class="product_carousel product_style product_column5 owl-carousel">
                        @foreach ($products_random1 as $product1)
                        <div class="product_items">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="{{ route('website.detail', ['id' => $product1->name]) }}"><img src="{{ asset('images/products/'. $product1->images) }}" alt=""></a>
                                        <a class="secondary_img" href="{{ route('website.detail', ['id' => $product1->name]) }}"><img src="{{ asset('images/products/'. $product1->images) }}" alt=""></a>
                                        @php  if($product1->old_price == NULL){

                                            @endphp
                                            @php
                                            }else{
                                            @endphp
                                            <div class="label_product">
                                                <span class="label_sale">Sale</span>
                                            </div>
                                            @php    
                                                }
                                            @endphp
                                        <div class="action_links">
                                            <ul>
                                                <li class="wishlist"><a href="{{route('website.addToWishList', ['id'=>$product1->id])}}" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true" data-tippy="Add to Wishlist"><i class="fa-regular fa-heart"></i></i></a></li>
                                                </ul>
                                        </div>
                                    </div>
                                    <div class="product_rating home">
                                        @php $count_rating =number_format($product1->average_rating); @endphp

                                         @if( $count_rating == 0)                                      
                                            @for($i=1;$i<=5;$i++)
                                                <span class="fa fa-star "></span>
                                            @endfor
                                         
                                        @else
                                            @for($i=1;$i<=$count_rating;$i++)
                                                <span class="fa fa-star checked"></span>
                                            @endfor
                                            @for($j=$count_rating+1;$j<=5;$j++)
                                                <span class="fa fa-star "></span>
                                            @endfor
                                        
                                        @endif
                                   
                                        
                                    </div>
                                    <div class="product_content">
                                        <div class="product_content_inner">
                                            <h4 class="product_name"><a href="{{ route('website.detail', ['id' => $product1->name]) }}">{{ $product1->name }}</a></h4>
                                            <div class="price_box">
                                                @php  if($product1->old_price == NULL){

                                                    @endphp
                                                        @php
                                                            }else{
                                                        @endphp
                                                        <span class="old_price">{{ number_format($product1->old_price,0,"","." )}} VND</span>       
                                                    @php    
                                                    }
                                                    @endphp
                                                <span class="current_price">{{ number_format($product1->price,0,"", ".") }} VND</span>
                                            </div>
                                        </div>
                                        <div class="add_to_cart">
                                            <a href="{{route('website.addToCart', ['id'=>$product1->id])}}" title="Add to cart">Thêm vào giỏ hàng</a>
                                        </div>
                                    </div>
                                </figure>
                            </article>
                    
                         
                        </div>
                        @endforeach
                        
                    </div>
                </div>
               
               
                
            </div>

        </div>
    </div>
    <!--product area end-->

    <!--product area start-->
    <div class="small_product_area mb-55">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_header">
                        <div class="section_title">
                            <h2>Best Selling Products</h2>

                        </div>
                        <div class="product_tab_btn">
                            <ul class="nav" >
                               
                                    @foreach ($categories_featured1 as $cate)
                                    <li>
                                        <a href="{{route('website.category',['id' =>$cate->name_cate] ) }}"   data-filter=".{{ Str::of($cate->name_cate)->slug("-") }}">
                                            {{ $cate->name_cate }}
                                        </a>
                                    </li>
                                    @endforeach
                            
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="Fashion2" role="tabpanel">
                    <div class="product_carousel small_p_container  small_product_column3 owl-carousel">
                        @foreach($products_random2 as $product2) 
                        <div class="product_items">
                            <figure class="single_product">
                                <div class="product_thumb">
                                    <a class="primary_img" href="{{ route('website.detail', ['id' => $product2->name]) }}"><img src="{{ asset('images/products/'. $product2->images) }}" alt=""></a>
                                    <a class="secondary_img" href="{{ route('website.detail', ['id' => $product2->name]) }}"><img src="{{ asset('images/products/'. $product2->images) }}" alt=""></a>
                                </div>
                                <div class="product_content">
                                    <h4 class="product_name"><a href="{{ route('website.detail', ['id' => $product2->name]) }}">{{$product2->name}}</a></h4>
                                    {{-- <div class="product_rating">
                                        <ul>
                                            <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                        </ul>
                                    </div> --}}
                                    <div class="price_box">
                                        @php  if($product2->old_price == NULL){

                                            @endphp
                                                @php
                                                    }else{
                                                @endphp
                                                <span class="old_price">{{ number_format($product2->old_price,0,"","." )}} VND</span>       
                                            @php    
                                            }
                                            @endphp
                                        <span class="current_price">{{ number_format($product2->price,0,"", ".") }} VND</span>
                                    </div>
                                    <div class="product_cart_button">
                                        <a href="{{route('website.addToCart', ['id'=>$product2->id])}}" title="Add to cart"><i class="fa fa-shopping-bag"></i></a>
                                    </div>

                                </div>
                            </figure>
                            
                        </div>
                        @endforeach
                       
                    </div>
                    <div class="product_carousel small_p_container  small_product_column3 owl-carousel">
                        @foreach($products_random3 as $product3) 
                        <div class="product_items">
                            <figure class="single_product">
                                <div class="product_thumb">
                                    <a class="primary_img" href="{{ route('website.detail', ['id' => $product3->name]) }}"><img src="{{ asset('images/products/'. $product3->images) }}" alt=""></a>
                                    <a class="secondary_img" href="{{ route('website.detail', ['id' => $product3->name]) }}"><img src="{{ asset('images/products/'. $product3->images) }}" alt=""></a>
                                </div>
                                <div class="product_content">
                                    <h4 class="product_name"><a href="{{ route('website.detail', ['id' => $product3->name]) }}">{{$product3->name}}</a></h4>
                                    {{-- <div class="product_rating">
                                        <ul>
                                            <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                        </ul>
                                    </div> --}}
                                    <div class="price_box">
                                        @php  if($product3->old_price == NULL){

                                            @endphp
                                                @php
                                                    }else{
                                                @endphp
                                                <span class="old_price">{{ number_format($product3->old_price,0,"","." )}} VND</span>       
                                            @php    
                                            }
                                            @endphp
                                        <span class="current_price">{{ number_format($product3->price,0,"", ".") }} VND</span>
                                    </div>
                                    <div class="product_cart_button">
                                        <a href="{{route('website.addToCart', ['id'=>$product3->id])}}" title="Add to cart"><i class="fa fa-shopping-bag"></i></a>
                                    </div>

                                </div>
                            </figure>
                            
                        </div>
                        @endforeach
                       
                    </div>
                </div>
                

            </div>
        </div>
    </div>
    <!--product area end-->

    <!--product area start-->
    <div class="product_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_header">
                        <div class="section_title">
                            <h2>New Arrivals</h2>

                        </div>
                        <div class="product_tab_btn">
                            <ul class="nav" >
                                @foreach ($categories_featured2 as $cate)
                                    <li>
                                        <a href="{{route('website.category',['id' =>$cate->name_cate] ) }}"   data-filter=".{{ Str::of($cate->name_cate)->slug("-") }}">
                                            {{ $cate->name_cate }}
                                        </a>
                                    </li>
                                    @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="Computer3" role="tabpanel">
                    <div class="product_carousel product_style product_column5 owl-carousel">
                        @foreach($products_random4 as $product4)
                        <article class="single_product">
                            <figure>

                                <div class="product_thumb">
                                    <a class="primary_img" href="{{ route('website.detail', ['id' => $product4->name]) }}"><img src="{{ asset('images/products/'. $product4->images) }}" alt=""></a>
                                    <a class="secondary_img" href="{{ route('website.detail', ['id' => $product4->name]) }}"><img src="{{ asset('images/products/'. $product4->images) }}" alt=""></a>
                                    @php  if($product4->old_price == NULL){

                                        @endphp
                                        @php
                                        }else{
                                        @endphp
                                        <div class="label_product">
                                            <span class="label_sale">Sale</span>
                                        </div>
                                        @php    
                                            }
                                        @endphp
                                    <div class="action_links">
                                        <ul>
                                            <li class="wishlist"><a href="{{route('website.addToWishList', ['id'=>$product4->id])}}" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true" data-tippy="Add to Wishlist"><i class="fa-regular fa-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <div class="product_content_inner">
                                        <h4 class="product_name"><a href="{{ route('website.detail', ['id' => $product4->name]) }}">{{ $product4->name}}</a></h4>
                                        <div class="price_box">
                                            @php  if($product4->old_price == NULL){

                                                @endphp
                                                    @php
                                                        }else{
                                                    @endphp
                                                    <span class="old_price">{{ number_format($product4->old_price,0,"",".")}}VND</span>       
                                                @php    
                                                }
                                                @endphp
                                            <span class="current_price">{{ number_format($product4->price,0,"", ".") }} VND</span>
                                        </div>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="{{route('website.addToCart', ['id'=>$product4->id])}}" title="Thêm vào giỏ hàng">Thêm vào giỏ hàng</a>
                                    </div>

                                </div>
                            </figure>
                        </article>
                        @endforeach
                      
                    </div>
                </div>
                
            </div>

        </div>
    </div>
    <!--product area end-->

    <!--banner area start-->
    <div class="banner_area banner_style2 mb-55">
        <div class="container">
            <div class="row">
               
                <div class="col-lg-3 col-md-3">
                    <figure class="single_banner">
                        <div class="banner_thumb">
                            <a href="{{route('website.blog')}}"><img src="{{ asset('website/assets/img/bg/6BD1D926-AFFA-45E4-A5C6-DE9386EED1CB-390x210.png') }}" alt=""></a>
                        </div>
                    </figure>
                </div>
                
                <div class="col-lg-6 col-md-6">
                    <figure class="single_banner">
                        <div class="banner_thumb">
                            <a href="{{route('website.blog')}}"><img src="{{ asset('website/assets/img/bg/720-220-720x220-223.png') }}" alt=""></a>
                        </div>
                    </figure>
                </div>
                <div class="col-lg-3 col-md-3">
                    <figure class="single_banner">
                        <div class="banner_thumb">
                            <a href="{{route('website.blog')}}"><img src="{{ asset('website/assets/img/bg/samsung-390-210-390x210.png') }}" alt=""></a>
                        </div>
                    </figure>
                </div>
            </div>
        </div>
    </div>
    <!--banner area end-->

    <!--product area start-->
    <div class="small_product_area small_product_style2">
        <div class="container">
            <div class="row">
                @foreach ($category_lasted as $category => $products)
                <div class="col-lg-4">
                    <div class="small_product_list">
                        <div class="section_title">
                           <h2>{{ $category }}</h2>
                        </div>
                        <div class="product_carousel small_p_container  product_column1 owl-carousel">
                            @foreach($products as $product)
                            <div class="product_items">
                                
                                @foreach ($product as $item)
                                <figure class="single_product">
                                    <div class="product_thumb">
                                        <a class="primary_img" href="{{ route('website.detail', ['id' => $item->name]) }}"><img src="{{ asset('images/products/'. $item->images) }}" alt=""></a>
                                        <a class="secondary_img" href="{{ route('website.detail', ['id' => $item->name]) }}"><img src="{{ asset('images/products/'. $item->images) }}" alt=""></a>
                                    </div>
                                    <div class="product_content">
                                        <h4 class="product_name"><a href="{{ route('website.detail', ['id' => $item->name]) }}">{{$item->name}}</a></h4>
                                        {{-- <div class="product_rating">
                                            <ul>
                                                <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                            </ul>
                                        </div> --}}
                                        <div class="price_box">
                                            @php  if($item->old_price == NULL){

                                                @endphp
                                                    @php
                                                        }else{
                                                    @endphp
                                                    <span class="old_price">{{ number_format($item->old_price,0,"",".")}}VND</span>       
                                                @php    
                                                }
                                                @endphp
                                            <span class="current_price">{{ number_format($item->price,0,"", ".") }} VND</span>
                                        </div>
                                        <div class="product_cart_button">
                                            <a href="{{route('website.addToCart', ['id'=>$item->id])}}" title="Thêm vào giỏ hàng"><i class="fa fa-shopping-bag"></i></a>
                                        </div>
                                    </div>
                                </figure>
                                
                                @endforeach
                             
                            </div>
                           @endforeach
                          
                        </div>
                    </div>
                    
                </div>
                @endforeach
            </div>
            
        </div>
    </div>
    <!--product area end-->
</div>
</div>

@include('website.partials.footer')