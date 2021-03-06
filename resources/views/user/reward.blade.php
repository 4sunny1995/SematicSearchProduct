@extends('shop.master')
@section('css')
    <link rel="stylesheet" href="{{asset('css/reward.css')}}">
@endsection
@section('content')
<div id="reward" v-cloak>
    <div class="title-page" id="title-page">
        <div class="title"><span>Reward Point </span></div>
        <!-- <div class="back-icon"><img src="{{asset('img/btn_back.png')}}" alt="icon" class="icon"></div> -->
    </div>
    {{--  <div v-if="isLoading==true">
        @include('layouts.lazyloading')
    </div>  --}}
    <div class="content" id="content">
        <div class="w-100 reward text-center">
            <span class="text-uppercase p-0 m-0">Reward now</span>
            <div class="sun-flex center"><h2 class="point">{{$reward?$reward['total']-$reward['used']:0}}</h2><h4 class="point text-uppercase m-0 p-0" style="font-weight: normal;">p</h4></div>
        </div>
        <div class="w-100">
            <div class="w-100 sun-flex">
                <div class="w-50 text-center border"><span>Total point: </span><span class="total-point">{{$reward?$reward['total']:0}}</span><span class="total-point">p</span></div>
                <div class="w-50 text-center border"><span>Point used: </span><span class="total-point">-</span><span class="total-point">{{$reward?$reward['used']:0}}</span><span class="total-point">p</span></div>
            </div>
        </div>
        <div class="w-100">
            <ul class="list-group">
                @foreach ($items as $item)
                    @if ($item['type']==0)
                        <li class="list-item sun-flex">
                            <div class="row w-100">
                                <div class="text-center w-100"><span class="date">{{$item['created_at']}}</span></div>
                                <div class="w-75 pdl-25" style="padding-left: 25px !important">
                                    <div><span>Buy</span></div>
                                </div>
                                <div class="w-25 center"><span class="num-point">-{{$item['value']}}</span><span class="text-uppercase">p</span></div>
                            </div>
                        </li>
                    @endif
                    
                    @if($item['type']==1)
                    
                        <li class="list-item sun-flex">
                            <div class="row w-100">
                                <div class="text-center w-100"><span class="date">{{$item['created_at']}}</span></div>
                                <div class="w-75 pdl-25" style="padding-left: 25px !important">
                                    <div><span class="date">{{$item['created_at']}}</span></div>
                                    <div><span>Bonus</span></div>
                                </div>
                                <div class="w-25 center addpoint"><span class="num-point">+{{$item['value']}}</span><span class="text-uppercase">p</span></div>
                            </div>
                        </li>
                    
                    @endif
                @endforeach
                {{--  <li class="list-item sun-flex" v-for="(item,index) in items">
                    <div v-if="item.used>item.total" class="row w-100">
                        <div class="text-center"><span class="date">@{{item.created_at}}</span></div>
                        <div class="w-75 pdl-25" style="padding-left: 25px !important">
                            <div><span>Buy</span></div>
                        </div>
                        <div class="w-25 center"><span class="num-point">-@{{item.used}}</span><span class="text-uppercase">p</span></div>
                    </div>
                    <div v-else class="row w-100">
                        <div class="text-center w-100"><span class="date">@{{item.created_at}}</span></div>
                        <div class="w-75 pdl-25" style="padding-left: 25px !important">
                            <div><span class="date">@{{item.created_at}}</span></div>
                            <div><span>Bonus</span></div>
                        </div>
                        <div class="w-25 center addpoint"><span class="num-point">+@{{item.total}}</span><span class="text-uppercase">p</span></div>
                    </div>
                </li>  --}}
            </ul>
        </div>
    </div>
</div>
@endsection
@section('vuejs')
{{--  <script src="{{mix('/js/vuejs/reward/c-reward.js')}}"></script>
<script src="{{mix('/js/vuejs/reward/s-reward.js')}}"></script>  --}}

@endsection