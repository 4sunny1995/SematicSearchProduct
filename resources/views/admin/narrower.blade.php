@extends('admin.master')
@section('content')
<div id="narrower" v-cloak>
    @include('table.narrower')
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
                      <label for="exampleInputEmail1">{{trans('narrower.root')}}</label>
                      <input type="text" class="form-control"  placeholder="{{trans('narrower.root')}}" name="root" v-model="root">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">{{trans('narrower.refer')}}</label>
                      <input type="text" class="form-control"  placeholder="{{trans('narrower.refer')}}" name="refer" v-model="refer">
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
                <h3 class="card-title">{{trans('narrower.delete')}}</h3>
              </div>
              <h4 class="card-danger text-center">{{trans('narrower.delete')}}</h4>
              <!-- /.card-header --> 
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">{{trans('narrower.root')}}</label>
                    <span  class="form-control"  placeholder="{{trans('narrower.root')}}" name="root" >@{{root}}</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">{{trans('narrower.refer')}}</label>
                    <span type="text" class="form-control"  placeholder="{{trans('narrower.refer')}}" name="refer">@{{refer}}</span>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="button" class="btn btn-danger" @click="deleteItem()">{{trans('narrower.confirm')}}</button>
                  <button type="button" class="btn btn-primary" @click="openModal(0,null)">Cancel</button>
                </div>
          </div>
      </div>
    </div>
      
</div>
@endsection
@section('vuejs')
    <script src="{{mix('js/vuejs/narrower/c-narrower.js')}}"></script>
    <script src="{{mix('js/vuejs/narrower/s-narrower.js')}}"></script>
@endsection