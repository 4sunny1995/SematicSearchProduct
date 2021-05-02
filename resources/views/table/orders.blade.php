<div class="row" >
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Orders Manage</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <div class="input-group-append">
                <a type="button" class="btn btn-primary" href="/admin/orders/create">
                  <i class="fa fa-plus-square" aria-hidden="true"></i>
                  New Order
                </a>
              </div>

            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Code</th>
                <th>User</th>
                <th>Total</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{$order['id']}}</td>
                        <td>{{$order['code']}}</td>
                        <td>{{$order['user']['name']}}</td>
                        <td>{{$order['total']}}</td>
                        <td>{{$order['status']}}</td>
                        <td>
                            <div class="row">
                                <a class="btn btn-success" href="/admin/orders/{{$order['id']}}"><i class="fas fa-eye"></i></a>
                            {{-- <a class="btn btn-danger destroyorder" href="#" data-id="{{$order['id']}}"><i class="fas fa-trash" aria-hidden="true"></i></a> --}}
                            <form action="/admin/orders/delete/{{$order['id']}}" method="GET">
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash" aria-hidden="true"></i></button>
                            </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
