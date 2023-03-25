@include('website.partials.head')
@include('website.partials.header')
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="{{Route('website.index')}}">home</a></li>
                        <li>My account</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="checkout_page_bg">
    <div class="container">
        <div class="Checkout_section">
            <div class="row">
                <div class="col-12">
                    <div class="user-actions">
                       
                           <a href="{{ route('website.account', ['uuid' => Auth::user()->uuid]) }}"> <i class="fa-solid fa-arrow-left" style="font-size: 30px"></i></a>
  

                
                       
                    </div>
                
               </div>
            </div>
            <div class="checkout_form">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="checkout_form_left">
                            <form action="#">
                                <h3>Chi tiết đơn hàng</h3>
                                <div class="row">
                                      
                                    <div class="col-12 mb-20">
                                        <label>Tên người gửi</label>
                                        <input type="text" name="fullname"  value="{{ old('fullname', $order_user->fullname)}}">
                                    </div>
                                    <div class="col-12 mb-20">
                                        <label>SĐT</label>
                                        <input type="text" name="phone"  value="{{ old('phone', $order_user->phone)}}">
                                    </div>
                                
                                    @foreach($order_status as $status)
                                    <div class="col-12 mb-20">
                                        <label>Tên người nhận</label>
                                        <input type="text"  value="{{ old('phone', $status->fullname_order)}}">
                                    </div>
                                    <div class="col-12 mb-20">
                                        <label>SĐT</label>
                                        <input type="text" value="{{ old('phone', $status->phone)}}">
                                    </div>
                                    <div class="col-12 mb-20">
                                        <label>Address</label>
                                        <input type="text" value="{{ old('address', $status->address)}}">
                                    </div>
                                    <div class="col-12 mb-20">
                                        <label>Notes</label>
                                        <input type="text" value="{{ old('notes', $status->notes)}}">
                                    </div>
                                    @endforeach
                                  
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="checkout_form_right">
                            <form action="#">
                                <h3>Your order</h3>
                                <div class="order_table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Sản phẩm</th>
                                                <th>Giá tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($order_product as $product)
                                            <tr>
                                                <td>{{$product->product_name}} <strong> × {{$product->product_sales_quantity}}</strong></td>
                                                <td>{{number_format($product->product_price *$product->product_sales_quantity) }} VND</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                       
                                            <tr>
                                                <th>Tổng tiền</th>
                                                <td>{{$order_user->order_total}} VND</td>
                                            </tr>
                                       
                                            
                                        </tfoot>
                                    </table>
                                </div>
                               
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('website.partials.footer')