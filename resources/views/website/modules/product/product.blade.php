@include('website.partials.head')
@include('website.partials.header')

<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="{{route('website.index')}}">Trang chủ</a></li>
                        <li>{{$category_name->name_cate}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="shop_area shop_fullwidth">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <!--shop banner area start-->
                <div class="shop_banner_area mb-30">
                    <div class="row">
                        <div class="col-12">
                            <div class="shop_banner_thumb">
                                <img src="{{ asset('website/assets/img/bg/slider10.png') }} " alt="">
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
                    <div class="page_amount " ><h3>{{$category_name->name_cate}}</h3></div>
                    <div class="page_amount">
                        <p>Showing 1–9 of 21 results</p>
                    </div>
                </div>
                <!--shop toolbar end-->

                <!--shop wrapper start-->
                <div class="row no-gutters shop_wrapper grid_4">
                    @foreach($products_random as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a class="primary_img" href="{{ route('website.detail', ['id' => Str::of( $product->name)->slug("-"),'uuid'=>$product->uuid]) }}"><img src="{{ asset('images/products/' . $product->images) }}" alt=""></a>
                                    <a class="secondary_img" href="{{ route('website.detail', ['id' => Str::of( $product->name)->slug("-"),'uuid'=>$product->uuid]) }}"><img src="{{ asset('images/products/' . $product->images) }} " alt=""></a>
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

                                <div class="product_content grid_content">
                                    <div class="product_content_inner">
                                        <h4 class="product_name"><a href="{{ route('website.detail', ['id' => Str::of( $product->name)->slug("-"),'uuid'=>$product->uuid]) }}">{{$product->name}}</a></h4>
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
                                            @php  if($product->old_price == NULL){

                                                @endphp
                                                    @php
                                                        }else{
                                                    @endphp
                                                    <span class="old_price">{{ number_format($product->old_price,0,"","." )}} VND</span>       
                                                @php    
                                                }
                                                @endphp
                                            <span class="current_price">{{ number_format($product->price,0,"",".")}} VND</span>
                                        </div>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="{{route('website.addToCart', ['id'=>$product->id])}}" title="Add to cart">Thêm vào giỏ hàng</a>
                                    </div>
                                </div>
                                <div class="product_content list_content">
                                    <h4 class="product_name"><a href="{{ route('website.detail', ['id' => Str::of( $product->name)->slug("-"),'uuid'=>$product->uuid]) }}">{{$product->name}}</a></h4>
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
                                        @php  if($product->old_price == NULL){

                                            @endphp
                                                @php
                                                    }else{
                                                @endphp
                                                <span class="old_price">{{ number_format($product->old_price,0,"","." )}} VND</span>       
                                            @php    
                                            }
                                            @endphp
                                        <span class="current_price">{{ number_format($product->price,0,"",".")}} ND</span>
                                    </div>
                                    <div class="product_desc">
                                        <p>{{$product->intro}}</p>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="{{route('website.addToCart', ['id'=>$product->id])}}" title="Add to cart">Thêm vào giỏ hàng</a>
                                    </div>
                                    <div class="action_links">
                                        <ul>
                                            <li class="wishlist"><a href="{{route('website.addToWishList', ['id'=>$product->id])}}" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i>Thêm vào danh sách yêu thích</a></li>
                                            
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