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
                <th class="text-center">{{trans('post.id')}}</th>
                <th class="text-center w-25">{{trans('post.titlePost')}}</th>
                <th class="text-center">{{trans('post.content')}}</th>
                <th class="text-center">{{trans('post.image')}}</th>
                <th class="text-center">{{trans('post.created_at')}}</th>
                <th class="text-center">{{trans('post.action')}}</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for = "(item,index) in items">
                <td class="text-center">@{{index + 1}}</td>
                <td class="w-25">@{{item.title}}</td>
                <td class="w-25">
                  <textarea class="form-control"  name="content" id="content" cols="30" rows="5" disabled>@{{item.content}}</textarea>
                </td>
                <td class="w-25">
                  <img v-bind:src="basicURL+item.image" alt="" width="100%" class="post-img" v-if="item.image">
                  <img src="" alt="" width="100%" v-else>
                </td>
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