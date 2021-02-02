@extends('admin.master')
@section('content')
    <div id="broader" v-cloak>
        @include('table.broader')
        <div class="a-mask" v-show="state>0"></div>
        <div class="a-background" v-show="state>0">
            <div class="a-modal">
                <div class="card card-primary w-100 m-auto">
                    <div class="card-header">
                      <h3 class="card-title">@{{title}}</h3>
                    </div>
                    <!-- /.card-header --> 
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">{{trans('broader.root')}}</label>
                          <input type="text" class="form-control"  placeholder="{{trans('broader.root')}}" name="root" v-model="model.root">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">{{trans('broader.refer')}}</label>
                          <input type="text" class="form-control"  placeholder="{{trans('broader.refer')}}" name="refer" v-model="model.refer">
                        </div>
                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer">
                        <button type="button" class="btn btn-primary">Accept</button>
                        <button type="button" class="btn btn-danger">Cancel</button>
                      </div>
                </div>
            </div>
        </div>    
    </div>
@endsection
@section('vuejs')
    <script src="{{mix('js/vuejs/broader/c-broader.js')}}"></script>
    <script src="{{mix('js/vuejs/broader/s-broader.js')}}"></script>
@endsection