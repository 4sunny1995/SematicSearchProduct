<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{trans('dashboard.page_title')}}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
  <!-- Scripts -->
  {{--  <script src="{{ mix(('js/app.js')) }}" defer></script>  --}}
  <!-- Styles -->
  {{--  <link href="{{ asset('css/app.css') }}" rel="stylesheet">  --}}
  <link rel="stylesheet" href="{{asset('css/layouts.css')}}">
  <link rel="stylesheet" href="{{asset('css/loading.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper w-100">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{asset('dist/img/user1-128x128.jpg')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{asset('dist/img/user8-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{asset('dist/img/user3-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
      <img src="{{asset('dist/img/tdmu.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3 bg-white">
      <span class="brand-text font-weight-light">{{trans('dashboard.logo_name')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <div><a href="#" class="d-block">{{Auth::user()->email}}</a></div>
          <div><a href="{{route('admin.logout')}}">{{trans('dashboard.logout')}}</a></div>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
                <a href="{{URL('/admin/dashboard')}}" class="nav-link">
                  <p>{{trans('dashboard.dashboard')}}</p>
                </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <p>
                {{trans("dashboard.dictionary")}}
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">{{trans('dashboard.amount_of_dictionary')}}</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{URL('/admin/broaders')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{trans('dashboard.broader')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{URL('/admin/narrowers')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{trans('dashboard.narrower')}}</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <p>
                {{trans('dashboard.crawler')}}
                <i class="right fas fa-angle-left right"></i>
                <span class="badge badge-info right">{{trans('dashboard.amount_of_data')}}</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{URL('/admin/spiders')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{trans('dashboard.spider')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{URL('/admin/histories')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{trans('dashboard.history')}}</p>
                </a>
              </li>
    
              <li class="nav-item">
                <a href="{{URL('/admin/spider-histories')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crawler Histories</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <p>
                {{trans("dashboard.service")}}
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">{{trans('dashboard.amount_of_dictionary')}}</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{URL('/admin/email')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{trans('dashboard.email')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{URL('/admin/sms')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{trans('dashboard.sms')}}</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            
            <a href="#" class="nav-link">
              <p>
                Products
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">3</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">

                <a href="{{URL('/admin/products')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{trans('dashboard.product')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{URL('/admin/categories')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{URL('/admin/categoryParent')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category Parent</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
           
            <a href="#" class="nav-link">
              <p>
                {{trans("dashboard.post")}}
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{URL('/admin/posts')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i><span>Posts</span></a>
              </li>
              <li class="nav-item">
                <a href="{{URL('/admin/comments')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Comments</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <p>
                {{trans("dashboard.coupon")}}
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{URL('/admin/coupon')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Coupon</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{URL('/admin/coupon-history')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Coupon History</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <p>
                {{trans("dashboard.reward")}}
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{URL('/admin/reward')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Reward</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{URL('/admin/reward-history')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Reward History</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <p>
                {{trans("dashboard.credit")}}
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{URL('/admin/credit')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Credit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{URL('/admin/credit-history')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Credit History</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/admin/orders" class="nav-link">Orders</a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    @yield('content')
    
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0-rc
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
@yield('vuejs')


</body>
</html>
