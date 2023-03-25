@extends('admin.master')
@section('content')
@section('module', 'Calendar')
@section('action','Create')

<form action="{{ route('admin.calendars.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="main_content_iner ">
        <div class="container-fluid p-0 sm_padding_15px">
        <div class="row justify-content-center">
        <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
        <div class="box_header m-0">
        <div class="main-title">
        <h3 class="m-0">Calendar Create</h3>
        </div>
        </div>
        </div>
        <div class="white_card_body">
        
        <form>
        <div class="mb-3">
        <h6 class="card-subtitle mb-2"> Name Staff</h6>
        <input type="text" name="fullname" class="form-control"  placeholder="vd: Samsung">
        </div>

        <div class="mb-3">
            <h6 class="card-subtitle mb-2">Start Shift</h6>
            <div class=" mb-0">
                <input type="datetime-local" class="form-control" name="start" id="inputDateTime">
                </div>
        </div>
        

        <div class="mb-3">
            <h6 class="card-subtitle mb-2">End Shift </h6>
            <div class=" mb-0">
            <input type="datetime-local" class="form-control" name="end" id="inputDateTime">
            </div>
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