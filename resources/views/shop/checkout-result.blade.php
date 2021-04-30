@extends('shop.master')
@section('css')
    <link rel="stylesheet" href="{{asset('css/coupon.css')}}">
@endsection
@section('content')
<div class="title-page" id="title-page">
    <div class="title"><span>checkout result </span></div>
</div>
<div class="w-100 h-100 "style="margin-top: 150px">
    <div class="text-center" >
        <div class="text-center"><span>Thank you very much</span></div>
        <div><a href="/shop/myorder/{{Auth::id()*234}}" class="btn buttonsummit">Go to order</a></div>
    </div>
</div>
@endsection
@section('vuejs')
@endsection