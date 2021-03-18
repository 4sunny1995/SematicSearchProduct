<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>
  <style>
      body,html{
          width: 100%; 
          height: 100%;
      }
  </style>
  <body>
    <div class="container-fluid h-100">
        <div class="row mh-100vh h-100">
            <div class="col-10 col-sm-8 col-md-6 col-lg-6 offset-1 offset-sm-2 offset-md-3 offset-lg-0 align-self-center d-lg-flex align-items-lg-center align-self-lg-stretch bg-white p-5 rounded rounded-lg-0 my-5 my-lg-0" id="login-block">
                <div class="m-auto w-100">
                    <h2 class="text-info font-weight-light mb-5 text-uppercase text-center"><i class="fa fa-diamond"></i>&nbsp;seoulmall.kr</h2>
                    @include('layouts.message')
                    <div class="form-group sun-flex">
                        <div class="w-25 center">
                            <i class="fa-facebook-official fb-icon" aria-hidden="true"></i>
                            
                        </div>
                        <div class="w-75"><a href="{{ URL::to('auth/facebook') }}" class="fb-title">{{trans('login.login_fb')}}</a></div>
                    </div>
                    <div class="form-group sun-flex">
                        <div class="w-25 center">
                            <i class="fa fa-google gg-icon" aria-hidden="true"></i>
                            
                        </div>
                        <div class="w-75"><a href="{{ URL::to('auth/google') }}" class="fb-title">{{trans('login.login_gg')}}</a></div>
                    </div>
                    <form action="/account/login" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="text-secondary">{{trans('login.email')}}</label>
                            <input class="form-control" type="text" required="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,15}$" inputmode="email" name="email">
                        </div>
                        @if ($errors->has('name'))
                            <div class="text-danger error"><strong>{{ $errors->first('email') }}</strong></div>
                        @endif
                        <div class="form-group">
                            <label class="text-secondary">{{trans('login.password')}}</label>
                            <input class="form-control" type="password" required="" name="password">
                        </div>
                        @if ($errors->has('name'))
                            <div class="text-danger error"><strong>{{ $errors->first('password') }}</strong></div>
                        @endif
                        <button class="btn btn-info mt-2" type="submit">{{trans('login.submit')}}</button>
                    </form>
                    <p class="mt-3 mb-0"><a class="text-info small" href="#">{{trans('login.forgot')}}</a></p>
                </div>
            </div>
            <div class="col-lg-6 d-flex align-items-end" id="bg-block" style="background-image:url(./img/bgLogin.jpg);background-size:cover;background-position:center center;">
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>