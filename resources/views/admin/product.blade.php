@extends('admin.master')
<style>
  .post-img{
    max-height: 200px;
    height: 100%;
    object-fit: contain;
  }
</style>
@section('content')
    <div id="product" v-cloak>
        @include('table.product')
        <div class="a-mask" v-show="state!=0"></div>
        <div class="a-background" v-show="state!=0">
            <div class="a-modal" v-show="state>0">
                <div class="card card-primary w-100 m-auto">
                    <div class="card-header">
                      <h3 class="card-title">@{{titlePost}}</h3>
                    </div>
                    <!-- /.card-header --> 
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Name</label>
                          <input type="text" class="form-control"  placeholder="" name="name" v-model="name">
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleInputEmail1">Price</label>
                            <input type="text" class="form-control"  placeholder="" name="price" v-model="price">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleInputEmail1">hasTag</label>
                              <input type="text" class="form-control"  placeholder="" name="hasTag" v-model="hasTag">
                            </div>
                          </div>
                          
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">{{trans('post.content')}}</label>
                          <textarea class="form-control"  name="content" id="content" cols="30" rows="2" v-model="content"></textarea>
                        </div>
                        <div class="form-group">
                          <div class="row">
                            <label for="exampleInputEmail1">{{trans('post.image')}}</label>
                            <input type="file" class="form-control-file border" ref="file" placeholder="{{trans('post.image')}}" name="image" @change="upload()">
                          </div>
                        </div>
                       
                        <div class="form-group text-center">
                          <img v-bind:src="basicURL+image" alt="" width="100%" class="post-img" v-show="image">
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
                      <button type="button" class="btn btn-danger" @click="deleteItem()">{{trans('post.confirm')}}</button>
                      <button type="button" class="btn btn-primary" @click="openModal(0,null)">Cancel</button>
                    </div>
              </div>
          </div>
        </div>
          
    </div>
@endsection
@section('vuejs')
    <script src="{{mix('js/vuejs/product/c-product.js')}}"></script>
    <script src="{{mix('js/vuejs/product/s-product.js')}}"></script>
@endsection