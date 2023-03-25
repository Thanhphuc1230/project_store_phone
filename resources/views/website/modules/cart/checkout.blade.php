@include('website.partials.head')
@include('website.partials.header')
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li>Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger" role="alert">
    <i class="ti-alert"></i>
        @foreach ($errors->all() as $error)
            <li> {{ $error }} </li>
        @endforeach
    </div>
@endif
<div class="checkout_page_bg">
    <div class="container">
        <div class="Checkout_section">
            @if(!Auth::user())
            <div class="row">
                <div class="col-12">
                    <div class="user-actions">
                        <h3> 
                            <i class="fa fa-file-o" aria-hidden="true"></i>
                            Returning customer?
                            <a class="Returning" href="#checkout_login" data-bs-toggle="collapse" aria-expanded="true">Click here to login</a>     

                        </h3>
                         <div id="checkout_login" class="collapse" data-parent="#accordion">
                            <div class="checkout_info">
                                <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer please proceed to the Billing &amp; Shipping section.</p>  
                                <form action="#">  
                                    <div class="form_group">
                                        <label>Username or email <span>*</span></label>
                                        <input type="text">     
                                    </div>
                                    <div class="form_group">
                                        <label>Password  <span>*</span></label>
                                        <input type="text">     
                                    </div> 
                                    <div class="form_group group_3 ">
                                        <button type="submit">Login</button>
                                        <label for="remember_box">
                                            <input id="remember_box" type="checkbox">
                                            <span> Remember me </span>
                                        </label>     
                                    </div>
                                    <a href="#">Lost your password?</a>
                                </form>          
                            </div>
                        </div>    
                    </div>
                    
               </div>
            </div>
            @endif
            @if(Auth::user())
            <div class="checkout_form">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="checkout_form_left">
                            <form action="{{ route('website.store', ['uuid'=> $user->uuid] )}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <h3>Thông tin khách hàng</h3>
                                <div class="row">

                                 
                                    <div class="col-12 mb-20">
                                        <label>Họ và tên người nhận<span>*</span></label>
                                        <input type="text" name="fullname_order"  value="{{ old('fullname_order', $user->fullname)}}">
                                    </div>
                                    <div class="col-12 mb-20">
                                        <label >Địa chỉ <span>*</span></label>
                                        <input type="text" name="address" value="{{ old('address', $user->address)}}">

                                      
                                    </div>

                                    <div class="col-12 mb-20">
                                        <label>SĐT<span>*</span></label>
                                        <input type="text" name="phone" value="{{ old('phone', $user->phone)}}">
                                    </div>
                                  
                                    <div class="col-12 mb-20">
                                        <label>Email <span>*</span></label>
                                        <input type="email" name="email" value="{{ old('email', $user->email)}}">
                                    </div>
                               
                                    

                                        
                                    <div class="col-12">
                                        <div class="order-notes">
                                            <label for="order_note">Ghi Chú <span>*</span></label>
                                            <textarea id="order_note" name="notes"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-default">
                                    {{-- <input id="payment" name="payment" value="1" type="checkbox" data-target="createp_account">
                                    <label for="payment" data-bs-toggle="collapse" data-bs-target="#method" aria-controls="method">Thanh Toán ATM</label> --}}
                                    <input id="payment" name="payment" value="2" type="checkbox" data-target="createp_account">
                                    <label for="payment" data-bs-toggle="collapse" data-bs-target="#method" aria-controls="method">Tiền mặt</label>
                                   
                                    
                                </div>
                               
                                <div class="col-12 mb-20">
                                    <input id="address" type="checkbox" data-target="createp_account">
                                    <label id="payment" for="address" data-bs-toggle="collapse" data-bs-target="#collapsetwo" aria-controls="collapseOne" aria-expanded="false">Thanh Toán ATM</label>

                                    <div id="collapsetwo" class="one collapse" data-parent="#accordion" style="">
                                        <div class="row">
                                            <div class="col-lg-6 mb-20">
                                                <label  for="payment" data-bs-toggle="collapse" data-bs-target="#method" aria-controls="method">MB BANK:888815052001<span>*</span></label>
                                                <label> Đào Thanh Phúc <span>*</span></label>
                                                <input name="payment" value="1" style="display: none">
                                            </div>                                                                                      
                                        </div>
                                    </div>
                                </div>
                                <div class="payment_method">
                                    
                                    
                                    <div class="order_button">
                                        <button type="submit">Thanh Toán</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="checkout_form_right">
                            <form action="#">
                                <h3>Bill</h3>
                                <div class="order_table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Sản phẩm</th>
                                                <th>Số lượng</th>
                                                <th>Giá tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($cart as $item)
                                            <tr>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->qty}}</td>
                                                <td>{{number_format($item->price* $item->qty)}} VND</td>
                                            </tr>
                                            @endforeach
                                        
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Giá chưa thuế</th>
                                                <td> <strong>{{Cart::count()}}</strong></td>
                                            
                                                <td> <strong>{{Cart::subTotal()}} VND</strong></td>
                                            </tr>
                                            <tr>
                                                <th>Thuế</th>
                                                <td></td>
                                                <td><strong>8%</strong></td>
                                            </tr>
                                            <tr class="order_total">
                                                <th>Giá sau thuế</th>
                                                <td></td>
                                                <td><strong>{{Cart::total()}} VND</strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                              
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@include('website.partials.footer')