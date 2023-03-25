@extends('admin.master')
@section('module','Orders')
@section('action','List')
@section('content')
<div class="white_card card_height_100 mb_30">
    
    <div class="white_card_header">
    
    </div>
    <div class="white_card_body">
    <div class="QA_section">
    <div class="white_box_tittle list_header">
        <a href="{{route('admin.orders.index')}}"> <i class="ti-arrow-left" style="font-size: 25px"></i></a> 
    <h3>Thông tin khách hàng</h3>
    <div class="box_right d-flex lms_block">
 
 
    </div>
    </div>
    <div class="main_content_iner ">
        <div class="container-fluid p-0 sm_padding_15px">
        <div class="row justify-content-center">
        <div class="col-lg-6">
        <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
        <div class="box_header m-0">
        
        </div>
        </div>
            @foreach($order_user as $user)
         <div class="white_card_body">
        <h6 class="card-subtitle mb-2">Tên người đặt</h6>
        
        <input type="text" class="form-control" maxlength="25" name="maxlength-default" id="maxlength-default" placeholder="Enter text" value="{{$user->fullname}}">
        </div>
  
        </div>
        </div>
        <div class="col-lg-6">
        <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
        <div class="box_header m-0">
       
        </div>
        </div>
        <div class="white_card_body">
        <h6 class="card-subtitle mb-2">Số điện thoại</h6>
        <input type="text" class="form-control" maxlength="25" name="maxlength-threshold" id="maxlength-threshold" placeholder="Enter text" value="{{$user->phone}}">
        </div>
        </div>
        </div>
        @endforeach
        <div class="col-lg-6">
        <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
        <div class="box_header m-0">
       
        </div>
        </div>
       
        @foreach($order_shipping as $shipping)
        <div class="white_card_body">
        <h6 class="card-subtitle mb-2">Tên người nhận</h6>
        <input type="text" class="form-control" maxlength="25" name="maxlength-all-options" id="maxlength-all-options" placeholder="Enter text" value="{{$shipping->fullname_order}}">
        </div>
        </div>
        </div>
        <div class="col-lg-6">
            <div class="white_card card_height_100 mb_30">
            <div class="white_card_header">
            <div class="box_header m-0">
           
            </div>
            </div>
            <div class="white_card_body">
            <h6 class="card-subtitle mb-2">Số điện thoại người nhận</h6>
            <input type="text" class="form-control" maxlength="25" name="maxlength-all-options" id="maxlength-all-options" placeholder="Enter text"  value="{{$shipping->phone}}">
            </div>
            </div>
            </div>
        <div class="col-lg-6">
        <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
        <div class="box_header m-0">
       
        </div>
        </div>
        <div class="white_card_body">
        <h6 class="card-subtitle mb-2">Địa chỉ</h6>
        <input type="text" class="form-control" maxlength="25" name="maxlength-positions" id="maxlength-positions" placeholder="Enter text" value="{{$shipping->address}}">
        </div>
        </div>
        </div>
        <div class="col-lg-6">
            <div class="white_card card_height_100 mb_30">
            <div class="white_card_header">
            <div class="box_header m-0">
           
            </div>
            </div>
            <div class="white_card_body">
            <h6 class="card-subtitle mb-2">Ghi chú</h6>
            <input type="text" class="form-control" maxlength="25" name="maxlength-positions" id="maxlength-positions" placeholder="Enter text" value="{{$shipping->notes}}">
            </div>
            </div>
            </div>

     
        </div>
        </div>
        </div>
        @endforeach
    
  

        <h3>Liệt kê đơn hàng</h3>
    <div class="QA_table mb_30">
    
        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper no-footer">
            
            <table class="table lms_table_active3 dataTable no-footer dtr-inline" id="DataTables_Table_1" role="grid" aria-describedby="DataTables_Table_1_info" style="width: 971px;">
        <thead>
        <tr role="row">
            <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 133px;" aria-label="Category: activate to sort column ascending">Tên sản phẩm</th>
            <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 133px;" aria-label="Category: activate to sort column ascending">Số lượng</th>
            <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 133px;" aria-label="Category: activate to sort column ascending">Giá</th>
            <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 133px;" aria-label="Category: activate to sort column ascending">Tổng tiền</th>

        </tr>
        </thead>
    
    
        <tbody>
            <tr role="row" class="odd">
                @foreach($order_product as $product)
                <td>{{$product->product_name}}</td>
                <td>{{$product->product_sales_quantity}}</td>
                <td>{{ number_format($product->product_price,0,"",".")}} VND</td>
                
                <td> {{ number_format($product->product_price *$product->product_sales_quantity ,0,"",".")}} VND</td>
               
               </tr>               
               @endforeach
             </tbody>
        </table>
    
        
        </div>
        </div>
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
            <div class="white_card_header">
                @foreach($order_user as $user)
            <div class="main-title">
            <h3 class="m-0">Tổng Tiền {{$user->order_total}} VND</h3>
            </div>
            @endforeach
            
            </div>
            </div>
    </div>

    {{-- end content --}}
@endsection
