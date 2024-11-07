<!-- admin/layouts/app.blade.php -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard | Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Admin Panel" name="description" />
    <meta content="Your Name" name="author" />
    <link rel="shortcut icon" href="{{ asset('auth/assets/images/favicon.ico') }}">

    <!-- Add your CSS links here -->
    <link href="{{ asset('auth/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('auth/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('auth/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">

</head>

<body>
    <div id="layout-wrapper">
        <!-- Sidebar -->
        <div class="vertical-menu">
            <div data-simplebar class="h-100">
                <!-- Sidebar Header -->
                @include('admin.layouts.header')
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
                <div class="user-sidebar text-center">
                    @include('admin.layouts.right')
                </div>

                <!-- Sidemenu -->
                <div id="sidebar-menu">
                    @include('admin.layouts.siderbar')
                </div>
                <!-- Sidebar End -->
            </div>
        </div>
        <!-- Left Sidebar End -->
        
        <!-- Main Content -->
        <div class="main-content">
            @yield('content')

        </div>
    </div>
    <!-- JAVASCRIPT -->
    <script src="{{asset('auth/assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('auth/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('auth/assets/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('auth/assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('auth/assets/libs/node-waves/waves.min.js')}}"></script>

    <!-- Ion Range Slider-->
    <script src="{{asset('auth/assets/libs/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>

    <!-- init js -->
    <script src="{{asset('auth/assets/js/pages/product-filter-range.init.js')}}"></script>

    <script src="{{asset('auth/assets/js/app.js')}}"></script>

</body>

<!-- Mirrored from themesdesign.in/morvin/layouts/ecommerce-products.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Oct 2024 14:34:25 GMT -->
</html>

