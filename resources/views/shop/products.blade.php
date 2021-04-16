@extends('shop.master')
@section('css')
<link rel="stylesheet" href="{{asset('css/category.css')}}">
<style>
    #social-links ul{
        list-style: none;
        display:flex;
        justify-content: center;
        align-items: center;
        width: 100%;
    }
    #social-links ul li{
        width: 25px;
        height: 25px;
    }
    #social-links ul li span{
        padding-top:10px; 
        color: #1ba8f0;
        font-size: 20px;
    }
    .name-category:hover{
        color: white;
        background-color: orange;
        transition-duration: 100ms;
        cursor: pointer;
    }
</style>
@endsection
@section('content')
<div  id="category" >
{{--  <div >  --}}
    <div class="w-100" v-if="isLoading">
        @include('layouts.lazyloading')
    </div>
    <div class="w-100" v-else v-cloak>
        <div class="w-100">
            <div class="row">
                <div class="w-20 text-center border p-1 center name-category" v-for="(category,index) in categories" @click = "showProduct(index)">
                    @{{category.name}}
               </div>
            </div>
         </div>
         <div class="w-100">
             <div class="row" v-cloak>
                 <div class="w-100" v-if="products.length==0">
                    <h3 class="text-center">Not Found Product</h3>
                 </div>
                 <div v-for="(item,index) in products" class="w-50 text-center border-bottom border-right" v-else>
                    <div class="w-100">
                        <div class="item-container">
                            <div class="center" @click = "gotoProductDetail(item.id)">
                                <div v-if="item.image">
                                    <img v-bind:src="item.image" alt="img-product" class="img-product" v-if="item.image.substring(0,4)=='http'||item.image.substring(0,2)=='//'">
                                    <img v-bind:src="mediaURL+item.image" alt="img-product" class="img-product" v-else>
                                </div>
                                <div v-else>
                                    <img src="{{asset('img/loading.gif')}}" alt="">
                                </div>
                            </div>
                            <div >
                                <div class="name"><p><a v-bind:href="'/shop/product/'+item.id">@{{item.name}}</a></p></div>
                                <div v-if="item.promo>0">
                                    <div class="price"><strike>@{{format(item.price)}}</strike></div>
                                    <div class="promo"><strong>@{{item.promo}}</strong></div>
                                </div>
                                <div v-else="item.promo==0">
                                    <div class="promo"><strong>@{{item.price}}</strong></div>
                                </div>     
                            </div>
                        </div>
                        <div class="item-action center">
                            <i class="fa fa-heart-o" aria-hidden="true" @click="addToWishList(index)" v-if="!item.isWishList"></i>
                            <i class="fa fa-heart" aria-hidden="true"  @click="removeToWishList(index)" v-else></i>
                            <img src="{{asset('img/ic-cart.png')}}" alt="icon" class="icon" @click="addToCart(index)" v-if="!item.isCart">
                            <img src="{{asset('img/ic-cart-added.png')}}" alt="icon" class="icon" @click="removeToCart(index)" v-else>
                        </div>
                    </div>
                 </div>
             </div>
         </div>
    </div>
</div>
@endsection
@section('vuejs')
    <script src="{{mix('/js/vuejs/category/c-category.js')}}"></script>
    <script src="{{mix('/js/vuejs/category/s-category.js')}}"></script>
@endsection