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
      html,body{
          margin: 0px;
          padding: 0px;
          width: 100%;
          height: 100%;
      }
      .register-container{
        background: #FFF;
        padding: 15px;
        max-width: 768px;
        margin: auto;
        height: 100%;
      }
      .dd{
        display: flex;
        justify-content: center;
        align-items: center
      }
  </style>
  <body>
    <div class="container-fluid h-100 dd" style="background-image: url('./images/bgLogin.jpg')">
        <div class="container">
            <form class="form-horizontal" action='/register' method="POST">
                @csrf
                <div class="register-container">
                  <div id="legend">
                    <h4 class="text-center">Register</h4>
                  </div>
                  @include('layouts.message')
                  <div class="control-group">
                    <!-- name -->
                    <label class="control-label"  for="username">Your Name</label>
                    <div class="form-group">
                      <input type="text" id="name" name="name" placeholder="" class="form-control" required>
                      <p class="help-block" >Name without spaces</p>
                    </div>
                  </div>
               
                  <div class="control-group">
                    <!-- E-mail -->
                    <label class="control-label" for="email">E-mail</label>
                    <div class="form-group">
                      <input type="text" id="email" name="email" placeholder="" class="form-control">
                      <p class="help-block">Please provide your E-mail</p>
                    </div>
                  </div>
               
                  <div class="control-group">
                    <!-- Password-->
                    <label class="control-label" for="password">Password</label>
                    <div class="form-group">
                      <input type="password" id="password" name="password" placeholder="" class="form-control">
                      <p class="help-block">Password should be at least 4 characters</p>
                    </div>
                  </div>
               
                  <div class="control-group">
                    <!-- Password -->
                    <label class="control-label"  for="password_confirm">Password (Confirm)</label>
                    <div class="form-group">
                      <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="form-control">
                      <p class="help-block">Please confirm password</p>
                    </div>
                  </div>
               
                  <div class="control-group text-center">
                    <!-- Button -->
                    <div class="form-group">
                      <button class="btn btn-success" type="submit">Register</button>
                    </div>
                  </div>
                </div>
              </form>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>