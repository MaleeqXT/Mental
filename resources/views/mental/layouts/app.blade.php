<!doctype html>

<html lang="en">


<!-- Mirrored from demo.web3canvas.com/themeforest/mentalpress/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Oct 2024 13:28:52 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- SEO -->
    <meta name="author" content="Surjith S M">
    <meta name="description" content="MentalPress is a Responsive Medical and Health HTML5 Template ">
    <meta name="keywords" content="health, medical, psychotherapy, website, template">

    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png') }}" type="image/x-icon">

    <!-- Page Title -->
    <title>Home — MentalPress</title>

    <!-- Main CSS -->
    <link href="{{asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- RTL : Enable RTL Style -->

    <!-- Theme CSS -->
    <link href="{{asset('assets/css/themes/purple.css') }}" rel="stylesheet">

    <!-- Color theme Switcher for Demo  -->
    <!-- You will not need that in production -->

    <link rel="alternate stylesheet" title="purple" media="screen" href="{{asset('assets/css/themes/purple.css') }}">
    <link rel="alternate stylesheet" title="blue" media="screen" href="{{asset('assets/css/themes/blue.css') }}">
    <link rel="alternate stylesheet" title="orange" media="screen" href="{{asset('assets/css/themes/orange.css') }}">
    <link rel="alternate stylesheet" title="green" media="screen" href="{{asset('assets/css/themes/green.css') }}">
    <link rel="alternate stylesheet" title="red" media="screen" href="{{asset('assets/css/themes/red.css') }}">
    <link rel="alternate stylesheet" title="light-blue" media="screen" href="{{asset('assets/css/themes/light-blue.css') }}">

    <!-- Style Switcher CSS -->
    <link href="{{asset('assets/css/style-switcher.css') }}" rel="stylesheet">

    <!-- Modernizr -->
    <script src="{{asset('assets/js/modernizr.js') }}"></script>

</head>

<body>

    @include('mental.layouts.header')
    @include('mental.layouts.sidebar')
    
    @yield('content')
    
    @include('mental.layouts.footer')



      <!-- Jquery -->
      <script type="text/javascript" src="{{asset('assets/js/jquery.min.js') }}"></script>

      <!-- Bootstrap JS -->
      <script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js') }}"></script>
  
      <!-- Picture Fill -->
      <script type="text/javascript" src="{{asset('assets/js/picturefill.min.js') }}"></script>
  
      <!-- Style Switcher -->
      <script src="{{asset('assets/js/style-switcher.js') }}"></script>
  
      <!-- Main JS -->
      <script type="text/javascript" src="{{asset('assets/js/main.js') }}"></script>
  
  <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"8d828cc5b8ed4c71","version":"2024.10.3","r":1,"serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"1a2187940c214caa9d3fed19b4904902","b":1}' crossorigin="anonymous"></script>
  </body>
  
  
  <!-- Mirrored from demo.web3canvas.com/themeforest/mentalpress/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Oct 2024 13:28:55 GMT -->
  </html>
  