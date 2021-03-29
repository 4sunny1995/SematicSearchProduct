@extends('admin.master')
@section('content')
    <div class="spider-container" id="spider" v-cloak>
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">{{trans('spider.title')}}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{URL('/admin/spiders')}}" method="POST">
                @csrf
              <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
              <div class="form-group">
                <label for="exampleInputEmail1">{{trans('spider.domain')}}</label>
                <input type="text" class="form-control" id="" placeholder="{{trans('spider.domain')}}" name="domain" required>
              </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">{{trans('spider.url')}}</label>
                  <input type="text" class="form-control" id="" placeholder="{{trans('spider.url')}}" name="url" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">{{trans('spider.list')}}</label>
                  <input type="text" class="form-control" id="" placeholder="{{trans('spider.list')}}" name="listProduct" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">{{trans('spider.name')}}</label>
                  <input type="text" class="form-control" id="" placeholder="{{trans('spider.name')}}" name="nameProduct" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">{{trans('spider.price')}}</label>
                    <input type="text" class="form-control" id="" placeholder="{{trans('spider.price')}}" name="priceProduct" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">{{trans('spider.image')}}</label>
                    <input type="text" class="form-control" id="" placeholder="{{trans('spider.image')}}" name="imageProduct" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">{{trans('spider.hastag')}}</label>
                    <input type="text" class="form-control" id="" placeholder="{{trans('spider.hastag')}}" name="hasTag" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Category</label>
                    <input type="text" class="form-control" id="" placeholder="Category" name="category">
                  </div>
              </div>
              <!-- /.card-body -->
        
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">{{trans('spider.submit')}}</button>
              </div>
            </form>
        </div>
    </div>
@endsection
@section('vuejs')
<script src="{{mix('js/vuejs/spider/c-spider.js')}}"></script>
<script src="{{mix('js/vuejs/spider/s-spider.js')}}"></script>
@endsection