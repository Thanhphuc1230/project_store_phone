@extends('admin.master')
@section('content')
@section('module', 'News')
@section('action','Create')

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
         
                        <button type="submit" class="btn btn-primary">Create</button>
                </div>
        </div>
        </div>
</form>
    
@endsection