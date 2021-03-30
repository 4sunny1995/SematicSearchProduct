@extends('admin.master')
@section('content')
    <div id="crawler-histories" v-cloak>
        @include('table.crawler-histories')
        <div class="a-mask" v-show="state!=0"></div>
        <div class="a-background" v-show="state!=0">
            <div class="a-modal" v-show="state>0">
                <div class="card card-primary w-100 m-auto">
                    <div class="card-header">
                      <h3 class="card-title">@{{title}}</h3>
                    </div>
                    <!-- /.card-header --> 
                      <div class="card-body">
                          <div class="row">
                           <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleInputEmail1">{{trans('spider.domain')}}</label>
                              <input type="text" class="form-control" id="" placeholder="{{trans('spider.domain')}}" v-model="domain" name="domain" required>
                            </div>
                           </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="exampleInputEmail1">{{trans('spider.url')}}</label>
                                <input type="text" class="form-control" id="" placeholder="{{trans('spider.url')}}" v-model="url" name="url" required>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">{{trans('spider.list')}}</label>
                            <input type="text" class="form-control" id="" placeholder="{{trans('spider.list')}}" v-model="listProduct" name="listProduct" required>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">{{trans('spider.name')}}</label>
                            <input type="text" class="form-control" id="" placeholder="{{trans('spider.name')}}" v-model="nameProduct" name="nameProduct" required>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputPassword1">{{trans('spider.price')}}</label>
                              <input type="text" class="form-control" id="" placeholder="{{trans('spider.price')}}" v-model="priceProduct" name="priceProduct" required>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputPassword1">{{trans('spider.image')}}</label>
                              <input type="text" class="form-control" id="" placeholder="{{trans('spider.image')}}" v-model="imageProduct" name="imageProduct" required>
                            </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                              <label for="exampleInputPassword1">{{trans('spider.hastag')}}</label>
                              <input type="text" class="form-control" id="" placeholder="{{trans('spider.hastag')}}" v-model="hasTag" name="hasTag" required>
                            </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                              <label for="exampleInputPassword1">Category</label>
                              <input type="text" class="form-control" id="" placeholder="Category" name="category" v-model="category">
                            </div>
                            </div>
                            
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
                    <h3 class="card-title">{{trans('broader.delete')}}</h3>
                  </div>
                  <h4 class="card-danger text-center">{{trans('broader.delete')}}</h4>
                  <!-- /.card-header --> 
                    <div class="card-body">
                      Are you want to delete this?
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="button" class="btn btn-danger" @click="deleteItem()">{{trans('broader.confirm')}}</button>
                      <button type="button" class="btn btn-primary" @click="openModal(0,null)">Cancel</button>
                    </div>
              </div>
          </div>
        </div>
          
    </div>
@endsection
@section('vuejs')
    <script src="{{mix('js/vuejs/crawler-histories/c-crawler-histories.js')}}"></script>
    <script src="{{mix('js/vuejs/crawler-histories/s-crawler-histories.js')}}"></script>
@endsection