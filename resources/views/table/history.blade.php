<div class="row" >
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">{{trans('history.title')}}</h3>
        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <div class="input-group-append">
              <button type="button" class="btn btn-primary" @click="openModal(2,null)">
                <i class="fa fa-plus-square" aria-hidden="true"></i>
                {{trans('history.createText')}}
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
              <th>{{trans('history.id')}}</th>
              <th>{{trans('history.key_word')}}</th>
              <th>{{trans('history.times')}}</th>
              <th>{{trans('history.action')}}</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for = "(item,index) in listHistory">
              <td>@{{index + 1}}</td>
              <td>@{{item.key_word}}</td>
              <td>@{{item.times}}</td>
              <td>
                <button class="btn btn-success" @click="openModal(1,index)"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger" @click="openModal(-1,index)"><i class="fas fa-trash" aria-hidden="true"></i></button>
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