@extends('admin.master')
<style>
  .post-img{
    max-height: 200px;
    height: 100%;
    object-fit: contain;
  }
</style>
@section('content')
    <div id="coupon" v-cloak>
        @include('table.coupon')
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
                          <input type="text" class="form-control"  placeholder="" name="title" v-model="itemEdit.code" v-if="itemEdit">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">{{trans('coupon.titlePost')}}</label>
                          <select name="" v-model="type" id="type" class="form-control">
                            <option value="1" class="form-control" selected>Tặng điểm thưởng</option>
                            <option value="2" class="form-control">Tặng Credit</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">{{trans('coupon.value')}}</label>
                          <input type="text" class="form-control"  placeholder="{{trans('coupon.titlePost')}}" name="title" v-model="total">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">{{trans('coupon.count')}}</label>
                          <input type="text" class="form-control"  placeholder="{{trans('coupon.count')}}" name="count" v-model="count">
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
    <script src="{{mix('js/vuejs/coupon/c-coupon.js')}}"></script>
    <script src="{{mix('js/vuejs/coupon/s-coupon.js')}}"></script>
@endsection