@extends('admin.master')
@section('module','Turnovers')
@section('action','List')
@section('content')
<div class="white_card card_height_100 mb_30">
    <div class="white_card_header">
    
    </div>
    <div class="white_card_body">
    <div class="QA_section">
    <div class="white_box_tittle list_header">
    <h3>Danh sách doanh thu</h3>
    <div class="box_right d-flex lms_block">
  
 
    </div>
    </div>
    <div class="QA_table mb_30">
    
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper no-footer">
        
        <table class="table  dataTable no-footer dtr-inline" id='my-table' role="grid" aria-describedby="DataTables_Table_1_info" style="width: 971px;">
    <thead>
    <tr role="row">
        <th scope="col" class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 101px;" aria-sort="ascending" >ID</th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 133px;" >Doanh thu</th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 133px;" >Số lượng sản phẩm</th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 132px;">Số lượng đơn hàng</th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 132px;">Ngày</th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 67px;" >Action</th>
    </tr>
    </thead>


    <tbody>
          

   <tr role="row" class="odd">
    @foreach($turnovers as $turnover)
        <td>{{ $loop->iteration }}</td>
        <td>{{number_format($turnover->sales,0,"", "," )}} VND</td>
        <td>{{$turnover->quantity}} Sản phẩm</td>
        <td>{{$turnover->total_order}} Đơn</td>
        <td>{{$turnover->order_date}}</td>
        <td><div class="action_btns d-flex">
            <a  href="{{ route('admin.turnovers.edit', ['id' => $turnover->order_date]) }}" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
            <a  onclick="return confirm('Xác nhận xóa sản phẩm ?')"  href="{{ route('admin.turnovers.destroy', ['id' => $turnover->id_turnover]) }}"class="action_btn"> <i class="fas fa-trash"></i> </a></td>
    </tr>
    @endforeach
    </tbody>

    </table>

 
    </div>
    </div>
</div>
    </div>

    {{-- end content --}}
@endsection