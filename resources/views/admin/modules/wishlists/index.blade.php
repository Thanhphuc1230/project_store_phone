@extends('admin.master')
@section('module','Wishlist')
@section('action','List')
@section('content')
<div class="white_card card_height_100 mb_30">
    <div class="white_card_header">
    
    </div>
    <div class="white_card_body">
    <div class="QA_section">
    <div class="white_box_tittle list_header">
    <h3>Danh sách yêu thích</h3>
    
    </div>
    <div class="QA_table mb_30">
    
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper no-footer">
        
        <table  class="table dataTable no-footer dtr-inline"id='my-table' role="grid" aria-describedby="DataTables_Table_1_info" style="width: 971px;">
    <thead>
    <tr role="row">
        <th scope="col" class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 101px;" aria-sort="ascending" >ID</th>

        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 133px;" >Sản phẩm</th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 132px;">Yêu thích</th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 67px;" >Created</th>

        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 67px;" >Action</th>
    </tr>
    </thead>
    <tbody>
          
   <tr role="row" class="odd">
    
    @foreach ($wishlist as $wishlists)     
        
        <td>{{ $loop->iteration }}</td>
       
   
        <td>{{ $wishlists->name_product }}</td>
       
        <td>{{ $wishlists->likes_top}}<i style="color: red;padding-left:5px"  class="ti-heart"></i></td>
        
  
        
    
     
        <td>{{ date('d/m/Y', strtotime($wishlists->created_at )) }}</td>
        
        <td><div class="action_btns d-flex">
            <a  onclick="return confirm('Xác nhận xóa sản phẩm ?')"  href="{{ route('admin.wishlists.destroy', ['id' => $wishlists->id_top]) }}"class="action_btn"> <i class="fas fa-trash"></i> </a>
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