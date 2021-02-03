@extends('admin.master')
@section('content')
<div id="history" v-cloak>
    @include('table.history')
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
                      <label for="exampleInputEmail1">{{trans('history.key_word')}}</label>
                      <input type="text" class="form-control"  placeholder="{{trans('history.key_word')}}" name="root" v-model="key_word">
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
                <h3 class="card-title">{{trans('history.delete')}}</h3>
              </div>
              <h4 class="card-danger text-center">{{trans('history.delete')}}</h4>
              <!-- /.card-header --> 
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">{{trans('history.key_word')}}</label>
                    <span  class="form-control"  placeholder="{{trans('history.key_word')}}" name="root" >@{{key_word}}</span>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="button" class="btn btn-danger" @click="deleteItem()">{{trans('history.confirm')}}</button>
                  <button type="button" class="btn btn-primary" @click="openModal(0,null)">Cancel</button>
                </div>
          </div>
      </div>
    </div>
      
</div>
@endsection
@section('vuejs')
    <script src="{{mix('js/vuejs/history/c-history.js')}}"></script>
    <script src="{{mix('js/vuejs/history/s-history.js')}}"></script>
@endsection