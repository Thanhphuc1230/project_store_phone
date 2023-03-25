@extends('admin.master')
@section('module','Orders')
@section('action','List')
@section('content')
<div class="white_card card_height_100 mb_30">
    
    <div class="white_card_header">
    
    </div>
    <div class="white_card_body">
    
            
       
    
  

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
                @foreach($Sales as $sales)
            <div class="main-title">
            <h3 class="m-0">Tổng Tiền {{number_format($sales->sales,0,"",",")}} VND</h3>
            </div>
                @endforeach
            
            </div>
            </div>
    </div>

    {{-- end content --}}
@endsection
