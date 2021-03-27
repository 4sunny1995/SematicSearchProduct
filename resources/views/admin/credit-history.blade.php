@extends('admin.master')
<style>
  .post-img{
    max-height: 200px;
    height: 100%;
    object-fit: contain;
  }
</style>
@section('content')
    <div id="credit-history" v-cloak>
        @include('table.credit-history')
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
                          <label for="exampleInputEmail1">{{trans('reward.user_id')}}</label>
                          <input type="text" class="form-control"  placeholder="" name="user_id" v-model="user_id">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">{{trans('reward.type')}}</label>
                          <select name="type" id="type" v-model="type" class="form-control">
                            <option value="0" class="form-control">Trừ</option>
                            <option value="1" class="form-control">Cộng</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">{{trans('reward.value')}}</label>
                          <input type="text" class="form-control"  placeholder="" name="value" v-model="value">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">{{trans('reward.description')}}</label>
                          <input type="text" class="form-control"  placeholder="{{trans('reward.description')}}" name="description" v-model="description">
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
    <script src="{{mix('js/vuejs/credit-history/c-credit-history.js')}}"></script>
    <script src="{{mix('js/vuejs/credit-history/s-credit-history.js')}}"></script>
@endsection