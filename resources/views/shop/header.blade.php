<div class="w-100" id="header">
    <div class="w-25">
        <i class="fa fa-bars" aria-hidden="true" id="temp1"></i>
        <div>
            @include('shop.leftmenu')
        </div>
    </div>
    <div class="w-50 text-center"><a href="{{url('/shop')}}"><img src="{{asset('img/img_logo.png')}}" alt="Logo"></a></div>
    <div class="w-25 text-right">
        <div>
            <a href="/">
                <img src="{{asset('img/br-search-header.png')}}" alt="search" width="25px" class="icon-p5">
                {{--  {{dd(Cart::session(Auth::id())->getContent()->toArray())}}  --}}
                {{--  {{count(Cart::session(Auth::id())->getContent()->toArray())}}  --}}
            </a>
        </div>
    </div>
</div>