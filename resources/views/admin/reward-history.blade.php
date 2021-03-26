@extends('admin.master')
<style>
  .post-img{
    max-height: 200px;
    height: 100%;
    object-fit: contain;
  }
</style>
@section('content')
    <div id="coupon-history" v-cloak>
        @include('table.coupon-history')
        <div class="a-mask" v-show="state!=0"></div>
        <div class="a-background" v-show="state!=0">
            <div class="a-modal" v-show="state>0">
                <div class="card card-primary w-100 m-auto">
                    <div class="card-header">
                      <h3 class="card-title">@{{title}}</h3>
                    </div>
                    <!-- /.card-header --> 
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">{{trans('coupon.code')}}</label>
                          <input type="text" class="form-control"  placeholder="" name="code" v-model="code">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">User ID</label>
                          <input type="text" class="form-control"  placeholder="{{trans('coupon.count')}}" name="user_id" v-model="user_id">
                        </div>
                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer">
                        <button type="button" class="btn btn-primary" @click="createOrUpdate()">@{{submit}}</button>
                        <button type="button" class="btn btn-danger" @click="openModal(0,null)">Cancel</button>
                      </div>
                </div>
            </div>
            <div class="a-modal" v-show="state==-1">
              <div class="card card-primary w-100 m-auto">
                  <div class="card-header">
                    <h3 class="card-title">{{trans('post.delete')}}</h3>
                  </div>
                  <h4 class="card-danger text-center">{{trans('post.delete')}}</h4>
                  <!-- /.card-header --> 
                    <div class="card-body">
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer text-center">
                      <button type="button" class="btn btn-danger" @click="destroy()">{{trans('post.confirm')}}</button>
                      <button type="button" class="btn btn-primary" @click="openModal(0,null)">Cancel</button>
                    </div>
              </div>
          </div>
        </div>
          
    </div>
@endsection
@section('vuejs')
    <script src="{{mix('js/vuejs/coupon-history/c-coupon-history.js')}}"></script>
    <script src="{{mix('js/vuejs/coupon-history/s-coupon-history.js')}}"></script>
@endsection