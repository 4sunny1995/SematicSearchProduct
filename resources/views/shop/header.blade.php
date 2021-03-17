<div class="w-100" id="header">
    <div class="w-25">
        <i class="fa fa-bars" aria-hidden="true" id="temp1"></i>
        <div>
            @include('shop.leftmenu')
        </div>
    </div>
    <div class="w-50 text-center"><a href="{{url('damda')}}"><img src="{{asset('img/img_logo.png')}}" alt="Logo"></a></div>
    <div class="w-25 text-right">
        <div>
            <a href="/home"><img src="{{asset('img/br-search-header.png')}}" alt="search" width="25px" class="icon-p5"></a>
            {{--  <img src="{{asset('img/ic-cart.png')}}" alt="cart" width="25px" class="icon-p5" id="cart" >  --}}
            {{--  @include('layouts.damda.quickcart')  --}}
        </div>
    </div>
</div>
