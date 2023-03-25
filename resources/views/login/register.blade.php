<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from brandio.io/envato/iofrm/html/register24.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Aug 2022 06:26:13 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
                    <img class="logo-size" src="{{ asset('login1/images/logo-light.svg') }}" alt="">
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
                            <a href="login"><h4>Login</h4></a><a href="register" class="active"><h4>Register</h4></a>
                        </div>
                        @if ($errors->any())
                        <div class="alert alert-danger" role="alert" style="list-style:none">
                            <i class="ti-alert"></i>
                                @foreach ($errors->all() as $error)
                                    <li> <h5>{{ $error }}</h5></li>
                                @endforeach
                            </div>
                        @endif
                        <form action="{{ route('postRegister')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input class="form-control" type="text" name="fullname" placeholder="Full Name" value="{{old('fullname')}}" >
                            <input class="form-control" type="text" name="phone" placeholder="Phone" value="{{old('phone')}}" >
                            <input class="form-control" type="email" name="email" placeholder="E-mail Address"  value="{{old('email')}}">
                            <input class="form-control" type="password" name="password" placeholder="Password" >
                            <input class="form-control" type="password" name="password_confirmation" placeholder="Password Confirmation" >
                            {{-- <input class="form-control" type="file" name="avatar" placeholder="Avatar" required> --}}
                            
                            
                            <div class="form-sent">
                                <div class="tick-holder">
                                    <div class="tick-icon"></div>
                                </div>
                                <h3>Password link sent</h3>
                                <p>Please check your inbox <a href="http://brandio.io/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="452c2a233728052c2a23372831202835292431206b2c2a">[email&#160;protected]</a></p>
                                <div class="info-holder">
                                    <span>Unsure if that email address was correct?</span> <a href="#">We can help</a>.
                                </div>
                            </div>
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Register</button>
                            </div>
                        </form>
                        <div class="other-links">
                            <span>Or register with</span><a href="#">Facebook</a><a href="#">Google</a><a href="#">Linkedin</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="{{ asset('login1/js/jquery.min.js ') }}"></script>
<script src="{{ asset('login1/js/popper.min.js ') }}"></script>
<script src="{{ asset('login1/js/bootstrap.min.js ') }}"></script>
<script src="{{ asset('login1/js/main.js ') }}"></script>
</body>

<!-- Mirrored from brandio.io/envato/iofrm/html/register24.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Aug 2022 06:26:13 GMT -->
</html>