@extends('admin.master')
@section('module','Sliders')
@section('action','List')
@section('content')
<div class="white_card card_height_100 mb_30">
    <div class="white_card_header">
    
    </div>
    <div class="white_card_body">
    <div class="QA_section">
    <div class="white_box_tittle list_header">
    <h3>Sliders-list</h3>
    <div class="box_right d-flex lms_block">
    <div class="serach_field_2">
    <div class="search_inner">
    <form active="#">
    <div class="search_field">
    <input type="text" placeholder="Search content here...">
    </div>
    <button type="submit"> <i class="ti-search"></i> </button>
    </form>
    </div>
    </div>
    <div class="add_button ms-2">
    <a href="#" data-toggle="modal" data-target="#addcategory" class="btn_1">Add New</a>
    </div>
    </div>
    </div>
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
       
        <div class="white_card_body">
        
        
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
        Add Sliders
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
                <form action="{{ route('admin.sliders.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                  
                        <div class="col-lg-12">
                        <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                        <div class="box_header m-0">
                        <div class="main-title">
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
                </form>
            </div>
           
            </div>
            </div>
            </div>
    <div class="QA_table mb_30">
    
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper no-footer">
        
        <table class="table lms_table_active3 dataTable no-footer dtr-inline" id="DataTables_Table_1" role="grid" aria-describedby="DataTables_Table_1_info" style="width: 971px;">
    <thead>
    <tr role="row">
        <th scope="col" class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 101px;" aria-sort="ascending" >ID</th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 132px;">Images</th>


        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 133px;" >Name</th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 133px;" >Status</th>

        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 132px;">Desc</th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 127px;">Created</th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 67px;" >Action</th>
      
    </tr>
    </thead>
    <tbody>
          
   <tr role="row" class="odd">
    
    @foreach ($sliders as $slider)     
    
        <td>{{ $loop->iteration }}</td>
        @php
        $images = !empty($slider->images) ? $slider->images : 'default.png';
        @endphp

    <td><img src="{{ asset('images/sliders/'.$images) }}" width="200px"></td>
        

        <td>{{ $slider->name }}</td>
        <td>
            @php
                if($slider->status == 0){
            @endphp
               <a href="{{ route('admin.sliders.unactive_sliders',['id' => $slider->id]) }} "class="status_btn" style="background: #FA8072 !important">Unactive</a>   
            
            
            @php
                }else{
            @endphp
                   
            <a href="{{ route('admin.sliders.active_sliders',['id' => $slider->id]) }} "class="status_btn">Active</a> 
            @php
                    }
            @endphp

        </td>
      
        
        <td>{{ $slider->desc }}</td>
     
        <td>{{ date('d/m/Y', strtotime($slider->created_at )) }}</td>
        <td><div class="action_btns d-flex">
            <a  href="{{ route('admin.sliders.edit', ['id' => $slider->id]) }}" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
            <a  onclick="return confirm('xác nhân xóa slider ?')"  href="{{ route('admin.sliders.destroy', ['id' => $slider->id]) }}" class="action_btn"> <i class="fas fa-trash"></i> </a>
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