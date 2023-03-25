@extends('admin.master')
@section('module','Warehouse')
@section('action','List')
@section('content')
<div class="white_card card_height_100 mb_30">
    <div class="white_card_header">
    
    </div>
    <div class="white_card_body">
    <div class="QA_section">
    <div class="white_box_tittle list_header">
    <h3>Warehouse-list</h3>
    
    </div>
    <div class="QA_table mb_30">
    
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper no-footer">
        
        <table  class="table dataTable no-footer dtr-inline"id='my-table' role="grid" aria-describedby="DataTables_Table_1_info" style="width: 971px;">
    <thead>
    <tr role="row">
        <th scope="col" class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 101px;" aria-sort="ascending" >ID</th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 133px;" >Sản phẩm</th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 132px;">Nhập vào</th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 132px;">Bán ra</th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 132px;">Tồn kho</th>

        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 132px;">Giá vốn</th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 127px;">Giá bán</th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 127px;">Giá giảm</th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 67px;" >Created</th>

        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 67px;" >Action</th>
    </tr>
    </thead>
    <tbody>
          
   <tr role="row" class="odd">
    
    @foreach ($warehouses as $warehouse)     
        
        <td>{{ $loop->iteration }}</td>
        
        <td>{{ $warehouse->name }}</td>
        <td>{{ $warehouse->import }}</td>
        <td>{{ $warehouse->export }}</td>
        
        <td>{{ $warehouse->import - $warehouse->export}}</td>
        <td>{{ $warehouse->price_cost }}</td>
        <td>{{ $warehouse->price_sale }}</td>
        <td>{{ $warehouse->price_discount }}</td>
     
        <td>{{ date('d/m/Y', strtotime($warehouse->created_at )) }}</td>
        <td><div class="action_btns d-flex">
            <a   href="{{ route('admin.warehouses.edit', ['Wuuid' => $warehouse->Wuuid]) }}"class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
            <a  onclick="return confirm('Xác nhận xóa sản phẩm ?')"  href="{{ route('admin.warehouses.destroy', ['Wuuid' => $warehouse->Wuuid]) }}"class="action_btn"> <i class="fas fa-trash"></i> </a>
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