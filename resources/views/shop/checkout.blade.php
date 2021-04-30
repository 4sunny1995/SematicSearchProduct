@extends('shop.master')
@section('css')
    <link rel="stylesheet" href="{{asset('css/cart.css')}}">
@endsection
@section('content')
    <div id="checkout" v-cloak>
        <div class="title text-center text-uppercase">
            <span>Check out</span>
        </div> 
        <div v-if="isLoading">
            @include('layouts.lazyloading')
        </div>
        <div v-else>
            <ul class="w-100" id="product-cart">
                <div >
                    <li class="w-100 header-cart" v-for="(item,index) in items">
                        <div class="row">
                            {{--  <div class="w-5 center">
                                <input type="checkbox" @change="pushOrpop(index)">
                            </div>  --}}
                            <div class="w-25 cart-img">
                                <img v-bind:src="item.associatedModel.image" alt="" width="100%">
                            </div>
                            <div class="w-50 p-2">
                                <h4>@{{item.name}}</h4>
                                <div class="w-100" v-if="item.promo>0">
                                    <div class="w-100">
                                        <strike>@{{item.associatedModel.price *curency.rate}}@{{curency.curency}}</strike>
                                        
                                    </div>
                                    <div class="w-100">
                                        <strong class="promo">@{{item.associatedModel.promo*curency.rate}} @{{curency.curency}}</strong> * <label for="" class=" m-1 p-1">@{{item.quantity}}</label>
                                        <span class="alert alert-success" v-if="item.isSuccess">success</span>
                                        <span class="alert alert-danger" v-else>Sock out</span>
                                    </div>
                                </div>
                                <div class="w-100" v-else>
                                    <strong class="promo">@{{item.associatedModel.price*curency.rate}} @{{curency.curency}}</strong> *<label for="" class=" m-1 p-1">@{{item.quantity}}</label>
                                    {{-- <span class="alert alert-success" v-if="item.isSuccess">success</span>
                                    <span class="alert alert-danger" v-else>Sock out</span> --}}
                                </div>
                            </div>
                            <div class="w-25 center">
                                {{--  <label for="" class="form-control m-1 p-1">@{{item.quantity}}</label>  --}}
                            </div>
                        </div>
                    </li>
                </div>
            </ul>
            <div class="row border-top">
                <div class="w-25 text-center"><span class="promo-total">Total</span></div>
                <div class="w-75"><span ></span><span class="promo-total">@{{total}} @{{curency.curency}}</span></div>
            </div>
            <br><br><br>
            <div class="w-100 btncomplete fixed-bottom">
                <button type="submit" class="btn btn-block text-uppercase" v-if="hasError" disabled>payment</button>
                <button type="submit" class="btn btn-block text-uppercase" @click="setState(-1)" v-else>payment</button>
            </div>
            <div class="cart-mask" v-if="state<0"></div>
            <div>
                <div class="c-toast" v-if="state<0">
                    <div class="ModalDelete" >
                        <h4 class="border-bottom">Change method payment?</h4>
                        <p class="border-bottom">You have to pay for @{{items.amount}} products.</p>
                        <p class="border-bottom">Total payment is @{{(items.total*curency.rate).toFixed(1)}} @{{curency.curency}}</p>
                        <div class="row p-2">
                            <div class="form-check w-25">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="optradio" value="1" v-model="picked">Delivery
                                </label>
                            </div>
                              <div class="form-check w-25">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="optradio" value="2" v-model="picked">Credit cash
                                </label>
                              </div>
                              <div class="form-check w-50">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="optradio" value="3" v-model="picked">Momo Payment
                                </label>
                              </div>
                        </div>
                        <div class="row">
                            <div class="w-50"></div>
                            <div class="w-50 text-center">
                                <button class="btn btn-success"  v-if="picked===0" disabled>Accept</button>
                                <button class="btn btn-success" @click="payment()" v-else >Accept</button>
                                <button class="btn btn-danger" type="button" @click = "setState(0)">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('vuejs')
<script src="{{mix('/js/vuejs/checkout/c-checkout.js')}}"></script>
<script src="{{mix('/js/vuejs/checkout/s-checkout.js')}}"></script>

@endsection