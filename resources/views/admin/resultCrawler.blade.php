@extends('admin.master')
@section('content')
    <div class="container-fluid" id="crawler-result">
        <div class="row">
            @if (!empty($result))
                @foreach ($result as $item)
                <div class="col-md-4">
                    <div class="block">
                        <div class="img-container">
                            @if (!$item['image'])
                                <img src="{{asset('img/loading.gif')}}" alt="img-item" width="100%">
                            @else
                                <div class="img">
                                    @if(substr($item['image'],0,4)=="http"||substr($item['image'],0,2)=="//")
                                        <img src="{{$item['image']}}" alt="img-item" width="100%">
                                    @else
                                        <img src="{{$item['url'].$item['image']}}" alt="img-item" width="100%">
                                    @endif
                                </div>
                            @endif
                            
                        </div>
                        <div class="product-detail-container">
                            <div class="product-name">
                                <span>{{$item['name']}}</span>
                            </div>
                            <div class="product-price">
                                <span>{{number_format($item['price'], 0)}}</span>
                                <span class="hastag"><i class="fa fa-tag" aria-hidden="true" style="margin-right: 5px"></i>{{$item['hasTag']?$item['hasTag']:null}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                Không có gì cả
            @endif
        </div>
    </div>
@endsection