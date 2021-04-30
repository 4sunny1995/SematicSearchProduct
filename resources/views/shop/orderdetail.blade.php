@extends('shop.master')
@section('css')
    
@endsection
@section('content')
    <div class="w-100" id="myorderdetail">
        <div class="w-100 text-center"><h4 class="text-center">Order Detail</h4></div>
        <div class="w-100" v-cloak>
            <div class="w-100" v-if="isLoading">
                @include('layouts.lazyloading')
            </div>
            <div class="w-100" v-else>
                <div class="w-100 border">
                    <div class="row">
                        <div class="col-md-1 text-center border-right">ID</div>
                        <div class="col-md-2 text-center border-right">Image</div>
                        <div class="col-md-2 text-center border-right">Product</div>
                        <div class="col-md-2 text-center border-right">Quantity</div>
                        <div class="col-md-2 text-center border-right">Price</div>
                        <div class="col-md-2 text-center border-right">Total</div>
                    </div>
                </div>
                <div class="w-100 border" v-for="(item,index) in items">
                    <div class="row">
                        <div class="col-md-1 text-center border-right">@{{item.id}}</div>
                        <div class="col-md-2 text-center border-righ"><img v-bind:src="item.product.image" alt="img" width="100%" style="border-radius: 5px"></div>
                        <div class="col-md-2 text-center border-right"><a v-bind:href="'/shop/product/'+item.product.id">@{{item.name}}</a></div>
                        <div class="col-md-2 text-center border-right">@{{item.quantity}}</div>
                        <div class="col-md-2 text-center border-right">@{{item.product.price}}</div>
                        <div class="col-md-2 text-center border-right">@{{item.price}}</div>
                        {{-- <div class="col-md-2 text-center border-right">
                            <label class="badge badge-primary" v-if="item.status==1">Đặt mua</label>
                            <label class="badge badge-warning" v-if="item.status==2">Đang vận chuyển</label>
                            <label class="badge badge-success" v-if="item.status==3">Đã xong</label>
                            <label class="badge badge-danger" v-if="item.status==-1">Đã hủy</label>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection
@section('vuejs')
    <script src="{{mix('/js/vuejs/myorderdetail/c-myorderdetail.js')}}"></script>
    <script src="{{mix('/js/vuejs/myorderdetail/s-myorderdetail.js')}}"></script>

@endsection