<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Armata">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:400,600,800">
    <link rel="stylesheet" href="{{asset('fonts/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/fontawesome5-overrides.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('css/layout.css')}}">
    <link rel="stylesheet" href="{{asset('css/lazyloading.css')}}">
    @yield('css')
</head>

<body>
    <div id="app">
        <div class="c-mask closeleftmenu">
            
        </div>
        <div class="sun-container">
            @include('shop.header')
            @yield('content')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/script.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.js"></script>
    <script src="{{asset('js/owlcarousel.js')}}"></script>
    <script src="{{asset('js/javascript.js')}}"></script>
     <script src="{{asset('js/notice.js')}}"></script> 
    <script src="{{mix('/js/vuejs/leftmenu/c-leftmenu.js')}}"></script>
    <script src="{{mix('/js/vuejs/leftmenu/s-leftmenu.js')}}"></script>

    <script src="{{ asset('js/share.js') }}"></script>
    {{-- <script src="{{mix('/js/notice.js')}}"></script> --}}
    @yield('vuejs')
</body>

</html> 