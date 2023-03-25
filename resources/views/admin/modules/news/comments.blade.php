@extends('admin.master')
@section('module','Comments')
@section('action','List')
@section('content')
<div class="white_card card_height_100 mb_30">
    <div class="white_card_header">
    
    </div>
    <div class="white_card_body">
    <div class="QA_section">
    <div class="white_box_tittle list_header">
    <h3>Danh sách comment của khách hàng</h3>
    
    </div>
    <div class="QA_table mb_30">
    
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper no-footer">
        
        <table class="table  dataTable no-footer dtr-inline" id='my-table'role="grid" aria-describedby="DataTables_Table_1_info" style="width: 971px;">
    <thead>
    <tr role="row">
        <th scope="col" class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 101px;" aria-sort="ascending" aria-label="title: activate to sort column descending">Stt</th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 133px;" aria-label="Category: activate to sort column ascending">Bai viet</th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 133px;" aria-label="Category: activate to sort column ascending">User</th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 133px;" aria-label="Category: activate to sort column ascending">Comments</th>

        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 127px;" aria-label="Lesson: activate to sort column ascending">Trạng thái</th>
        
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 127px;" aria-label="Lesson: activate to sort column ascending">Ngày</th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 67px;" aria-label="Price: activate to sort column ascending">Action</th>

    </tr>
    </thead>


    <tbody>
          



    
    @foreach ($comments as $new)     
    
    <td>{{ $loop->iteration }}</td>
    <td>{{$new->intro}}</td>
    <td>{{$new->fullname}}</td>
           <td>{{$new->comments}}</td>
           <td>
            @php
                if($new->status_comments == 0){
            @endphp
               <a onclick="return confirm('Xác nhận duyệt comments này ?')"  href="{{ route('admin.news.unactive_comments',['id' => $new->id]) }} " class="status_btn" style="background: red !important">Unactive</a> 
            
             
            @php
                }else{
            @endphp
                   
            <a onclick="return confirm('Xác nhận tắt duyệt comments này ?')"  href="{{ route('admin.news.active_comments',['id' => $new->id]) }} " class="status_btn">Active</a> 
            @php
                    }
            @endphp

        </td>
 
        <td>{{ date('d/m/Y', strtotime($new->created_at )) }}</td>
        <td><div class="action_btns d-flex">
            <a href="{{ route('admin.news.edit', ['id' => $new->id]) }}" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
            <a  onclick="return confirm('Xác nhận xóa bài viết ?')"  href="{{ route('admin.news.DestroyCmt', ['id' => $new->id]) }}" class="action_btn"> <i class="fas fa-trash"></i> </a>
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