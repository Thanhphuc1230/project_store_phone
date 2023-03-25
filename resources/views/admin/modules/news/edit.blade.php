@extends('admin.master')
@section('content')
@section('module', 'News')
@section('action','Edit')

<form action="{{ route('admin.news.update', ['id'=> $new->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
                
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
        <div class="box_header m-0">
        <div class="main-title">
            <a href="{{route('admin.news.index')}}"> <i class="ti-arrow-left" style="font-size: 25px"></i></a> 
        <h3 class="m-0">News Edit</h3>
        </div>
        </div>
        </div>
        <div class="white_card_body">
        
        
            <div class="mb-3">
                <h4 class="card-subtitle mb-2">Tiêu đề</h4>
                <input type="text" name="title" class="form-control" value="{{ old('title', $new->title)}}">
            </div>
            

                <div class="mb-3">
                <h4 class="card-subtitle mb-2">Giới thiệu</h4>
                <input type="text" name="intro" class="form-control" value="{{ old('intro', $new->intro)}}">
                </div>
                
                <div class="mb-3" >
                    <h6 class="card-subtitle mb-2" >Avatar Current</h6>
                    @php
                         $avatar = !empty($new->avatar) ? $new->avatar : 'default.png';
                    @endphp
                    <div>
                        <img class="img-fluid img-thumbnail" src="{{asset('images/news/' . $avatar) }}" alt="" width="250px">
                    </div>
                
                </div>

                <div class="mb-3" >
                    <h6 class="card-subtitle mb-2" >Avatar Show</h6>
                    <input type="file" name="avatar" class="form-control" >
                </div>

                 <div class="mb-3">

                <h4 class="card-subtitle mb-2">Nội dung bài viết</h4>
                <textarea class="form-control" maxlength="225" rows="3" name="content" > {{ old('content', $new->content)}} </textarea>
                <script>CKEDITOR.replace( 'content', {
                    filebrowserUploadUrl: "{{ route('admin.upload', ['_token' => csrf_token()]) }}",
                    filebrowserUploadMethod: 'form'
                })</script>
                </div>
                
                    <div class="mb-3">
        
            
                    <div class="mb-3">
                        <h4 class="card-subtitle mb-2">Người đăng</h4>
                        <input type="text" name="author" class="form-control"  placeholder="vd: Samsung" value="{{ old('author', $new->author)}}">
                    </div>
                    <div class="mb-3">
                        <h6 class="card-subtitle mb-2">Trạng thái</h6>
                        <select class="form-select" name="status" >
                            <option selected="" value="1" {{ old('status',$new->status ) == 1 ? 'selected' : ''}}>Hiện</option>
                            <option value="0" {{ old('status',$new->status ) == 0 ? 'selected' : ''}}>Ẩn</option>
                        </select>
                    </div>
         
                        <button type="submit" class="btn btn-primary">Edit</button>
                </div>
        </div>
        </div>
</form>
    
@endsection