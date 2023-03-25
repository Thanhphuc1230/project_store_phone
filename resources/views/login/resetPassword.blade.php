<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from brandio.io/envato/iofrm/html/forget17.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Aug 2022 06:27:29 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('login1/css/bootstrap.min.css ') }} ">
    <link rel="stylesheet" type="text/css" href="{{  asset('login1/css/fontawesome-all.min.css ') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('login1/css/iofrm-style.css ') }} ">
    <link rel="stylesheet" type="text/css" href="{{  asset('login1/css/iofrm-theme17.css ') }} ">
</head>
<body>
    <div class="form-body without-side">
        <div class="website-logo">
            <a href="index.html">
                <div class="logo">
                    <img class="logo-size" src="{{ asset('login1/images/logo-light.svg ') }}"alt="">
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="{{ asset('login1/images/graphic3.svg ') }}"alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Password Reset</h3>
                        <p>To reset your password, enter the email address you use to sign in to iofrm</p>
                        @if (Session::get('success'))                                 
                        <p style="color: green"> {{ Session::get('success') }}   </p>                      
                        @endif
                        @if (Session::get('error'))                                              
                            <p style="color: red">   {{ Session::get('error') }}   </p>                                     
                        @endif

                       
                       
                        <form action="{{route('resetPassword')}}"  method="post">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <input class="form-control" type="text" name="email" value="{{ $email ?? old('email') }}" placeholder="E-mail Address" required>
                            
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                            
                            <input class="form-control" type="password" name="password_confirmation" placeholder="Password_confirmation" required>
                            <div class="form-button full-width">
                                <button type="submit" class="ibtn btn-forget"> Reset Password</button>
                            </div>
                        </form>
                        
                    </div>
                    <div class="form-sent">
                        <div class="tick-holder">
                            <div class="tick-icon"></div>
                        </div>
                        <h3>Password link sent</h3>
                        <p>Please check your inbox <a href="" class="__cf_email__" data-cfemail=""></a></p>
                        <div class="info-holder">
                            <span>Unsure if that email address was correct?</span> <a href="#">We can help</a>.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script data-cfasync="false" src="{{ asset('login1/js/email-decode.min.js ') }}"></script>
<script src=" {{ asset('login1/js/jquery.min.js ') }}"></script>
<script src=" {{ asset('login1/js/popper.min.js ') }}"></script>
<script src=" {{ asset('login1/js/bootstrap.min.js ') }}"></script>
<script src=" {{ asset('login1/js/main.js ') }}"></script>
</body>

<!-- Mirrored from brandio.io/envato/iofrm/html/forget17.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Aug 2022 06:27:29 GMT -->
</html>