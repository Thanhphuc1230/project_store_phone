@include('website.partials.head')
@include('website.partials.header')
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li>Wishlist</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="wishlist_page_bg">
    <div class="container">
        <div class="wishlist_area">
            <div class="wishlist_inner">
                <form action="#">
                    <div class="row">
                        <div class="col-12">
                            <div class="table_desc wishlist">
                                <div class="cart_page table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                               
                                                <th class="product_remove">Stt</th>
                                            
                                                <th class="product_thumb">Hình ảnh</th>
                                                <th class="product_name">Sản phẩm</th>
                                                <th class="product-price">Giá</th>
                                                <th class="product_quantity">Trang thái</th>
                                                <th class="product_total">Thêm vào giỏ hàng</th>
                                                 <th class="product_remove">Xóa</th>
                                            </tr>
                                        </thead>
                                     
                                        <tbody>
                                            @php $i=0  @endphp

                                            @foreach($test as $wish)
                         
                                            @php $i++ @endphp

                                            <tr>
                                               
                                            <td>{{$i}}</td>    
                                                
                                                <td class="product_thumb"><a href="{{ route('website.detail', ['id' => $wish->product_name]) }}"><img src="{{ asset('images/products/'. $wish  ->images_product) }}" alt=""></a></td>
                                                <td class="product_name"><a href="{{ route('website.detail', ['id' => $wish->product_name]) }}">{{$wish->product_name}}</a></td>
                                                <td class="product-price">{{number_format($wish->price_product)}}</td>
                                                <td class="product_quantity">In Stock</td>
                                                <td class="product_total"><a href="{{route('website.addToCart', ['id'=>$wish->id])}}">Thêm vào giỏ hàng</a></td>
                                                <td class="product_remove"><a href="{{route('website.removeWishList', ['id'=>$wish->id])}}">X</a></td>

                                            </tr>
                                            @endforeach

                                      
                                       
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="wishlist_share">
                        <h4>Share on:</h4>
                        <ul>
                            <li><a href="#"><i class="fa fa-rss"></i></a></li>
                            <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                            <li><a href="#"><i class="fa fa-tumblr"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('website.partials.footer')