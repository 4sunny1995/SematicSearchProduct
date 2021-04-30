@extends('shop.master')
@section('css')
    <link rel="stylesheet" href="{{asset('css/cart.css')}}">
@endsection
@section('content')
<div class="title text-center text-uppercase">
    <span>My Cart</span>
</div>  
<div class="w-100" id="cart" v-cloak>
    <div v-if="isLoading==true">
        @include('layouts.lazyloading')
    </div>
    <div v-else>
        
        <div class="w-100 text-center" v-if="count==0">
            <p>Your cart is empty</p>
            <button class="btn color-orange" type="button">Go to shopping</button>
        </div>
        <div v-else>
            <div class="header-cart">
                <div><span>@{{count}}</span></div>
                <div ><button type="button" @click = "setState(-1)" class="trash"><i class="fa fa-trash" aria-hidden="true"></i></button></div>
            </div>
            <ul class="w-100" id="product-cart">
                <div >
                    <li class="w-100 header-cart" v-for="(item,index) in items">
                        <div class="row">
                            <div class="w-5 center">
                                <input type="checkbox" @change="pushOrpop(index)">
                            </div>
                            <div class="w-20 cart-img" >
                                <img v-bind:src="item.associatedModel.image" alt="" v-if="item.associatedModel.image">
                                <img src="" alt="" v-else>
                            </div>
                            <div class="w-50 p-2">
                                <h4>@{{item.name}}</h4>
                                {{--  <div class="w-100" v-if="item.product.promo>0">
                                    <div class="w-100">
                                        <strike>@{{item.product.price*curency.rate}}@{{curency.curency}}</strike>
                                    </div>
                                    <div class="w-100">
                                        <strong class="promo">@{{item.product.promo*curency.rate}} @{{curency.curency}}</strong>
                                    </div>
                                </div>
                                <div class="w-100" v-else>
                                    <strong class="promo">@{{item.product.price*curency.rate}} @{{curency.curency}}</strong>
                                </div>  --}}
                                <div class="w-100">
                                    <strong class="promo">@{{item.price}}</strong>
                                </div>
                            </div>
                            <div class="w-25 center">
                                <i class="fa fa-window-minimize" aria-hidden="true" type="button" @click="change(index,-1)"></i>
                                <input type="text" pattern="[0-9]+" title="Please only number" class="form-control text-center m-1 p-1" style="width: 50px" v-model="item.quantity">
                                <i class="fa fa-plus" aria-hidden="true" type = "button" @click="change(index,1)"></i>
                            </div>
                        </div>
                    </li>
                </div>
            </ul>
        
            <div class="row border-top">
                <div class="w-25 text-center"><span class="promo-total">Total</span></div>
                {{--  <div class="w-75"><span ></span><span class="promo-total">@{{numberal(items.total)}} @{{curency.curency}}</span></div>  --}}
                <div class="w-75"><span ></span><span class="promo-total">@{{total}}</span></div>

            </div>
            <br><br><br>
        </div>
    </div>
    <div class="w-100 btncomplete fixed-bottom">
        <button type="submit" class="btn btn-block text-uppercase" @click="gotoCheckout()">Checkout</button>
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
    <script src="{{mix('/js/vuejs/cart/c-cart.js')}}"></script>
@endsection