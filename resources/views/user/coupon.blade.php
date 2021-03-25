@extends('shop.master')
@section('css')
    <link rel="stylesheet" href="{{asset('css/coupon.css')}}">
@endsection
@section('content')
    <div id="coupon" v-cloak>
        <div class="title-page" id="title-page">
            <div class="title"><span>coupon </span></div>
        </div>
        <div v-if="isLoading==true">
            @include('layouts.lazyloading')
        </div>
        <div class="content" id="content" v-else>
            <div class="w-100">
                    <input type="text" class="form-control" v-model="code" placeholder="Nhập code" required>
                    <button type="button" class="buttonsummit" v-on:click="getCouponCode()">coupon code by now</button>
                    <p>@{{message}}</p>
            </div>
        </div>
    </div>
@endsection
@section('vuejs')
    <script src="{{mix('/js/vuejs/coupon/c-coupon.js')}}"></script>
    <script src="{{mix('/js/vuejs/coupon/s-coupon.js')}}"></script>
@endsection