<!DOCTYPE html>
<html lang="zxx">

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- OGP設定 -->
    <meta property="og:url" content="https:www.for-creators.jp/">
    <meta property="og:type" content="website">
    <meta property="og:image" content="">
    <meta property="og:title" content="For Creators: クリエイターのためのマーケットプレイス">
    <meta property="og:site_name" content="For Creators">
    <!-- Title -->
    <title>For Creators</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/core-img/favicon.ico') }}">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">
    <!-- Responsive Stylesheet -->
    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/classy-nav.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">

    <!-- Core Stylesheet -->
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}

    <!-- Responsive Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css')}}">

</head>

<body class="darker">
    <!-- Preloader -->
    <div id="preloader">
        <div class="preload-content">
            <div id="dream-load"></div>
        </div>
    </div>
    <!-- ##### Header Area Start ##### -->
    @include('includes.navbar')
    <!-- ##### Header Area End ##### -->

    @yield('content')

    <!-- ##### Footer Area End ##### -->
    @include('includes.footer')
    <!-- ##### Footer Area End ##### -->

    <!-- ########## All JS ########## -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- All Plugins js -->
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/jquery.syotimer.min.js') }}"></script>

    <!-- script js -->
    <script src="{{mix('js/app.js')}}"></script>

</body>

</html>
