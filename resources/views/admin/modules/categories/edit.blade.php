@extends('admin.master')
@section('content')
@section('module', 'Category')
@section('action','Edit')

<form action="{{ route('admin.categories.update', ['id'=> $category->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="main_content_iner ">
        <div class="container-fluid p-0 sm_padding_15px">
        <div class="row justify-content-center">
        <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
        <div class="box_header m-0">
            
        <div class="main-title">
          <a href="{{route('admin.categories.index')}}"> <i class="ti-arrow-left" style="font-size: 25px"></i></a> 
        <h3 class="m-0">Category Edit</h3>
        </div>
        </div>
        </div>
        <div class="white_card_body">
        
        <form>
        <div class="mb-3">
            <h6 class="card-subtitle mb-2">Category Name</h6>
            <input type="text" name="name_cate" class="form-control"  placeholder="vd: Samsung" value="{{ old('author', $category->name_cate)}}">
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
                <option value="8">Sản phẩm mới</option>
            </select>
        </div>
        <div class="mb-3">
            <h6 class="card-subtitle mb-2">Trạng thái</h6>
            <select class="form-select" name="status" >
                <option selected="" value="1" {{ old('status',$category->status ) == 1 ? 'selected' : ''}}>Hiện</option>
                <option value="0" {{ old('status',$category->status ) == 0 ? 'selected' : ''}}>Ẩn</option>
            </select>
        </div>
        
        
        
        <button type="submit" class="btn btn-primary">Edit</button>
        
        </form>
        </div>
        </div>
        </div>
        </div>
        </div>
    </div>
</form>
    
@endsection