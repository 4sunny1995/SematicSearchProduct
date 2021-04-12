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
</style>
@endsection
@section('content')
<div  id="productdetail" v-cloak>
    <div class="w-100" v-if="isLoading">
        @include('layouts.lazyloading')
    </div>
    <div class="w-100" v-else >
         <div class="w-100">
             <div class="row">
                 <div  class="w-100 text-center">
                    <div class="w-100">
                        <div class="item-container">
                            <div v-if="item.image">
                                <img v-bind:src="item.image" alt="img-product" class="img-product" v-if="item.image.substring(0,4)=='http'||item.image.substring(0,2)=='//'">
                                <img v-bind:src="mediaURL+item.image" alt="img-product" class="img-product" v-else>
                            </div>
                            <div v-else>
                                <img src="{{asset('img/loading.gif')}}" alt="">
                            </div>
                            <div>
                                <div class="name"><p>@{{item.name}}</p></div>
                                <div class="brand"><p></p></div>
                                <div v-if="item.promo>0">
                                    <div class="price">Giá bán : <strike>@{{item.price}}</strike></div>
                                    <div class="promo">Giá khuyến mãi : <strong>@{{item.promo}}</strong></div>
                                </div>
                                <div v-else="item.promo==0">
                                    <div class="promo">Giá bán : <strong>@{{item.price}}</strong></div>
                                </div>
                                <div>@{{item.content}}</div>
                                {{--  <div>Lượt xem : <span style="font-weight: bold;font-size: 16px">@{{item.view}}</span><i class="fa fa-eye" aria-hidden="true"></i></div>  --}}
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
    <script src="{{mix('/js/vuejs/productdetail/c-productdetail.js')}}"></script>
    <script src="{{mix('/js/vuejs/productdetail/s-productdetail.js')}}"></script>
@endsection