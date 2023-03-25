@include('website.partials.head')
@include('website.partials.header')
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="{{Route('website.index')}}">home</a></li>
                        <li>My account</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="account_page_bg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="user-actions">
                   
                       <a href="{{ route('website.account', ['uuid' => Auth::user()->uuid]) }}"> <i class="fa-solid fa-arrow-left" style="font-size: 30px"></i></a>
        
        
            
                   
                </div>
            \
           </div>
        </div>
        <section class="main_content_area">
            <div class="account_dashboard">
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <!-- Nav tabs -->
                        <div class="dashboard_tab_button">
                            <ul role="tablist" class="nav flex-column dashboard-list" id="nav-tab">
                          
                               
                                <li><a href="#information" data-toggle="tab" class="nav-link active">Tài khoản</a></li>
                            
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-9 col-lg-9">
                        <!-- Tab panes -->
                        <div class="tab-content dashboard_content">
                         
                            
                         
                            <div class="tab-pane fade show active" id="information">
                                <h3>Thông tin người dùng </h3>
                                <div class="login">
                                    <div class="login_form_container">
                                        <div class="account_login_form">
                                            <form action="{{ route('website.accountUpdate', ['uuid'=> $user->uuid]) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                
                                                
                                                <label>Full name</label>
                                                <input type="text" name="fullname" value="{{ old('fullname', $user->fullname)}}" >
                                                <label>Phone</label>
                                                <input type="text" name="phone" value="{{ old('phone', $user->phone)}}">
                                                <label>Email</label>
                                                <input type="text" name="email" value="{{old('email',$user->email)}}">
                                                <label>Giới tính</label>
                                                <div class=" mb-3">
                                                  
                                                        <select class="form-select" name="gender">
                                                           
                                                            <option value="1"  {{ old('gender',$user->gender) == 3 ? 'selected' : '' }}>Nam</option>
                                                            <option value="2"  {{ old('gender',$user->gender) == 2 ? 'selected' : '' }}>Nữ</option>
                                                            <option value="3"  {{ old('gender',$user->gender) == 1 ? 'selected' : '' }} selected>Khác</option>
                                                        </select>
                                                </div>
                                                <label>Address</label>
                                                <input type="text" name="address" value="{{old('address',$user->address)}}">
                                                <label>Password</label>
                                                <input type="password" name="password">
                                                <label>password_confirmation</label>
                                                <input type="password" name="password_confirmation">
                                                
                                                    <label>Avatar-Current</label>
                                                    @php
                                                            $avatar = !empty($user->avatar) ? $user->avatar : 'default.png';
                                                    @endphp
                                                    
                                                    <div >
                                                        <img class="img-fluid img-thumbnail" src="{{ asset('images/users/'. $avatar) }}" alt="" width="200px">
                                                    </div>
                                                    
                                                        <label>Avatar</label>
                                                        <input type="file"  name="avatar">
                                                    
                                                
                                               
                                                <div class="save_button primary_btn default_button">
                                                    <button type="submit">Save</button>
                                                </div>
                                              
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@include('website.partials.footer')
