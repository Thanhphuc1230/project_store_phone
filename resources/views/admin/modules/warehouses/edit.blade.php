@extends('admin.master')
@section('content')
@section('module', 'Warehouse')
@section('action','Edit')

<form action="{{ route('admin.warehouses.update', ['Wuuid'=> $warehouse->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="main_content_iner ">
        <div class="container-fluid p-0 sm_padding_15px">
        <div class="row justify-content-center">
        <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
        <div class="box_header m-0">
        <div class="main-title">
            <a href="{{route('admin.warehouses.index')}}"> <i class="ti-arrow-left" style="font-size: 25px"></i></a> 
        <h3 class="m-0">Edit kho</h3>
        </div>
        </div>
        </div>
        <div class="white_card_body">
        
        <form>
            <div class=" mb-3">
                <h6 class="card-subtitle mb-2" >Tên sản phẩm</h6>
                    <select class="form-select" name="product_id"disabled >
                        <option selected="">Chọn Sản Phẩm</option>

                        @foreach ($products as $product)
                        <option value="{{ $product->id }}" {{ old('product_id', $warehouse->product_id) == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                        @endforeach

                    </select>
            </div>

        <div class="mb-3">
            <h6 class="card-subtitle mb-2">Nhập về</h6>
            <input type="text" name="import" class="form-control"  placeholder=" Số lượng sản phẩm nhập vào" value="{{old('import', $warehouse->import)}}">
        </div>
        
        <div class="mb-3">
            <h6 class="card-subtitle mb-2">Bán ra</h6>
            <input type="text" name="export" class="form-control"  placeholder="Số lượng sản phẩm bán ra" value="{{old('export', $warehouse->export)}}">
        </div>

  

        <div class="mb-3">
            <h6 class="card-subtitle mb-2">Giá vốn</h6>
        <input type="text" name="price_cost" class="form-control" placeholder="Giá vốn của sản phẩm"value="{{old('price_cost', $warehouse->price_cost)}}">
        </div>

        <div class="mb-3">
            <h6 class="card-subtitle mb-2">Giá bán</h6>
        <input type="text" name="price_sale" class="form-control" placeholder="Giá bán ra" value="{{old('price_sale', $warehouse->price_sale)}}">
        </div>

        

        <div class="mb-3">
            <h6 class="card-subtitle mb-2">Giá giảm</h6>
        <input type="text" name="price_discount" class="form-control" placeholder="Giá bán sau khi giảm giá "value="{{old('price_discount', $warehouse->import)}}">
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