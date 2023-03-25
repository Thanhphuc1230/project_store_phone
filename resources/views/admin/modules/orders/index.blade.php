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
    <h3>Orders-list</h3>

    </div>
    <div class="QA_table mb_30">
    
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper no-footer">
        
        <table class="table dataTable no-footer dtr-inline" id='my-table' role="grid" aria-describedby="DataTables_Table_1_info" style="width: 971px;">
    <thead>
    <tr role="row"> 
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 133px;" aria-label="Category: activate to sort column ascending">STT</th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 133px;" aria-label="Category: activate to sort column ascending">Name</th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 133px;" aria-label="Category: activate to sort column ascending">Payment</th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 133px;" aria-label="Category: activate to sort column ascending">Total</th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 133px;" aria-label="Category: activate to sort column ascending">Status</th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 127px;" aria-label="Lesson: activate to sort column ascending">Created</th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 67px;" aria-label="Price: activate to sort column ascending">Action</th>

    </tr>
    </thead>


    <tbody>
          

        <tr role="row" class="odd">
     
            @foreach($order_status as $status)
            <td>{{ $loop->iteration }}</td>
            <td>{{$status->fullname_order}}</td>
            <td>@php
                if($status->payment == 1){
                @endphp
                Thanh toán bằng thẻ ATM
                @php
                }else{
                @endphp
                    Thanh toán bằng tiền mặt
                 @php    
                    }
                @endphp
            </td>
            <td>{{$status->order_total}} VND</td>
            <td>
                @php
                    if($status->order_status == 0){
                @endphp
                   <a href="{{ route('admin.orders.unactive_orders',['id' => $status->id]) }} "class="status_btn" style="background:#FA8072!important">Đang xử lý</a>
                
                 
                @php
                    }else{
                @endphp
                       
                <a href="{{ route('admin.orders.active_orders',['id' => $status->id]) }}  " class="status_btn">Đã giao thành công</a>
                @php
                        }
                @endphp
    
            </td>
            <td>{{ date('d/m/Y', strtotime($status->created_at )) }}</td>
            <td><div class="action_btns d-flex">
                <a href="{{ route('admin.orders.edit', ['id' => $status->id]) }}" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                <a  onclick="return confirm('Xác nhận xóa đơn hàng ?')"  href="{{ route('admin.orders.destroy', ['id' => $status->id]) }}" class="action_btn"> <i class="fas fa-trash"></i> </a>
            </div></td>
        </tr>
            @endforeach
     
   
         </tbody>

    </table>

    
    </div>
    </div>
    </div>

    {{-- end content --}}
@endsection