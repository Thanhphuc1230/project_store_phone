@extends('admin.master')
@section('content')
@section('module', 'User')
@section('action','Edit')

<form action="{{ route('admin.users.update', ['uuid'=> $user->uuid]) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="main_content_iner ">
        <div class="container-fluid p-0 sm_padding_15px">
        <div class="row justify-content-center">
        <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
        <div class="box_header m-0">
        <div class="main-title">
            <a href="{{route('admin.users.index')}}"> <i class="ti-arrow-left" style="font-size: 25px"></i></a> 
        <h3 class="m-0">User Edit</h3>
        </div>
        </div>
        </div>
        <div class="white_card_body">
        
        <form>
        <div class="mb-3">
        <h6 class="card-subtitle mb-2">FullName</h6>
        <input type="text" name="fullname" class="form-control"  placeholder="vd: Samsung" value="{{ old('fullname', $user->fullname)}}">
        </div>

        <div class="mb-3">
            <h6 class="card-subtitle mb-2">Phone</h6>
            <input type="text" name="phone" class="form-control"  placeholder="vd: Samsung" value="{{ old('phone', $user->phone)}}">
        </div>
        
        <div class="mb-3">
            <h6 class="card-subtitle mb-2">Email</h6>
            <input type="text" name="email" class="form-control"  placeholder="vd: Samsung" value="{{ old('email', $user->email)}}">
        </div>

        <div class="mb-3">
                <h6 class="card-subtitle mb-2">Password</h6>
            <input type="password" name="password" class="form-control"  >
        </div>

        <div class="mb-3">
            <h6 class="card-subtitle mb-2">Password-confirmation</h6>
        <input type="password" name="password_confirmation" class="form-control"  >
        </div>
        <div class=" mb-3">
            <h6 class="card-subtitle mb-2">Gender</h6>
                <select class="form-select" name="gender">
                    <option selected="">Choose...</option>
                    <option value="3"  {{ old('gender',$user->gender ) == 3 ? 'selected' : '' }}>Nam</option>
                    <option value="2"  {{ old('gender',$user->gender) == 2 ? 'selected' : '' }}>Nữ</option>
                    <option value="1"  {{ old('gender',$user->gender) == 1 ? 'selected' : '' }}>Khác</option>
                </select>
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" >Level</label>
                <select class="form-select" name="level" disabled   >
                    <option selected=""></option >
                    <option value="3" {{ old('level',$user->level ) == 3 ? 'selected' : ''}}>Users</option>
                    <option value="2" {{ old('level',$user->level ) == 2 ? 'selected' : ''}}>Managers</option>
                    <option value="1" {{ old('level',$user->level ) == 1 ? 'selected' : ''}}>Admin</option>
                </select>
        </div>

        <div class="mb-3" >
            <h6 class="card-subtitle mb-2">Avatar-Current</h6>
            @php
                    $avatar = !empty($user->avatar) ? $user->avatar : 'default.png';
            @endphp
            
            <div >
                <img class="img-fluid img-thumbnail" src="{{ asset('images/users/'. $avatar) }}" alt="" width="200px">
            </div>
        </div>
        

        <div class="input-group mb-3" >
            <label class="input-group-text" for="inputGroupFile01">Avatar</label>
            <input type="file" class="form-control" name="avatar">
        </div>
        
        <button type="submit" class="btn btn-primary">Edit</button>
        </form>
        </div>
        </div>
        </div>
        </div>
        </div>
    </div>
</form>
    
@endsection