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
                                            
                        <div class="form-sentz " style="color:aliceblue;text-align:center ">
                            <div class="tick-holder">
                                <div class="tick-icon"></div>
                            </div>
                            <h3 style="text-align:center">Email xác nhận đã được gửi</h3>
                            <div class="info-holder">
                            <p style="text-align:center;padding-top:10px">Vui lòng check emil của bạn <a href="https://accounts.google.com/ServiceLogin/signinchooser?service=accountsettings&continue=https%3A%2F%2Fmyaccount.google.com%3Futm_source%3Daccount-marketing-page%26utm_medium%3Dgo-to-account-button&flowName=GlifWebSignIn&flowEntry=ServiceLogin" class="__cf_email__" data-cfemail="452c2a233728052c2a23372831202835292431206b2c2a">[email&#160;protected]</a></p>
                            </div>
                            <div class="info-holder">
                                <span>Quay lại trang</span> <a href="{{route('getLogin')}}"> đăng nhập</a>.
                            </div>
                            
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

<!-- Mirrored from brandio.io/envato/iofrm/html/login24.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Aug 2022 06:24:41 GMT -->
</html>