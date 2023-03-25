@include('website.partials.head')
@include('website.partials.header')
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="{{route('website.index')}}">home</a></li>
                        <li>shop search</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="shop_area shop_reverse">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <!--sidebar widget start-->
                <aside class="sidebar_widget">
                    <div class="widget_list widget_categories">
                        <h3>Nhãn hàng sản phẩm</h3>
                        <ul> @foreach($categories_featured as $cate )
                            <li><a href="{{route('website.category',['id' =>$cate->name_cate] ) }}">{{$cate->name_cate}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    
                    <div class="widget_list">
                        <h3>Sản phẩm tiêu biểu</h3>
                        <div class="recent_product_container">
                            @foreach($products_random1 as $product1)
                            <article class="recent_product_list">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="{{ route('website.detail', ['id' => $product1->name]) }}"><img src="{{ asset('images/products/' . $product1->images) }}"alt=""></a>
                                        <a class="secondary_img" href="{{ route('website.detail', ['id' => $product1->name]) }}"><img src="{{ asset('images/products/' . $product1->images) }}"alt=""></a>
                                    </div>
                                    <div class="product_content">
                                        <h4><a href="product-details.html">{{$product1->name_cate}}</a></h4>
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
                                            @php  if($product1->old_price == NULL){

                                                @endphp 
                                                    @php
                                                        }else{
                                                    @endphp
                                                    <span class="old_price">{{ number_format($product1->old_price,0,"",".")}}VND</span>       
                                                @php    
                                                }
                                                @endphp
                                            <span class="current_price">{{ number_format($product1->price,0,"",".")}}VND</span>
                                        </div>
                                    </div>
                                </figure>
                            </article>
                           
                            @endforeach
                        </div>
                    </div>
                    {{-- <div class="widget_list tags_widget">
                        <h3>Product tags</h3>
                        <div class="tag_cloud">
                            <a href="#">blouse</a>
                            <a href="#">clothes</a>
                            <a href="#">fashion</a>
                            <a href="#">handbag</a>
                            <a href="#">laptop</a>
                        </div>
                    </div> --}}
                </aside>
                <!--sidebar widget end-->
            </div>
            <div class="col-lg-9 col-md-12">

                <!--shop banner area start-->
                <div class="shop_banner_area mb-30">
                    <div class="row">
                        <div class="col-12">
                            <div class="shop_banner_thumb">
                                <img src=" {{asset('website/assets/img/bg/banner16.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <!--shop banner area end-->
                <!--shop toolbar start-->
                <div class="shop_toolbar_wrapper">
                    <div class="shop_toolbar_btn">
                        <button data-role="grid_4" type="button" class="btn-grid-4 active" data-toggle="tooltip" title="4"></button>
                        <button data-role="grid_list" type="button" class="btn-list" data-toggle="tooltip" title="List"></button>
                    </div>
                    {{-- <div class=" niceselect_option" style="display: none;">
                        <form class="select_option" action="#" style="display: none;">
                            <select name="orderby" id="short">

                                <option selected="" value="1">Sort by average rating</option>
                                <option value="2">Sort by popularity</option>
                                <option value="3">Sort by newness</option>
                                <option value="4">Sort by price: low to high</option>
                                <option value="5">Sort by price: high to low</option>
                                <option value="6">Product Name: Z</option>
                            </select>
                        </form><div class="nice-select select_option" tabindex="0"><span class="current">Sort by average rating</span><ul class="list"><li data-value="1" class="option selected">Sort by average rating</li><li data-value="2" class="option">Sort by popularity</li><li data-value="3" class="option">Sort by newness</li><li data-value="4" class="option">Sort by price: low to high</li><li data-value="5" class="option">Sort by price: high to low</li><li data-value="6" class="option">Product Name: Z</li></ul></div>
                    </div><div class="nice-select niceselect_option" tabindex="0"><span class="current">Sort by average rating</span><ul class="list"><li data-value="1" class="option selected">Sort by average rating</li><li data-value="2" class="option">Sort by popularity</li><li data-value="3" class="option">Sort by newness</li><li data-value="4" class="option">Sort by price: low to high</li><li data-value="5" class="option">Sort by price: high to low</li><li data-value="6" class="option">Product Name: Z</li></ul></div> --}}
                    <div class="page_amount">
                        <h3>{{$key}}</h3>
                    </div>
                    <div class="page_amount">
                        <p>Showing 1–9 of 21 results</p>
                    </div>
                </div>
                <!--shop toolbar end-->

                <!--shop wrapper start-->
                <div class="row no-gutters shop_wrapper grid_4">
                    @foreach($name as $title)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a class="primary_img" href="{{ route('website.detail', ['id' => $title->name]) }}"><img src="{{ asset('images/products/' . $title->images) }}" alt=""></a>
                                    <a class="secondary_img" href="{{ route('website.detail', ['id' => $title->name]) }}"><img src="{{ asset('images/products/' . $title->images) }}" alt=""></a>
                                    <div class="label_product">
                                        @php  if($title->old_price == NULL){

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
                                    </div>
                                    <div class="action_links">
                                        <ul>
                                            <li class="wishlist"><a href="{{route('website.addToWishList', ['id'=>$title->id])}}" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true" data-tippy="Add to Wishlist"><i class="fa-regular fa-heart"></i></a></li>
                                           
                                        </ul>
                                    </div>
                                </div>

                                <div class="product_content grid_content">
                                    <div class="product_content_inner">
                                        <h4 class="product_name"><a href="{{route('website.detail',['id'=>$title->name])}}">{{ $title->name}}</a></h4>
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
                                            @php  if($title->old_price == NULL){

                                            @endphp
                                                @php
                                                    }else{
                                                @endphp
                                                <span class="old_price">{{ number_format($title->old_price,0,"",".")}}VND</span>       
                                            @php    
                                            }
                                            @endphp
                                        

                                        <span class="current_price">{{ number_format($title->price,0,"",".")}}VND</span>
                                    </div>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="{{route('website.addToCart', ['id'=>$title->id])}}" title="Add to cart">Add to cart</a>
                                    </div>
                                </div>
                                <div class="product_content list_content">
                                    <h4 class="product_name"><a href="{{route('website.detail',['id'=>$title->name])}}">{{$title->name}}</a></h4>
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
                                        @php  if($product1->old_price == NULL){

                                            @endphp 
                                                @php
                                                    }else{
                                                @endphp
                                                <span class="old_price">{{ number_format($product1->old_price,0,"",".")}}VND</span>       
                                            @php    
                                            }
                                            @endphp
                                        <span class="current_price">{{ number_format($product1->price,0,"",".")}}VND</span>
                                    </div>
                                    <div class="product_desc">
                                        <p>{{$title->intro}}</p>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="{{route('website.addToCart', ['id'=>$title->id])}}" title="Add to cart">Add to cart</a>
                                    </div>
                                    <div class="action_links">
                                        <ul>
                                            <li class="wishlist"><a href="{{route('website.addToWishList', ['id'=>$title->id])}}" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i> Add to Wishlist</a></li>
                                           
                                        </ul>
                                    </div>
                                </div>
                            </figure>
                        </article>
                    </div>
                    @endforeach
                   
                </div>

                {{-- <div class="shop_toolbar t_bottom">
                    <div class="pagination">
                        <ul>
                            <li class="current">1</li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li class="next"><a href="#">next</a></li>
                            <li><a href="#">&gt;&gt;</a></li>
                        </ul>
                    </div>
                </div> --}}
                <!--shop toolbar end-->
                <!--shop wrapper end-->
            </div>
        </div>
    </div>
</div>
@include('website.partials.footer')