@extends('shop.master')
@section('css')
    
@endsection
@section('content')
    <div class="w-100" id="myorder">
        <div class="w-100 text-center"><h4 class="text-center">My order</h4></div>
        <div class="w-100" v-cloak>
            <div class="w-100" v-if="isLoading">
                @include('layouts.lazyloading')
            </div>
            <div class="w-100" v-else>
                <div class="w-100 border">
                    <div class="row">
                        <div class="col-md-2 text-center">ID</div>|
                        <div class="col-md-4 text-center">Date</div>|
                        <div class="col-md-3 text-center">Total</div>|
                        <div class="col-md-2 text-center">Status</div>
                    </div>
                </div>
                <div class="w-100 border" v-for="(item,index) in items">
                    <div class="row">
                        <div class="col-md-2 text-center">@{{item.id}}</div>|
                        <div class="col-md-4 text-center">@{{formatDate(item.created_at)}}</div>|
                        <div class="col-md-3 text-center">@{{item.total}}</div>|
                        <div class="col-md-2 text-center">
                            <label class="badge badge-primary" v-if="item.status==1">Đặt mua</label>
                            <label class="badge badge-warning" v-if="item.status==2">Đã thanh toán</label>
                            <label class="badge badge-success" v-if="item.status==3">Đã xong</label>
                            <label class="badge badge-danger" v-if="item.status==-1">Đã hủy</label>
                            <label type="button" class="badge badge-success" title="Xem chi tiết" @click="openOrderDetail(index)"><i class="fa fa-eye" aria-hidden="true"></i></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection
@section('vuejs')
    <script src="{{mix('/js/vuejs/myorder/c-myorder.js')}}"></script>
    <script src="{{mix('/js/vuejs/myorder/s-myorder.js')}}"></script>
@endsection