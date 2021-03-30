<div class="row" >
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Lịch sử crawler</h3>
          
          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <div class="input-group-append">
                <button type="button" class="btn btn-secondary mr-2" @click="openModal(-2,null)" title="Crawler all">CA</button>
                <button type="button" class="btn btn-primary" @click="createNew()">
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
                <th>Domain</th>
                <th>URL</th>
                <th class="w-25">Product container Selector</th>
                <th class="w-25">Product name Selector</th>
                <th class="w-25">Product price Selector</th>
                <th class="w-25">Product image Selector</th>
                <th>Product hasTag</th>
                <th>Category</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for = "(item,index) in items">
                <td>@{{index + 1}}</td>
                <td>@{{item.domain}}</td>
                <td>@{{item.url}}</td>
                <td class="w-25">@{{item.listProduct}}</td>
                <td class="w-25">@{{item.nameProduct}}</td>
                <td class="w-25">@{{item.priceProduct}}</td>
                <td class="w-25">@{{item.imageProduct}}</td>
                <td>@{{item.hasTag}}</td>
                <td>@{{item.category}}</td>
                <td>
                  <button class="btn btn-success" @click="edit(index)"><i class="fas fa-edit"></i></button>
                  <button class="btn btn-danger" @click="openModal(-1,index)"><i class="fas fa-trash" aria-hidden="true"></i></button>
                  <button class="btn btn-secondary" v-show="hiddenIndex != index" ref="crawlButton" @click="crawl(index)">C</button>

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