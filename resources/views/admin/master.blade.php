

@include('admin.partials.head')
</head>
<body class="crm_body_bg">

@include('admin.partials.sidebar')


@include('admin.partials.main')

{{-- content --}}



@if(Session::get('success'))
<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Well done!</h4>
    
    {{ Session::get('success') }}
</div>
@endif
@yield('content')
{{-- end-content --}}
@include('admin.partials.footer')


</body>

<!-- Mirrored from demo.dashboardpack.com/user-management-html/Layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Aug 2022 17:54:23 GMT -->
</html>