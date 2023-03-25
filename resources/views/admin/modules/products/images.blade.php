@extends('admin.master')
@section('content')
@section('module', 'Product')
@section('action','Create')

<form action="{{ route('admin.products.store_images')}}" method="post" enctype="multipart/form-data">
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
            @foreach($products as $product)
            <div class=" mb-3">
                <h6 class="card-subtitle mb-2" >Name Product</h6>
                <input type="text" name="product_name" class="myfrm form-control hidden" value="{{$product->name}}" >
            </div>
            <div class="list-images" style="width: 50px">
                @if (isset($list_images) && !empty($list_images))
                    @foreach (json_decode($list_images) as $key => $img)
                        <div class="box-image123">
                            <input type="hidden" name="images_uploaded[]" value="{{ $img }}" id="img-{{ $key }}">
                            <img src="{{ asset('files/'.$img) }}" style="width:250px !important">
                            <div class="wrap-btn-delete"><span data-id="img-{{ $key }}" class="btn-delete-image">x</span></div>
                        </div>
                    @endforeach
                    <input type="hidden" name="images_uploaded_origin" value="{{ $list_images }}">
                    <input type="hidden" name="id" value="{{ $id }}">
                @endif
            </div>
            <div class=" mb-3" style="display:none" >
                <h6 class="card-subtitle mb-2" disabled >Product ID</h6>
                <input type="text" name="product_id" class="myfrm form-control hidden" value="{{$product->id}}">
            </div>
            @endforeach
            <div class="list-input-hidden-upload">
                <input type="file" name="filenames[]" id="file_upload" class="myfrm form-control hidden">
            </div>

        

        <button type="submit" class="btn btn-primary" >Create</button>
        </form>
        </div>
        </div>
        </div>
        </div>
        </div>
    </div>
</form>
    
@endsection