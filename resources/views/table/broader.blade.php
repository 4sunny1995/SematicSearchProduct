<div class="row" >
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">{{trans('broader.title')}}</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              {{--  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">  --}}

              <div class="input-group-append">
                <button type="button" class="btn btn-primary" @click="createBroader()">
                  <i class="fa fa-plus-square" aria-hidden="true"></i>
                  {{trans('broader.createText')}}
                </button>
              </div>

            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>{{trans('broader.id')}}</th>
                <th>{{trans('broader.root')}}</th>
                <th>{{trans('broader.refer')}}</th>
                <th>{{trans('broader.action')}}</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>183</td>
                <td>John Doe</td>
                <td>11-7-2014</td>
                <td>
                  <button class="btn btn-success"><i class="fas fa-edit"></i></button>
                  <button class="btn btn-danger"><i class="fas fa-trash" aria-hidden="true"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>