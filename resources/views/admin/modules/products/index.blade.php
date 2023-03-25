@extends('admin.master')
@section('module','Product')
@section('action','List')
@section('content')
<div class="white_card card_height_100 mb_30">
    <div class="white_card_header">
    
    </div>
    <div class="white_card_body">
    <div class="QA_section">
    <div class="white_box_tittle list_header">
    <h3>Product-list</h3>
 
    </div>
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
       
        <div class="white_card_body">
        
        
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
       Add Products
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
       
                @include('admin.partials.error')
                <form action="{{ route('admin.products.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                 
                        <div class="col-lg-12">
                        <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                        <div class="box_header m-0">
                        <div class="main-title">
                        <h3 class="m-0">Product Create</h3>
                        </div>
                        </div>
                        </div>
                        <div class="white_card_body">
                        
                        <form>
                            <div class=" mb-3">
                                <h6 class="card-subtitle mb-2" >Nhãn hàng</h6>
                                    <select class="form-select" name="category_id" >
                                        <option selected="">Chọn Thể loại</option>
                
                                        @foreach ($categories as $cate)
                                        <option value="{{ $cate->id }}" {{ old('category_id') == $cate->id ? 'selected' : '' }}>{{ $cate->name_cate }}</option>
                                        @endforeach
                
                                    </select>
                            </div>
                        <div class="mb-3">
                        <h6 class="card-subtitle mb-2">Tên sản phẩm</h6>
                        <input type="text" name="name" class="form-control"  placeholder="vd: Iphone 13 Promax " value="{{old('name')}}">
                        </div>
                
                        <div class="mb-3">
                            <h6 class="card-subtitle mb-2">Giá tiền</h6>
                        <input type="text" name="price" class="form-control" placeholder="vd: 2000000 đơn vị đã được mặc định là vnd"value="{{old('price')}}" >
                        </div>
                        <div class="mb-3">
                            <h6 class="card-subtitle mb-2">Giá cũ</h6>
                        <input type="text" name="old_price" class="form-control" placeholder="Sản phẩm chưa giảm thì không cần nhập"value="{{old('old_price')}}" >
                        </div>
                        
                        <div class="mb-3">
                            <h6 class="card-subtitle mb-2">Giới thiệu</h6>
                            <input type="text" name="intro" class="form-control"  placeholder="vd: Sản phẩm đời mới nhất" value="{{old('intro')}}">
                        </div>
                        
                        <div class="mb-3">
                            <h6 class="card-subtitle mb-2">Nội dung</h6>
                            <input type="text" name="content" class="form-control"  placeholder="vd: Dành cho tính đồ nhà táo" value="{{old('content')}}">
                        </div>
                
                        <div class="input-group mb-3" >
                            <label class="input-group-text" >Hình ảnh</label>
                            <input type="file" class="form-control" name="images" value="{{old('images')}}">
                        </div>
                
                        
                        <div class="mb-3">
                            <h6 class="card-subtitle mb-2">Thông số màn hình</h6>
                        <input type="text" name="screen" class="form-control" value="{{old('screen')}} ">
                        </div>
                
                        <div class="mb-3">
                            <h6 class="card-subtitle mb-2">Màu</h6>
                        <input type="text" name="color" class="form-control" value="{{old('color')}}">
                        </div>
                        <div class="mb-3">
                            <h6 class="card-subtitle mb-2">Cân nặng</h6>
                        <input type="text" name="weight" class="form-control" value="{{old('weight')}}">
                        </div>
                        <div class="mb-3">
                            <h6 class="card-subtitle mb-2">Quantity</h6>
                        <input type="text" name="quantity" class="form-control" value="{{old('quantity')}}">
                        </div>
                    
                       
                        <div class="mb-3">
                            <h6 class="card-subtitle mb-2">Trạng thái</h6>
                            <select class="form-select" name="status_product" >
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
                </form>
           
           
            </div>
            </div>
            </div>
    <div class="QA_table mb_30">
    
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper no-footer">
        
        <table class="table dataTable no-footer dtr-inline"id='my-table' role="grid" aria-describedby="DataTables_Table_1_info" style="width: 971px;">
    <thead>
    <tr role="row">
        <th scope="col" class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 101px;" aria-sort="ascending" >ID</th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 132px;">Images</th>
        {{-- <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 132px;">Gallery</th> --}}


        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 132px;">Category</th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 133px;" >Name</th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 133px;" >Price</th>

        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 132px;">Status</th>
        
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 127px;">Created</th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 67px;" >Action</th>
      
    </tr>
    </thead>
    <tbody>
          
   <tr role="row" class="odd">
    
    @foreach ($products as $product)     
    
        <td>{{ $loop->iteration }}</td>
        @php
        $images = !empty($product->images) ? $product->images : 'default.png';
        @endphp

    <td><img src="{{ asset('images/products/'.$images) }}" width="50px"></td>
    {{-- <td><a href="{{route('admin.products.add_gallery',['id' => $product->id])}}">Thu vien anh</a></td> --}}
        <td>{{ $product->name_cate }}</td>

        <td>{{ $product->name }}</td>

        <td>
            @php
                if($product->old_price == NULL){
            @endphp
                    {{$product->price}}
            
            
            @php
                }else{
            @endphp
                   
            {{$product->price}} (Sales)
            @php
                    }
            @endphp

        </td>
      
        
        <td>
            @php
                if($product->status_product == 0){
            @endphp
               <a onclick="return confirm('Xác nhận kích hoạt sản phẩm ?')"  href="{{ route('admin.products.unactive_products',['id' => $product->id]) }} "class="status_btn" style="background: #FA8072 !important">Unactive</a>   
            
            
            @php
                }else{
            @endphp
                   
            <a onclick="return confirm('Xác nhận tắt kích hoạt sản phẩm ?')" href="{{ route('admin.products.active_products',['id' => $product->id]) }} "class="status_btn">Active</a> 
            @php
                    }
            @endphp

        </td>
     
        <td>@php
                if($product->countdown == NULL){
            @endphp
                <p style="color:olivedrab">Đã ra mắt</p> 
            @php
                }else{
             @endphp
                 <p style="color: red">Sắp ra mắt</p> 
            @php       
                }
            @endphp        
        </td>



        <td><div class="action_btns d-flex">
            <a  href="{{ route('admin.products.edit', ['uuid' => $product->uuid]) }}" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
            <a  onclick="return confirm('Xác nhận xóa sản phẩm ?')"  href="{{ route('admin.products.destroy', ['uuid' => $product->uuid]) }}" class="action_btn"> <i class="fas fa-trash"></i> </a>
            <a  href="{{ route('admin.products.images', ['uuid' => $product->uuid]) }}" class="action_btn"> <i class="ti-plus"></i> </a>
            
                <a  href="{{ route('admin.products.imagesEdit', ['uuid' => $product->uuid]) }}" class="action_btn"><i class="ti-layers-alt"></i> </a>
         
        </div>
    </td>
   


       
    </tr>
    @endforeach
    </tbody>

    </table>

   
    </div>
    </div>
    </div>

    {{-- end content --}}
@endsection