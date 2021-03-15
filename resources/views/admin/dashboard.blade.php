@extends('admin.master')
@section('content')
    
    <div id="dashboard" >
        
        <div class="broader">
            <div class="row" >
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">{{trans('broader.title')}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                      <table class="table table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th>{{trans('broader.id')}}</th>
                            <th>{{trans('broader.root')}}</th>
                            <th>{{trans('broader.refer')}}</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for = "(item,index) in broader">
                            <td>@{{index + 1}}</td>
                            <td>@{{item.root}}</td>
                            <td>@{{item.refer}}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
              </div>
        </div>
        <div class="narrower">
            <div class="row" >
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">{{trans('narrower.title')}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                      <table class="table table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th>{{trans('narrower.id')}}</th>
                            <th>{{trans('narrower.root')}}</th>
                            <th>{{trans('narrower.refer')}}</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for = "(item,index) in narrower">
                            <td>@{{index + 1}}</td>
                            <td>@{{item.root}}</td>
                            <td>@{{item.refer}}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
              </div>
        </div>
        <div class="history">
            <div class="row" >
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">{{trans('history.title')}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                      <table class="table table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th>{{trans('history.id')}}</th>
                            <th>{{trans('history.key_word')}}</th>
                            <th>{{trans('history.times')}}</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for = "(item,index) in history">
                            <td>@{{index + 1}}</td>
                            <td>@{{item.key_word}}</td>
                            <td>@{{item.times}}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
              </div>
        </div>
    </div>
@endsection
@section('vuejs')
    <script src="{{mix('js/vuejs/dashboard/c-dashboard.js')}}"></script>
    <script src="{{mix('js/vuejs/dashboard/s-dashboard.js')}}"></script>
@endsection