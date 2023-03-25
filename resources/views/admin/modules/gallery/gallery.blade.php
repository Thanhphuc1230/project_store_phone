@extends('admin.master')
@section('content')
@section('module', 'Images')
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
                    Them thu vien anh
            <input type="hidden" value="{{$pro_id}}" name="pro_id" class="pro_id">
            <form action="">
                @csrf
            <div id="gallary_id">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Ten hinh anh</th>
                                <th>Hinh anh </th>
                                <th>Quan ly</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                        
                    </table>
            </div>
        </form>
        </div>
        </div>
        </div>
        </div>
        </div>
    </div>
</form>

@endsection