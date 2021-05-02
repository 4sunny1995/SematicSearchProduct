<div class="row" >
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Order Detail</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <div class="input-group-append">
                {{-- <a type="button" class="btn btn-primary" href="/admin/orders/create">
                  <i class="fa fa-plus-square" aria-hidden="true"></i>
                  New Order
                </a> --}}
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
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
                {{-- @foreach ($orders as $order) --}}
                    <tr>
                        <td>{{$order['id']}}</td>
                        <td>{{$order['order']['code']}}</td>
                        <td>{{$order['name']}}</td>
                        <td>{{$order['quantity']}}</td>
                        <td>{{$order['product']['price']}}</td>
                        <td>{{$order['price']}}</td>
                        {{-- <td>
                            <a class="btn btn-success" href="/admin/orders/{{$order['id']}}"><i class="fas fa-edit"></i></a>
                            <a class="btn btn-danger" href="#" ><i class="fas fa-trash" aria-hidden="true"></i></a>
                        </td> --}}
                    </tr>
                {{-- @endforeach --}}
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>