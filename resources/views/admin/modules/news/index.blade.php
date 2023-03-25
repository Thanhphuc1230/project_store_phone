@extends('admin.master')
@section('module','New')
@section('action','List')
@section('content')
<div class="white_card card_height_100 mb_30">
    <div class="white_card_header">
    
    </div>
    <div class="white_card_body">
    <div class="QA_section">
    <div class="white_box_tittle list_header">
    <h3>Danh sách tin tức</h3>
    
    </div>
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
       
        <div class="white_card_body">
        
        
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
       Thêm tin tức mới
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
                <form action="{{ route('admin.news.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                                
                    <div class="col-lg-12">
                        <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                        <div class="box_header m-0">
                        <div class="main-title">
                            <a href="{{route('admin.news.index')}}"> <i class="ti-arrow-left" style="font-size: 25px"></i></a> 
                        <h3 class="m-0">News Create</h3>
                        </div>
                        </div>
                        </div>
                        <div class="white_card_body">
                        
                        
                            <div class="mb-3">
                            <h4 class="card-subtitle mb-2">Tiêu đề</h4>
                            <input type="text" name="title" class="form-control" value="{{old('title')}}">
                            </div>
                
                            <div class="mb-3">
                                <h4 class="card-subtitle mb-2">Giới thiệu</h4>
                                <input type="text" name="intro" class="form-control" value="{{old('intro')}}" >
                                </div>
                            
                          
                            <div class="mb-3">
                                <h4 class="card-subtitle mb-2">Avatar News</h4>
                                <input type="file" name="avatar" class="form-control" value="{{old('avatar')}}" >
                                </div>
                            
                            </div>
                                 <div class="white_card_body">
                
                                <h4 class="card-subtitle mb-2">Nội dung bài viết</h4>
                                <textarea class="form-control" name="content"   maxlength="225" rows="3" >{{ old('content')}}</textarea>
                                <script>
                                CKEDITOR.replace( 'content', {
                                    filebrowserUploadUrl: "{{ route('admin.upload', ['_token' => csrf_token()]) }}",
                                    filebrowserUploadMethod: 'form'
                                })</script>
                                </div>
                               
                                    <div class="white_card_body">
                        
                            
                                    <div class="mb-3">
                                        <h4 class="card-subtitle mb-2">Người đăng</h4>
                                           <input type="text" name="author" class="form-control"  placeholder="vd: Samsung"value="{{old('author')}}" >
                                    </div>
                                    <div class="mb-3">
                                        <h6 class="card-subtitle mb-2">Trạng thái</h6>
                                        <select class="form-select" name="status" >
                                            <option selected="" value="1">Hiện</option>
                                            <option value="0">Ẩn</option>
                                        </select>
                                    </div>
                         
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save </button>
                                    </div>
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
        
        <table class="table  dataTable no-footer dtr-inline" id='my-table'role="grid" aria-describedby="DataTables_Table_1_info" style="width: 971px;">
    <thead>
    <tr role="row">
        <th scope="col" class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 101px;" aria-sort="ascending" aria-label="title: activate to sort column descending">Stt</th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 133px;" aria-label="Category: activate to sort column ascending">Tin tức</th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 133px;" aria-label="Category: activate to sort column ascending">Hình ảnh</th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 133px;" aria-label="Category: activate to sort column ascending">Status</th>

        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 127px;" aria-label="Lesson: activate to sort column ascending">Tác giả</th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 127px;" aria-label="Lesson: activate to sort column ascending">   </th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 67px;" aria-label="Price: activate to sort column ascending">Action</th>

    </tr>
    </thead>


    <tbody>
          

   <tr role="row" class="odd">

    
    @foreach ($news as $new)     
    
    <td>{{ $loop->iteration }}</td>
    @php
        $avatar = !empty($new->avatar) ? $new->avatar : 'default.png';
    @endphp

        <td><img src="{{ asset('images/news/'.$avatar) }}" width="50px"></td>
        <td  style="
        display:inline-block;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 20ch;">{{ $new->title }}</td>
        <td>
            @php
                if($new->status == 0){
            @endphp
               <a onclick="return confirm('Xác nhận kích hoạt bài viết ?')"  href="{{ route('admin.news.unactive_news',['id' => $new->id]) }} "class="status_btn" style="background:#FA8072 !important">Unactive</a> 
            
             
            @php
                }else{
            @endphp
                   
            <a onclick="return confirm('Xác nhận tắt kích hoạt bài viết ?')" href="{{ route('admin.news.active_news',['id' => $new->id]) }} "class="status_btn">Active</a> 
            @php
                    }
            @endphp

        </td>
 
        <td>{{ $new->author }}</td>
        <td>{{ date('d/m/Y', strtotime($new->created_at )) }}</td>
        <td><div class="action_btns d-flex">
            <a href="{{ route('admin.news.edit', ['id' => $new->id]) }}" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
            <a  onclick="return confirm('Xác nhận xóa bài viết ?')"  href="{{ route('admin.news.destroy', ['id' => $new->id]) }}" class="action_btn"> <i class="fas fa-trash"></i> </a>
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