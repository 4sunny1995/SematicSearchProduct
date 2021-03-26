<div class="row" >
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">{{trans('coupon.title')}}</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <div class="input-group-append">
                <button type="button" class="btn btn-primary" @click="createNew()">
                  <i class="fa fa-plus-square" aria-hidden="true"></i>
                  {{trans('coupon.createText')}}
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
                <th class="text-center">{{trans('coupon.id')}}</th>
                <th class="text-center">{{trans('coupon.code')}}</th>
                <th class="text-center">{{trans('coupon.type')}}</th>
                <th class="text-center">Name</th>
                <th class="text-center">{{trans('coupon.created_at')}}</th>
                <th class="text-center">{{trans('coupon.action')}}</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for = "(item,index) in items">
                <td class="w-25 text-center"><span class="text-center">@{{index + 1}}</span></td>
                <td class="w-25 text-center" class="text-center"><span>@{{item.code}}</span></td>
                <td class="w-25 text-center" class="text-center">
                  <span v-if="item.coupon.type==1">Tặng điểm thưởng</span>
                  <span v-if="item.coupon.type==2">Tặng Credit</span>
                </td>
                <td class="w-25 text-center" class="text-center"><span>@{{item.user.name}}</span></td>
                
                <td class="text-center"><span >@{{item.created_at}}</span></td>
                <td class="text-center">
                  <button class="btn btn-success" @click="edit(index)"><i class="fas fa-edit"></i></button>
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