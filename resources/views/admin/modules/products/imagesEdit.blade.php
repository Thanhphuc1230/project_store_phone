@extends('admin.master')
@section('content')
@section('module', 'Product')
@section('action','Edit Images')

<form action="{{ route('admin.products.updateEdit', ['uuid'=> $user->uuid])}}" method="post" enctype="multipart/form-data">

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
        <h3 class="m-0">Product Edit Images</h3>
        </div>
        </div>
        </div>
        <div class="white_card_body">
        
        <form>
            @foreach($products as $product)
            <div class=" mb-3">
                <h6 class="card-subtitle mb-2" >Name Product</h6>
                <input type="text" name="product_name" class="myfrm form-control hidden" value="{{$product->product_name}}" disabled>
            </div>
            @endforeach
            @foreach($images_new3 as $new3)
            <img src="{{asset('files/'.$new3)}}" alt="" style="width:250px">
            @endforeach
             <div class="input-group hdtuto control-group lst increment" >
            <div class="list-input-hidden-upload">
                <input type="file" name="filenames[]" id="file_upload" class="myfrm form-control hidden">
            </div>
            <div class="input-group-btn"> 
                <button class="btn btn-success btn-add-image" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>+Add image</button>
            </div>
        </div>
        <div class="list-images">
            @if (isset($list_images) && !empty($list_images))
                @foreach (json_decode($list_images) as $key => $img)
                    <div class="box-image">
                        <input type="hidden" name="images_uploaded[]" value="{{ $img }}" id="img-{{ $key }}">
                        <img src="{{ asset('files/'.$img) }}" class="picture-box">
                        <div class="wrap-btn-delete"><span data-id="img-{{ $key }}" class="btn-delete-image">x</span></div>
                    </div>
                @endforeach
                <input type="hidden" name="images_uploaded_origin" value="{{ $list_images }}">
                <input type="hidden" name="id" value="{{ $id }}">
            @endif
        </div>
        <div class="button-submit">
            <button type="submit" class="btn btn-success" style="margin-top:10px">
                @if (isset($list_images))
                    Update
                @else
                    Submit
                @endif
            </button>
        </div>

        

        {{-- <button type="submit" class="btn btn-primary" >Edit</button> --}}
        </form>
        </div>
        </div>
        </div>
        </div>
        </div>
    </div>
</form>
    
@endsection