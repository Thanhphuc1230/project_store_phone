<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from brandio.io/envato/iofrm/html/login24.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Aug 2022 06:24:33 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('login1/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login1/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login1/css/iofrm-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login1/css/iofrm-theme28.css') }}">
</head>
<body>
    <div class="form-body">
        <div class="website-logo">
            <a href="{{route('website.index')}}">
                <div class="logo">
                    <img class="logo-size" src="{{ asset('website/assets/img/logo/PHONE STORE_free-file (3).png') }}" alt="">
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">

                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                       
                        
                        <div class="page-links">
                            <a href="login" class="active"><h4>Login</h4></a><a href="register"><h4>Register</h4></a>
                        </div>
                        
                      

                       
                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert" style="list-style:none">
                                <i class="ti-alert"></i>
                                    @foreach ($errors->all() as $error)
                                        <li> {{ $error }}</li>
                                    @endforeach
                                </div>
                        @endif
                        
                        @if (Session::get('success'))
                          
                                    <p style="color: green">{!! Session::get('success') !!}    </p>        
                          
                    @endif
                    @if (Session::get('error'))
                        <div class="alert alert-danger" >
                            <ul  style="list-style:none">        
                                    <li style="color: red">{!! Session::get('error') !!}</li>            
                            </ul>
                        </div>
                    @endif
                        <form action="{{route('postLogin')}}" method="post">
                            @csrf
                            <input class="form-control" type="text" name="email" placeholder="E-mail Address" value="{{old('email')}}">
                            <input class="form-control" type="password" name="password" placeholder="Password" >
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Login</button> <a href="{{route('getForgot')}}">Forget password?</a>
                            </div>
                        </form>
                        <div class="other-links">
                            <span>Or login with</span><a href="#">Facebook</a><a href="#">Google</a><a href="#">Linkedin</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="{{ asset('login1/js/jquery.min.js') }}"></script>
<script src="{{ asset('login1/js/popper.min.js') }}"></script>
<script src="{{ asset('login1/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('login1/js/main.js') }}"></script>
</body>

<!-- Mirrored from brandio.io/envato/iofrm/html/login24.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Aug 2022 06:24:41 GMT -->
</html>