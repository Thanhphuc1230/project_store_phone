@extends('admin.master')
@section('module','Category')
@section('action','List')
@section('content')
<div class="white_card card_height_100 mb_30">
    <div class="white_card_header">
    
    </div>
    <div class="white_card_body">
    <div class="QA_section">
    <div class="white_box_tittle list_header">
    <h3>Category-list</h3>
    
    </div>

    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
       
        <div class="white_card_body">
        
        
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
        Add Category
        </button>
        </div>
        </div>
        </div>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
           
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
            </div>
            <div class="modal-body">
                @include('admin.partials.error')
                <form action="{{ route('admin.categories.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                   
                        <div class="container-fluid p-0 sm_padding_15px">
                        <div class="row justify-content-center">
                        <div class="col-lg-12">
                        <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                        <div class="box_header m-0">
                        <div class="main-title">
                        <h3 class="m-0">Category Create</h3>
                        </div>
                        </div>
                        </div>
                        <div class="white_card_body">
                        
                        <form>
                        <div class="mb-3">
                        <h6 class="card-subtitle mb-2">Tên nhãn hàng</h6>
                        <input type="text" name="name_cate" class="form-control"  placeholder="vd: Samsung">
                        </div>
                        <div class="mb-3">
                            <h6 class="card-subtitle mb-2">Chi tiết</h6>
                            <select class="form-select" name="parent_id" >
                                <option selected="" value="1">Nhãn hàng mới</option>
                                <option  value="2">Điện thoại</option>
                                <option  value="3">Laptop</option>
                                <option  value="4">Macbook</option>
                                <option  value="5">Tablet</option>
                                <option  value="6">Ipad</option>
                                <option  value="7">Phụ kiện</option>
                                
                            </select>
                        </div>
                        <div class="mb-3">
                            <h6 class="card-subtitle mb-2">Trạng thái</h6>
                            <select class="form-select" name="status" >
                                <option selected="" value="1">Hiện</option>
                                <option value="0">Ẩn</option>
                            </select>
                        </div>
                        
                        
                        
                       
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save </button>
                            </div>
                        </form>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                    
                </form>
            </div>
           
            </div>
            </div>
            </div>
    <div class="QA_table mb_30">
    
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper no-footer">
        
        <table class="table dataTable no-footer dtr-inline" id='my-table'  role="grid" aria-describedby="DataTables_Table_1_info" style="width: 971px;">
    <thead>
    <tr role="row">
        <th scope="col" class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 101px;" aria-sort="ascending" aria-label="title: activate to sort column descending">ID</th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 133px;" aria-label="Category: activate to sort column ascending">Category</th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 133px;" aria-label="Category: activate to sort column ascending">Status</th>

        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 127px;" aria-label="Lesson: activate to sort column ascending">Created</th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 67px;" aria-label="Price: activate to sort column ascending">Action</th>

    </tr>
    </thead>


    <tbody>
          

   <tr role="row" class="odd">

    
    @foreach ($categories as $cate)     
    
    <td>{{ $loop->iteration }}</td>
        <td>{{ $cate->name_cate }}</td>
        <td>
            @php
                if($cate->status == 0){
            @endphp
               <a  onclick="return confirm('Xác nhận kích hoạt nhãn hàng ?')"  href="{{ route('admin.categories.unactive_categories',['id' => $cate->id]) }} "class="status_btn" style="background:#FA8072!important">Unactive</a>   
            
            
            @php
                }else{
            @endphp
                   
            <a onclick="return confirm('Xác nhận tắt kích hoạt nhãn hàng ?')"  href="{{ route('admin.categories.active_categories',['id' => $cate->id]) }} "class="status_btn">Active</a> 
            @php
                    }
            @endphp

        </td>
  
        <td>{{ date('d/m/Y', strtotime($cate->created_at )) }}</td>
       
        <td><div class="action_btns d-flex">
            <a  href="{{ route('admin.categories.edit', ['id' => $cate->id]) }}" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
            <a  onclick="return confirm('Xác nhận xóa nhãn hàng ?')"  href="{{ route('admin.categories.destroy', ['id' => $cate->id]) }}" class="action_btn"> <i class="fas fa-trash"></i> </a>
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