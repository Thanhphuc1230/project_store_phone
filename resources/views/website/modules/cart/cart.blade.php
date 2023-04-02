@include('website.partials.head')
@include('website.partials.header')

<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="{{route('website.index')}}">Trang Chủ</a></li>
                        <li>Giở hàng</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="cart_page_bg">
        <div class="container">
            <div class="shopping_cart_area">
                <form action="{{ route('website.updateCart')}}" method="post" >
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="table_desc">
                                <div class="cart_page table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product_remove">Xóa</th>
                                                <th class="product_thumb">Hình ảnh</th>
                                                <th class="product_name">Sản phẩm</th>
                                                <th class="product-price">Giá</th>
                                                <th class="product_quantity">Số lượng</th>
                                                <th class="product_total">Tổng tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($cart as $item)
                                            <tr>
                                                <td class="product_remove"><a href="{{ route('website.removeItemCart', ['id' => $item->rowId]) }}"><i class="fa fa-trash-o"></i></a></td>
                                                <td class="product_thumb"><a href="{{ route('website.detail', ['id' => Str::of( $item->name)->slug("-"),'uuid'=>$item->options->uuid]) }}"><img src="{{ asset('images/products/'. $item->options->images) }}" alt=""></a></td>
                                                <td class="product_name"><a href="{{ route('website.detail', ['id' => Str::of( $item->name)->slug("-"),'uuid'=>$item->options->uuid]) }}">{{$item->name}}</a></td>
                                                <td class="product-price">{{number_format($item->price)}}</td>
                                                <td class="product_quantity"><label>Quantity</label> <input min="1" max="100" name="quantity[{{$item->rowId}}]" value="{{$item->qty}}" type="number"></td>
                                                <td class="product_total">{{number_format($item->price * $item->qty)}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="cart_submit">
                                    <button type="submit">Cập nhật giỏ hàng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--coupon code area start-->
                    <div class="coupon_area">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="coupon_code left" style="display:none">
                                    <h3>Coupon</h3>
                                    <div class="coupon_inner">
                                        <p>Enter your coupon code if you have one.</p>
                                        <input placeholder="Coupon code" type="text">
                                        <button type="submit">Apply coupon</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="coupon_code right">
                                    <h3>Tổng tiền giỏ hàng</h3>
                                    <div class="coupon_inner">
                                        <div class="cart_subtotal">
                                            <p>Giá trước thuế</p>
                                            <p class="cart_amount">{{Cart::subTotal()}}VND</p>
                                        </div>
                                        <div class="cart_subtotal ">
                                            <p>Thuế</p>
                                            <p class="cart_amount"><span></span>5%</p>
                                        </div>
                                        {{-- <a href="#">Calculate shipping</a> --}}

                                        <div class="cart_subtotal">
                                            <p>Total</p>
                                            <p class="cart_amount">{{Cart::total()}}VND</p>
                                        </div>
                                        <div class="checkout_btn">
                                            <a href="{{ route('website.checkout', ['uuid' => Auth::user()->uuid]) }}">Thanh Toán</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--coupon code area end-->
                </form>
            </div>
        </div>
    </div>

@include('website.partials.footer')