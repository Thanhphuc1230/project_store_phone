@include('website.partials.head')
@include('website.partials.header')

<div class="breadcrumbs_area mt-45">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="{{route('website.index')}}">home</a></li>
                        <li>{{$product->name}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product_page_bg">
    <div class="container">
        <div class="product_details_wrapper mb-55">
            <!--product details start-->
            <div class="product_details">
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <div class="product-details-tab">
                            <div id="img-1" class="zoomWrapper single-zoom">
                                <a href="#">
                                    <img id="zoom1" src=" {{ asset('images/products/' . $product->images) }}" data-zoom-image=" {{ asset('images/products/' . $product->images) }}" alt="big-1">
                                </a>
                            </div>
                            <div class="single-zoom-thumb">
                                <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                                    @foreach($images_new3 as $images)
                                    <li>
                                        <a href="#" class="elevatezoom-gallery active" data-update="" data-image=" {{ asset('files/' . $images) }}" data-zoom-image="{{ asset('files/' . $images) }}">
                                            <img src=" {{ asset('files/' . $images) }}" alt="zo-th-1" />
                                        </a>

                                    </li>
                                    @endforeach
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6">
                        <div class="product_d_right">
                         

                                <h3><a href="#">{{$product->name}}</a></h3>
                            
                                <div class="product_rating">
                             
                                        @php $rate_number= number_format($rating_value) @endphp
                                            @for($i=1; $i<=$rate_number;$i++)
                                            <span class="fa fa-star checked"></span>
                                            @endfor

                                            @for($j=$rate_number+1; $j<=5 ;$j++)
                                            <span class="fa fa-star "></span>
                                            @endfor
                                            
                                            @if($rating->count() >0)
                                                ({{ $rating->count()}} Ratings)  
                                            @else
                                                No Ratings 
                                            @endif                 
                               
                                </div>
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
                                    <span class="current_price">{{ number_format($product->price,0,"",".")}}VND</span>
                                </div>
                                <div class="product_desc">
                                    <p>{{$product->intro}} </p>
                                </div>
                               
                                <div class="product_variant quantity">
                                    
                                    <button class="button" type="submit"> <a href="{{route('website.addToCart', ['id'=>$product->id])}}">add to cart</a> </button>

                                </div>
                                <div class=" product_d_action">
                                    <ul>
                                        <li><a href="{{route('website.addToWishList', ['id'=>$product->id])}}" title="Add to wishlist">+ Add to Wishlist</a></li>
                                        
                                    </ul>
                                </div>
                     
                            <div class="priduct_social">
                                <ul>
                                    <li><a class="facebook"  href="#" title="facebook"><i class="fa fa-facebook"></i> Like</a></li>
                                    <li><a class="twitter" href="#" title="twitter"><i class="fa fa-twitter"></i> tweet</a></li>
                                    <li><a class="pinterest" href="#" title="pinterest"><i class="fa fa-pinterest"></i> save</a></li>
                                    <li><a class="google-plus" href="#" title="google +"><i class="fa fa-google-plus"></i> share</a></li>
                                    <li><a class="linkedin" href="#" title="linkedin"><i class="fa fa-linkedin"></i> linked</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!--product details end-->

            <!--product info start-->
            <div class="product_d_info">
                <div class="row">
                    <div class="col-12">
                        <div class="product_d_inner">
                            <div class="product_info_button">
                                <ul class="nav" role="tablist" id="nav-tab">
                                    <li>
                                        <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Giới thiệu</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet" aria-selected="false">Thông số</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews    
                                            @if($rating->count() >0)
                                                ({{ $rating->count()}} Comments)  
                                            @else
                                                No Comments 
                                            @endif      </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="info" role="tabpanel">
                                    <div class="product_info_content">
                                        <p>{{$product->intro}}</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="sheet" role="tabpanel">
                                    <div class="product_d_table">
                                        <form action="#">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="first_child">Sreen</td>
                                                        <td>{{$product->screen}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="first_child">Weight</td>
                                                        <td>{{$product->weight}}</td>
                                                    </tr>
                                                  
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                    <div class="product_info_content">
                                        <p>{{$product->content}}</p>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="reviews" role="tabpanel">
                                    <div class="reviews_wrapper">
                                    <h2>@if($rating->count() >0)
                                                {{ $rating->count()}}   
                                            @else
                                                No 
                                            @endif  review for {{$product->name}}</h2>
                                         @foreach($comments as $comment)
                                        <div class="reviews_comment_box">
                                            <div class="comment_thmb">
                                                <img src="{{ asset('images/users/'.$comment->avatar) }} " alt="" style="width:50px">
                                            </div>
                                            <div class="comment_text">
                                                <div class="reviews_meta">
                                                    {{-- <div class="product_rating">
                                                        <ul>
                                                            <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                            <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                            <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                            <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                            <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                        </ul>
                                                    </div> --}}
                                                    <p><strong>{{$comment->fullname}}</strong>  {{$comment->created_at}}</p>
                                                    <span>{{$comment->comments}}</span>
                                                </div>
                                            </div>

                                        </div>
                                        @endforeach
                                        <div class="comment_title">
                                            
                                            <h2>Add a review </h2>
                                            <p>Your email address will not be published. Required fields are marked </p>
                                        </div>
                                        
                                        <div class="product_review_form">
                                            <form action="{{route('website.postComment', ['uuid'=>$product->uuid])}}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12">
                                                        <fieldset class="rating">
                                                            <input type="hidden" name="id_post" value="{{$product->uuid}} ">
                                                            <input type="radio" id="star5" name="rate" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                                            <input type="radio" id="star4half" name="rate" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                                            <input type="radio" id="star4" name="rate" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                                            <input type="radio" id="star3half" name="rate" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                                            <input type="radio" id="star3" name="rate" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                                                            <input type="radio" id="star2half" name="rate" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                                            <input type="radio" id="star2" name="rate" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                                            <input type="radio" id="star1half" name="rate" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                                            <input type="radio" id="star1" name="rate" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                                                            <input type="radio" id="starhalf" name="rate" value="0.5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="review_comment">Your review </label>
                                                        <textarea name="comments" id="review_comment"></textarea>
                                                    </div>
                                                  
                                                </div>
                                                @if(Auth::user())
                                                <button type="submit">Post Comment</button>
                                                @endif
                                                @if(!Auth::user())
                                                <div class="cart_button">
                                                    <a href="{{route('website.check')}}">Post Comment</a>
                                                </div>
                                                @endif
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--product info end-->
        </div>

        <!--product area start-->
        <section class="product_area related_products">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>Sản phẩm tương tự </h2>
                    </div>
                </div>
            </div>
            <div class="product_carousel product_style product_column5 owl-carousel">
                @foreach($product_related as $item)
                <article class="single_product">
                    <figure>

                        <div class="product_thumb">
                            <a class="primary_img" href="{{ route('website.detail', ['id' => $item->name]) }}"><img src="{{ asset('images/products/' . $item->images) }}" alt=""></a>
                            <a class="secondary_img" href="{{ route('website.detail', ['id' => $item->name]) }}"><img src="{{ asset('images/products/' . $item->images) }}" alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="wishlist"><a href="{{route('website.addToWishList', ['id'=>$item->id])}}" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true" data-tippy="Add to Wishlist"><i class="fa-regular fa-heart"></i></a></li>
                                    {{-- <li class="compare"><a href="#" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"  data-tippy="Add to Compare"><i class="ion-ios-settings-strong"></i></a></li>
                                    <li class="quick_button"><a href="#" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"  data-bs-toggle="modal" data-bs-target="#modal_box" data-tippy="quick view"><i class="ion-ios-search-strong"></i></a></li> --}}
                                </ul>
                            </div>
                        </div>
                        <div class="product_content">
                            <div class="product_content_inner">
                                <h4 class="product_name"><a href="{{ route('website.detail', ['id' => $item->name]) }}">{{$item->name}}</a></h4>
                                <div class="price_box">
                                    @php  if($item->old_price == NULL){

                                        @endphp
                                            @php
                                                }else{
                                            @endphp
                                            <span class="old_price">{{ number_format($item->old_price,0,"","." )}} VND</span>       
                                        @php    
                                        }
                                        @endphp
                                    <span class="current_price">{{ number_format($item->price,0,"",".")}}VND</span>
                                </div>
                            </div>
                            <div class="add_to_cart">
                                <a href="{{route('website.addToCart', ['id'=>$item->id])}}" title="Add to cart">Add to cart</a>
                            </div>

                        </div>
                    </figure>
                </article>
                @endforeach
                
            </div>

        </section>
        <!--product area end-->
    </div>
</div>

<!--footer area start-->

<!--footer area end-->

<!-- modal area start-->

@include('website.partials.footer')