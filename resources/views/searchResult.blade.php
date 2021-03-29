<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/layouts.css')}}">
  </head>
  <body>
    <div class="container-fluid">
      <form action="/search" method="GET" class="form-group" style="padding-top: 15px">
        <div class="row">
            <div class="col-md-6">
                <input type="text" class="form-control" name="search" value="{{$key}}">
            </div>
            <div class="col-md-2">
              <button class="btn btn-primary" type="submit">Tìm kiếm</button>
            </div>
        </div> 
      </form>
        <div class="col-md-10">
            @foreach ($tag as $item)
            <a href="{{'/search/product/'.$item['id']}}" class="tag"><strong>{{$item['tag']}}</strong></a>
            @endforeach
        </div>
        @if ($items)
        <div class="row">
          @foreach ($items as $item)
          <div class="col-md-3">
            <div class="block">
                <div class="img-container">
                    <div class="img">
                       @if (!$item['image'])
                                <img src="{{asset('img/loading.gif')}}" alt="img-item" width="100%">
                            @else
                                <div class="img">
                                    @if(substr($item['image'],0,4)=="http"||substr($item['image'],0,2)=="//")
                                        <img src="{{$item['image']}}" alt="img-item" width="100%">
                                    @else
                                        <img src="{{$item['url'].$item['image']}}" alt="img-item" width="100%">
                                    @endif
                                </div>
                            @endif
                            
                        
                    </div>
                </div>
                <div class="product-detail-container">
                    <div class="product-name">
                        <span>{{$item['name']}}</span>
                    </div>
                    <div class="product-price">
                        <strong>{{$item['price']}}</strong>
                        <span class="hastag"><i class="fa fa-tag" aria-hidden="true" style="margin-right: 5px"></i>{{$item['hasTag']?$item['hasTag']:null}}</span>
                    </div>
                </div>
            </div>
        </div>
          @endforeach
        </div>
      </div>

        @else
            <div class="w-100">
              <img src="{{asset('images/notavailable.jpg')}}" alt="">
            </div>
        @endif
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>