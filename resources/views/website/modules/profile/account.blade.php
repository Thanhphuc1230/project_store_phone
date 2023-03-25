@include('website.partials.head')
@include('website.partials.header')
{{-- @extends('website.master')
@section('content') --}}
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

<div class="account_page_bg">
    <div class="container">
        <section class="main_content_area">
            <div class="account_dashboard">
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <!-- Nav tabs -->
                        <div class="dashboard_tab_button">
                            <ul role="tablist" class="nav flex-column dashboard-list" id="nav-tab">
                          
                               
                                <li><a href="#information" data-toggle="tab" class="nav-link active">Thông tin</a></li>
                                <li> <a href="#orders" data-toggle="tab" class="nav-link ">Đơn hàng</a></li>
                               
                         
                            </ul>
                            <ul  class="nav flex-column dashboard-list">
                                <li> <a href="{{route('logout')}}"   >Logout</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-md-9 col-lg-9">
                       
                        <!-- Tab panes -->
                        <div class="tab-content dashboard_content" >
                         
                            <div class="tab-pane active" id="information">
                                <address>  
                                <h4 class="billing-address">Thông tin người dùng</h4>
                              
                                <p><strong>Fullname: </strong>{{$user->fullname}}</p>
                                <p><strong>Email: </strong>{{$user->email}}</p>
                                <p><strong>Gender: </strong>
                                @php 
                                    if($user->gender == 1){
                                @endphp
                                        Nam
                                @php        
                                    }elseif($user->gender == 2){
                                @endphp
                                        Nữ
                                @php       
                                    }else{
                                @endphp        
                                        Khác
                                @php        
                                    }
                                @endphp
                                </p>
                                    <span><strong>Avatar:</strong> 
                                    @php
                                        $avatar = !empty($user->avatar) ? $user->avatar : 'default.png';
                                 @endphp  

                                    <div >
                                        <img class="img-fluid img-thumbnail" src="{{ asset('images/users/'. $avatar) }}" alt="" width="200px">
                                    </div>
                                    </span>
                                    <br>
                                    <span><strong>SDT: </strong>{{$user->phone}}</span>
                                    <br>
                                    <span><strong>Address:</strong> {{$user->address}}</span>
                                    <br>
                          
                                </address>
                                <p> <a href="{{ route('website.accountEdit', ['uuid' => Auth::user()->uuid]) }}" class="view">Edit</a></p>
                               
                            </div>
                            <div class="tab-pane fade show" id="orders">
                                <h3>Orders</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Order</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                {{-- <th>Address</th> --}}
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th>Day</th>
                                                <th>Chi tiet</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($order_status as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{$user->fullname_order}}</td>
                                                <td>{{$user->phone}}</td>
                                                {{-- <td>{{$user->address}}</td> --}}
                                                <td>
                                                    @php
                                                        if($user->order_status == 0){
                                                    @endphp
                                                       <p style="color: red"> Đang xử lý </p>
                                                    
                                                     
                                                    @php
                                                        }else{
                                                    @endphp
                                                        <p style="color: green">  Đã giao thành công</p>  
                                                    @php
                                                            }
                                                    @endphp
                                        
                                                </td>
                                                <td>{{$user->order_total}}VND</td>
                                                <td>{{ date('d/m/Y', strtotime($user->created_at )) }}</td>
                                              
                                                <td><a href="{{ route('website.accountOrder', ['id' => $user->order_id]) }}">View</a> </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                       
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@include('website.partials.footer')


