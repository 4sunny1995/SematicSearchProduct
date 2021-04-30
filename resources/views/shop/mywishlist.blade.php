@extends('shop.master')
@section('css')
    <link rel="stylesheet" href="{{asset('css/cart.css')}}">
@endsection
@section('content')
<div class="title text-center text-uppercase">
    <span>My Wish List</span>
</div>  
<div class="w-100" id="mywishlist" v-cloak>
    <div v-if="isLoading">
        @include('layouts.lazyloading')
    </div>
    <div v-else>
        <div class="header-cart">
            <div><span v-if="items">@{{items.length}}</span><span v-else>none</span></div>
            <div></div>
        </div>
        <div class="w-100 text-center" v-if="!items">
            <p>Your wish list is empty</p>
            <button class="btn color-orange" type="button">Go to shopping</button>
        </div>
        <div v-else>
            <ul class="w-100" id="product-cart">
                <div >
                    <li class="w-100 header-cart" v-for="(item,index) in items">
                        <div class="row">
                            {{-- <div class="w-5 center">
                                <input type="checkbox" @change="pushOrpop(index)">
                            </div> --}}
                            <div class="w-25 cart-img">
                                <img v-bind:src="item.product.image" alt="item.product.name" class="w-image">
                            </div>
                            <div class="w-50 p-2">
                                <h4>@{{item.product.name}}</h4>
                                <div class="w-100" v-if="item.product.promo>0">
                                    <div class="w-100">
                                        <strike>@{{formatPrice(item.product.price)}}</strike>
                                    </div>
                                    <div class="w-100">
                                        <strong class="promo">@{{formatPrice(item.product.promo)}}</strong>
                                    </div>
                                </div>
                                <div class="w-100" v-else>
                                    <strong class="promo">@{{formatPrice(item.product.price)}}</strong>
                                </div>
                            </div>
                            <div class="w-25 center">
                                <img src="{{asset('img/ic-cart.png')}}" alt="icon" class="icon" @click="addToCart(index)" v-if="!item.isCart">
                                <i class="fa fa-trash c-trash" aria-hidden="true" type="button" @click="setState(-1,index)"></i>
                            </div>
                        </div>
                    </li>
                </div>
            </ul>
        
            <div class="row border-top">
                
            </div>
            <br><br><br>
        </div>
    </div>
    
    <div class="cart-mask"  v-if="state<0" ></div>
    <div>
        <div class="c-toast" @click = "setState(0)" v-if="state<0">
            <div class="ModalDelete" >
                <h4 class="border-bottom">Are you remove?</h4>
                <p class="border-bottom">Are you remove this products in shopping cart?</p>
                <div class="row">
                    <div class="w-50"></div>
                    <div class="w-50 text-center">
                        <button class="btn btn-success" @click="removeItems()">Accept</button>
                        <button class="btn btn-danger" type="button" @click = "setState(0)">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('vuejs')
    <script src="{{mix('/js/vuejs/wishlist/c-wishlist.js')}}"></script>
    <script src="{{mix('/js/vuejs/wishlist/s-wishlist.js')}}"></script>

@endsection