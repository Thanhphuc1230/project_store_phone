@extends('admin.master')
@section('content')
@section('module', 'Product')
@section('action','Create')

<form action="{{ route('admin.products.store_new')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="main_content_iner ">
        <div class="container-fluid p-0 sm_padding_15px">
        <div class="row justify-content-center">
        <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
        <div class="box_header m-0">
        <div class="main-title">
            <a href="{{route('admin.products.index')}}"> <i class="ti-arrow-left" style="font-size: 25px"></i></a> 
        <h3 class="m-0">Product Create</h3>
        </div>
        </div>
        </div>
        <div class="white_card_body">
        
        <form>
            <div class=" mb-3">
                <h6 class="card-subtitle mb-2" >Category</h6>
                    <select class="form-select" name="category_id" >
                        <option selected="">Chọn Thể loại</option>

                        @foreach ($categories as $cate)
                        <option value="{{ $cate->id }}" {{ old('category_id') == $cate->id ? 'selected' : '' }}>{{ $cate->name_cate }}</option>
                        @endforeach

                    </select>
            </div>
        <div class="mb-3">
        <h6 class="card-subtitle mb-2">Name</h6>
        <input type="text" name="name" class="form-control"  placeholder="vd: Iphone 13 Promax " value="{{old('name')}}">
        </div>

        <div class="mb-3">
            <h6 class="card-subtitle mb-2">Price</h6>
        <input type="text" name="price" class="form-control" placeholder="vd: 2000000 đơn vị đã được mặc định là vnd"value="{{old('price')}}" >
        </div>
        
        <div class="mb-3">
            <h6 class="card-subtitle mb-2">Intro</h6>
            <input type="text" name="intro" class="form-control"  placeholder="vd: Sản phẩm đời mới nhất" value="{{old('intro')}}">
        </div>
        
        <div class="mb-3">
            <h6 class="card-subtitle mb-2">Content</h6>
            <input type="text" name="content" class="form-control"  placeholder="vd: Dành cho tính đồ nhà táo" value="{{old('content')}}">
        </div>

        <div class="input-group mb-3" >
            <label class="input-group-text" >Images</label>
            <input type="file" class="form-control" name="images" value="{{old('images')}}">
        </div>

        
        <div class="mb-3">
            <h6 class="card-subtitle mb-2">Screen</h6>
        <input type="text" name="screen" class="form-control" value="{{old('screen')}} ">
        </div>

        <div class="mb-3">
            <h6 class="card-subtitle mb-2">Color</h6>
        <input type="text" name="color" class="form-control" value="{{old('color')}}">
        </div>
        <div class="mb-3">
            <h6 class="card-subtitle mb-2">Weight</h6>
        <input type="text" name="weight" class="form-control" value="{{old('weight')}}">
        </div>
        <div class="mb-3">
            <h6 class="card-subtitle mb-2">Quantity</h6>
        <input type="text" name="quantity" class="form-control" value="{{old('quantity')}}">
        </div>
        <div class="mb-3">
            <h6 class="card-subtitle mb-2">Ngày ra mắt</h6>
            <div class=" mb-0">
                <input type="datetime-local" class="form-control" name="countdown" id="inputDateTime" value="{{old('countdown')}}">
                </div>
        </div>
       
        <div class="mb-3">
            <h6 class="card-subtitle mb-2">Trạng thái</h6>
            <select class="form-select" name="status_product" >
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