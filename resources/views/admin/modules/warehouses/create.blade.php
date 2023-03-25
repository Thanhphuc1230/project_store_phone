@extends('admin.master')
@section('content')
@section('module', 'Warehouse')
@section('action','Create')

<form action="{{ route('admin.warehouses.store')}}" method="post" enctype="multipart/form-data">
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
        <h3 class="m-0">Warehouse Create</h3>
        </div>
        </div>
        </div>
        <div class="white_card_body">
        
        <form>
            <div class=" mb-3">
                <h6 class="card-subtitle mb-2" >Product</h6>
                    <select class="form-select" name="product_id" >
                        <option selected="">Chọn Sản Phẩm</option>

                        @foreach ($products as $product)
                        <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                        @endforeach

                    </select>
            </div>

        <div class="mb-3">
            <h6 class="card-subtitle mb-2">Import</h6>
            <input type="text" name="import" class="form-control"  placeholder=" Số lượng sản phẩm nhập vào" value="{{old('import')}}">
        </div>
        
        <div class="mb-3">
            <h6 class="card-subtitle mb-2">Export</h6>
            <input type="text" name="export" class="form-control"  placeholder="Số lượng sản phẩm bán ra"value="{{old('import')}}">
        </div>

       

        <div class="mb-3">
            <h6 class="card-subtitle mb-2">Price</h6>
            
        <input type="text" name="price_cost" class="form-control" placeholder="Giá vốn của sản phẩm"  value="{{old('price_const')}}">
             
            </div>

        <div class="mb-3">
            <h6 class="card-subtitle mb-2">Price Sale</h6>
        <input type="text" name="price_sale" class="form-control" placeholder="Giá bán ra" value="{{old('price_sale')}}">
        </div>

        

        <div class="mb-3">
            <h6 class="card-subtitle mb-2">Price Discount</h6>
        <input type="text" name="price_discount" class="form-control" placeholder="Giá bán sau khi giảm giá "value="{{old('price_discount')}}">
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