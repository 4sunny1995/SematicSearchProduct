<style>
    .ml-25{
        margin-left:25px; 
    }
</style>
<div class="menu-left-container" id="leftmenu">
    <div class="w-100 lazyloading" v-if="isLoading===true">
        @include('layouts.lazyloading')
    </div>
    <div class="w-100" v-else>
        <div class="title-account">
            <div>
                @include('layouts.multilang')
            </div>
            <span>{{trans('nav.welcome')}}</span>
            <i class="fa fa-times closeleftmenu" aria-hidden="true" id="closeleftmenu"></i>
        </div>
        <div class="w-100">
            <img src="{{asset('img/nature.jpg')}}" alt="cover" class="cover">
        </div>
       <div class="w-100">
           <div class="text-center">Category LV1</div>
            <ul id="categoryParent">
                <li class="categoryParent-item" v-for="item in categoryParents"><a v-bind:href="'/shop/category/'+item.id">@{{item.name}}</a></li>
            </ul>
       </div>
       <div class="w-100">
           <div class="row text-center p-2">|
               <div class="w-25 ml-25"  data-id="{{Auth::id()*234}}"><a href="/shop/reward/{{Auth::id()}}">Reward</a> </div>|
               <div class="w-25" data-id="{{Auth::id()*234}}"><a href="/shop/credit/{{Auth::id()}}">Credit</a></div>|
               <div class="w-25" data-id="{{Auth::id()*234}}"><a href="/shop/coupon">Coupon</a></div>|
           </div>
       </div>
       <div class="w-100">
           <div class="row text-center">
               <div class="col-md-6 border p-2" @click="gotoProfile()"  data-id="{{Auth::id()*234}}"><img src="{{asset('img/ic_leftmenu_mypage.png')}}" alt="icon" class="icon">My page</div>
               <div class="col-md-6 border p-2" @click="openMyorder($event)"  data-id="{{Auth::id()*234}}"><img src="{{asset('img/ic_leftmenu_myorder.png')}}" alt="icon" class="icon">My order</div>
               <div class="col-md-6 border p-2" @click="openMycart($event)"  data-id="{{Auth::id()*234}}"><img src="{{asset('img/ic_leftmenu_cart.png')}}" alt="icon" class="icon">My cart</div>
               <div class="col-md-6 border p-2" @click="openMywishlist($event)"  data-id="{{Auth::id()*234}}"><img src="{{asset('img/ic_leftmenu_wishlist.png')}}" alt="icon" class="icon">My wishlist</div>
           </div>
       </div>
        <ul class="menu-left w-100">
            
            <li class="menu-left-item w-100"><a href="#" class="w-100">About us</a></li>
            <li class="menu-left-item w-100"><a href="{{url('shop/notice')}}">Notice</a></li>
            <li class="menu-left-item w-100"><a href="{{url('shop/faq')}}">FAQ</a></li>
        </ul>
    </div>
</div>