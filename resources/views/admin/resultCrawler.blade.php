@extends('admin.master')
@section('content')
    <div class="container-fluid" id="crawler-result">
        <div class="row">
            @if (!empty($result))
                @foreach ($result as $item)
                <div class="col-md-3">
                    <div class="block">
                        <div class="img-container">
                            <div class="img">
                                @if(substr($item['image'],0,4)=="http")
                                <img src="{{$item['image']}}" alt="img-item" width="100%">
                                @else
                                <img src="{{$item['url'].$item['image']}}" alt="img-item" width="100%">
                                @endif
                            </div>
                        </div>
                        <div class="product-detail-container">
                            <div class="product-name">
                                <span>{{$item['name']}}</span>
                            </div>
                            <div class="product-price">
                                <strong>{{$item['price']}}</strong>
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