@extends('admin.master')
@section('content')
@section('module', 'Sliders')
@section('action','Create')

<form action="{{ route('admin.sliders.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="main_content_iner ">
        <div class="container-fluid p-0 sm_padding_15px">
        <div class="row justify-content-center">
        <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
        <div class="box_header m-0">
        <div class="main-title">
            <a href="{{route('admin.sliders.index')}}"> <i class="ti-arrow-left" style="font-size: 25px"></i></a> 
        <h3 class="m-0">Sliders Create</h3>
        </div>
        </div>
        </div>
        <div class="white_card_body">
        
        <form>
           
        <div class="mb-3">
        <h6 class="card-subtitle mb-2">Tên Slider</h6>
        <input type="text" name="name" class="form-control"  value="{{old('name')}}">
        </div>

        <div class="mb-3">
            <h6 class="card-subtitle mb-2">Đường dẫn</h6>
        <input type="text" name="desc" class="form-control" value="{{old('desc')}}" >
        </div>
        
        <div class="mb-3">
            <h6 class="card-subtitle mb-2">Hình ảnh</h6>
            <input type="file" name="images" class="form-control"   value="{{old('images')}}">
        </div>
        
        <div class="mb-3">
            <h6 class="card-subtitle mb-2">Trạng thái</h6>
            <select class="form-select" name="status" >
                <option selected="" value="1">Hiện</option>
                <option value="0">Ẩn</option>
            </select>
        </div>

        
       

        
        
        <button type="submit" class="btn btn-primary">Create</button>
        </form>
        </div>
        </div>
        </div>
        </div>
        </div>
    </div>
</form>
    
@endsection