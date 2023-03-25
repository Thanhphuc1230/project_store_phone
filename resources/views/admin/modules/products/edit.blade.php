@extends('admin.master')
@section('content')
@section('module', 'Product')
@section('action','Edit')

<form action="{{ route('admin.products.update', ['uuid'=> $product->id])}}" method="post" enctype="multipart/form-data">
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
        <h3 class="m-0">Product Edit</h3>
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
                        <option value="{{ $cate->id }}" {{ old('category_id', $product->category_id) == $cate->id ? 'selected' : '' }}>{{ $cate->name_cate }}</option>
                        @endforeach

                    </select>
            </div>
        <div class="mb-3">
        <h6 class="card-subtitle mb-2">Name</h6>
        <input type="text" name="name" class="form-control"  placeholder="vd: Iphone 13 Promax " value="{{old('name',$product->name)}}">
        </div>

        <div class="mb-3">
            <h6 class="card-subtitle mb-2">Price</h6>
        <input type="text" name="price" class="form-control" placeholder="vd: 2000000 đơn vị đã được mặc định là vnd"value="{{old('price',$product->price)}}" >
        </div>
        <div class="mb-3">
            <h6 class="card-subtitle mb-2">Price old</h6>
        <input type="text" name="old_price" class="form-control" placeholder="vd: 2000000 đơn vị đã được mặc định là vnd"value="{{old('price',$product->old_price)}}" >
        </div>
        
        <div class="mb-3">
            <h6 class="card-subtitle mb-2">Intro</h6>
            <input type="text" name="intro" class="form-control"  placeholder="vd: Sản phẩm đời mới nhất" value="{{old('intro',$product->intro)}}">
        </div>
        
        <div class="mb-3">
            <h6 class="card-subtitle mb-2">Content</h6>
            <input type="text" name="content" class="form-control"  placeholder="vd: Dành cho tính đồ nhà táo" value="{{old('content',$product->content)}}">
        </div>

        <div class="mb-3" >
            <h6 class="card-subtitle mb-2" >Images Current</h6>
            @php
                $images = !empty($product->images) ? $product->images : 'default.jpeg';
            @endphp
            <div>
                <img class="img-fluid img-thumbnail" src="{{asset('images/products/' . $images) }}" alt="" width="250px">
            </div>
        </div>

        <div class="input-group mb-3" >
            <label class="input-group-text" >Images</label>
            <input type="file" class="form-control" name="images" >
        </div>

        
        <div class="mb-3">
            <h6 class="card-subtitle mb-2">Screen</h6>
        <input type="text" name="screen" class="form-control" value="{{old('screen',$product->screen)}} ">
        </div>

        <div class="mb-3">
            <h6 class="card-subtitle mb-2">Color</h6>
        <input type="text" name="color" class="form-control" value="{{old('color',$product->color)}}">
        </div>
        <div class="mb-3">
            <h6 class="card-subtitle mb-2">Weight</h6>
        <input type="text" name="weight" class="form-control" value="{{old('weight',$product->weight)}}">
        </div>
        <div class="mb-3">
            <h6 class="card-subtitle mb-2">Quantity</h6>
        <input type="text" name="quantity" class="form-control" value="{{old('quantity',$product->quantity)}}">
        </div>
        <div class="mb-3">
            <h6 class="card-subtitle mb-2">Ngày ra mắt</h6>
            <div class=" mb-0">
                <input type="date" class="form-control" name="countdown" id="inputDateTime" >
                </div>
        </div>

        <div class="mb-3">
            <h6 class="card-subtitle mb-2">Trạng thái</h6>
            <select class="form-select" name="status_product" >
                <option selected="" value="1" {{ old('status_product',$product->status_product ) == 1 ? 'selected' : ''}}>Hiện</option>
                <option value="0" {{ old('status_product',$product->status_product ) == 0 ? 'selected' : ''}}>Ẩn</option>
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