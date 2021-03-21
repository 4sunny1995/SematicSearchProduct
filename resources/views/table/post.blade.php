<div class="row" >
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">{{trans('post.title')}}</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <div class="input-group-append">
                <button type="button" class="btn btn-primary" @click="createNew()">
                  <i class="fa fa-plus-square" aria-hidden="true"></i>
                  {{trans('post.createText')}}
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
                <th>{{trans('post.id')}}</th>
                <th>{{trans('post.titlePost')}}</th>
                <th>{{trans('post.content')}}</th>
                <th>{{trans('post.image')}}</th>
                <th>{{trans('post.created_at')}}</th>
                <th>{{trans('post.action')}}</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for = "(item,index) in items">
                <td>@{{index + 1}}</td>
                <td>@{{item.title}}</td>
                <td>@{{item.content}}</td>
                <td>@{{item.image}}</td>
                <td>@{{item.created_at}}</td>
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